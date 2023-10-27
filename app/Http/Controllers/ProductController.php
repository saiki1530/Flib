<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $topDownloads = Project::orderBy('download', 'desc')->take(4)->get();
        $newProject = Project::take(4)->get();
        $field = Field::take(4)->get();
        $maxDownloads = [];
        $projects = [];

// Lặp qua từng trường Field
        foreach ($field as $item) {
            $maxDownload = Project::where('id_field', $item->id)->max('download');
            
            $projectWithMaxDownload = Project::where('id_field', $item->id)
                ->where('download', $maxDownload)
                ->first();
            
            $projects[] = $projectWithMaxDownload;
        }
        return view('page.index', ['topDonwload' => $topDownloads, 'newProject' => $newProject, 'field' =>  $field, 'projectField' =>$projects]);
    }
}
