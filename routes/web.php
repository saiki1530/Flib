<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProjectController as AdminProjectController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\item_page_projeck\ItemProjeckController;
use App\Http\Controllers\ListProjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\client\ProjectController;
use App\Http\Controllers\client\ReviewController;
use App\Http\Controllers\ProjectDetailController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/', [ProductController::class, 'index'])->name('home');
    Route::get('/project', [ListProjectController::class,'index'])->name('project');
    Route::get('/project-field/{id}',[ListProjectController::class,'field'])->name('project-field');

    Route::get('/project-details/{id}',[ProjectDetailController::class,'index'])->name('project-details');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/favourite',[ItemProjeckController::class,'index']);
    Route::get('/favourite/{id}',[ItemProjeckController::class,'GetOne'])->name('GetOne');
    Route::post('/new-favourite',[FavouriteController::class,'addFavourite'])-> name('new-favourite');
    Route::post('/delete-favourite',[FavouriteController::class,'deleteFavourite'])-> name('delete-favourite');

    Route::post('/report',[ReportController::class,'addReport'])->name('report');

    Route::post('new-comment',[CommentController::class,'addComment'])->name('new-comment');
    Route::post('new-reply',[CommentController::class,'addReply'])->name('new-reply');
});

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


Route::name('admin')->as('admin.')->prefix('admin')
    ->middleware('auth')
    ->group(function (){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/project/index', [AdminProjectController::class, 'index'])->name('project.index');
    Route::get('/project/create', [AdminProjectController::class, 'create'])->name('project.create');
    Route::post('/project', [AdminProjectController::class, 'store'])->name('project.store');
    Route::get('/project/{id}/edit', [AdminProjectController::class, 'edit'])->name('project.edit');
    Route::put('/project/{id}', [AdminProjectController::class, 'update'])->name('project.update');
    Route::delete('/project/{id}', [AdminProjectController::class, 'destroy'])->name('project.destroy');
    Route::get('/project/get-slug', [AdminProjectController::class, 'getSlug'])->name('project.slug');
});
