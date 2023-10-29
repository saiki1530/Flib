<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectDetailController extends Controller
{
    public function index($id){
        $data = Project::find($id);
        $files = explode(",", $data['img_project']); // Tách chuỗi thành mảng, sử dụng ", " làm dấu phân cách

        $jsonString = $data['img_project'];

        // Loại bỏ dấu ngoặc vuông [" và "]
        $jsonString = str_replace(['[', ']', '"'], '', $jsonString);

        // Chuyển chuỗi thành mảng bằng cách tách chuỗi bằng dấu phẩy
        $files = explode(",", $jsonString);

        $filesArray = [];

        // Lặp qua mảng để lưu tên file vào $filesArray
        foreach ($files as $file) {
            $fileName = trim($file); // Loại bỏ khoảng trắng thừa nếu có
            $filesArray[] = $fileName; // Lưu tên file vào mảng $filesArray
        }
        return view('page.project-details',['data' => $data, 'listImg' => $filesArray ]);
    }
}
