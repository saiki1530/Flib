@extends('layouts\layoutUser-2')

@section('title')
    Home CFF
@endsection
@push('styles')
    <link rel="stylesheet" href="/assets/css/donwload.css">
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
        <div class="button-back-donwload">
            <a href="{{route('project-details',['id' =>$id_project ])}}">Trở lại</a>
          </div>
          <div class="body-donwload">
              <span>Link source</span>
              <div class="item-body-donwload">
                  <a href="{{$data['source']}}">{{$data['source']}}</a>
              </div>
              <span>Link ppt</span>
              <div class="item-body-donwload">
                <a href="{{$data['ppt']}}">{{$data['ppt']}}</a>
            </div>
          </div>
    </main><!-- End #main -->
@endsection
@push('scripts')
   
  @endpush