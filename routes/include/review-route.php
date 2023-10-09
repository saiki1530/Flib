<?php

use App\Http\Controllers\ReviewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('reviews')->controller(ReviewsController::class)->group(function () {
    Route::get('/',  'index');
    Route::get('/{slug}',  'show_details');
})->name('reviews');
