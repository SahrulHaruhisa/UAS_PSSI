<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;

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
});