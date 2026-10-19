<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RegisterController;


use App\Http\Controllers\Api\CustomerController;

use App\Http\Controllers\Api\TransactionController;

use App\Http\Controllers\Api\RewardController;
use App\Http\Controllers\Api\RedemptionController;

use App\Http\Controllers\Api\StaffCustomerController;
use App\Http\Controllers\Api\StaffTransactionController;
use App\Http\Controllers\Api\StaffRedemptionController;
use App\Http\Controllers\Api\StaffDashboardController;

use App\Http\Controllers\Api\AdminDashboardController;
use App\Http\Controllers\Api\AdminCustomerController;
use App\Http\Controllers\Api\MokaIntegrationController;




/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/


Route::middleware('throttle:5,1')
    ->post('/login', [
        AuthController::class,
        'login'
    ]);
Route::post('/register', [
    RegisterController::class,
    'register'
]);

Route::middleware('moka.key')
->post('/integrations/moka/transaction',[

    MokaIntegrationController::class,

    'transaction'

]);





/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
*/


Route::middleware([
    'auth:sanctum',
    'role:customer'
])
->prefix('customer')
->group(function(){


    Route::get('/profile', [
        CustomerController::class,
        'profile'
    ]);

    Route::post('/change-password', [CustomerController::class,'changePassword']);


    Route::get('/member-card', [
        CustomerController::class,
        'memberCard'
    ]);


    Route::get('/points/history', [
        CustomerController::class,
        'pointHistory'
    ]);
    

    Route::get('/transactions', [
    TransactionController::class,
    'history'
]);


    Route::get('/rewards', [
        RedemptionController::class,
        'rewards'
    ]);


    Route::post('/redeem', [
        RedemptionController::class,
        'redeem'
    ]);


    Route::get('/redeem/status/{code}', [
    RedemptionController::class,
    'status'
    ]);

    Route::get('/redeems', [
        RedemptionController::class,
        'history'
    ]);


    Route::get('/favorite-rewards', [
    CustomerController::class,
    'favoriteRewards'
]);

});








/*
|--------------------------------------------------------------------------
| Staff Routes
|--------------------------------------------------------------------------
*/


Route::middleware([
    'auth:sanctum',
    'role:staff'
])
->prefix('staff')
->group(function(){



    Route::get('/dashboard',[
        StaffDashboardController::class,
        'index'
    ]);



    Route::get('/customers',[
        StaffCustomerController::class,
        'index'
    ]);



    Route::post('/customer/check',[
        StaffCustomerController::class,
        'check'
    ]);

    Route::post('/customer/search',[
    StaffCustomerController::class,
    'search'
]);



    Route::post('/customer/detail',[
        StaffCustomerController::class,
        'detail'
    ]);



    Route::post('/transaction',[
        StaffTransactionController::class,
        'store'
    ]);



    Route::get('/rewards',[
        StaffRedemptionController::class,
        'rewards'
    ]);



    Route::post('/redeem',[
        StaffRedemptionController::class,
        'redeem'
    ]);

    



});









/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/


Route::middleware([
    'auth:sanctum',
    'role:admin'
])
->prefix('admin')
->group(function(){



    Route::get('/dashboard',[
        AdminDashboardController::class,
        'index'
    ]);



    Route::get('/customers',[
        AdminCustomerController::class,
        'index'
    ]);



    Route::post('/customers/detail',[
        AdminCustomerController::class,
        'detail'
    ]);



    Route::put('/customers/{id}/status',[
        AdminCustomerController::class,
        'updateStatus'
    ]);




    Route::get('/rewards',[
        RewardController::class,
        'index'
    ]);



    Route::post('/rewards',[
        RewardController::class,
        'store'
    ]);



    Route::get('/rewards/{id}',[
        RewardController::class,
        'show'
    ]);



    Route::put('/rewards/{id}',[
        RewardController::class,
        'update'
    ]);



    Route::delete('/rewards/{id}',[
        RewardController::class,
        'destroy'
    ]);



    Route::post('/transactions',[
        TransactionController::class,
        'store'
    ]);



});








/*
|--------------------------------------------------------------------------
| Logout
|--------------------------------------------------------------------------
*/


Route::middleware('auth:sanctum')
->post('/logout',[
    AuthController::class,
    'logout'
]);