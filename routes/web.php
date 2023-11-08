<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;

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
// sử dụng gate gate để validation admin route()->can('is_admin') 

// ex : Route::get('/', [ProductController::class, 'index'])->name('home')->can('is_admin');
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/project',[ProjectController::class,'project']);
Route::get('/notify',[NotificationController::class,'notify']);
Route::get('/usernoti',[NotificationController::class,'usernoti']);
Route::get('/markasred/{id}',[NotificationController::class,'markasred'])->name('markasred');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'can:profile_user'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
