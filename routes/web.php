<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\Customercontroller;
use App\Http\Controllers\AdminController;

Route::get('/index',[Customercontroller::class,'index_page'])->name('index');

Route::get('registerform', [Customercontroller::class, 'register'])->name('registerform');
Route::post('registerforms', [Customercontroller::class, 'register_save_data'])->name('registerform_data');

Route::get('loginform', [Customercontroller::class, 'login'])->name('loginform');
Route::post('loginforms', [Customercontroller::class, 'login_save_data'])->name('loginform_data');


Route::get('product-details', [Customercontroller::class, 'products_details'])->name('product-details');

Route::post('logout', [CustomerController::class, 'logout_user'])->name('logout');

Route::get('email_forgot_password', [CustomerController::class, 'email_user_forgot_password'])->name('email_forgot_password');
Route::post('password_updates', [CustomerController::class, 'update_passworded'])->name('password_update');
Route::get('auth_google', [CustomerController::class, 'google_login_function'])->name('auth_google');
Route::get('auth_google-callback', [CustomerController::class, 'google_Authentication_function'])->name('auth_google_callback');

//Admin Routes
Route::get('admin_home', [AdminController::class, 'admin_home_function'])->name('admin_home');
Route::get('admin_hothumbbailme', [AdminController::class, 'thumbbail_function'])->name('thumbbail');
Route::post('thumbbail_post', [AdminController::class, 'thumbbail_post_function'])->name('thumbbail_post');
Route::get('show_data', [AdminController::class, 'show_all_data_function'])->name('show_data');
Route::delete('delete_data/{id}', [AdminController::class, 'delete_data_function'])->name('delete_data');
// Route::delete('delete_multiple_data', [AdminController::class, 'delete_multiple_data_function'])->name('delete_multiple_data');

Route::get('update_form/{id}/edit', [AdminController::class, 'update_form_function'])->name('update_form');
Route::put('update_form/{id}', [AdminController::class, 'update_profile_function'])->name('update_profile');

// Admin Route Over

Route::get('shop', [Customercontroller::class, 'shoping'])->name('shop');

