<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index($id){
        $data = Project::find($id);
        $files = explode(",", $data['img_project']); // Tách chuỗi thành mảng, sử dụng ", " làm dấu phân cách

        $filesArray = []; // Mảng mới để chứa các tên tệp hình ảnh

        foreach ($files as $file) {
            $filesArray[] = $file; // Đưa từng tên tệp vào mảng mới
        }
        return view('page.project-details',['data' => $data, 'listImg' => $filesArray ]);
    }
}
