<?php

namespace App\Http\Controllers\item_page_projeck;

use App\Http\Controllers\Controller;
use App\Models\favourite;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemProjeckController extends Controller
{
    public function index(){
        $dataprojeck = Project::all();
        return view('item_page_projeck.project',['data'=>$dataprojeck]);
    }
    public function GetOne($id){
        $data = Project::find($id);
        if (Auth::check()) {
            $user = Auth::user()->id;
        }
        $checkfavourite = favourite::where('id_users', $user)
                    ->where('id_project', $id)
                    ->first();
        
        return view('item_page_projeck.projectid',['dataid'=>$data,'check'=>$checkfavourite]);
    }
    public function getlike(Request $req){
        $data = $req->validate([
            'id_project' => 'required|integer',
            'id_user' => 'required|integer',
        ]);
        return  $data;
    }
}
