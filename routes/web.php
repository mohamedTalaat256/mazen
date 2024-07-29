<?php

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
 

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect',]
], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');



});

//admin login and logout
Route::get('admin/login', [AdminAuthController::class, 'getLogin'])->name('adminLogin');
Route::post('admin/login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');
Route::get('admin/logout', [AdminAuthController::class, 'logout'])->name('adminLogout');




