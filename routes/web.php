<?php

    use App\Http\Controllers\CheckoutController;
    use App\Http\Controllers\PaymentController;
    use App\Http\Controllers\PaymentMethodController;
    use App\Http\Controllers\PlanController;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();


    Route::group(['middleware' => 'auth'], function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('/accounts/plans', PlanController::class)->name('accounts.plans');

        Route::get('/accounts/check-out/{plan:slug}', CheckoutController::class)->name('accounts.check-out');

        Route::post('/account/pay', [PaymentController::class, 'processPayment'])->name('account.payment-process');

        Route::get('account/plan/cancel', [PaymentController::class, 'cancel'])->name('plan.cancel');

        Route::get('account/plan/resume', [PaymentController::class, 'resume'])->name('plan.resume');

        Route::get('/account/payment-methods/default/{paymentId}',
            [PaymentMethodController::class])->name('account.payment-methods.default');
        Route::resource('/account/payment-methods', PaymentMethodController::class);

        Route::resource('/dashboard/products', \App\Http\Controllers\ProductController::class)->except(['show', 'create']);
        Route::resource('/dashboard/customers', \App\Http\Controllers\CustomerController::class)->except(['create', 'show']);
        Route::resource('/dashboard/invoices', \App\Http\Controllers\InvoiceController::class)->except(['show']);

    });
