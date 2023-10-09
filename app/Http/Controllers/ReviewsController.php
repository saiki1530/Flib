<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    function index()
    {
        return view('page.blog.index');
    }
    function show_details()
    {
        return view('page.blog.details');
    }
}
