<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PwItemController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Laragear\WebAuthn\Http\Routes as WebAuthnRoutes;

Route::withoutMiddleware([VerifyCsrfToken::class])->group(function () {
    WebAuthnRoutes::register();
});

Route::get('/', function () {
    return view('home');
})->name('home');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('register', 'showRegister')->name('show.register');
    Route::post('register', 'register')->name('register');
    Route::get('login', 'showLogin')->name('show.login');
    Route::post('login', 'login')->name('login');
    
});

Route::middleware('auth')->controller(PwItemController::class)->group(function () {
    Route::get('pwitems', 'index');
    Route::post('pwitems', 'store');
    Route::get('pwitems/search', 'search');
    Route::match(['get', 'post'], 'pwitems/create', 'create');
    Route::get('pwitems/{pwItem:slug}/edit', 'edit');
    Route::put('pwitems/{pwItem:slug}', 'update');
    Route::get('pwitems/{pwItem:slug}', 'show');
    Route::delete('pwitems/{pwItem:slug}', 'destroy');
});

Route::middleware('auth')->controller(UserController::class)->group(function () {
    Route::get('profile', 'showProfile')->name('show.profile');
    Route::post('profile', 'updateProfile')->name('update.profile');
});