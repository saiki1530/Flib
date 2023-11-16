<?php

namespace App\Http\Controllers;

use App\Models\favourite;
use App\Models\Invoices;
use App\Models\Project;
use App\Models\Purse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    public function addFavourite(Request $request){
        $checkfavourite = favourite::where('id_users', $request->id_users)
                    ->where('id_project', $request->id_project)
                    ->first();
        if($checkfavourite==""){
            favourite::create([
                'id_project' => $request->id_project,
                'id_users' => Auth::user()->id,
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
    public function donwload(Request $request){
        $dataCheck = Purse::where('id_users',Auth::user()->id)->first();
        if ($dataCheck && $dataCheck->flib >= 10) {
            $dataCheck->flib = $dataCheck->flib -10;
            $dataCheck->save();
            $data = $request->all();
            $project = Project::find($data['id_project']);
            Invoices::create([
                'id_users' => Auth::user()->id,
                'id_project' => $project->id,
                'transaction' => 1,
                'status' => 1,
                'total' => -10
            ]);
            $dataProject = [
                'source' => $project->source, 'ppt' => $project->ppt
            ];
            return redirect()->route('show-donwload')->with(['data' => $dataProject, 'id_project' => $data['id_project']]);
        }else{
            return redirect('/project-details/' . $request->id_project)->withError('Bạn không đủ điểm Flib');
        }
       
    }
    public function showDonwload(){
        $data = session('data');
        $id_project = session('id_project');
    
        // Kiểm tra xem dữ liệu có tồn tại hay không
        if ($data && $id_project) {
            return view('page.donwload', compact('data', 'id_project'));
        } else {
            // Xử lý khi không có dữ liệu
            return redirect()->route('home'); // Chuyển hướng đến trang khác nếu cần
        }
    }
}
