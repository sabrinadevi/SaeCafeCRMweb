<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Helpers\ApiResponse;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class RegisterController extends Controller
{


    public function register(Request $request)
    {

        // Validasi input
        $request->validate([

            'nama' => 'required|string|max:100',

            'nomor_hp' => 'required|string|unique:users,username',

             'tanggal_lahir' => 'nullable|date',

            'email' => 'nullable|email',

            'password' => 'required|min:6'

        ]);



        DB::beginTransaction();



        try {


            /*
             * 1. Membuat akun user
             */

            $user = User::create([

                'username' => $request->nomor_hp,

                'password' => Hash::make(
                    $request->password
                ),

                'role' => 'customer',

                'status' => 'aktif'

            ]);




            /*
             * 2. Generate member code
             */

            $lastCustomer = Customer::latest(
                'id_customer'
            )->first();



            if($lastCustomer)
            {

                $number = $lastCustomer->id_customer + 1;

            }
            else
            {

                $number = 1;

            }



            $memberCode = 'SAE' .
                str_pad(
                    $number,
                    5,
                    '0',
                    STR_PAD_LEFT
                );
            
            $qrCode = 'SAE-QR-' .
    strtoupper(
        uniqid()
    );





            /*
             * 3. Membuat data customer
             */

            $customer = Customer::create([

                'id_user' => $user->id_user,

                'member_code' => $memberCode,

                'qr_code' => $qrCode,

                'nama' => $request->nama,

                'nomor_hp' => $request->nomor_hp,

                'email' => $request->email,

                'tanggal_lahir' => $request->tanggal_lahir,

                'tanggal_daftar' => now(),

                'saldo_point' => 0,

                'status_member' => 'aktif'

            ]);





            DB::commit();




            return ApiResponse::success(

    'Registrasi berhasil',

    [

        'customer'=>[

            'nama'=>$customer->nama,

            'member_code'=>$customer->member_code,

            'qr_code'=>$customer->qr_code,

            'saldo_point'=>$customer->saldo_point

        ]

    ],

    201

);



        }
        catch(\Exception $e)
        {

            DB::rollBack();


            return ApiResponse::error(

    'Registrasi gagal',

    500,

    [

        'error'=>$e->getMessage()

    ]

);

        }

    }


}