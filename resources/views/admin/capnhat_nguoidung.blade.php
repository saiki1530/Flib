@extends('admin/layoutadmin')
@section('title') Cập nhật vai trò - HAL @endsection
@section('noidungchinh')
<style>
    form {
        margin: 0 auto;
        width: 70%;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    form p {
        margin-bottom: 10px;
    }

    form input,
    form select,
    form textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    form button {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    form button:hover {
        background-color: #45a049;
    }



    button[type="submit"] {
        border: none;
        color: white;
        padding: 6px;
        cursor: pointer;
        width: 100%;
        font-weight: bold;
    }

    button[type="submit"]:hover {
        background-color: #000;
    }
</style>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">CẬP NHẬT VAI TRÒ</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <form action="/admin/capnhat_nguoidung/{{$id}}" method="post" class="col-7 m-auto">
            <label>Họ tên:</label>
            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
            <hr>
            <label>Email:</label>
            <input type="text" class="form-control" name="email" value="{{ $user->email }}">
            <hr>
            <label>Địa chỉ:</label>
            <input type="text" class="form-control" name="diachi" value="{{ $user->diachi }}">
            <hr>
            <label>Vai trò:</label>
            <select name="idgroup" class="form-control">
                <option value="0" {{$user->idgroup == '0' ? 'selected' : ''}}>Người dùng</option>
                <option value="1" {{$user->idgroup == '1' ? 'selected' : ''}}>Quản trị viên</option>
            </select><br>
            <hr>
            <p><button class="btn btn-primary" type="submit">Cập nhật</button></p>
            @csrf
        </form>

    </div>



</div>
@endsection