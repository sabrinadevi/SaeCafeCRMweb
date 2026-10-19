<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebAuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerRewardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\Admin\RewardController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\Admin\PointHistoryController;


Route::get('/', fn () => redirect()->route('login'));

Route::middleware('guest')->group(function () {
    Route::get('/login', [WebAuthController::class, 'login'])->name('login');
    Route::post('/login', [WebAuthController::class, 'authenticate'])->name('login.authenticate');
    Route::get('/register', [WebAuthController::class, 'register'])->name('register');
    Route::post('/register', [WebAuthController::class, 'registerStore'])->name('register.store');
    Route::get('/register/verify', [WebAuthController::class, 'verifyRegistration'])->name('register.verify');
    Route::post('/register/verify', [WebAuthController::class, 'verifyRegistrationStore'])->name('register.verify.store');
    Route::post('/register/verify/resend',[WebAuthController::class, 'resendRegistrationOtp'])
    ->middleware('throttle:3,1')
    ->name('register.verify.resend');
    // Lupa password
Route::get('/forgot-password', [WebAuthController::class, 'forgotPassword'])
    ->name('password.forgot');

Route::post('/forgot-password', [WebAuthController::class, 'sendPasswordResetOtp'])
    ->name('password.forgot.send');

// Verifikasi OTP untuk ubah password
Route::get('/forgot-password/verify', [WebAuthController::class, 'verifyPasswordResetOtp'])
    ->name('password.forgot.verify');

Route::post('/forgot-password/verify', [WebAuthController::class, 'verifyPasswordResetOtpStore'])
    ->name('password.forgot.verify.store');

Route::post('/forgot-password/verify/resend', [WebAuthController::class, 'resendPasswordResetOtp'])
    ->middleware('throttle:3,1')
    ->name('password.forgot.verify.resend');
});

Route::post('/logout', [WebAuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware(['auth', 'role:customer'])->prefix('customer')->name('customer.')->group(function () {
    Route::get('/', [CustomerController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [CustomerController::class, 'profile'])->name('profile');
    Route::get('/ubah-password', [CustomerController::class, 'changePassword'])->name('password.edit');
    Route::put('/ubah-password', [CustomerController::class, 'updatePassword'])->name('password.update');
    Route::get('/reward', [CustomerRewardController::class, 'index'])->name('reward');
    Route::post('/reward/redeem', [CustomerRewardController::class, 'redeem'])->name('reward.redeem');
    Route::get('/reward/redemption/{code}', [CustomerRewardController::class, 'redemption'])->name('reward.redemption');
    Route::get('/reward/redemption/{code}/status',[CustomerRewardController::class, 'redemptionStatus'])->name('reward.redemption.status');
    Route::get('/transaksi', [TransactionController::class, 'index'])->name('transaction');
    Route::get(
    '/reward/redemption/{code}/details',
    [CustomerRewardController::class, 'redemptionDetails']
)->name('reward.redemption.details');
});


Route::middleware(['auth', 'role:staff'])->prefix('staff')->name('staff.')->group(function () {
    Route::get('/', [StaffController::class, 'dashboard'])
        ->name('dashboard');

    Route::get('/customers', [StaffController::class, 'customers'])
        ->name('customers');

    Route::get('/customers/create', [StaffController::class, 'createCustomer'])
        ->name('customers.create');

    Route::post('/customers', [StaffController::class, 'storeCustomer'])
        ->name('customers.store');

    // Verifikasi OTP untuk tambah member oleh staff
    Route::get('/customers/verify-otp', [StaffController::class, 'verifyCustomerOtp'])
        ->name('customers.verify');

    Route::post('/customers/verify-otp', [StaffController::class, 'verifyCustomerOtpStore'])
        ->name('customers.verify.store');

    Route::post('/customers/verify-otp/resend', [StaffController::class, 'resendCustomerOtp'])
        ->middleware('throttle:3,1')
        ->name('customers.verify.resend');

    Route::get('/transactions', [StaffController::class, 'transactions'])
        ->name('transactions');

    Route::post('/customer/find', [StaffController::class, 'findCustomer'])
        ->name('customer.find');

    Route::post('/customer/scan', [StaffController::class, 'scanCustomer'])
        ->name('customer.scan');

    Route::get('/transactions/create/{id_customer}', [StaffController::class, 'createTransaction'])
        ->name('transactions.create');

    Route::post('/transactions', [StaffController::class, 'storeTransaction'])
        ->name('transactions.store');

    Route::get('/redemptions', [StaffController::class, 'redemptions'])
        ->name('redemptions');

    Route::post('/redemptions/scan', [StaffController::class, 'scanRedemption'])
        ->name('redemptions.scan');

    Route::post('/redemptions/confirm', [StaffController::class, 'confirmRedemption'])
        ->name('redemptions.confirm');

    Route::post('/redemptions/cancel', [StaffController::class, 'cancelRedemption'])
        ->name('redemptions.cancel');

    Route::get('/rewards', [StaffController::class, 'rewards'])
        ->name('rewards');
});


Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/customers', [AdminCustomerController::class, 'index'])
            ->name('customers.index');

        Route::get('/customers/{id}', [AdminCustomerController::class, 'show'])
            ->name('customers.show');

        Route::get('/customers/{id}/edit', [AdminCustomerController::class, 'edit'])
            ->name('customers.edit');

        Route::put('/customers/{id}', [AdminCustomerController::class, 'update'])
            ->name('customers.update');

        Route::put('/customers/{id}/status', [AdminCustomerController::class, 'updateStatus'])
            ->name('customers.status');

        Route::delete('/customers/{id}', [AdminCustomerController::class, 'destroy'])
            ->name('customers.destroy');


        Route::get('/rewards', [RewardController::class, 'index'])
            ->name('rewards.index');

        Route::get('/rewards/search', [RewardController::class, 'search'])
            ->name('rewards.search');

        Route::get('/rewards/create', [RewardController::class, 'create'])
            ->name('rewards.create');

        Route::post('/rewards', [RewardController::class, 'store'])
            ->name('rewards.store');

        Route::get('/rewards/{id}/edit', [RewardController::class, 'edit'])
            ->name('rewards.edit');

        Route::put('/rewards/{id}', [RewardController::class, 'update'])
            ->name('rewards.update');

        Route::delete('/rewards/{id}', [RewardController::class, 'destroy'])
            ->name('rewards.destroy');


        /*
        |--------------------------------------------------------------------------
        | TRANSACTION
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/transactions',
            [AdminTransactionController::class, 'index']
        )->name('transactions.index');


        /*
        |--------------------------------------------------------------------------
        | REDEMPTION
        |--------------------------------------------------------------------------
        */

        Route::get('/redemptions', [ReportController::class, 'redemptions'])
            ->name('redemptions.index');

            Route::get( '/point-history', [PointHistoryController::class, 'index']
)->name('point-history.index');
    });

        