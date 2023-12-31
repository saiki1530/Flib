<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function addReport(Request $request){
        $validatedData = $request->validate([
            'your_text' => 'required',
        ]);
        $checkReport = Report::where('id_users', $request->id_users)
        ->where('id_project', $request->id_project)
        ->first();
        if($checkReport==""){
            Report::create([
                'id_project' => $request->id_project,
                'id_users' => $request->id_users,
                'text_report'=>$request->your_text,
            ]);
            return redirect('/project-details/' . $request->id_project)->withSuccess('Báo cáo thành công!');
        };
        return redirect('/project-details/' . $request->id_project)->withError('Bạn đã báo cáo dự án này trước đó.');
    }
    
}
