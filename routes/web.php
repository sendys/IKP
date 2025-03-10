<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

// Frontend
Route::middleware('guest:web')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

});

Route::middleware(['auth:web', 'role:user'])->group(function () {

    Route::get('/user/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('user.dashboard');
    Route::post('/penilaian/store', [App\Http\Controllers\PenilaianController::class, 'store'])->name('penilaian.store');
    Route::get('/penilaian/{id}', [App\Http\Controllers\PenilaianController::class, 'show']);

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

});

// Backend
Route::prefix('admin')->middleware('guest:admin')->group(function () {
    Route::get('/login', [LoginController::class, 'showAdminLoginForm'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'adminLogin']);

});

Route::prefix('admin')->middleware(['auth:admin', 'role:admin'])->group(function () {
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
    Route::get('/export-penilaian', [App\Http\Controllers\AdminController::class, 'exportToExcel'])->name('export_data');

    Route::get('/label/edit/{id}', [App\Http\Controllers\AdminController::class, 'edit'])->name('label.edit');
    Route::put('/label/update/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('label.update');

    //Pegawai
    Route::get('/index', [App\Http\Controllers\PegawaiController::class, 'index'])->name('pegawai.index');
    Route::get('/create', [App\Http\Controllers\PegawaiController::class, 'create'])->name('pegawai.create');
    Route::post('/store', [App\Http\Controllers\PegawaiController::class, 'store'])->name('pegawai.store');
    Route::get('/edit/{id}', [App\Http\Controllers\PegawaiController::class, 'edit'])->name('pegawai.edit');
    Route::put('/update/{id}', [App\Http\Controllers\PegawaiController::class, 'update'])->name('pegawai.update');
    Route::get('/pegawaidelete/{id}', [App\Http\Controllers\PegawaiController::class, 'pegawaideleted'])->name('pegawai.delete');

    Route::post('/logout', [LoginController::class, 'adminLogout'])->name('admin.logout');
});

