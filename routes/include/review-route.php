<?php

use App\Http\Controllers\ReviewsController;
use Illuminate\Support\Facades\Route;

Route::prefix('reviews')->controller(ReviewsController::class)->name('reviews')->group(function () {
    Route::get('/',  'index')->name('.index');
    Route::get('/{slug}',  'show_details')->name('.detail');
});
