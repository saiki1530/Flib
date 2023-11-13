@extends('admin.layoutAdmin.layout')

@section('main-content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-title">Danh sách dự án</div>
                    <div class="adding">
                        <a href="{{route('admin.project.create')}}" class="btn"><i class="mdi mdi-plus-circle"></i></a>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif
                <div class="card-body">
                    <div class="table-responsive pt-3">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên dự án</th>
                            <th>Bộ môn</th>
                            <th>Người đăng</th>
                            <th>Hình ảnh</th>
                            <th>Ngày đăng</th>
                            <th>Tình trạng</th>
                            <th>Chỉnh sửa</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($listProject as $project )
                                <tr>
                                    <td>{{$project->id}}</td>
                                    <td>{{$project->name}}</td>
                                    <td>{{$project->field->name}}</td>
                                    <td>{{$project->user->name}}</td>
                                    <td>
                                        @php
                                            $listavt = json_decode($project->avt);
                                        @endphp
                                        @if (isset($listavt) && !empty($listavt))
                                            @foreach ($listavt as $key => $img)
                                                <span>
                                                    <img src="{{ asset('upload/images/project/'.$img) }}">
                                                </span>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>{{date('H:m:s d/m/Y', strtotime($project->created_at))}}</td>
                                    <td>
                                        <label class="badge badge-{{$project->status?'success':'danger'}}">{{$project->status?'Đã duyệt':'Chờ duyệt'}}</label>
                                    </td>
                                    <td>
                                        <form action="{{route('admin.project.update', $project->id)}}" method="post">
                                            <a href="{{route('admin.project.edit', $project->id)}}" class="btn btn-primary btn-sm"><i class="mdi mdi-pencil-box-outline"></i></a>            
                                            <button onclick="return confirm('Xác nhận xóa?')" class="btn btn-danger btn-sm" type="submit"><i class="mdi mdi-close-circle-outline
                                                "></i></button>
                                            @csrf  @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        
                        </tbody>
                    </table>
                    </div>
                    
                    <div> {{ $listProject->onEachSide(5)->links()}} </div> 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection