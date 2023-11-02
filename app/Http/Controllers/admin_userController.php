<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class admin_userController extends Controller
{
    function dsnguoidung()
    {
        $data = \App\Models\user::get();
        return view('/admin/ds_nguoidung', ['data' => $data]);
    }
    function capnhat($id)
    {
        $t = user::find($id);
        if ($t == null) {
            return redirect('/thongbao');
        }
        return view('/admin/capnhat_nguoidung', ['user' => $t, 'id' => $id]);
    }
    function capnhat_(Request $request, $id)
    {
        $t = User::findOrFail($id);
        if ($t == null) {
            echo "<script>alert('User not found'); window.location.href='/thongbao';</script>";
        }

        $t->name = $request->name;
        $t->email = $request->email;
        $t->diachi = $request->diachi;
        $t->idgroup = $request->idgroup;
        $t->save();

        if ($t->save()) {
            echo "<script>alert('Cập nhật thành công!'); window.location.href='/admin/ds_nguoidung';</script>";
        } else {
            echo "<script>alert('Cập nhật không thành công!'); window.location.href='/admin/ds_nguoidung';</script>";
        }
    }

    // Xóa tài khoản 
    public function getDelete($id)
    {
        DB::table('users')->where('id', '=', $id)->delete();
        echo "<script>alert('Xóa tài khoản thành công!'); window.location.href='/admin/ds_nguoidung';</script>";
    }
}
