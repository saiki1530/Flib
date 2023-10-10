<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ReviewsController extends Controller
{
    protected $reviewModel;
    function __construct()
    {
        $this->reviewModel = new Review();
        Paginator::useBootstrap();
    }
    function index()
    {
        try {
            $listReview = $this->reviewModel->with('user')->paginate(25);

            return view('page.blog.index', ['listReview' => $listReview]);
        } catch (Exception $e) {
        }
    }
    function show_details()
    {
        return view('page.blog.details');
    }
}
