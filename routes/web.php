<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PwItemController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Laragear\WebAuthn\Http\Routes as WebAuthnRoutes;

Route::get('/', function () {
    return redirect()->route('home');
})->name('welcome');

Route::withoutMiddleware([VerifyCsrfToken::class])->group(function () {
    WebAuthnRoutes::register(
        attest: 'pass-pal/webauthn/register',
        assert: 'pass-pal/webauthn/login'
    );
});

Route::post('/pass-pal/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/pass-pal', function () {
    return view('home');
})->name('home');

Route::get('/pass-pal/about', function () {
    return view('about');
})->name('about');

Route::get('/pass-pal/logo.png', function () {
    $pathToFile = storage_path('app/public/logo.png');
    return response()->file($pathToFile, ['Content-Type' => 'image/png']);
})->name('logo');

Route::get('/pass-pal/favicon.ico', function () {
    $pathToFile = storage_path('app/public/favicon.ico');
    return response()->file($pathToFile, ['Content-Type' => 'image/x-icon']);
})->name('favicon');

Route::get('/pass-pal/offline.html', function () {
    $pathToFile = storage_path('app/public/offline.html');
    return response()->file($pathToFile, ['Content-Type' => 'text/html']);
})->name('offline');

Route::get('/pass-pal/sw.js', function () {
    $pathToFile = storage_path('app/public/sw.js');
    return response()->file($pathToFile, ['Content-Type' => 'text/javascript']);
})->name('service-worker');

Route::get('/pass-pal/manifest.json', function () {
    $pathToFile = storage_path('app/public/manifest.json');
    return response()->file($pathToFile, ['Content-Type' => 'application/json']);
})->name('manifest');

Route::middleware(['guest'])->controller(AuthController::class)->group(function () {
    Route::get('/pass-pal/register', 'showRegister')->name('show.register');
    Route::get('/pass-pal/login', 'showLogin')->name('show.login');
});

Route::middleware(['guest', 'throttle:6,1'])->controller(AuthController::class)->group(function () {
    Route::post('/pass-pal/register', 'register')->name('register');
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
