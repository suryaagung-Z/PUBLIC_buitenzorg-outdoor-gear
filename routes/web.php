<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\ProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('guest.home');
Route::get('/about', [AboutController::class, 'index'])->name('guest.about');
Route::resource('catalogue', CatalogueController::class)->only(['index', 'show']);
Route::get('/cart', [CartController::class, 'index'])->name('guest.cart');
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'index')->name('guest.contact');
    Route::post('/send-email', 'sendEmail')->name('guest.sendEmail');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.index');
        Route::resource('category', CategoryController::class)->except(['create', 'show']);
        Route::resource('product', ProductController::class)->except(['create', 'show']);
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    });
});

Route::middleware(['guest'])->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'index')->name('login.index');
        Route::post('/login', 'authenticate')->name('login.process');
    });
});
