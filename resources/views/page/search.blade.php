@extends('layouts.layoutUser-2')

@section('title', 'Kết quả tìm kiếm')

@section('noidung')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Projects</h2>
        <ol>
          <li><a href="{{route('home')}}">Home</a></li>
          <li><a href="#">Tìm kiếm từ khóa</a></li>
           <li>{{$searchTerm}}</li>
        </ol>

      </div>
    </div>

<section class="contact_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 align="center" >Kết quả tìm kiếm từ khóa " <span class="text-danger">{{ $searchTerm }}</span>"</h4>
                <div class="card-body">
                    <table class="table" border="1" style="text-align:center">
                        @if ($fields->isNotEmpty())
                            <h2>Kết quả tìm kiếm cho Field:</h2>
                            <ul>
                                @foreach ($fields as $field)
                                    <li>{{ $field->name }}</li>
                                    <!-- Hiển thị thông tin khác nếu cần -->
                                @endforeach
                            </ul>
                        @else
                            <p></p>
                        @endif
                        @if ($projects->isNotEmpty())
                       <br><br><br>
                            <ul>
                                @foreach ($projects as $item)
                                    <!-- Hiển thị thông tin khác nếu cần -->
                                    <a href="{{route('project-details',['id' => $item->id])}}">
                                        <div class="item-project">
                                            <div class="item-project-img">
                                              @php
                                               $imagePath = $item->avt;

                                                // Loại bỏ dấu ngoặc vuông và ngoặc kép từ chuỗi
                                                $cleanedPath = str_replace(['["', '"]'], '', $imagePath);

                                                // Lấy tên file từ đường dẫn đã làm sạch
                                                $fileName = basename($cleanedPath);
                                              @endphp
                                                <img src="{{asset('upload/images/project/'.$fileName.'')}}" alt="">
                                            </div>
                                            <div class="item-project-info">
                                                <span>{{$item->name}}</span>
                                                <p>october 24, 2023</p>
                                            </div>
                                        </div><!-- end -->
                                      </a>
                                @endforeach
                            </ul>
                        @else
                            <p>Không có kết quả cho Project.</p>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


<!--================End Home Banner Area =================-->

<!--================Contact Area =================-->

@endsection
