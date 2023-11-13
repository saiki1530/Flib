<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Project;
use Illuminate\Http\Request;

class ListProjectController extends Controller
{
    public function index(){
        $field = Field::all();
        $data = Project::orderBy('download', 'desc')->get();
        return view('page.project',['data' => $data, 'field' => $field]);
    }
    public function field($id){
        $id_field = $id;
        $field = Field::all();
        $data = Project::where('id_field', $id)->get();
        return view('page.project-field', ['data' => $data, 'field' => $field, 'id_field' => $id_field]);
    }
}
