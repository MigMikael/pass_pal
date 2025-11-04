<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PwItemController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Laragear\WebAuthn\Http\Routes as WebAuthnRoutes;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::withoutMiddleware([VerifyCsrfToken::class])->group(function () {
    WebAuthnRoutes::register(
        attest: 'pass-pal/webauthn/register',
        assert: 'pass-pal/webauthn/login'
    );
});

Route::get('/pass-pal', function () {
    return view('home');
})->name('home');

Route::get('/pass-pal/about', function () {
    return view('about');
})->name('about');

Route::post('/pass-pal/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['guest', 'throttle:6,1'])->controller(AuthController::class)->group(function () {
    Route::get('/pass-pal/register', 'showRegister')->name('show.register');
    Route::post('/pass-pal/register', 'register')->name('register');
    Route::get('/pass-pal/login', 'showLogin')->name('show.login');
    Route::post('/pass-pal/login', 'login')->name('login');
});

Route::middleware('auth')->controller(SiteController::class)->group(function () {
    Route::get('/pass-pal/sites', 'index');
    Route::get('/pass-pal/sites/search', 'search');
    Route::get('/pass-pal/sites/{site:slug}', 'show');
});

Route::middleware('auth')->controller(PwItemController::class)->group(function () {
    Route::post('/pass-pal/pwitems', 'store');
    Route::match(['get', 'post'], '/pass-pal/pwitems/create', 'create');
    Route::get('/pass-pal/pwitems/{pwItem:slug}/edit', 'edit');
    Route::put('/pass-pal/pwitems/{pwItem:slug}', 'update');
    Route::delete('/pass-pal/pwitems/{pwItem:slug}', 'destroy');
});

Route::middleware('auth')->controller(UserController::class)->group(function () {
    Route::get('/pass-pal/profile', 'showProfile')->name('show.profile');
    Route::post('/pass-pal/profile', 'updateProfile')->name('update.profile');
});
