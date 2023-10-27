@push('customCSS')
    <style>
        .list-images {
            width: 50%;
            margin-top: 10px;
            display: inline-block;
        }
        .list-images2 {
            width: 50%;
            margin-top: 10px;
            display: inline-block;
        }
        .hidden { display: none; }
        .box-image {
            width: 100px;
            height: 108px;
            position: relative;
            float: left;
            margin-left: 5px;
        }
        .box-image img {
            width: 100px;
            height: 100px;
        }
        .box-image2 {
            width: 100px;
            height: 108px;
            position: relative;
            float: left;
            margin-left: 5px;
        }
        .box-image2 img {
            width: 100px;
            height: 100px;
        }
        .wrap-btn-delete {
            position: absolute;
            top: -8px;
            right: 0;
            height: 2px;
            font-size: 20px;
            font-weight: bold;
            color: red;
        }
        .btn-delete-image {
            cursor: pointer;
        }
        .table {
            width: 15%;
        }
    </style>
    <link href="{{ asset('assetsProductDetail/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assetsProductDetail/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
@endpush


@extends('layouts\layoutUser-2')

@section('title')
    Create product
@endsection

@section('noidung')
<section class="section">
    <div class="row">
    <div class="col-lg-8 m-auto">

        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Thêm dự án mới</h5>

            <!-- Table with stripped rows -->
            <div class="content">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            @endif
                <!-- Default box -->
                <div class="container-fluid">
                    <form action="{{route('client.project.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 row">
                                        <input type="text" name="id_users" id="id_users" value="{{Auth::guard('web')->user()->id??null}}" hidden>
                                        
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name">Tên dự án</label>
                                                <input value="{{ old('name') }}" type="text" name="name" id="name" class="form-control {{$errors->has('name')?'is-invalid':''}}">
                                                @if ($errors->has('name'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('name') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="product_slug">Slug</label>
                                                <input value="{{ old('product_slug') }}" type="text" name="product_slug" id="product_slug" class="form-control {{$errors->has('product_slug')?'is-invalid':''}}">	
                                                @if ($errors->has('product_slug'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('product_slug') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="mb-3 row">
                                        
                                        <div class="col-md-6">
                                            <label>Bộ môn</label> 
                                            <select class="form-control {{$errors->has('id_field')?'is-invalid':''}}" name="id_field">
                                                @foreach ($fields as $field )
                                                    <option value="{{$field->id}}">{{$field->id}} - {{$field->name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('id_field'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('id_field') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="video">Link video demo</label>
                                                <input value="{{ old('video') }}" type="text" name="video" id="video" class="form-control {{$errors->has('video')?'is-invalid':''}}">
                                                @if ($errors->has('video'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('video') }}
                                                </div>
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="ppt">Link powerpoint</label>
                                                <input value="{{ old('ppt') }}" type="text" name="ppt" id="ppt" class="form-control {{$errors->has('ppt')?'is-invalid':''}}">
                                                @if ($errors->has('ppt'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('ppt') }}
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="source">Link source code</label>
                                                <input value="{{ old('source') }}" type="text" name="source" id="source" class="form-control {{$errors->has('source')?'is-invalid':''}}">
                                                @if ($errors->has('source'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('source') }}
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="technical">Công nghệ áp dụng</label>
                                                <input value="{{ old('technical') }}" type="text" name="technical" id="technical" class="form-control {{$errors->has('technical')?'is-invalid':''}}">
                                                @if ($errors->has('technical'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('technical') }}
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="mb-3 row">
                                        <div class="col-md-6">
                                            <label>Ảnh thumbnail</label>
                                            <div class="input-group hdtuto control-group lst increment" >
                                                <div class="list-input-hidden-upload2">
                                                    <input type="file" name="filenames2[]" id="file_upload2" class="myfrm2 form-control hidden {{$errors->has('filenames2[]')?'is-invalid':''}}">
                                                    
                                                </div>
                                                <div class="input-group-btn"> 
                                                    <button class="btn btn-success btn-add-image2" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Thêm thumbnal</button>
                                                </div>
                                                @if ($errors->has('filenames2.*'))
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $errors->first('filenames2.*') }}
                                                    </div><br>
                                                @endif
                                            </div>
                                            <div class="list-images2">
                                                @if (isset($list_images2) && !empty($list_images2))
                                                    @foreach (json_decode($list_images2) as $key => $img)
                                                        <div class="box-image2">
                                                            <input type="hidden" name="images_uploaded2[]" value="{{ $img }}" id="img-{{ $key }}">
                                                            <img src="{{ asset('upload/images/project'.$img) }}" class="picture-box">
                                                            <div class="wrap-btn-delete"><span data-id="img-{{ $key }}" class="btn-delete-image2">x</span></div>
                                                        </div>
                                                    @endforeach
                                                    <input type="hidden" name="images_uploaded_origin2" value="{{ $list_images2 }}">
                                                    <input type="hidden" name="id" value="{{ $id }}">
                                                @endif
                                            </div>
                                            
                                       </div>
                                       <div class="col-md-6">
                                            <label>Hình ảnh chi tiết</label>
                                            <div class="input-group hdtuto control-group lst increment" >
                                                <div class="list-input-hidden-upload">
                                                    <input type="file" name="filenames[]" id="file_upload" class="myfrm form-control hidden {{$errors->has('filenames[]')?'is-invalid':''}}">
                                                    
                                                </div>
                                                <div class="input-group-btn"> 
                                                    <button class="btn btn-success btn-add-image" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Thêm ảnh chi tiết</button>
                                                </div>
                                                @if ($errors->has('filenames.*'))
                                                    <div class="invalid-feedback" style="display: block">
                                                        {{ $errors->first('filenames.*') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="list-images">
                                                @if (isset($list_images) && !empty($list_images))
                                                    @foreach (json_decode($list_images) as $key => $img)
                                                        <div class="box-image">
                                                            <input type="hidden" name="images_uploaded[]" value="{{ $img }}" id="img-{{ $key }}">
                                                            <img src="{{ asset('upload/images/project'.$img) }}" class="picture-box">
                                                            <div class="wrap-btn-delete"><span data-id="img-{{ $key }}" class="btn-delete-image">x</span></div>
                                                        </div>
                                                    @endforeach
                                                    <input type="hidden" name="images_uploaded_origin" value="{{ $list_images }}">
                                                    <input type="hidden" name="id" value="{{ $id }}">
                                                @endif
                                            </div>
                                            
                                            
                                        </div>
                                    </div>

                                    {{-- <div class="row mt-3 mb-3">
                                        <label class="col-form-label col-sm-2">Hiển thị</label>
                                        <div class="col-md-4">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input mt-2" type="radio" name="visibility" id="gridRadios1" value="1" {{old('visibility')?"checked":""}}>
                                                <label class="form-check-label" for="gridRadios1">
                                                    <i class="bi bi-check-circle btn btn-success rounded-circle"></i>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input mt-2" type="radio" name="visibility" id="gridRadios2" value="0" {{old('visibility')?"":"checked"}}>
                                                <label class="form-check-label" for="gridRadios2">
                                                    <i class="bi bi-x-circle btn btn-secondary rounded-circle"></i>
                                                </label>
                                            </div>
                                        
                                        </div>
                                        <label class="col-form-label col-sm-2">Trạng thái</label>
                                        <div class="col-md-4">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input mt-2" type="radio" name="status" id="gridRadios3" value="1" {{old('status')?"checked":""}}>
                                                <label class="form-check-label" for="gridRadios3">
                                                    <i class="bi bi-check-circle btn btn-success rounded-circle"></i>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input mt-2" type="radio" name="status" id="gridRadios4" value="0" {{old('status')?"":"checked"}}>
                                                <label class="form-check-label" for="gridRadios4">
                                                    <i class="bi bi-x-circle btn btn-secondary rounded-circle"></i>
                                                </label>
                                            </div>
                                        
                                        </div>
                                    </div> --}}
                                    <div class="mb-3 row">
                                        <label>Mô tả</label> 
                                        <textarea id="introduction" name="introduction" rows="5" class="form-control {{$errors->has('introduction')?'is-invalid':''}}"></textarea> 
                                        @if ($errors->has('introduction'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('introduction') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>							
                        </div>


                        <div class="pb-3 pt-3">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                            <a type="cancle" href="{{route('client.project.detail')}}" class="btn btn-outline-dark ml-3">Hủy</a>
                        </div>
                    </form>

                </div>
                <!-- /.card -->
            </section>
            <!-- End Table with stripped rows -->

        </div>
        </div>

    </div>
    </div>
</section>
       
@endsection

@push('customJS')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('introduction', {
            height: '200px', width: '100%', language: 'vi'
        });
    </script>

    <script>
        $('#name').change(function(e) {
            $.get('{{ route('client.project.slug') }}',
            { 'name': $(this).val() },
            function( data ){
                    $('#product_slug').val(data.product_slug);
                }
            );
        });
    </script>

    <script>
        $(document).ready(function() {
        $(".btn-add-image").click(function(){
            $('#file_upload').trigger('click');
        });

        $('.list-input-hidden-upload').on('change', '#file_upload', function(event){
            let today = new Date();
            let time = today.getTime();
            let image = event.target.files[0];
            let file_name = event.target.files[0].name;
            let box_image = $('<div class="box-image"></div>');
            box_image.append('<img src="' + URL.createObjectURL(image) + '" class="picture-box">');
            box_image.append('<div class="wrap-btn-delete"><span data-id='+time+' class="btn-delete-image">x</span></div>');
            $(".list-images").append(box_image);

            $(this).removeAttr('id');
            $(this).attr( 'id', time);
            let input_type_file = '<input type="file" name="filenames[]" id="file_upload" class="myfrm form-control hidden">';
            $('.list-input-hidden-upload').append(input_type_file);
        });

        $(".list-images").on('click', '.btn-delete-image', function(){
            let id = $(this).data('id');
            $('#'+id).remove();
            $(this).parents('.box-image').remove();
        });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(".btn-add-image2").click(function(){
                $('#file_upload2').trigger('click');
            });

            $('.list-input-hidden-upload2').on('change', '#file_upload2', function(event){
                let today = new Date();
                let time2 = today.getTime();
                let image2 = event.target.files[0];
                let file_name = event.target.files[0].name;
                let box_image2 = $('<div class="box-image2"></div>');
                box_image2.append('<img src="' + URL.createObjectURL(image2) + '" class="picture-box">');
                box_image2.append('<div class="wrap-btn-delete"><span data-id='+time2+' class="btn-delete-image2">x</span></div>');
                $(".list-images2").append(box_image2);

                $(this).removeAttr('id');
                $(this).attr( 'id', time2);
                let input_type_file2 = '<input type="file" name="filenames2[]" id="file_upload2" class="myfrm2 form-control hidden">';
                $('.list-input-hidden-upload2').append(input_type_file2);
            });

            $(".list-images2").on('click', '.btn-delete-image2', function(){
                let id = $(this).data('id');
                $('#'+id).remove();
                $(this).parents('.box-image2').remove();
            });
        });
    </script>
@endpush

