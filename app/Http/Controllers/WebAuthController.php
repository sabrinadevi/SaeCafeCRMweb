<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class WebAuthController extends Controller
{
    public function login()
    {
        return view('customer.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string', 'max:100'],
            'password' => ['required', 'string'],
        ], [
            'username.required' => 'Username atau nomor WhatsApp wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $user = User::where('username', $credentials['username'])->first();

        if (!$user || $user->status !== 'aktif' || !Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors(['username' => 'Username/nomor WhatsApp atau password salah.'])
                ->withInput($request->only('username'));
        }

        Auth::login($user, $request->boolean('remember'));
        $request->session()->regenerate();

        return match ($user->role) {
            'admin' => redirect()->route('admin.dashboard'),
            'staff' => redirect()->route('staff.dashboard'),
            default => redirect()->route('customer.dashboard'),
        };
    }

    public function register()
    {
        return view('customer.register');
    }

 
public function registerStore(Request $request)
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
        'password' => [
            'required',
            'string',
            'min:8',
            'confirmed',
        ],
        'tanggal_lahir' => [
            'nullable',
            'date',
        ],
    ], [
        'email.required' => 'Email wajib diisi untuk verifikasi akun.',
        'email.email' => 'Format email tidak valid.',
        'email.unique' => 'Email sudah terdaftar sebagai member.',
        'nomor_hp.unique' => 'Nomor WhatsApp sudah terdaftar.',
        'password.confirmed' => 'Konfirmasi password tidak sama.',
    ]);

    $otp = (string) random_int(100000, 999999);

    $registration = [
        'nama' => $validated['nama'],
        'nomor_hp' => $validated['nomor_hp'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'tanggal_lahir' => $validated['tanggal_lahir'] ?? null,
        'otp_hash' => Hash::make($otp),
        'otp_expires_at' => now()->addMinutes(5)->timestamp,
        'attempts' => 0,
    ];

    $request->session()->put('registration', $registration);
   

    try {
        Mail::raw(
            "Halo {$validated['nama']}, \n\n"
            . "Kode OTP registrasi member SAÉ CAFE ROJEL kamu adalah:\n\n"
            . "{$otp}\n\n"
            . "Kode ini berlaku selama 5 menit dan hanya dapat digunakan satu kali.\n"
            . "Jangan bagikan kode ini kepada siapa pun.\n\n"
     . "Jika kamu tidak merasa melakukan registrasi, abaikan email ini.",
            function ($message) use ($validated) {
                $message->to($validated['email'])
                    ->subject('Kode OTP Registrasi Member - SAÉ CAFE ROJEL');
            }
        );
       $resendAvailableAt = now()->addMinutes(5)->timestamp;

$registration['otp_expires_at'] = $resendAvailableAt;
$registration['otp_resend_available_at'] = $resendAvailableAt;

$request->session()->put('registration', $registration);
    } catch (\Throwable $e) {
        report($e);

        $request->session()->forget([
            'registration',
            'registration_otp_debug',
        ]);

        return back()
            ->withErrors([
                'email' => 'Email OTP gagal dikirim. Periksa konfigurasi email dan coba kembali.',
            ])
            ->withInput(
                $request->except([
                    'password',
                    'password_confirmation',
                ])
            );
    }

    return redirect()
        ->route('register.verify')
        ->with('success', 'Kode OTP telah dikirim ke email kamu.');
}


public function resendRegistrationOtp(Request $request)
{
    $registration = $request->session()->get('registration');

    if (!$registration) {
        return redirect()
            ->route('register')
            ->withErrors([
                'register' => 'Sesi pendaftaran sudah berakhir. Silakan daftar kembali.',
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
            . "Kode OTP registrasi member SAÉ CAFE ROJEL kamu adalah:\n\n"
            . "{$otp}\n\n"
            . "Kode ini berlaku selama 5 menit dan hanya dapat digunakan satu kali.\n"
            . "Jangan bagikan kode ini kepada siapa pun.\n\n"
          . "Jika kamu tidak merasa melakukan registrasi, abaikan email ini.",
            function ($message) use ($registration) {
                $message->to($registration['email'])
                    ->subject('Kode OTP Registrasi Member - SAÉ CAFE ROJEL');
            }
        );
    } catch (\Throwable $e) {
        report($e);

        return back()->withErrors([
            'register' => 'Email OTP gagal dikirim. Silakan coba lagi.',
        ]);
    }

  // OTP baru menggantikan OTP sebelumnya.
$resendAvailableAt = now()->addMinutes(5)->timestamp;

$registration['otp_hash'] = Hash::make($otp);
$registration['otp_expires_at'] = $resendAvailableAt;
$registration['otp_resend_available_at'] = $resendAvailableAt;
$registration['attempts'] = 0;

$request->session()->put('registration', $registration);

    return redirect()
        ->route('register.verify')
        ->with('success', 'Kode OTP baru berhasil dikirim ke email kamu. Kode berlaku selama 5 menit.');
}
   public function verifyRegistration(Request $request)
{
    $registration = $request->session()->get('registration');

    abort_unless(
        $registration,
        419,
        'Sesi pendaftaran sudah kedaluwarsa.'
    );

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
        'customer.register-otp',
        compact('resendSeconds')
    );
}
   
public function verifyRegistrationStore(Request $request)
{
    $request->validate([
        'otp' => ['required', 'digits:6'],
    ]);

    $registration = $request->session()->get('registration');

    if (!$registration) {
        return redirect()
            ->route('register')
            ->withErrors([
                'register' => 'Sesi pendaftaran sudah kedaluwarsa.',
            ]);
    }

   if (now()->timestamp >= $registration['otp_expires_at']) {
    return back()->withErrors([
        'otp' => 'Kode OTP sudah kedaluwarsa. Silakan klik Kirim Ulang Kode OTP.',
    ]);
}

    $registration['attempts'] =
        (int) ($registration['attempts'] ?? 0) + 1;

    if ($registration['attempts'] > 5) {
        $request->session()->forget([
            'registration',
            'registration_otp_debug',
        ]);

        return redirect()
            ->route('register')
            ->withErrors([
                'register' => 'Batas percobaan OTP terlampaui. Silakan daftar kembali.',
            ]);
    }

    if (!Hash::check($request->otp, $registration['otp_hash'])) {
        $request->session()->put('registration', $registration);

        return back()->withErrors([
            'otp' => 'Kode OTP salah.',
        ]);
    }

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

    $request->session()->forget([
        'registration',
        'registration_otp_debug',
    ]);

    // Email sambutan bersifat tambahan.
    // Kegagalan mengirimnya tidak membatalkan registrasi.
    try {
        Mail::raw(
            "Halo {$customer->nama},\n\n"
            . "Selamat bergabung dengan SAÉ CAFE ROJEL!\n\n"
            . "Akun member kamu berhasil diverifikasi dan dibuat.\n"
            . "Silakan login menggunakan nomor WhatsApp dan password yang telah didaftarkan.\n\n"
            . "Terima kasih telah menjadi bagian dari SAÉ CAFE ROJEL.\n\n"
. "Buka website SAÉ CAFE ROJEL:\n"
. route('login') . "\n\n"
. "Tautan ini hanya untuk membuka website. Verifikasi akun dilakukan dengan kode OTP saat pendaftaran.",
            function ($message) use ($customer) {
                $message->to($customer->email)
                    ->subject('Selamat Bergabung - SAÉ CAFE ROJEL');
            }
        );
    } catch (\Throwable $e) {
        report($e);
    }

    return redirect()
        ->route('login')
        ->with(
            'success',
            'Selamat bergabung di SAÉ CAFE ROJEL. Akun member kamu sudah aktif.'
        );
}


/*
|--------------------------------------------------------------------------
| LUPA PASSWORD
|--------------------------------------------------------------------------
*/

public function forgotPassword()
{
    return view('customer.change-password');
}


/*
|--------------------------------------------------------------------------
| KIRIM OTP UNTUK UBAH PASSWORD
|--------------------------------------------------------------------------
*/

public function sendPasswordResetOtp(Request $request)
{
    $validated = $request->validate([
        'email' => ['required', 'email', 'max:255'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ], [
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'password.required' => 'Password baru wajib diisi.',
        'password.min' => 'Password baru minimal 8 karakter.',
        'password.confirmed' => 'Konfirmasi password tidak cocok.',
    ]);

    $customer = Customer::where('email', $validated['email'])
        ->first();

    if (!$customer) {
        return back()
            ->withErrors([
                'email' => 'Email tidak terdaftar sebagai member.',
            ])
            ->withInput($request->only('email'));
    }

    $user = User::where('id_user', $customer->id_user)
        ->where('role', 'customer')
        ->first();

    if (!$user || $user->status !== 'aktif') {
        return back()
            ->withErrors([
                'email' => 'Akun tidak ditemukan atau sedang tidak aktif.',
            ])
            ->withInput($request->only('email'));
    }

    // Hapus sesi permintaan reset password sebelumnya.
    $request->session()->forget('forgot_password_reset');

    $otp = (string) random_int(100000, 999999);

    // Password baru di-hash terlebih dahulu.
    // Password belum diubah di database pada tahap ini.
    $reset = [
        'id_user' => $user->id_user,
        'nama' => $customer->nama,
        'email' => $customer->email,
        'new_password_hash' => Hash::make($validated['password']),
        'otp_hash' => Hash::make($otp),
        'attempts' => 0,
    ];

    try {
        Mail::raw(
            "Halo {$customer->nama},\n\n"
            . "Kami menerima permintaan untuk mengubah password "
            . "akun member SAÉ CAFE ROJEL kamu.\n\n"
            . "Kode OTP kamu adalah:\n\n"
            . "{$otp}\n\n"
            . "Kode ini berlaku selama 5 menit dan hanya dapat "
            . "digunakan satu kali.\n"
            . "Jangan bagikan kode ini kepada siapa pun.\n\n"
            . "Jika kamu tidak merasa meminta perubahan password, "
            . "abaikan email ini.",
            function ($message) use ($customer) {
                $message->to($customer->email)
                    ->subject('Kode OTP Ubah Password - SAÉ CAFE ROJEL');
            }
        );
    } catch (\Throwable $e) {
        report($e);

        return back()
            ->withErrors([
                'email' => 'Email OTP gagal dikirim. Silakan coba kembali.',
            ])
            ->withInput($request->only('email'));
    }

    $resendAvailableAt = now()->addMinutes(5)->timestamp;

    $reset['otp_expires_at'] = $resendAvailableAt;
    $reset['otp_resend_available_at'] = $resendAvailableAt;

    $request->session()->put('forgot_password_reset', $reset);

    return redirect()
        ->route('password.forgot.verify')
        ->with('success', 'Kode OTP telah dikirim ke email kamu.');
}


/*
|--------------------------------------------------------------------------
| HALAMAN VERIFIKASI OTP UBAH PASSWORD
|--------------------------------------------------------------------------
*/

public function verifyPasswordResetOtp(Request $request)
{
    $reset = $request->session()->get('forgot_password_reset');

    if (!$reset) {
        return redirect()
            ->route('password.forgot')
            ->withErrors([
                'email' => 'Sesi ubah password berakhir. Silakan ulangi prosesnya.',
            ]);
    }

    $resendAvailableAt = (int) (
        $reset['otp_resend_available_at']
        ?? $reset['otp_expires_at']
        ?? now()->timestamp
    );

    $resendSeconds = max(
        0,
        $resendAvailableAt - now()->timestamp
    );

    return view(
        'customer.forgot-password-otp',
        compact('resendSeconds')
    );
}


/*
|--------------------------------------------------------------------------
| VERIFIKASI OTP DAN SIMPAN PASSWORD BARU
|--------------------------------------------------------------------------
*/

public function verifyPasswordResetOtpStore(Request $request)
{
    $request->validate([
        'otp' => ['required', 'digits:6'],
    ], [
        'otp.required' => 'Kode OTP wajib diisi.',
        'otp.digits' => 'Kode OTP harus terdiri dari 6 digit.',
    ]);

    $reset = $request->session()->get('forgot_password_reset');

    if (!$reset) {
        return redirect()
            ->route('password.forgot')
            ->withErrors([
                'email' => 'Sesi ubah password berakhir. Silakan ulangi prosesnya.',
            ]);
    }

    if (now()->timestamp >= $reset['otp_expires_at']) {
        return back()->withErrors([
            'otp' => 'Kode OTP sudah kedaluwarsa. Silakan kirim ulang kode.',
        ]);
    }

    $reset['attempts'] = (int) ($reset['attempts'] ?? 0) + 1;

    if ($reset['attempts'] > 5) {
        $request->session()->forget('forgot_password_reset');

        return redirect()
            ->route('password.forgot')
            ->withErrors([
                'email' => 'Batas percobaan OTP terlampaui. Silakan ulangi prosesnya.',
            ]);
    }

    if (!Hash::check($request->input('otp'), $reset['otp_hash'])) {
        $request->session()->put('forgot_password_reset', $reset);

        return back()->withErrors([
            'otp' => 'Kode OTP salah. Periksa kembali email kamu.',
        ]);
    }

    try {
        DB::transaction(function () use ($reset) {
            $user = User::where('id_user', $reset['id_user'])
                ->lockForUpdate()
                ->firstOrFail();

            if ($user->role !== 'customer' || $user->status !== 'aktif') {
                throw new \RuntimeException(
                    'Akun tidak aktif atau tidak valid.'
                );
            }

            // Password baru hanya disimpan setelah OTP benar.
            $user->password = $reset['new_password_hash'];
            $user->save();
        });
    } catch (\Throwable $e) {
        report($e);

        return back()->withErrors([
            'otp' => 'Password gagal diperbarui. Silakan coba kembali.',
        ]);
    }

    $request->session()->forget('forgot_password_reset');

    return redirect()
        ->route('login')
        ->with(
            'success',
            'Password berhasil diperbarui. Silakan login menggunakan password baru.'
        );
}


/*
|--------------------------------------------------------------------------
| KIRIM ULANG OTP UBAH PASSWORD
|--------------------------------------------------------------------------
*/

public function resendPasswordResetOtp(Request $request)
{
    $reset = $request->session()->get('forgot_password_reset');

    if (!$reset) {
        return redirect()
            ->route('password.forgot')
            ->withErrors([
                'email' => 'Sesi ubah password berakhir. Silakan ulangi prosesnya.',
            ]);
    }

    $resendAvailableAt = (int) (
        $reset['otp_resend_available_at']
        ?? $reset['otp_expires_at']
        ?? 0
    );

    if (now()->timestamp < $resendAvailableAt) {
        return back()->withErrors([
            'otp' => 'Tunggu sampai hitung mundur selesai untuk meminta OTP baru.',
        ]);
    }

    $otp = (string) random_int(100000, 999999);

    try {
        Mail::raw(
            "Halo {$reset['nama']},\n\n"
            . "Kode OTP baru untuk mengubah password "
            . "SAÉ CAFE ROJEL kamu adalah:\n\n"
            . "{$otp}\n\n"
            . "Kode ini berlaku selama 5 menit dan hanya dapat "
            . "digunakan satu kali.\n"
            . "Jangan bagikan kode ini kepada siapa pun.\n\n"
            . "Jika kamu tidak meminta perubahan password, "
            . "abaikan email ini.",
            function ($message) use ($reset) {
                $message->to($reset['email'])
                    ->subject('Kode OTP Ubah Password - SAÉ CAFE ROJEL');
            }
        );
    } catch (\Throwable $e) {
        report($e);

        return back()->withErrors([
            'otp' => 'OTP gagal dikirim ulang. Silakan coba kembali.',
        ]);
    }

    $resendAvailableAt = now()->addMinutes(5)->timestamp;

    $reset['otp_hash'] = Hash::make($otp);
    $reset['otp_expires_at'] = $resendAvailableAt;
    $reset['otp_resend_available_at'] = $resendAvailableAt;
    $reset['attempts'] = 0;

    $request->session()->put('forgot_password_reset', $reset);

    return redirect()
        ->route('password.forgot.verify')
        ->with('success', 'Kode OTP baru berhasil dikirim ke email kamu.');
}


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}