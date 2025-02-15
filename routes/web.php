<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\Customercontroller;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Kernel;
use App\Http\Controllers\RazorpayPaymentController;

Route::get('index', [Customercontroller::class, 'index_page'])->name('index');


// Route::group(['middleware' => 'auth.custom'], function () {

//     Route::get('product-details', [Customercontroller::class, 'products_details'])->name('product-details');

// });

Route::get('product-details', [CustomerController::class, 'products_details'])->name('product-details');

Route::get('product-cart_page/{id}', [CustomerController::class, 'products_cart_page_function'])->name('product-cart_page');


Route::get('registerform', [Customercontroller::class, 'register'])->name('registerform');
Route::post('registerforms', [Customercontroller::class, 'register_save_data'])->name('registerform_data');

Route::get('loginform', [Customercontroller::class, 'login'])->name('loginform');
Route::post('loginforms', [Customercontroller::class, 'login_save_data'])->name('loginform_data');



Route::post('logout', [CustomerController::class, 'logout_user'])->name('logout');

Route::get('auth_google', [CustomerController::class, 'google_login_function'])->name('auth_google');
Route::get('auth_google-callback', [CustomerController::class, 'google_Authentication_function'])->name('auth_google_callback');

//Admin Routes
Route::get('admin_home', [AdminController::class, 'admin_home_function'])->name('admin_home');
Route::get('admin_mainpage_post', [AdminController::class, 'mainpage_function'])->name('mainpage');
Route::post('mainpage_post', [AdminController::class, 'mainpage_post_function'])->name('mainpage_post');
Route::get('show_data', [AdminController::class, 'show_all_data_function'])->name('show_data');
Route::delete('delete_data/{id}', [AdminController::class, 'delete_data_function'])->name('delete_data');

// Route::delete('delete_multiple_data', [AdminController::class, 'delete_multiple_data_function'])->name('delete_multiple_data');

Route::get('update_form/{id}/edit', [AdminController::class, 'update_form_function'])->name('update_form');
Route::put('update_form/{id}', [AdminController::class, 'update_profile_function'])->name('update_profile');

Route::get('popular_products_post', [AdminController::class, 'popular_products_get_function'])->name('popular_products_get_post');
Route::post('/popular_products_posts', [AdminController::class, 'popular_products_post_function'])->name('popular_products_post');

Route::get('/shipping/{id}', [AdminController::class, 'shipping_function'])->name('shipping');
// Admin Route Over

Route::get('shop', [Customercontroller::class, 'shoping'])->name('shop');
Route::get('buy_now/{id}', [Customercontroller::class, 'shipping_funciton'])->name('buy_now');



Route::get('/verify-otp', [Customercontroller::class, 'showOtpForm'])->name('otp.verify');
Route::post('/verify-otp', [Customercontroller::class, 'verifyOtp'])->name('otp.verify.submit');


//for PDF Route
Route::get('/customer/pdf/{id}', [CustomerController::class, 'pdf_function'])->name('pdf');
Route::get('/customer/excel', [CustomerController::class, 'Excel_function'])->name('Excel');


//Reser Password
Route::get('/forgot-password', [CustomerController::class, 'showForgotPasswordForm'])->name('forgot.password.form');
Route::post('/forgot-password', [CustomerController::class, 'sendOtp'])->name('otp.send');
Route::get('/otp-verification', [CustomerController::class, 'showOtpVerificationForm'])->name('otp.verification.form');
Route::post('/otp-verification', [CustomerController::class, 'verifyOtps'])->name('otp.verifys');
Route::get('/reset-password', [CustomerController::class, 'showResetPasswordForm'])->name('reset.password.form');
Route::post('/reset-password', [CustomerController::class, 'resetPassword'])->name('password.reset');

//For payment Gateway

Route::get('razorpay-payments', [RazorpayPaymentController::class, 'index'])->name('razorpay-payments');
Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');
