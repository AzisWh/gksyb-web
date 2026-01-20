<?php

use App\Http\Controllers\Admin\AdminDonasiController;
use App\Http\Controllers\Admin\AdminEkaristiController;
use App\Http\Controllers\Admin\AdminJadwalController;
use App\Http\Controllers\Admin\AdminJadwalDoa;
use App\Http\Controllers\Admin\AdminKategoriJadwal;
use App\Http\Controllers\Admin\AdminKontakController;
use App\Http\Controllers\Admin\AdminPastorParoki;
use App\Http\Controllers\Admin\AdminProfileGereja;
use App\Http\Controllers\Admin\AdminSakramenController;
use App\Http\Controllers\Admin\AdminTerhubungController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\DoaController;
use App\Http\Controllers\Admin\DokParokiController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\identitasController;
use App\Http\Controllers\Admin\KategoriDokParoki;
use App\Http\Controllers\Admin\ManajemenRole;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SosmedController;
use App\Http\Controllers\Admin\TulisanBintaranController;
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
Route::get('/panduan-ekaristi', [LandingController::class, 'panduanEkaristi'])->name('landing.panduan-ekaristi');
Route::get('/download-panduan-ekaristi/{id}', [LandingController::class, 'downloadPanduanEkaristi'])->name('landing.download.panduan-ekaristi');
Route::get('/dokumen-gereja', [LandingController::class, 'dokumenGereja'])->name('landing.dokumen-gereja');

Route::get('/sejarah', [LandingController::class, 'sejarah'])->name('landing.sejarah');
Route::get('/gembala', [LandingController::class, 'gembala'])->name('landing.gembala');
Route::get('/doa', [LandingController::class, 'doa'])->name('landing.doa');
Route::get('/sekraman', [LandingController::class, 'sekraman'])->name('landing.sekraman');
Route::get('/tulisan', [LandingController::class, 'tulisan'])->name('landing.tulisan');
Route::get('/contact', [LandingController::class, 'contact'])->name('landing.contact');
Route::get('/ssd', [LandingController::class, 'ssd'])->name('landing.ssd');
Route::get('/donasi', [LandingController::class, 'donasi'])->name('landing.donasi');

Route::get('/ujud', [LandingController::class, 'ujud'])->name('landing.ujud');
Route::post('/ujud/store', [LandingController::class, 'storeUjud'])->name('landing.ujud.store');


Route::get('/sakramen/detail/{id}', [LandingController::class, 'detailSakramen'])->name('landing.sakramen.detail');
Route::post('/contact/store', [LandingController::class, 'storeContact'])->name('landing.contact.store');

Route::get('/auth-login', [AuthController::class, 'index'])->name('login.index');
Route::post('/auth-login', [AuthController::class, 'login'])->name('login.authenticate');
Route::post('/auth-logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:0'])->group(function () {
        
    });
    Route::middleware(['role:1,2'])->group(function () {
        Route::get('/admin-dashboard',[DashboardAdminController::class, 'index'])->name('admin.dashboard.index');

        Route::prefix('admin-jadwal')->name('admin.jadwal.')->controller(AdminJadwalController::class)->group(function(){
            Route::get('/', 'index')->name('index');
        });

        Route::prefix('admin-kategori-jadwal')->name('admin.kategori.')->controller(AdminKategoriJadwal::class)->group(function(){
            Route::post('/store', 'store')->name('store');
            Route::patch('/update/{id}', 'update')->name('update');
            Route::delete('/destroy/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('admin-jadwal-doa')->name('admin.jadwal.')->controller(AdminJadwalDoa::class)->group(function(){
            Route::post('/store', 'store')->name('store');
            Route::patch('/update/{id}', 'update')->name('update');
            Route::delete('/destroy/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('admin-dokumen-paroki')->name('admin.dokparoki.')->controller(DokParokiController::class)->group(function(){
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::get('/download/{id}', 'download')->name('download');
            // Route::get('/preview/{id}', 'preview')->name('preview');
            Route::patch('/update/{id}', 'update')->name('update');
            Route::delete('/destroy/{id}', 'destroy')->name('destroy');
        }); 

        Route::prefix('admin-kategori-dokumen-paroki')->name('admin.kategoridokparoki.')->controller(KategoriDokParoki::class)->group(function(){
            Route::post('/store', 'store')->name('store');
            Route::patch('/update/{id}', 'update')->name('update');
            Route::delete('/destroy/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('admin-ekaristi')->name('admin.ekaristi.')->controller(AdminEkaristiController::class)->group(function(){
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::patch('/update/{id}', 'update')->name('update');
            Route::delete('/destroy/{id}', 'destroy')->name('destroy');
            Route::get('/download/{id}', 'download')->name('download');
        });

        Route::prefix('admin-profile-gereja')->name('admin.gereja.')->controller(AdminProfileGereja::class)->group(function(){
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::post('/update/{id}', 'update')->name('update');
            Route::delete('/destroy/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('admin-sakramen')->name('admin.sakramen.')->controller(AdminSakramenController::class)->group(function(){
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::post('/update/{id}', 'update')->name('update');
            Route::delete('/delete/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('admin-donasi')->name('admin.donasi.')->controller(AdminDonasiController::class)->group(function(){
            Route::get('/', 'index')->name('index');
            // tf
            Route::post('/transfer/store', 'storeTransfer')->name('transfer.store');
            Route::patch('/transfer/edit/{id}', 'EditTransfer')->name('transfer.edit');
            Route::delete('/transfer/destroy/{id}', 'DestroyTransfer')->name('transfer.destroy');
            // qr
            Route::post('/qr/store', 'StoreQrCode')->name('qr.store');
            Route::patch('/qr/edit/{id}', 'UpdateQrCode')->name('qr.edit');
            Route::delete('/qr/destroy/{id}', 'DestroyQrCode')->name('qr.destroy');
        });

        Route::prefix('admin-pastor-paroki')->name('admin.paroki.')->controller(AdminPastorParoki::class)->group(function(){
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::patch('/update/{id}', 'update')->name('update');
            Route::delete('/destroy/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('admin-terhubung')->name('admin.terhubung.')->controller(AdminTerhubungController::class)->group(function(){
            Route::get('/', 'index')->name('index');
            Route::patch('/update-status/{id}', 'updateStatus')->name('update.status');
        });

        Route::prefix('admin-doa')->name('admin.doa.')->controller(DoaController::class)->group(function(){
            Route::get('/', 'index')->name('index');
            Route::patch('/update-status/{id}', 'updateStatus')->name('update.status');
        });

        Route::prefix('admin-faq')->name('admin.faq.')->controller(FaqController::class)->group(function(){
            Route::get('/', 'index')->name('index');
            Route::post('/kategori/store', 'storeKategori')->name('kategori.store');
            Route::patch('/kategori/update/{id}', 'updateKategori')->name('kategori.update');
            Route::delete('/kategori/destroy/{id}', 'destroyKategori')->name('kategori.destroy');
            Route::post('/faq/store', 'storeFaq')->name('store');
            Route::patch('/faq/update/{id}', 'updateFaq')->name('update');
            Route::delete('/faq/destroy/{id}', 'destroyFaq')->name('destroy');
        });

        Route::prefix('admin-settings')->name('admin.settings.')->controller(SettingsController::class)->group(function(){
            Route::get('/', 'index')->name('index');
        });

        Route::prefix('admin-identitas')->name('admin.identitas.')->controller(identitasController::class)->group(function(){
            Route::post('/store', 'store')->name('store');
            Route::patch('/update/{id}', 'update')->name('update');
            Route::delete('/destroy/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('admin/kontak')->name('admin.kontak.')->group(function () {
            Route::post('/store', [AdminKontakController::class, 'store'])->name('store');
            Route::post('/jam/store', [AdminKontakController::class, 'storeJam'])->name('jam.store');
            Route::put('/jam/{id}', [AdminKontakController::class, 'updateJam'])->name('jam.update');
            Route::delete('/jam/{id}', [AdminKontakController::class, 'destroyJam'])->name('jam.destroy');
        });

        Route::post('/admin-sosmed/store', [SosmedController::class, 'store'])->name('admin.sosmed.store');
        Route::post('/admin-seo/store', [SosmedController::class, 'storeSeo'])->name('admin.seo.store');

        Route::prefix('admin-tulisan-bintaran')->name('admin.bintaran.')->controller(TulisanBintaranController::class)->group(function(){
            Route::get('/', 'index')->name('index');
            Route::post('/kategori/store', 'storeKategori')->name('kategori.store');
            Route::patch('/kategori/update/{id}', 'updateKategori')->name('kategori.update');
            Route::delete('/kategori/destroy/{id}', 'deleteKategori')->name('kategori.destroy');
            // tulisan
            Route::post('/store', 'store')->name('store');
            Route::patch('/update/{id}', 'update')->name('update');
            Route::delete('/destroy/{id}', 'destroy')->name('destroy');
        });

        Route::prefix('admin-gallery')->name('admin.gallery.')->controller(GalleryController::class)->group(function(){
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
        });
        
        Route::prefix('admin-manajemen-role')->name('admin.role.')->controller(ManajemenRole::class)->group(function(){
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::post('/update/{id}', 'update')->name('update');
            Route::delete('/delete/{id}', 'destroy')->name('delete');
        });
    });
    Route::middleware(['role:2'])->group(function () {
      
    });
});