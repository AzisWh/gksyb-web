<?php

use App\Http\Controllers\Admin\AdminJadwalController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LandingController::class, 'index'])->name('landing.index');
Route::get('/sejarah', [LandingController::class, 'sejarah'])->name('landing.sejarah');
Route::get('/gembala', [LandingController::class, 'gembala'])->name('landing.gembala');
Route::get('/doa', [LandingController::class, 'doa'])->name('landing.doa');
Route::get('/sekraman', [LandingController::class, 'sekraman'])->name('landing.sekraman');
Route::get('/tulisan', [LandingController::class, 'tulisan'])->name('landing.tulisan');
Route::get('/contact', [LandingController::class, 'contact'])->name('landing.contact');
Route::get('/ssd', [LandingController::class, 'ssd'])->name('landing.ssd');
Route::get('/donasi', [LandingController::class, 'donasi'])->name('landing.donasi');

Route::get('/auth-login', [AuthController::class, 'index'])->name('login.index');
Route::post('/auth-login', [AuthController::class, 'login'])->name('login.authenticate');
Route::post('/auth-logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:0'])->group(function () {
        
    });
    Route::middleware(['role:1'])->group(function () {
        Route::get('/admin-dashboard',[DashboardAdminController::class, 'index'])->name('admin.dashboard.index');

        Route::prefix('admin-jadwal')->name('admin.jadwal.')->controller(AdminJadwalController::class)->group(function(){
            Route::get('/', 'index')->name('index');
        });
    });
    Route::middleware(['role:2'])->group(function () {

    });
});