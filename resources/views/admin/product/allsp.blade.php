@extends('layouts\layoutAD')

@section('title')
    Quản lý sản phẩm
@endsection

@section('noidung')
    <style></style>
    <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        @include('layouts.menuAD')
        <!-- partial -->

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title">Sản phẩm</h2>
                                <div class="d-flex justify-content-between">
                                    <div class="col pl-0">
                                        <p class="card-description d-flex">
                                            <a href="{{ route('admin.createPro') }}" style="text-decoration: none;"><i
                                                    class="bi bi-patch-plus"></i> Thêm sản phẩm</a>
                                        </p>
                                    </div>

                                </div>

                                <div class="table-responsive pt-3">
                                    <ul class="nav nav-tabs" id="myTabs" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="tab1-tab" data-bs-toggle="tab" href="#tab1"
                                                role="tab" aria-controls="tab1" aria-selected="true">Chờ xử lý</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#tab2"
                                                role="tab" aria-controls="tab2" aria-selected="false">Đang hiển thị</a>
                                        </li>

                                    </ul>
                                    <div class="tab-content" id="myTabsContent">
                                        <div class="tab-pane fade show active" id="tab1" role="tabpanel"
                                            aria-labelledby="tab1-tab">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-center">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                #
                                                            </th>
                                                            <th colspan="2">
                                                                Tên sản phẩm
                                                            </th>
                                                            <th>
                                                                Danh mục
                                                            </th>
                                                            <th>
                                                                Người đăng
                                                            </th>
                                                            <th>
                                                                Giới thiệu
                                                            </th>
                                                            <th>
                                                                Trạng thái
                                                            </th>

                                                            <th colspan="3">
                                                                Hành động
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($cxn as $pro)
                                                            <tr id="p{{ $pro->id }}">
                                                                <td>
                                                                    {{ $loop->index + 1 }}
                                                                </td>
                                                                <td>
                                                                    {{ trim(substr($pro->name, 0, 10)) }}
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        @if ($pro->avt)
                                                                            <img src="{{ asset('storage/' . $pro->avt) }}"
                                                                                alt="{{ $pro->avt }}" width="100"
                                                                                height="100">
                                                                        @endif
                                                                    </center>
                                                                </td>
                                                                <td>
                                                                    {{ $pro->id_field }}
                                                                </td>
                                                                <td>
                                                                    {{ $pro->id_field }}
                                                                </td>
                                                                <td>
                                                                    {{ $pro->introduction }}
                                                                </td>
                                                                <td>Chưa xác nhận</td>



                                                                <td>
                                                                    <a class="fas fa-cog function" style="color:blue"
                                                                        title="Sửa"
                                                                        href="{{ route('admin.editPro', $pro->product_slug) }}"></a>
                                                                </td>
                                                                <td>
                                                                    {{-- <a
                                                            href="javascript:void(0)"onclick="deleteProduct({{ $pro->id }})">
                                                            <i class="bi bi-trash" style="font-size: 23px"></i>
                                                        </a> --}}
                                                                    <form name="frmXoa" method="POST"
                                                                        action="{{ route('admin.deletesp', ['id' => $pro->id]) }}"
                                                                        class="delete-form"
                                                                        data-id = "{{ $pro->id }}">
                                                                        {{ csrf_field() }}
                                                                        <input type="hidden" name="_method"
                                                                            value="DELETE" />
                                                                        <button type="submit" class="btn btn-link"><i
                                                                                class="fas fa-trash-alt function"
                                                                                style="color:red"></i></button>
                                                                    </form>
                                                                </td>
                                                                <td>

                                                                <form action="/thaydoitrangthai" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $pro->id }}">
                                                                    <button type="submit" class="btn btn-primary">Xác
                                                                        nhận</button>
                                                                </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-center">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                #
                                                            </th>
                                                            <th colspan="2">
                                                                Tên sản phẩm
                                                            </th>
                                                            <th>
                                                                Danh mục
                                                            </th>
                                                            <th>
                                                                Người đăng
                                                            </th>
                                                            <th>
                                                                Giới thiệu
                                                            </th>
                                                            <th>
                                                                Trạng thái
                                                            </th>

                                                            <th colspan="2">
                                                                Hành động
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($xn as $pro)
                                                            <tr id="p{{ $pro->id }}">
                                                                <td>
                                                                    {{ $loop->index + 1 }}
                                                                </td>
                                                                <td>
                                                                    {{ trim(substr($pro->name, 0, 10)) }}
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        @if ($pro->avt)
                                                                            <img src="{{ asset('storage/' . $pro->avt) }}"
                                                                                alt="{{ $pro->avt }}" width="100"
                                                                                height="100">
                                                                        @endif
                                                                    </center>
                                                                </td>
                                                                <td>
                                                                    {{ $pro->id_field }}
                                                                </td>
                                                                <td>
                                                                    {{ $pro->id_field }}
                                                                </td>
                                                                <td>
                                                                    {{ $pro->introduction }}
                                                                </td>
                                                                <td>
                                                                 Xác nhận
                                                                </td>


                                                                <td>
                                                                    <a class="fas fa-cog function" style="color:blue"
                                                                        title="Sửa"
                                                                        href="{{ route('admin.editPro', $pro->product_slug) }}"></a>
                                                                </td>
                                                                <td>
                                                                    {{-- <a
                                                            href="javascript:void(0)"onclick="deleteProduct({{ $pro->id }})">
                                                            <i class="bi bi-trash" style="font-size: 23px"></i>
                                                        </a> --}}
                                                                    <form name="frmXoa" method="POST"
                                                                        action="{{ route('admin.deletesp', ['id' => $pro->id]) }}"
                                                                        class="delete-form"
                                                                        data-id = "{{ $pro->id }}">
                                                                        {{ csrf_field() }}
                                                                        <input type="hidden" name="_method"
                                                                            value="DELETE" />
                                                                        <button type="submit" class="btn btn-link"><i
                                                                                class="fas fa-trash-alt function"
                                                                                style="color:red"></i></button>
                                                                    </form>
                                                                </td>

                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <!-- Hiển thị phân trang -->
                                        <div class="pagination justify-content-center">
                                            {{ $cxn->links('pagination::bootstrap-4') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a
                                href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i
                                class="mdi mdi-heart text-danger"></i></span>
                    </div>
                </footer>
                <!-- partial -->
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
    <script>
        $(document).ready(function() {
            $('.delete-form').submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Bạn có chắc chắn?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Thoát',
                    confirmButtonText: 'Vâng, tôi chắc chắn!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: $(this).attr('method'),
                            url: $(this).attr('action'),
                            data: $(this).serialize(),
                            success: function() {
                                Swal.fire(
                                        'Thành công!',
                                        'Bạn đã xóa thành công.',
                                        'success'
                                    ),
                                    setTimeout(function() {
                                        location.reload();
                                    }, 1000);
                            }
                        });
                    }
                });
            });
        });
    </script>
