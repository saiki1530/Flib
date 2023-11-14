<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>UpConstruction Bootstrap Template - Index</title>
        <meta content name="description">
        <meta content name="keywords">

        <!-- Favicons -->
        <link href="/assets/img/favicon.png" rel="icon">
        <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
        <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="/assets/css/main.css" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>

    <body>
        @include('layouts.header-2')

        @yield('noidung')
        
        <main id="main">

            <!-- ======= Breadcrumbs ======= -->
            <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
              <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
        
                <h2>Project</h2>
                <ol>
                  <li><a href="index.html">Home</a></li>
                  <li>Project</li>
                </ol>
        
              </div>
            </div><!-- End Breadcrumbs -->
            <!-- ======= Blog Section ======= -->
            <section id="blog" class="blog">
              <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4 posts-list">
                  <div class="col-md-3">
                    <div class="card">
                      <div class="card-header"><h4>Ngành</h4></div>
                      <div class="card-body">
                        <?php
                          $Field = DB::table('Field')->select('id','name')
                          ->get();
                        ?>
                            @foreach($Field as $cate)
                            <label class="d-block">
                              <a href="{{ route('project', ['id' => $cate->id]) }}"><span>{{$cate->name}}</span></a>
                            </label>
                            @endforeach
                      </div>
                    </div>
                  </div>  
                @foreach ($Project as $project)
                  <div class="col-xl-4 col-md-6">
                    <div class="post-item position-relative h-100">
                      <form method="POST" action="{{ route('project.download', ['projectId' => $project->id])}}">
                        @csrf
                      <div class="post-img position-relative overflow-hidden">
                        <span class="post-date">{{$project->source}}</span>
                      </div>
        
                      <div class="post-content d-flex flex-column">
        
                        <h3 class="post-title">{{$project->name}}</h3>
        
                        <div class="meta d-flex align-items-center">
                          <div class="d-flex align-items-center">
                            <i class="bi bi-person"></i> <span class="ps-2">{{$project->id_field}}</span>
                          </div>
                          <span class="px-3 text-black-50">/</span>
                          <div class="d-flex align-items-center">
                            <i class="bi bi-folder2"></i> <span class="ps-2">{{$project->id_users}}</span>
                          </div>
                        </div>
        
                        <p>
                            {{$project->introduction}}
                        </p>
        
                        <hr>
        
                        <button type="submit" class="btn btn-primary" style="color: black">Download</button>
        
                      </div>
                    </form>
                    </div>
                  </div>
                  @endforeach
                </div>
        
              </div>
            </section><!-- End Blog Section -->
        
          </main>

        @include('layouts.footerUser')

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/aos/aos.js"></script>
<script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="/assets/vendor/php-email-form/validate.js"></script>
<!-- Template Main JS File -->
<script src="/assets/js/main.js"></script>
@livewireStyles
</body>

</html>

