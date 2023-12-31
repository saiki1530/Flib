<?php

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
=======
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
<<<<<<< HEAD
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');
=======
// sử dụng gate gate để validation admin route()->can('is_admin') 



// ex : Route::get('/', [ProductController::class, 'index'])->name('home')->can('is_admin');
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/project',[ProjectController::class,'project']);
Route::get('/notify',[NotificationController::class,'notify']);
Route::get('/usernoti',[NotificationController::class,'usernoti']);
Route::get('/markasred/{id}',[NotificationController::class,'markasred'])->name('markasred');
>>>>>>> a2175b2ce3b3c9a5526b1d5c77fee20fc5b6c347


    Route::get('/', [ProductController::class, 'index'])->name('home');
    Route::get('/project', [ListProjectController::class,'index'])->name('project');
    Route::get('/project-field/{id}',[ListProjectController::class,'field'])->name('project-field');
    Route::get('/project-details/{id}',[ProjectDetailController::class,'index'])->name('project-details');

Route::middleware('auth')->group(function () {

=======
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
