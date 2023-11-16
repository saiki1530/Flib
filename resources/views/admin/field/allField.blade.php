@extends('layouts\layoutAD')

@section('title')
    Quản lý tài khoản
@endsection

@section('noidung')
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
                                <h2 class="card-title">Môn học</h2>
                                <div class="d-flex justify-content-between">
                                    <div class="col pl-0">
                                        <p class="card-description d-flex">
                                            <a href="{{ route('admin.createfield') }}" style="text-decoration: none;"><i
                                                    class="bi bi-patch-plus"></i> Thêm môn học</a>
                                            {{-- <button type="button" class="btn btn-primary" onclick="prepareAdd();"><i
                                                    class="fas fa-plus"></i> Thêm mới</button> --}}
                                        </p>
                                    </div>

                                </div>
                                <div class="table-responsive pt-3">


                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="admin" role="tabpanel"
                                            aria-labelledby="admin-tab">
                                            <!-- Nội dung cho tab admin -->
                                            <table class="table table-bordered text-center">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            #
                                                        </th>
                                                        <th>
                                                            Tên môn học
                                                        </th>
                                                        <th>
                                                            Số lượng
                                                        </th>

                                                        <th>
                                                            Ngày cập nhật
                                                        </th>

                                                        <th colspan="2">
                                                            Hành động
                                                        </th>
                                                    </tr>
                                                </thead>
                                                @php $i = 1 @endphp
                                                @foreach ($field as $field)

                                                        <tr>
                                                            <td>
                                                                {{ $i++ }}
                                                            </td>
                                                            <td>
                                                                {{ $field->name }}
                                                            </td>

                                                            <td>
                                                                {{ $field->amount }}
                                                            </td>
                                                            <td>

                                                                {{ date('d-m-Y', strtotime($field->updated_at)) }}
                                                            </td>


                                                            <td>
                                                                <a href="{{ url('field/editfd', $field->id) }}"><i
                                                                        class="bi bi-pen" style="font-size: 23px"></i></a>
                                                            </td>
                                                            {{-- <td>
                                                                <form name="frmXoa" method="POST"
                                                                    action="{{ route('admin.deletefd', ['id' => $field->id]) }}"
                                                                    class="delete-form" data-id = "{{ $field->id }}">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="_method" value="DELETE" />
                                                                    <button type="submit" class="btn btn-link"><i
                                                                            class="fas fa-trash-alt function"
                                                                            style="color:red"></i></button>
                                                                </form>
                                                            </td> --}}
                                                        </tr>

                                                @endforeach

                                            </table>

                                        </div>

                                    </div>

                                    <!-- Hiển thị phân trang -->

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
    <!-- Thêm mã JavaScript sau thẻ tab HTML -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTab a').on('click', function(e) {
                e.preventDefault();
                var tab = $(this).attr('aria-controls');
                $.get('/loadtabdata/' + tab, function(data) {
                    $('#tab-content').html(data);
                });
            });
        });
    </script>

@endsection
<!-- JavaScript -->
