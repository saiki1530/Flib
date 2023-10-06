<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

        return view('page.index');
    }
    
    public function productDetail()
    {
        return view('page.productDetail');
    }
    public function reviewDetail()
    {
        return view('page.reviewDetail');
    }
}
