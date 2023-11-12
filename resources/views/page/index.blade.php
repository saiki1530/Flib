@extends('layouts\layoutUser-1')

@section('title')
    Home CFF
@endsection

@section('noidung')
    <!-- ======= Get Started Section ======= -->
    <section id="get-started" class="get-started section-bg">
        <div class="container">

        <!-- ======= Get Started Section ======= -->
        <section id="get-started" class="get-started section-bg">
            <div class="container">

            </div>
        </section><!-- End Get Started Section -->

        <!-- ======= Constructions Section ======= -->
        <section id="constructions" class="constructions">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Top Donwload</h2>
                    <p>Nulla dolorum nulla nesciunt rerum facere sed ut
                        inventore quam porro nihil id ratione ea sunt
                        quis dolorem
                        dolore earum</p>
                </div>

                <div class="row gy-4">
                    @foreach ($topDonwload as $item)
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                            <a href="{{route('project-details',['id' => $item->id])}}">
                                <div class="card-item">
                                    <div class="row">
                                        <div class="col-xl-5">
                                            <div class="card-bg" style="background-image: url(assets/img/{{$item->avt}});">
                                            </div>
                                        </div>
                                        <div class="col-xl-7 d-flex align-items-center">
                                            <div class="card-body">
                                                <h4 class="card-title">{{$item->name}}</h4>
                                                <p>{{$item->introduction}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div><!-- End Card Item -->
                    @endforeach
                </div>

            </div>
        </section><!-- End Constructions Section -->

        <!-- ======= New Project  ======= -->
        <section id="constructions" class="constructions">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>New Project</h2>
                    <p>Nulla dolorum nulla nesciunt rerum facere sed ut
                        inventore quam porro nihil id ratione ea sunt
                        quis dolorem
                        dolore earum</p>
                </div>

                <div class="row gy-4">
                    @foreach ($newProject as $item)
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                            <a href="{{route('project-details',['id' => $item->id])}}">
                                <div class="card-item">
                                    <div class="row">
                                        <div class="col-xl-5">
                                            <div class="card-bg" style="background-image: url(assets/img/{{$item->avt}});">
                                            </div>
                                        </div>
                                        <div class="col-xl-7 d-flex align-items-center">
                                            <div class="card-body">
                                                <h4 class="card-title">{{$item->name}}</h4>
                                                <p>{{$item->introduction}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div><!-- End Card Item -->
                   
                    @endforeach

                </div>

            </div>
        </section>
        <!-- End New Project -->

        <!-- ======= Alt Services Section ======= -->
       

        <!-- ======= Features Section ======= -->
        <section id="features" class="features section-bg">
            <div class="container" data-aos="fade-up">

                <ul class="nav nav-tabs row  g-2 d-flex">
                    @php
                        $i = 0;        
                    @endphp
                    @foreach ($field as $item)
                        @php
                            $i++;
                        @endphp
                        <li class="nav-item col-3">
                            <a class="nav-link @if($i === 1) active show @endif" data-bs-toggle="tab" data-bs-target="#tab-{{$i}}">
                                <h4>{{$item->name}}</h4>
                            </a>
                        </li><!-- End tab nav item -->
                    @endforeach

                </ul>

                <div class="tab-content">
                    @php
                        $x = 0;
                    @endphp
                    @foreach ($projectField as $item)
                    @php
                        $x ++;
                    @endphp
                        <div class="tab-pane @if($x === 1) active show @endif" id="tab-{{$x}}">
                            <div class="row">
                                <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center"
                                    data-aos="fade-up" data-aos-delay="100">
                                    <h3>{{$item->name}}</h3>
                                    <p class="fst-italic">
                                        {{$item->introduction}}
                                    </p>
                                </div>
                                <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                                    <a href="{{route('project-details',['id' => $item->id])}}">
                                        <img src="assets/img/{{$item->avt}}" alt class="img-fluid">
                                    </a>
                                </div>
                                
                            </div>
                        </div><!-- End tab content item -->
                    @endforeach
                    

                </div>

            </div>

            </div>
        </section><!-- End Get Started Section -->


    <!-- ======= Alt Services Section ======= -->
    <section id="alt-services" class="alt-services">
        <div class="container" data-aos="fade-up">

            <div class="row justify-content-around gy-4">
                <div class="col-lg-6 img-bg" style="background-image: url(assets/img/benner21.jpg);" data-aos="zoom-in" data-aos-delay="100"></div>

                <div class="col-lg-5 d-flex flex-column justify-content-center">
                    <h3>Enim quis est voluptatibus aliquid
                        consequatur fugiat</h3>
                    <p>Esse voluptas cumque vel exercitationem.
                        Reiciendis est hic accusamus. Non ipsam et
                        sed minima temporibus
                        laudantium. Soluta voluptate sed facere
                        corporis dolores excepturi</p>

                    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="100">
                        <i class="bi bi-easel flex-shrink-0"></i>
                        <div>
                            <h4><a href class="stretched-link">Lorem
                                    Ipsum</a></h4>
                            <p>Voluptatum deleniti atque corrupti
                                quos dolores et quas molestias
                                excepturi sint occaecati cupiditate
                                non provident</p>
                        </div>
                    </div><!-- End Icon Box -->

                    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="200">
                        <i class="bi bi-patch-check flex-shrink-0"></i>
                        <div>
                            <h4><a href class="stretched-link">Nemo
                                    Enim</a></h4>
                            <p>At vero eos et accusamus et iusto
                                odio dignissimos ducimus qui
                                blanditiis praesentium voluptatum
                                deleniti atque</p>
                        </div>
                    </div><!-- End Icon Box -->

                    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-brightness-high flex-shrink-0"></i>
                        <div>
                            <h4><a href class="stretched-link">Dine
                                    Pad</a></h4>
                            <p>Explicabo est voluptatum asperiores
                                consequatur magnam. Et veritatis
                                odit. Sunt aut deserunt minus
                                aut eligendi omnis</p>
                        </div>
                    </div><!-- End Icon Box -->

                    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-brightness-high flex-shrink-0"></i>
                        <div>
                            <h4><a href class="stretched-link">Tride
                                    clov</a></h4>
                            <p>Est voluptatem labore deleniti quis a
                                delectus et. Saepe dolorem libero
                                sit non aspernatur odit amet.
                                Et eligendi</p>
                        </div>
                    </div><!-- End Icon Box -->

                </div>
            </div>

        </div>
    </section><!-- End Alt Services Section -->

    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">
        <div class="container" data-aos="fade-up"">

            <div class=" section-header">
                <h2>Recent Blog Posts</h2>
                <p>In commodi voluptatem excepturi quaerat nihil
                    error autem voluptate ut et officia
                    consequuntu</p>
            </div>

            <div class="row gy-5">

                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="post-item position-relative h-100">

                        <div class="post-img position-relative overflow-hidden">
                            <img src="assets/img/blog/blog-1.jpg" class="img-fluid" alt>
                            <span class="post-date">December 12</span>
                        </div>

                        <div class="post-content d-flex flex-column">

                            <h3 class="post-title">Eum ad dolor
                                et. Autem aut fugiat debitis</h3>

                            <div class="meta d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person"></i>
                                    <span class="ps-2">Julia
                                        Parker</span>
                                </div>
                                <span class="px-3 text-black-50">/</span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-folder2"></i>
                                    <span class="ps-2">Politics</span>
                                </div>
                            </div>

                            <hr>

                            <a href="blog-details.html" class="readmore stretched-link"><span>Read
                                    More</span><i class="bi bi-arrow-right"></i></a>

                        </div>

                    </div>
                </div><!-- End post item -->

                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="post-item position-relative h-100">

                        <div class="post-img position-relative overflow-hidden">
                            <img src="assets/img/blog/blog-2.jpg" class="img-fluid" alt>
                            <span class="post-date">July 17</span>
                        </div>

                        <div class="post-content d-flex flex-column">

                            <h3 class="post-title">Et
                                repellendus molestiae qui est
                                sed omnis</h3>

                            <div class="meta d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person"></i>
                                    <span class="ps-2">Mario
                                        Douglas</span>
                                </div>
                                <span class="px-3 text-black-50">/</span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-folder2"></i>
                                    <span class="ps-2">Sports</span>
                                </div>
                            </div>

                            <hr>

                            <a href="blog-details.html" class="readmore stretched-link"><span>Read
                                    More</span><i class="bi bi-arrow-right"></i></a>

                        </div>

                    </div>
                </div><!-- End post item -->

                <div class="col-xl-4 col-md-6">
                    <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="300">

                        <div class="post-img position-relative overflow-hidden">
                            <img src="assets/img/blog/blog-3.jpg" class="img-fluid" alt>
                            <span class="post-date">September 05</span>
                        </div>

                        <div class="post-content d-flex flex-column">

                            <h3 class="post-title">Quia
                                assumenda est et veritati tirana
                                ploder</h3>

                            <div class="meta d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person"></i>
                                    <span class="ps-2">Lisa
                                        Hunter</span>
                                </div>
                                <span class="px-3 text-black-50">/</span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-folder2"></i>
                                    <span class="ps-2">Economics</span>
                                </div>
                            </div>

                            <hr>

                            <a href="blog-details.html" class="readmore stretched-link"><span>Read
                                    More</span><i class="bi bi-arrow-right"></i></a>

                        </div>

                    </div>
                </div><!-- End post item -->

            </div>

        </div>
    </section>
    <!-- End Recent Blog Posts Section -->
@endsection
