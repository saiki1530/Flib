<?php

use App\Http\Controllers\FieldController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\item_page_projeck\ItemProjeckController;
use App\Http\Controllers\ListProjectController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\ReportController;
use App\Http\Controllers\client\ProjectController;
use App\Http\Controllers\client\ReviewController;
use App\Http\Controllers\ProjectDetailController;
use App\Models\Field;

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
// Hiển thị form đăng nhập


Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/danhmuc', [AdminController::class, 'alldm'])->name('admin.alldm');
Route::get('/admin/product', [AdminController::class, 'allsp'])->name('admin.allsp');
// Route::get('/product/editfun/{id}', [AdminController::class, 'editfun'])->name('admin.editfun');
// Route::post('/product/updateinfo', [AdminController::class, 'updateinfo'])->name('admin.updateinfo');
Route::delete('/deletesp/{id}', [AdminController::class, 'deletesp'])->name('admin.deletesp');

Route::get('/admin/user', [UserController::class, 'allus'])->name('admin.allus');
Route::delete('/deleteus/{id}', [UserController::class, 'deleteus'])->name('admin.deleteus');
Route::get('/user/editus/{id}', [UserController::class, 'editus']);
Route::post('/user/editus/{id}', [UserController::class, 'updateus']);
Route::get('/user/add', [UserController::class, 'createacc'])->name('admin.createacc');
Route::post('/addus', [UserController::class, 'addus'])->name('admin.addus');

Route::post('/thaydoitrangthai', [AdminController::class, 'thayDoiTrangThai']);

Route::get('/admin/field', [FieldController::class, 'allfd'])->name('admin.allfd');
Route::delete('/deletefd/{id}', [FieldController::class, 'deletefd'])->name('admin.deletefd');
Route::get('/field/editfd/{id}', [FieldController::class, 'editfd']);
Route::post('/field/editfd/{id}', [FieldController::class, 'updatefd']);
Route::get('/field/add', [FieldController::class, 'createfield'])->name('admin.createfield');
Route::post('/addfd', [FieldController::class, 'addfd'])->name('admin.addfd');

Route::get('/product/add', [AdminController::class, 'createPro'])->name('admin.createPro');
Route::get('/product/{slug}', [AdminController::class, 'onePro'])->name('admin.onePro');
Route::post('/addPro', [AdminController::class, 'addPro'])->name('admin.addPro');

Route::get('/product/edit/{slug}', [AdminController::class, 'editPro'])->name('admin.editPro');
Route::put('/updatePro/{id}', [AdminController::class, 'updatePro'])->name('admin.updatePro');

Route::delete('/delete/{id}', [AdminController::class, 'deletePro'])->name('admin.delete');
Route::delete('/product/destroy/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
Route::post('/product/restore/{id}', [AdminController::class, 'restore'])->name('admin.restoreProduct');





    Route::get('/', [ProductController::class, 'index'])->name('home');
    Route::get('/project', [ListProjectController::class,'index'])->name('project');
    Route::get('/project-field/{id}',[ListProjectController::class,'field'])->name('project-field');
    Route::get('/project-details/{id}',[ProjectDetailController::class,'index'])->name('project-details');


Route::middleware(['auth', 'can:profile_user'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/show-donwload',[FavouriteController::class,'showDonwload'])->name('show-donwload');

    Route::get('/favourite',[ItemProjeckController::class,'index']);
    Route::get('/favourite/{id}',[ItemProjeckController::class,'GetOne'])->name('GetOne');
    Route::post('/new-favourite',[FavouriteController::class,'addFavourite'])-> name('new-favourite');
    Route::post('/delete-favourite',[FavouriteController::class,'deleteFavourite'])-> name('delete-favourite');
    Route::post('/donwload',[FavouriteController::class,'donwload'])->name('donwload');

    Route::post('/report',[ReportController::class,'addReport'])->name('report');

    Route::post('new-comment',[CommentController::class,'addComment'])->name('new-comment');
    Route::post('new-reply',[CommentController::class,'addReply'])->name('new-reply');
});
Route::get('/search',[SearchController::class,'search'])->name('search');

Route::name('client')->as('client.')->group(function (){
    Route::get('/project/detail', [ProjectController::class, 'projectDetail'])->name('project.detail');
    Route::get('/review/detail', [ReviewController::class, 'reviewDetail'])->name('review.detail');
});
Route::name('client')->as('client.')
    ->middleware('auth')
    ->group(function (){
    // Route::resource('project', ProjectController::class);
    Route::get('/project/create', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/project', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/project/get-slug', [ProjectController::class, 'getSlug'])->name('project.slug');
});
