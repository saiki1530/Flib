<?php

namespace App\Http\Controllers;

use App\Models\favourite;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $comments = $data->comments;
        $sortedComments = $comments->sortByDesc('created_at');
        foreach ($comments as $key => $value) {
            $replys = $value -> replys;
        }
        if (Auth::user() && Auth::user()->id) {
            // Nếu có giá trị, thực hiện truy vấn để kiểm tra favorite
            $checkfavourite = favourite::where('id_users', Auth::user()->id)
                            ->where('id_project', $id)
                            ->first();
        
            // Kiểm tra xem $checkfavourite có tồn tại hay không
            if ($checkfavourite) {
                // Đã tồn tại, thực hiện các hành động khi favorite đã tồn tại
                // Ví dụ: return 1;
            } else {
                // Không tồn tại, thực hiện các hành động khi favorite chưa tồn tại
                // Ví dụ: return 0;
            }
        } else {
            $checkfavourite = "";
        }
        
        return view('page.project-details',['data' => $data, 'listImg' => $filesArray,'check'=>$checkfavourite,'comment'=>$sortedComments ]);
    }
}
