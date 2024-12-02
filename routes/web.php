<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Penilaian;
use App\Livewire\Rating;

/* Route::get('/', function () {
    return view('welcome');
})->middleware('auth'); */

/* Route::get('/login', function () {
    return view('auth.login'); // Or your custom login logic
})->name('login'); */

Auth::routes();

// Rute Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

});

// Rute User
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/ikp/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    Route::post('/penilaian/store', [App\Http\Controllers\PenilaianController::class, 'store'])->name('penilaian.store');

    //Route::get('/rating', \App\Livewire\Rating::class)->name('livewire.rating');
    //Route::get('/ikp/penilaian', \App\Livewire\RatingComponent::class)->name('penilaian');

});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout')->middleware('auth');
