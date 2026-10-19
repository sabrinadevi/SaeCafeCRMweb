<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\PointHistory;
use App\Models\Redemption;
use App\Models\Reward;
use App\Services\RedemptionService;
use App\Services\QrCodeService;
use Illuminate\Http\Request;


class CustomerRewardController extends Controller
{
    /**
     * Menampilkan halaman Reward customer.
     */
    public function index(Request $request)
    {
        $customer = $request->user()->customer;

        abort_unless($customer, 404, 'Data customer tidak ditemukan.');

        $rewards = Reward::where('status', 'tersedia')
            ->where('stock', '>', 0)
            ->latest()
            ->get();

        $pointHistory = $customer->pointHistories()
            ->latest()
            ->get();

        $redemptions = $customer->redemptions()
    ->with('reward')
    ->whereIn('status', ['pending', 'berhasil'])
    ->latest('created_at')
    ->get();

        $totalPointDidapat = $pointHistory
            ->where('type', 'tambah')
            ->sum('point');

        $totalPointDigunakan = $pointHistory
            ->where('type', 'kurang')
            ->sum('point');

        return view('customer.reward', compact(
            'customer',
            'rewards',
            'pointHistory',
            'totalPointDidapat',
            'totalPointDigunakan',
            'redemptions'
        ));
    }

    /**
     * Memproses penukaran reward dan mengirim data popup.
     */
    public function redeem(Request $request, RedemptionService $service)
    {
        $data = $request->validate([
            'id_reward' => ['required', 'exists:rewards,id_reward'],
        ]);

        $customer = $request->user()->customer;

        abort_unless($customer, 404, 'Data customer tidak ditemukan.');

        try {
            $reward = Reward::findOrFail($data['id_reward']);

            $redemption = $service->createPending($customer, $reward);

            $redemption->load('reward');

            // Membuat QR Code untuk popup redemption.
            $svgBase64 = app(QrCodeService::class)
                ->generate($redemption->redemption_code);

            return response()->json([
                'message' => 'Redemption dibuat. Tunjukkan QR ini ke kasir untuk konfirmasi.',
                'data' => [
                    'code' => $redemption->redemption_code,
                    'reward' => $redemption->reward?->reward_name,
                    'point_used' => $redemption->point_used,
                    'status' => $redemption->status,
                    'svg' => base64_decode($svgBase64),
                ],
            ]);
        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'message' => 'Redemption gagal diproses. Silakan coba kembali.',
            ], 422);
        }
    }

    /**
     * Menampilkan halaman detail redemption berdasarkan kode.
     */
    public function redemption(Request $request, string $code)
    {
        $customer = $request->user()->customer;

        abort_unless($customer, 404, 'Data customer tidak ditemukan.');

        // Pastikan redemption merupakan milik customer yang login.
        $redemption = $customer->redemptions()
            ->with('reward')
            ->where('redemption_code', $code)
            ->firstOrFail();

        // Membuat QR Code untuk halaman detail redemption.
        $svg = app(QrCodeService::class)
            ->generate($redemption->redemption_code);

  return view('customer.redemption', compact(
    'customer',
    'redemption',
    'svg'
));
    }

    /**
 * Mengecek status redemption terbaru untuk modal customer.
 */
public function redemptionStatus(Request $request, string $code)
{
    $customer = $request->user()->customer;

    abort_unless(
        $customer,
        404,
        'Data customer tidak ditemukan.'
    );

    // Pastikan redemption milik customer yang login.
    $redemption = $customer->redemptions()
        ->where('redemption_code', $code)
        ->firstOrFail();

    return response()->json([
        'status' => $redemption->status,
        'status_label' => match ($redemption->status) {
            'pending' => 'Pending',
            'berhasil' => 'Berhasil',
            'gagal' => 'Gagal',
            default => ucfirst($redemption->status),
        },
    ]);
}

public function redemptionDetails(Request $request, string $code)
{
    $customer = $request->user()->customer;

    abort_unless($customer, 404, 'Data customer tidak ditemukan.');

    $redemption = $customer->redemptions()
        ->with('reward')
        ->where('redemption_code', $code)
        ->firstOrFail();

    $svgBase64 = app(QrCodeService::class)->generate(
        $redemption->redemption_code
    );

    return response()->json([
        'code' => $redemption->redemption_code,
        'reward' => $redemption->reward?->reward_name ?? 'Reward',
        'point_used' => $redemption->point_used,
        'status' => $redemption->status,

        'status_label' => match ($redemption->status) {
            'pending' => 'Pending',
            'berhasil' => 'Berhasil',
            'gagal' => 'Gagal',
            default => ucfirst($redemption->status),
        },

        'svg' => base64_decode($svgBase64),
    ]);
}
}
