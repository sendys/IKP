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

Route::get('/', function () {
    return redirect('/login');
});

// Rute Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/dashboard',[App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
    Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
    Route::post('/store', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/index', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::get('/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/reset/{id}', [App\Http\Controllers\UserController::class, 'showresetpassword'])->name('users.reset');
    Route::put('/reset/password/{id}', [App\Http\Controllers\UserController::class, 'resetpassword'])->name('user.update-password');

    Route::get('/export-penilaian', [App\Http\Controllers\UserController::class, 'exportToExcel']);

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
