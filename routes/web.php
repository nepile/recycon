<?php

use App\Http\Controllers\Auth\AuthController as Auth;
use App\Http\Controllers\ChangePasswordController as ChangePassword;
use App\Http\Controllers\EditProfileController as EditProfile;
use App\Http\Controllers\Function\AdminController as Admin;
use App\Http\Controllers\Function\CustomerController as Customer;
use App\Http\Controllers\Global\AppController as App;
use Illuminate\Support\Facades\Route;

Route::get('/', [App::class, 'home'])->name('home');
Route::get('/show_product', [App::class, 'show_product'])->name('show_product');

Route::middleware('auth')->group(function () {
    Route::middleware('cekrole:admin')->group(function () {
        Route::get('/view_item', [App::class, 'view_item'])->name('view_item');
        Route::get('/add_item', [App::class, 'add_item'])->name('add_item');
        Route::post('/add_item_handle', [Admin::class, 'add_item_handle'])->name('add_item_handle');
        Route::post('/delete_item_handle/{id}', [Admin::class, 'delete_item_handle']);
        Route::get('/edit_item/{id}', [Admin::class, 'edit_item']);
        Route::post('/update_item_handle/{id}', [Admin::class, 'update_item_handle']);
    });
    Route::get('/search', [App::class, 'search'])->name('search');
    Route::get('/edit_profile', [App::class, 'edit_profile'])->name('edit_profile');
    Route::post('/edit_profile_handle/{id}', [EditProfile::class, 'edit_profile_handle']);
    Route::get('/change_password', [App::class, 'change_password'])->name('change_password');
    Route::post('/change_password_handle', [ChangePassword::class, 'change_password_handle'])->name('change_password_handle');

    Route::middleware('cekrole:customer')->group(function () {
        Route::get('/transaction_history', [App::class, 'transaction_history'])->name('transaction_history');
        Route::get('/my_cart', [App::class, 'my_cart'])->name('my_cart');
        Route::post('/checkout', [Customer::class, 'checkout']);
        Route::post('/delete_item/{id_transaction}', [Customer::class, 'delete_item']);
        Route::post('/add_cart_handle', [Customer::class, 'add_cart_handle'])->name('add_cart_handle');
    });
});


Route::get('/detail_product/{id}', [App::class, 'detail_product'])->name('detail_product');

// authentication
Route::get('/login', [Auth::class, 'v_login'])->name('login');
Route::post('/login_handle', [Auth::class, 'login_handle'])->name('login_handle');
Route::get('/register', [Auth::class, 'v_register'])->name('register');
Route::post('/register_handle', [Auth::class, 'register_handle'])->name('register_handle');
Route::post('/logout', [Auth::class, 'logout'])->name('logout');
