<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Field;
use App\Models\Project;
class SearchController extends Controller
{public function search(Request $request)
    {
        $searchTerm = $request->input('searchteacher');

        $fields = Field::where('name', 'like', "%{$searchTerm}%")->get();
        $projects = Project::where('name', 'like', "%{$searchTerm}%")->get();

        return view('page.search', compact('fields', 'projects', 'searchTerm'));
    }

}
