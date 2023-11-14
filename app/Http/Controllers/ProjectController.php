<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Field;
use App\Models\Purse;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function Project($id = null){
    $perpage = 5;
    $Field = null;

    if ($id !== null) {
        $Project = Project::where('id_field', $id)->paginate($perpage)->withQueryString();
    } else {
        $Project = Project::paginate($perpage)->withQueryString();
    }
        $Project = Project::all();
        return view('Project.project',['Project' => $Project,'Field'=>$Field]);
    }
    public function download($projectId){
        $userPoints = Purse::where('id_users', auth()->id())->value('points');
        if ($userPoints >= 10) {
            Purse::where('id_users', auth()->id())->decrement('points', 10);
            return redirect()->to("source/{$projectId}");
        }else{
            return redirect()->route('project')->with('message', 'Số điểm của bạn không đủ');
        }
    }
}
