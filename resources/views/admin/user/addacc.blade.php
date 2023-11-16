@extends('layouts\layoutAD')

@section('title')
    Thêm tài khoản
@endsection

@section('noidung')
    <style>
        .primary-btn {
            /* Tùy chỉnh màu sắc nền và màu chữ */
            background-color: #3498db;
            /* Màu nền */
            color: #fff;
            /* Màu chữ */

            /* Tùy chỉnh font chữ và padding */
            font-size: 14px;
            font-weight: bold;
            padding: 10px 8px;

            /* Tùy chỉnh viền */
            border: none;
            border-radius: 5px;

            /* Hiệu ứng hover khi di chuột */
            transition: background-color 0.3s ease-in-out;
        }

        .primary-btn:hover {
            background-color: #2980b9;
            /* Màu nền khi di chuột qua */
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        @include('layouts.menuAD')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                <div class="row">
                    <div class="col-md-12 stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-body">
                                    <h2 class="card-title">@yield('title')</h2>
                                    <div class="d-flex align-items-end flex-wrap">




                                        <div class="d-flex" >
                                            <i class="mdi mdi-home text-muted hover-cursor"></i>
                                            <p class="text-muted mb-0 hover-cursor"><a href="{{ route('admin.dashboard') }}" class="text-secondary" style="text-decoration: none"> &nbsp;&nbsp;Dashboard&nbsp;/&nbsp;</a></p>
                                            <p class="text-muted mb-0 hover-cursor"><a href="{{ route('admin.allus') }}" class="text-secondary" style="text-decoration: none"> &nbsp;&nbsp;Quản lý tài khoản&nbsp;/&nbsp;</a></p>
                                            <p class="text-primary mb-0 hover-cursor">@yield('title')</p>
                                        </div>
                                    </div>
                                    <br>

                                <div class="tab-content" id="myTabsContent">
                                    <div class="tab-pane fade show active" id="tab1" role="tabpanel"
                                        aria-labelledby="tab1-tab">
                                        <div class="table-responsive">
                                            <table id="tab1-listing" class="table">
                                                <form action="{{ route('admin.addus') }}" method="post"
                                                    class="col-7 m-auto" enctype="multipart/form-data"><br>
                                                    <p> Họ tên: <input name="name" class="form-control" value="">
                                                    </p>

                                                    <p> Email: <input name="email" class="form-control" value="">
                                                    </p>
                                                    <p> Mật khẩu: <input type="password" name="password" class="form-control" required> </p>



                                                
                                                    <div class="form-group">
                                                        <label for="exampleSelectGender">Quyền</label>
                                                        <select class="form-control" name='role'
                                                            id="exampleSelectGender">
                                                            <option value="admin"
                                                                {{ isset($sls) && $sls->status == 1 ? 'selected' : '' }}>
                                                                Admin
                                                            </option>
                                                            <option value="user"
                                                                {{ isset($sls) && $sls->status == 0 ? 'selected' : '' }}>
                                                                User
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <center>
                                                        <p><button type="submit" class="btn btn-primary">Thêm tài
                                                                khoản</button>
                                                            <a href="/admin/user/restore_us" class="btn">Quay lại</a>
                                                        </p>
                                                    </center>
                                                    @csrf
                                                </form>
                                            </table>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
        <!-- main-panel ends -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
</script>
@endsection
<!-- JavaScript -->
