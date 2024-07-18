<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\MacthTiketController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HasilPertandinganController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware('auth','userMiddleware')->group(function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('dashboard', [Homecontroller::class, 'index'])->name('dashboard');
    Route::get('/semuaberita', [Homecontroller::class, 'berita'])->name('semuaberita');
    Route::get('/semuapertandingan', [Homecontroller::class, 'pertandingan'])->name('semuapertandingan');
});
Route::middleware('auth','adminMiddleware')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/dashboard', [SliderController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/tambahslider', [SliderController::class, 'create'])->name('admin.tambahslide');
    Route::post('/admin/insertslider', [SliderController::class, 'store']);
    Route::get('/admin/editslide/{id}', [SliderController::class, 'edit'])->name('admin.editdata');
    Route::post('/admin/updateslide/{id}', [SliderController::class, 'update'])->name('admin.editdata');
    Route::get('/admin/delete/{id}', [SliderController::class, 'destroy']);
    Route::delete('/admin/selected',[SliderController::class, 'deleteAll'])->name('admin.delete');

    // hasilmacthroute
    Route::get('/admin/hasil_macth', [HasilPertandinganController::class, 'index'])->name('admin.hasil_macth');
    Route::get('/admin/tambahhasil_macth', [HasilPertandinganController::class, 'create'])->name('admin.tambahhasil_macth');
    Route::post('/admin/inserthasil_macth', [HasilPertandinganController::class, 'store']);
    Route::get('/admin/edithasil_macth/{id}', [HasilPertandinganController::class, 'edit'])->name('admin.edithasilmacth');
    Route::post('/admin/updatehasilmacth/{id}', [HasilPertandinganController::class, 'update'])->name('admin.edithasilmacth');
    Route::get('/admin/deletehasilmacth/{id}', [HasilPertandinganController::class, 'destroy']);

      // ticketmacthroute
      Route::get('/admin/macth_ticket', [MacthTiketController::class, 'index'])->name('admin.macth_ticket');
      Route::get('/admin/tambahmacth_ticket', [MacthTiketController::class, 'create'])->name('admin.tambahmacth_ticket');
      Route::post('/admin/insertmacth_ticket', [MacthTiketController::class, 'store']);
      Route::get('/admin/editmacth_ticket/{id}', [MacthTiketController::class, 'edit'])->name('admin.editmacth_ticket');
      Route::post('/admin/updatemacth_ticket/{id}', [MacthTiketController::class, 'update'])->name('admin.editmacth_ticket');
      Route::get('/admin/deletemacth_tiket/{id}', [MacthTiketController::class, 'destroy']);
      Route::delete('/admin/selected',[MacthTiketController::class, 'deleteAll'])->name('admin.delete');

      // ticketplayeroute
      Route::get('/admin/player', [PlayerController::class, 'index'])->name('admin.player');
      Route::get(' /admin/tambahplayer', [PlayerController::class, 'create'])->name('admin.tambahplayer');
      Route::post('/admin/insertplayer', [PlayerController::class, 'store']);
      Route::get('/admin/editplayer/{id}', [PlayerController::class, 'edit'])->name('admin.editplayer');
      Route::post('/admin/updateplayer/{id}', [PlayerController::class, 'update'])->name('admin.editplayer');
      Route::get('/admin/deleteplayer/{id}', [MacthTiketController::class, 'destroy']);
      Route::delete('/admin/selected',[MacthTiketController::class, 'deleteAll'])->name('admin.delete');

      // beritaroute
      Route::get('/admin/berita', [BeritaController::class, 'index'])->name('admin.berita');
      Route::get(' /admin/tambahberita', [BeritaController::class, 'create'])->name('admin.tambahberita');
      Route::post('/admin/insertberita', [BeritaController::class, 'store']);
      Route::get('/admin/editberita/{id}', [BeritaController::class, 'edit'])->name('admin.editberita');
      Route::post('/admin/updateberita/{id}', [BeritaController::class, 'update'])->name('admin.editberita');
      Route::get('/admin/deleteberita/{id}', [BeritaController::class, 'destroy']);
      Route::delete('/admin/selected',[BeritaController::class, 'deleteAll'])->name('admin.delete');
});