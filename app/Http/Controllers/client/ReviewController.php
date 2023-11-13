<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function reviewDetail()
    {
        return view('page.reviewDetail');
    }
}
