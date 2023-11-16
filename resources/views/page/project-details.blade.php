@extends('layouts\layoutUser-2')

@section('title')
    Home CFF
@endsection
@push('styles')
    <link rel="stylesheet" href="/assets/css/project.css">
    <link rel="stylesheet" href="{{ asset('/assets/css/favourite.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/cmt.css') }}">
@endpush
@section('noidung')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Project Details</h2>
        <ol>
          <li><a href="{{route('home')}}">Home</a></li>
          <li>Project Details</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Projet Details Section ======= -->
    @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    <section id="project-details" class="project-details">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="position-relative h-100">
          <div class="slides-1 portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">
              @foreach ($listImg as $item)
                <div class="swiper-slide" id="item-show-benner">
                  @php
                    $imagePath = $item;

                    // Loại bỏ dấu ngoặc vuông và ngoặc kép từ chuỗi
                    $cleanedPath = str_replace(['["', '"]'], '', $imagePath);

                    // Lấy tên file từ đường dẫn đã làm sạch
                    $fileName = basename($cleanedPath);
                  @endphp
                  <img src="/upload/images/project/{{$fileName}}" alt="">
                </div>
              @endforeach

            </div>
            <div class="swiper-pagination"></div>
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>

        </div>

        <div class="row justify-content-between gy-4 mt-4">

          <div class="col-lg-8">
            <div class="portfolio-description">
              <h2>{{$data->name}}</h2>
              <p>
                @php
                    $decodedHTML = html_entity_decode($data->introduction);
                @endphp
                {{$decodedHTML}}
              </p>
            </div>
          </div>

          <div class="col-lg-3">
            <div class="portfolio-info">
              <h3>Project information</h3>
              <ul>
                <div>
                    <div class="project-item-favourite">
                        @if ($check != "")
                            <form action="{{route('delete-favourite')}}" method="post">
                                @csrf
                                @if(Auth::check())
                                    <input type="hidden" name="id_users" value="{{ Auth::user()->id }}">
                                @endif
                                <input type="hidden" name="id_project" value="{{$data->id}}">
                                <button class="favourite-button-love" type="submit"> <i class="fa-solid fa-check item-icon-check"></i> </button>
                            </form>
                        @else
                            <form action="{{route('new-favourite')}}" method="post">
                                @csrf
                                @if(Auth::check())
                                    <input type="hidden" name="id_users" value="{{ Auth::user()->id }}">
                                @endif
                                <input type="hidden" name="id_project" value="{{$data->id}}">
                                <button class="favourite-button" type="submit"> <i class="fa-solid fa-heart item-icon-heart"></i> </button>
                            </form>
                        @endif
                        <div class="project-item-repost">
                            <div class="item-report">
        
                            </div>
                        </div>
                        
                    </div>
                </div>

                {{-- PHần nút respot --}}

                @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        {{-- phần để hiện nút report --}}

          <div class="project-item-report">
                <button id="report-button-id" class="report-button" onclick="myFunction()">Report</button>
          </div>
          <div class="body-button-donwload">
            <form action="{{route('donwload')}}" method="post">
              @csrf
                <input type="hidden" name="id_project" value="{{$data->id}}">
                <input class="item-button-donwload" type="submit" value="Donwload">
            </form>
        </div>
        </div>
              </ul>
            </div>
          </div>

        </div>

      </div>
      <div class="body-project-item-report">
        <div id="item-report-id" class="item-report">
            <div class="background-report">
            </div>
            <form action="{{route('report')}}" method="post">
                @csrf
                <div class="content-report">
                    @if(Auth::check())
                        <input type="hidden" name="id_users" value="{{ Auth::user()->id }}">
                    @endif
                    <input type="hidden" name="id_project" value="{{$data->id}}">
                    <textarea class="content-report-text" name="your_text" rows="4" cols="50" placeholder="Nhập nội dung bạn muốn tố cáo"></textarea>
                    <div class="content-report-button">
                        <button class="report-button" type="submit">Report</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
      
    </section><!-- End Projet Details Section -->

  </main><!-- End #main -->
@endsection
@push('scripts')
    <script src="{{ asset('/assets/js/favourite.js') }}"></script>
    <script src="{{ asset('/assets/js/cmt.js') }}"></script>
  @endpush