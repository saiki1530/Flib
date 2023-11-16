@extends('layouts.layoutAD')

@section('title')
    Quản lý sản phẩm
@endsection

@section('noidung')
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
    <script>
        function previewImage(event) {
            var input = event.target;
            var reader = new FileReader();

            reader.onload = function() {
                var imgElement = document.getElementById('preview');
                imgElement.src = reader.result;
                imgElement.style.display = 'block';
            }

            reader.readAsDataURL(input.files[0]);
        }
    </script>
    <style></style>
    <div class="container-fluid page-body-wrapper">
        @include('layouts.menuAD')
        <div class="main-panel">
            <div class="content-wrapper">
                <form class="forms-sample" method="POST"
                    action="{{ isset($product) ? route('admin.updatePro', $product->id) : route('admin.addPro') }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method(isset($product) ? 'PUT' : 'POST')
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">{{ isset($product) ? 'Cập nhật' : 'Thêm' }} sản phẩm</h4>
                                    <p class="card-description">
                                        Điền thông tin cho sản phẩm
                                    </p>
                                    <!-- Các trường dữ liệu đầu vào -->
                                    <!-- Tên sản phẩm -->
                                    <div class="form-group">
                                        <label for="name">Tên dự án</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Tên sản phẩm" onchange="generateSlug()"
                                            value="{{ $product->product_name ?? old('name') }}" required>
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <!-- Slug -->
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input type="text" name="slug" class="form-control" id="slug"
                                            placeholder="Slug" value="{{ $product->product_slug ?? old('slug') }}" required>
                                        @error('slug')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <!-- Tác giả -->
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
                                    <input type="text" name="id_users" id="id_users"
                                        value="{{ Auth::guard('web')->user()->id ?? null }}" hidden>


                                    <!-- Giá sản phẩm -->

                                    <!-- Số lượng -->

                                    <!-- Ảnh sản phẩm -->

                                    <div class="mb-3 row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="ppt">Link powerpoint</label>
                                                <input value="{{ old('ppt') }}" type="text" name="ppt"
                                                    id="ppt"
                                                    class="form-control {{ $errors->has('ppt') ? 'is-invalid' : '' }}">
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
                                                <input value="{{ old('source') }}" type="text" name="source"
                                                    id="source"
                                                    class="form-control {{ $errors->has('source') ? 'is-invalid' : '' }}">
                                                @if ($errors->has('source'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('source') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Độ hot -->
                                    <div class="mb-3 row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="technical">Công nghệ áp dụng</label>
                                                <input value="{{ old('technical') }}" type="text" name="technical"
                                                    id="technical"
                                                    class="form-control {{ $errors->has('technical') ? 'is-invalid' : '' }}">
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
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Mô tả sản phẩm</label>
                                            <textarea class="form-control" name="introduction" id="exampleTextarea1" rows="4" required>{{ $product->introduction ?? old('introduction') }}</textarea>
                                        </div>
                                        <!-- Ẩn / Hiện -->
                                        <div class="form-group">
                                            <label for="exampleSelectGender">Ẩn / Hiện</label>
                                            <select class="form-control" name='visibility' id="exampleSelectGender">
                                                <option value="1"
                                                    {{ isset($product) && $product->visibility == 1 ? 'selected' : '' }}>
                                                    Hiện
                                                </option>
                                                <option value="0"
                                                    {{ isset($product) && $product->visibility == 0 ? 'selected' : '' }}>Ẩn
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 grid-margin stretch-card"
                                style="display: flex; justify-content: center; align-items: center;">
                                <button type="submit"
                                    class="btn btn-primary mr-2">{{ isset($product) ? 'Cập nhật' : 'Thêm' }} sản
                                    phẩm</button>
                                <a href="{{ route('admin.allsp') }}" class="btn btn-secondary "> Trở
                                    về</a>
                            </div>
                        </div>
                </form>
            </div>
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a
                            href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i
                            class="mdi mdi-heart text-danger"></i></span>
                </div>
            </footer>
        </div>
    </div>
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
@endsection

<script>

    function generateSlug() {
        var nameInput = document.getElementById('name');
        var slugInput = document.getElementById('slug');

        let name = nameInput.value;
        let slug = name.toLowerCase();
        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');

        slugInput.value = slug;
    }
</script>

