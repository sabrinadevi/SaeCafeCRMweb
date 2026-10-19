<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ApiResponse;
use App\Models\Reward;
use App\Services\QrCodeService;



class CustomerController extends Controller
{

protected $qrService;


public function __construct(
    QrCodeService $qrService
)
{

    $this->qrService = $qrService;

}

    public function profile(Request $request)
    {

        $user = $request->user();



        $customer = $user->customer;



        if(!$customer)
{

return ApiResponse::error(

    'Data customer tidak ditemukan',

    404

);

}



        return ApiResponse::success(

    'Profile customer',

    [

        'nama'=>$customer->nama,

        'member_code'=>$customer->member_code,

        'nomor_hp'=>$customer->nomor_hp,

        'email'=>$customer->email,

        'saldo_point'=>$customer->saldo_point,

        'status_member'=>$customer->status_member,

        'tanggal_lahir'=>$customer->tanggal_lahir,

        'tanggal_daftar'=>$customer->tanggal_daftar

    ]

);

    }

    public function memberCard(Request $request)
{

    $user = $request->user();


    $customer = $user->customer;


    if(!$customer)
    {

       return ApiResponse::error(

    'Data customer tidak ditemukan',

    404

);

    }



   return ApiResponse::success(

    'Member card customer',

    [

        'nama'=>$customer->nama,

        'member_code'=>$customer->member_code,

        'qr_code'=>$customer->qr_code,

        'saldo_point'=>$customer->saldo_point,

        'status_member'=>$customer->status_member,

       

    ]

);

}
    
    public function pointHistory(Request $request)
{

    $user = $request->user();


    $customer = $user->customer;



    if(!$customer)
    {

        return ApiResponse::error(

    'Data customer tidak ditemukan',

    404

);
    }



    $history = $customer
        ->pointHistories()
        ->orderBy('created_at','desc')
        ->get();



    return ApiResponse::success(

    'Riwayat point customer',

    [

        'nama'=>$customer->nama,

        'member_code'=>$customer->member_code,

        'saldo_point'=>$customer->saldo_point,

        'history'=>$history->map(function($item){

            return [

                'point'=>$item->point,

                'type'=>$item->type,

                'keterangan'=>$item->keterangan,

                'tanggal'=>$item->created_at
                    ->format('d-m-Y H:i')

            ];

        })

    ]

);

}

  public function favoriteRewards()
{
    $rewards = Reward::where('status', 'tersedia')
        ->where('stock', '>', 0)
        ->withCount([
            'redemptions as successful_redemptions' =>
                fn ($q) => $q->where('status', 'berhasil')
        ])
        ->having('successful_redemptions', '>', 0)
        ->orderByDesc('successful_redemptions')
        ->orderByDesc('created_at')
        ->limit(3)
        ->get();

    return ApiResponse::success(
        'Reward favorit',
        $rewards
    );
}


public function changePassword(Request $request)
{
    $user = $request->user();

    $request->validate(
        [
            'current_password' => [
                'required',
                function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        $fail('Password saat ini salah.');
                    }
                },
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'different:current_password',
            ],
        ],
        [
            'current_password.required' =>
                'Password saat ini wajib diisi.',

            'password.required' =>
                'Password baru wajib diisi.',

            'password.min' =>
                'Password baru minimal 8 karakter.',

            'password.confirmed' =>
                'Konfirmasi password tidak sama.',

            'password.different' =>
                'Password baru harus berbeda dengan password lama.',
        ]
    );

    $user->password = Hash::make(
        $request->password
    );

    $user->save();

    return ApiResponse::success(
        'Password berhasil diubah.'
    );
}

}

