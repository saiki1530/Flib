@extends('layouts\layoutUser-2')

@section('title')
    Home CFF
@endsection
@push('styles')
    <link rel="stylesheet" href="/assets/css/project.css">
@endpush
@section('noidung')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Projects</h2>
        <ol>
          <li><a href="{{route('home')}}">Home</a></li>
          <li>Projects</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Our Projects Section ======= -->
    <section id="projects" class="projects">
      <div class="container" data-aos="fade-up">

        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
          data-portfolio-sort="original-order">

          <ul class="portfolio-flters" data-aos="fade-up" data-aos-delay="100">
            <li class="set-coler"><a href="{{route('project')}}">All</a></li>
            @foreach ($field as $item)
            <li class="db"><a class="db" href="{{route('project-field',['id' => $item->id])}}">{{$item->name}}</a></li>
            @endforeach
          </ul><!-- End Projects Filters -->
                <div class="show-project">
                  @foreach ($data as $item)
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
                </div>


        </div>

      </div>
    </section><!-- End Our Projects Section -->

  </main>
@endsection