<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Models\Customer;
use App\Models\Redemption;
use App\Models\Reward;
use App\Models\Transaction;
use App\Services\RedemptionService;
use App\Services\TransactionService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class StaffController extends Controller
{
    public function __construct(
        protected TransactionService $transactionService,
        protected RedemptionService $redemptionService,
    ) {
    }

    public function dashboard()
    {
        return view('staff.dashboard', [
            'customersToday' => Customer::whereDate('created_at', today())->count(),
            'transactionsToday' => Transaction::whereDate('tanggal_transaksi', today())->count(),
            'pointsToday' => Transaction::whereDate('tanggal_transaksi', today())->sum('point_didapat'),
            'pendingRedemptions' => Redemption::where('status', 'pending')->count(),
            'recentTransactions' => Transaction::with('customer')->latest('tanggal_transaksi')->limit(8)->get(),
        ]);
    }

    public function customers(Request $request)
{
    $search = trim((string) $request->input('search', ''));

    $customers = Customer::query()
        ->when($search !== '', function ($q) use ($search) {

            $q->where(function ($inner) use ($search) {

                $inner
                    ->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('nomor_hp', 'like', '%' . $search . '%')
                    ->orWhere('member_code', 'like', '%' . $search . '%')
                    ->orWhere('qr_code', 'like', '%' . $search . '%');

            });

        })
        ->latest()
        ->paginate(12)
        ->withQueryString();


    /*
    |--------------------------------------------------------------------------
    | AJAX / LIVE SEARCH
    |--------------------------------------------------------------------------
    */

    if ($request->ajax()) {

        return view(
            'staff.partials.customer-list',
            compact('customers')
        );
    }


    return view(
        'staff.customers',
        compact('customers')
    );
}

public function createCustomer()
{
    return view('staff.customer-create');
}


public function storeCustomer(Request $request)
{
    $validated = $request->validate([
        'nama' => [
            'required',
            'string',
            'max:100',
        ],
        'nomor_hp' => [
            'required',
            'string',
            'regex:/^08[0-9]{8,12}$/',
            'unique:users,username',
            'unique:customers,nomor_hp',
        ],
        'email' => [
            'required',
            'email',
            'max:255',
            'unique:customers,email',
        ],
        'tanggal_lahir' => [
            'nullable',
            'date',
        ],
        'password' => [
            'required',
            'string',
            'min:8',
            'confirmed',
        ],
    ], [
        'nama.required' =>
            'Nama lengkap wajib diisi.',

        'nomor_hp.unique' =>
            'Nomor WhatsApp tersebut sudah terdaftar sebagai member.',

        'nomor_hp.regex' =>
            'Nomor WhatsApp harus diawali 08 dan berisi 10–14 digit.',

        'email.required' =>
            'Email wajib diisi untuk verifikasi member.',

        'email.email' =>
            'Format email tidak valid.',

        'email.unique' =>
            'Email sudah terdaftar sebagai member.',

        'password.min' =>
            'Password minimal 8 karakter.',

        'password.confirmed' =>
            'Konfirmasi password tidak cocok.',
    ]);

    $otp = (string) random_int(100000, 999999);

    // Simpan sementara data pendaftaran staff di session.
    // Password disimpan dalam bentuk hash, bukan teks asli.
    $registration = [
        'nama' => $validated['nama'],
        'nomor_hp' => $validated['nomor_hp'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'tanggal_lahir' => $validated['tanggal_lahir'] ?? null,
        'otp_hash' => Hash::make($otp),
        'attempts' => 0,
    ];

    try {
        Mail::raw(
            "Halo {$validated['nama']},\n\n"
            . "Kode OTP untuk verifikasi pembuatan member "
            . "SAÉ CAFE ROJEL kamu adalah:\n\n"
            . "{$otp}\n\n"
            . "Kode ini berlaku selama 5 menit dan hanya "
            . "dapat digunakan satu kali.\n"
            . "Jangan bagikan kode ini kepada siapa pun.\n\n"
            . "Jika kamu tidak merasa melakukan pendaftaran, "
            . "abaikan email ini.",
            function ($message) use ($validated) {
                $message->to($validated['email'])
                    ->subject(
                        'Verifikasi Member - SAÉ CAFE ROJEL'
                    );
            }
        );

        // Mulai masa berlaku setelah email berhasil dikirim.
        $resendAvailableAt = now()->addMinutes(5)->timestamp;

        $registration['otp_expires_at'] = $resendAvailableAt;
        $registration['otp_resend_available_at'] = $resendAvailableAt;

        $request->session()->put(
            'staff_customer_registration',
            $registration
        );

    } catch (\Throwable $e) {
        report($e);

        $request->session()->forget('staff_customer_registration');

        return back()
            ->withErrors([
                'email' =>
                    'Email OTP gagal dikirim. Periksa alamat email dan coba kembali.',
            ])
            ->withInput(
                $request->except([
                    'password',
                    'password_confirmation',
                ])
            );
    }

    return redirect()
        ->route('staff.customers.verify')
        ->with(
            'success',
            'Kode OTP telah dikirim ke email customer. Silakan verifikasi untuk menyelesaikan pendaftaran member.'
        );
}


/**
 * Menampilkan halaman verifikasi OTP untuk member yang ditambahkan staff.
 */
public function verifyCustomerOtp(Request $request)
{
    $registration = $request->session()->get(
        'staff_customer_registration'
    );

    if (!$registration) {
        return redirect()
            ->route('staff.customers.create')
            ->withErrors([
                'register' => 'Sesi pendaftaran member sudah berakhir. Silakan masukkan data kembali.',
            ]);
    }

    $resendAvailableAt = (int) (
        $registration['otp_resend_available_at']
        ?? $registration['otp_expires_at']
        ?? now()->timestamp
    );

    $resendSeconds = max(
        0,
        $resendAvailableAt - now()->timestamp
    );

    return view(
        'staff.customer-verify-otp',
        compact('resendSeconds')
    );
}


/**
 * Memverifikasi OTP dan membuat member setelah kode benar.
 */
public function verifyCustomerOtpStore(Request $request)
{
    $request->validate([
        'otp' => ['required', 'digits:6'],
    ]);

    $registration = $request->session()->get(
        'staff_customer_registration'
    );

    if (!$registration) {
        return redirect()
            ->route('staff.customers.create')
            ->withErrors([
                'register' => 'Sesi pendaftaran member sudah berakhir. Silakan masukkan data kembali.',
            ]);
    }

    if (now()->timestamp >= $registration['otp_expires_at']) {
        return back()->withErrors([
            'otp' => 'Kode OTP sudah kedaluwarsa. Silakan kirim ulang kode OTP.',
        ]);
    }

    $registration['attempts'] =
        (int) ($registration['attempts'] ?? 0) + 1;

    if ($registration['attempts'] > 5) {
        $request->session()->forget(
            'staff_customer_registration'
        );

        return redirect()
            ->route('staff.customers.create')
            ->withErrors([
                'register' => 'Batas percobaan OTP terlampaui. Silakan mulai pendaftaran member kembali.',
            ]);
    }

    if (!Hash::check(
        $request->input('otp'),
        $registration['otp_hash']
    )) {
        $request->session()->put(
            'staff_customer_registration',
            $registration
        );

        return back()->withErrors([
            'otp' => 'Kode OTP salah. Silakan periksa kembali email customer.',
        ]);
    }

    try {
        $customer = DB::transaction(function () use ($registration) {
            $user = User::create([
                'username' => $registration['nomor_hp'],
                'password' => $registration['password'],
                'role' => 'customer',
                'status' => 'aktif',
            ]);

            $customer = Customer::create([
                'id_user' => $user->id_user,
                'member_code' => 'TMP-' . Str::uuid(),
                'qr_code' => 'SAE-QR-' . strtoupper(Str::random(12)),
                'nama' => $registration['nama'],
                'nomor_hp' => $registration['nomor_hp'],
                'email' => $registration['email'],
                'tanggal_lahir' => $registration['tanggal_lahir'] ?? null,
                'tanggal_daftar' => now(),
                'saldo_point' => 0,
                'status_member' => 'aktif',
            ]);

            $customer->member_code = 'SAE' . str_pad(
                $customer->id_customer,
                5,
                '0',
                STR_PAD_LEFT
            );

            $customer->save();

            return $customer;
        });
    } catch (\Throwable $e) {
        report($e);

        return back()->withErrors([
            'register' => 'Member gagal dibuat. Data pendaftaran masih tersimpan; silakan coba kembali.',
        ]);
    }

    $request->session()->forget(
        'staff_customer_registration'
    );

 
try {
    Mail::raw(
        "Halo {$customer->nama},\n\n"
        . "Selamat bergabung dengan SAÉ CAFE ROJEL!\n\n"
        . "Akun member kamu berhasil diverifikasi dan dibuat.\n\n"
        . "Silakan login menggunakan nomor WhatsApp dan password "
        . "yang telah didaftarkan.\n\n"
        . "Terima kasih telah menjadi bagian dari SAÉ CAFE ROJEL.\n\n"
        . "Buka website SAÉ CAFE ROJEL:\n"
        . route('login') . "\n\n"
        . "Tautan ini hanya untuk membuka website. Verifikasi akun "
        . "dilakukan dengan kode OTP saat pendaftaran.",
        function ($message) use ($customer) {
            $message->to($customer->email)
                ->subject('Selamat Bergabung - SAÉ CAFE ROJEL');
        }
    );
} catch (\Throwable $e) {
    report($e);
}


    return redirect()
        ->route('staff.customers')
        ->with(
            'success',
            "Member {$customer->nama} berhasil diverifikasi dan dibuat. Member Code: {$customer->member_code}."
        );
}


/**
 * Mengirim ulang OTP untuk pendaftaran member oleh staff.
 */
public function resendCustomerOtp(Request $request)
{
    $registration = $request->session()->get(
        'staff_customer_registration'
    );

    if (!$registration) {
        return redirect()
            ->route('staff.customers.create')
            ->withErrors([
                'register' => 'Sesi pendaftaran member sudah berakhir. Silakan masukkan data kembali.',
            ]);
    }

    $resendAvailableAt = (int) (
        $registration['otp_resend_available_at']
        ?? $registration['otp_expires_at']
        ?? 0
    );

    if (now()->timestamp < $resendAvailableAt) {
        return back()->withErrors([
            'register' => 'Tunggu sampai hitung mundur selesai sebelum meminta OTP baru.',
        ]);
    }

    $otp = (string) random_int(100000, 999999);

    try {
        Mail::raw(
            "Halo {$registration['nama']},\n\n"
            . "Kode OTP untuk verifikasi pembuatan member SAÉ CAFE ROJEL kamu adalah:\n\n"
            . "{$otp}\n\n"
            . "Kode ini berlaku selama 5 menit dan hanya dapat digunakan satu kali.\n"
            . "Jangan bagikan kode ini kepada siapa pun.\n\n"
            . "Jika kamu tidak merasa melakukan pendaftaran, abaikan email ini.",
            function ($message) use ($registration) {
                $message->to($registration['email'])
                    ->subject('Verifikasi Member - SAÉ CAFE ROJEL');
            }
        );
    } catch (\Throwable $e) {
        report($e);

        return back()->withErrors([
            'register' => 'Email OTP gagal dikirim. Silakan coba kembali.',
        ]);
    }

    // OTP baru menggantikan OTP sebelumnya.
    $resendAvailableAt = now()->addMinutes(5)->timestamp;

    $registration['otp_hash'] = Hash::make($otp);
    $registration['otp_expires_at'] = $resendAvailableAt;
    $registration['otp_resend_available_at'] = $resendAvailableAt;
    $registration['attempts'] = 0;

    $request->session()->put(
        'staff_customer_registration',
        $registration
    );

    return redirect()
        ->route('staff.customers.verify')
        ->with(
            'success',
            'Kode OTP baru berhasil dikirim ke email customer. Kode berlaku selama 5 menit.'
        );
}


public function transactions(Request $request)
{
    $search = trim((string) $request->input('search', ''));
    $source = trim((string) $request->input('source', ''));

    $transactions = Transaction::query()
        ->with('customer')
        ->when($search !== '', function ($query) use ($search) {

            $query->where(function ($q) use ($search) {

                $q->where(
                    'kode_transaksi',
                    'like',
                    '%' . $search . '%'
                )
                ->orWhereHas('customer', function ($customerQuery) use ($search) {

                    $customerQuery
                        ->where(
                            'nama',
                            'like',
                            '%' . $search . '%'
                        )
                        ->orWhere(
                            'member_code',
                            'like',
                            '%' . $search . '%'
                        )
                        ->orWhere(
                            'nomor_hp',
                            'like',
                            '%' . $search . '%'
                        );

                });

            });

        })
        ->when(
            in_array($source, ['manual', 'moka'], true),
            fn ($query) => $query->where('source', $source)
        )
        ->latest('tanggal_transaksi')
        ->paginate(15)
        ->withQueryString();

    if ($request->ajax()) {
        return view(
            'staff.partials.transaction-list',
            compact('transactions')
        );
    }

    return view(
        'staff.transactions',
        compact('transactions')
    );
}

    public function findCustomer(Request $request)
    {
        $data = $request->validate(['qr_code' => ['nullable', 'string'], 'keyword' => ['nullable', 'string']]);
        $keyword = $data['qr_code'] ?? $data['keyword'] ?? '';

        if ($keyword === '') {
            return back()->withErrors(['keyword' => 'Masukkan QR member, member code, nomor WhatsApp, atau nama.']);
        }

        $customer = Customer::where(fn ($q) => $q
            ->where('qr_code', $keyword)
            ->orWhere('member_code', $keyword)
            ->orWhere('nomor_hp', $keyword)
            ->orWhere('nama', 'like', "%{$keyword}%"))
            ->first();

        if (!$customer) {
            return back()->withErrors(['keyword' => 'Member tidak ditemukan.'])->withInput();
        }

        return redirect()->route(
    'staff.transactions.create',
    ['id_customer' => $customer->id_customer]
);
    }

    public function scanCustomer(Request $request)
{
    $data = $request->validate([
        'qr_code' => ['required', 'string'],
    ]);

    $customer = Customer::where(
        'qr_code',
        $data['qr_code']
    )->first();

    if (!$customer) {
        return response()->json([
            'message' => 'Member tidak ditemukan.',
        ], 404);
    }

    return response()->json([
        'message' => 'Data member ditemukan.',
        'data' => [
            'id_customer' => $customer->id_customer,
            'nama' => $customer->nama,
            'member_code' => $customer->member_code,
            'nomor_hp' => $customer->nomor_hp,
            'saldo_point' => $customer->saldo_point,
            'status_member' => $customer->status_member,
        ],
    ]);
}

public function scanRedemption(Request $request)
{
    $data = $request->validate([
        'redemption_code' => [
            'required',
            'string',
            'max:100',
        ],
    ]);

    $code = trim($data['redemption_code']);

    $redemption = Redemption::with([
        'customer',
        'reward',
    ])
        ->where('redemption_code', $code)
        ->first();

    if (!$redemption) {
        return response()->json([
            'message' => 'QR Redemption tidak ditemukan.',
        ], 404);
    }

    /*
    |--------------------------------------------------------------------------
    | Cari redemption pending berikutnya
    |--------------------------------------------------------------------------
    |
    | Digunakan untuk memastikan kasir hanya bisa mengonfirmasi
    | redemption sesuai urutan FIFO.
    |
    */

    $nextPendingCode = Redemption::query()
        ->where(
            'id_customer',
            $redemption->id_customer
        )
        ->where('status', 'pending')
        ->orderBy('created_at', 'asc')
        ->orderBy('id_redemption', 'asc')
        ->value('redemption_code');

    $canConfirm =
        $redemption->status === 'pending' &&
        $nextPendingCode === $redemption->redemption_code;

    return response()->json([
        'message' => 'Redemption ditemukan.',
        'data' => [
            'redemption_code' =>
                $redemption->redemption_code,

            'status' =>
                $redemption->status,

            'point_used' =>
                (int) $redemption->point_used,

            'redeem_date' =>
                optional($redemption->redeem_date)
                    ->format('d M Y H:i'),

            'can_confirm' =>
                $canConfirm,

            'customer' => [
                'id_customer' =>
                    $redemption->customer?->id_customer,

                'nama' =>
                    $redemption->customer?->nama,

                'member_code' =>
                    $redemption->customer?->member_code,

                'nomor_hp' =>
                    $redemption->customer?->nomor_hp,

                'saldo_point' =>
                    (int) ($redemption->customer?->saldo_point ?? 0),

                'status_member' =>
                    $redemption->customer?->status_member,
            ],

            'reward' => [
                'id_reward' =>
                    $redemption->reward?->id_reward,

                'reward_name' =>
                    $redemption->reward?->reward_name,

                'point_required' =>
                    (int) ($redemption->reward?->point_required ?? 0),
            ],
        ],
    ]);
}

    public function createTransaction(int $id_customer)
{
    $customer = Customer::findOrFail($id_customer);

    return view('staff.transaction', compact('customer'));
}

   public function storeTransaction(Request $request)
{
    $data = $request->validate([
        'id_customer' => [
            'required',
            'exists:customers,id_customer',
        ],
        'total_belanja' => [
            'required',
            'integer',
            'min:1',
        ],
    ]);

    try {
        $customer = Customer::findOrFail(
            $data['id_customer']
        );

        $transaction = $this->transactionService
            ->createManualTransaction(
                $customer,
                [
                    'total_belanja' =>
                        $data['total_belanja'],

                    'kode_transaksi' =>
                        'TRX-' .
                        now()->format('ymdHis') .
                        '-' .
                        strtoupper(Str::random(4)),
                ]
            );

        return redirect()
            ->route('staff.transactions')
            ->with(
                'success',
                "Transaksi {$transaction->kode_transaksi} " .
                "berhasil. Point +{$transaction->point_didapat}."
            );

    } catch (\RuntimeException $e) {

        return back()
            ->withErrors([
                'transaction' => $e->getMessage(),
            ])
            ->withInput();

    } catch (\Throwable $e) {

        Log::error(
            'Gagal membuat transaksi manual dari staff',
            [
                'id_customer' =>
                    $data['id_customer'] ?? null,

                'exception' => $e,
            ]
        );

        return back()
            ->withErrors([
                'transaction' =>
                    'Transaksi gagal diproses. Silakan coba lagi.',
            ])
            ->withInput();
    }
}

 public function redemptions(
    Request $request,
    RedemptionService $redemptionService
) {
    $customerId = $request->input('customer');

    $selectedCustomer = null;

    if ($customerId) {

        $selectedCustomer = Customer::find($customerId);

        if ($selectedCustomer) {
            $redemptionService->reconcilePending($selectedCustomer);
        }
    }

    $query = Redemption::with([
        'customer',
        'reward'
    ]);

    if ($customerId) {
        $query->where(
            'id_customer',
            $customerId
        );
    }

    $redemptions = $query
        ->orderByRaw("
            CASE
                WHEN status = 'pending' THEN 0
                ELSE 1
            END
        ")
        ->latest('created_at')
        ->paginate(12)
        ->withQueryString();

    /*
     * Redemption pending berikutnya
     * yang harus dikonfirmasi sesuai urutan dibuat.
     */
    $nextPendingRedemption = null;

    if ($customerId) {

        $nextPendingRedemption = Redemption::with([
                'customer',
                'reward'
            ])
            ->where('id_customer', $customerId)
            ->where('status', 'pending')
            ->orderBy('created_at')
            ->orderBy('id_redemption')
            ->first();
    }

    return view('staff.redemptions', [
        'redemptions' => $redemptions,
        'selectedCustomer' => $selectedCustomer,
        'nextPendingRedemption' => $nextPendingRedemption,
    ]);
}

public function confirmRedemption(Request $request)
{
    $data = $request->validate([
        'redemption_code' => ['required', 'string'],
    ]);

    try {
        /*
        |--------------------------------------------------------------------------
        | Ambil redemption
        |--------------------------------------------------------------------------
        */
        $redemption = Redemption::where(
            'redemption_code',
            $data['redemption_code']
        )->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | Hanya redemption pending yang boleh dikonfirmasi
        |--------------------------------------------------------------------------
        */
        if ($redemption->status !== 'pending') {
            throw new \RuntimeException(
                'Redemption ini sudah tidak berstatus pending.'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | FIFO
        |--------------------------------------------------------------------------
        */
        $nextPending = Redemption::query()
            ->where('id_customer', $redemption->id_customer)
            ->where('status', 'pending')
            ->orderBy('created_at', 'asc')
            ->orderBy('redemption_code', 'asc')
            ->first();

        if (
            !$nextPending ||
            $nextPending->redemption_code !==
                $redemption->redemption_code
        ) {
            throw new \RuntimeException(
                'Redemption belum dapat dikonfirmasi. ' .
                'Selesaikan redemption sebelumnya terlebih dahulu.'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Proses konfirmasi melalui service
        |--------------------------------------------------------------------------
        */
        $confirmed = $this->redemptionService->confirm(
            $redemption->redemption_code
        );

        return redirect()
            ->route('staff.redemptions', [
                'customer' => $redemption->id_customer,
            ])
            ->with(
                'success',
                "Redemption {$confirmed->redemption_code} berhasil dikonfirmasi."
            );

    } catch (\RuntimeException $e) {

        /*
        | Business error:
        | pesan aman untuk ditampilkan kepada staff.
        */
        return back()
            ->withErrors([
                'redemption_code' => $e->getMessage(),
            ])
            ->withInput();

    } catch (\Throwable $e) {

        /*
        | Unexpected error:
        | simpan detail untuk developer, jangan tampilkan
        | exception asli kepada user.
        */
        Log::error('Gagal mengonfirmasi redemption dari staff', [
            'redemption_code' => $data['redemption_code'] ?? null,
            'exception' => $e,
        ]);

        return back()
            ->withErrors([
                'redemption_code' =>
                    'Terjadi kesalahan saat mengonfirmasi redemption. Silakan coba lagi.',
            ])
            ->withInput();
    }
}

    public function cancelRedemption(Request $request)
{
    $data = $request->validate([
        'redemption_code' => ['required', 'string'],
    ]);

    try {
        $this->redemptionService->cancel(
            $data['redemption_code']
        );

        return back()->with(
            'success',
            'Redemption berhasil dibatalkan.'
        );

    } catch (\RuntimeException $e) {

        /*
        | Business error:
        | tetap aman ditampilkan kepada staff.
        */
        return back()
            ->withErrors([
                'redemption_code' => $e->getMessage(),
            ])
            ->withInput();

    } catch (\Throwable $e) {

        /*
        | Unexpected error:
        | detail disimpan di log.
        */
        Log::error('Gagal membatalkan redemption dari staff', [
            'redemption_code' => $data['redemption_code'] ?? null,
            'exception' => $e,
        ]);

        return back()
            ->withErrors([
                'redemption_code' =>
                    'Terjadi kesalahan saat membatalkan redemption. Silakan coba lagi.',
            ])
            ->withInput();
    }
}

    public function rewards(Request $request)
{
    $search = trim((string) $request->input('search', ''));

    $rewards = Reward::query()
        ->where('status', 'tersedia')
        ->where('stock', '>', 0)
        ->when($search !== '', function ($query) use ($search) {
            $query->where(function ($q) use ($search) {

                $q->where('reward_name', 'like', '%' . $search . '%')
                    ->orWhere('point_required', $search);

            });
        })
        ->latest()
        ->get();

    if ($request->ajax()) {
        return view(
            'staff.partials.reward-list',
            compact('rewards')
        );
    }

    return view(
        'staff.rewards',
        compact('rewards')
    );
}
}