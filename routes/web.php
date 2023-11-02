<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\admin_userController;


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

Route::get('/', [ProductController::class, 'index']);

// trang contact
Route::get('/contact', [ContactController::class, 'contact']);
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// trang Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admiin User
Route::get('/admin/ds_nguoidung', [admin_userController::class, 'dsnguoidung'])->middleware('auth', 'Quantri');
Route::get('/admin/capnhat_nguoidung/{id}', [admin_userController::class, 'capnhat'])->middleware('auth', 'Quantri');
Route::post('/admin/capnhat_nguoidung/{id}', [admin_userController::class, 'capnhat_'])->middleware('auth', 'Quantri');
Route::get('/delete/{id}', [admin_userController::class, 'getDelete'])->name('admin.get.delete');
require __DIR__.'/auth.php';
