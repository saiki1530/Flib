<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Field;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function Project(Request $request){
        $category = $request->name;
        $Field = Field::all();
        $data = project::all();
        return view('Project.project',compact('data','Field'));
    }
}
