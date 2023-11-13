<?php

namespace App\Http\Controllers;

use App\Models\favourite;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function addFavourite(Request $request){
        $checkfavourite = favourite::where('id_users', $request->id_users)
                    ->where('id_project', $request->id_project)
                    ->first();
        if($checkfavourite==""){
            favourite::create([
                'id_project' => $request->id_project,
                'id_users' => $request->id_users,
            ]);
        }
       
        
        return redirect('/project-details/' . $request->id_project);
        
    } 
    public function deleteFavourite(Request $request){
        $checkfavourite = favourite::where('id_users', $request->id_users)
                    ->where('id_project', $request->id_project)
                    ->first();
        if($checkfavourite!=""){
            $checkfavourite->delete();
        }
        return redirect('/project-details/' . $request->id_project);      
    }
}
