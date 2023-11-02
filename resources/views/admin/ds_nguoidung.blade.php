@extends('admin/layoutadmin')
@section('title') DANH SÁCH NGƯỜI DÙNG - HAL @endsection
@section('noidungchinh')
<style>
    .container {
        margin-top: 20px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        border-radius: 5px;


    }

    .col-lg-10 {
        background-color: #f8f9fa;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 5px;
    }

    h4 {
        color: #333;
        font-size: 20px;
        margin-top: 0;
        margin-bottom: 10px;
    }

    p {
        color: #777;
        font-size: 16px;
        margin-top: 0;
    }

    .btn {
        border: none;
        background-color: #007bff;
        color: #fff;
        font-size: 14px;
        font-weight: bold;
        text-decoration: none;
        padding: 10px 15px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        border-radius: 5px;
    }

    .btn-warning {
        background-color: #ffc107;
    }

    .btn-delete {
        background-color: #dc3545;
    }

    .btn:hover {
        background-color: #0056b3;
        opacity: 0.8;
    }

    .d-flex {
        display: flex;
    }

    .justify-content-end {
        justify-content: flex-end;
    }

    .align-items-center {
        align-items: center;
    }
</style>



<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">DANH SÁCH NGƯỜI DÙNG</h1>
    </div>

    <!-- Content Row -->
    <div class="container">
        <div class="row">
            @foreach ($data as $index => $user)
            <div class="col-lg-10">
                <h4><strong>{{ $index + 1 }}. {{$user->name}}</strong></h4>
                <ul>
                    <li>
                        Email: {{$user->email}}
                    </li>
                    <li>Địa chỉ: {{$user->diachi}}</li>
                    <li>
                        Vai trò: {{$user->idgroup == '1' ? 'Quản trị viên' : 'Người dùng'}}
                    </li>
                </ul>
                <hr>
            </div>
            <div class="col-lg-2 d-flex justify-content-end align-items-center">
                <a href="/admin/capnhat_nguoidung/{{$user->id}}" class="btn btn-primary p-2 mx-2">Cập nhật</a>|
                <a href="{{route('admin.get.delete',$user->id)}}" class="btn btn-primary p-2 mx-2" onclick="return confirm('Bạn có chắc muốn xoá?')" type="submit">Xóa</a>
            </div>
           
            @endforeach
        </div>
    </div>
</div>
@endsection