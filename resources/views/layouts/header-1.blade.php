<header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="{{route('home')}}" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1>FPT Poly Flib<span>.</span></h1>
        </a>

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="{{route('home')}}" class="active">Home</a></li>
                {{-- <li><a href="about.html">About</a></li>
                <li><a href="services.html">Services</a></li> --}}
                <li><a href="{{route('project')}}">Projects</a></li>
                <li><a href="blog.html">Review</a></li>
                @if (Auth::check())
                    <li class="dropdown">
                        <a href="#">
                            <img class="rounded-full mr-2" src="{{ Auth::user()->avatar }}" width="20" height="20" alt="avatar">
                            <span>{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="w-full">
                            <li class="hover:bg-slate-100"><a href="#">thông tin </a></li>
                            <li class="hover:bg-slate-100"><a href="#">project</a></li>
                            <li class="hover:bg-slate-100">
                                <form class="py-[10px] px-[20px]" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <input type="submit" value="đăng xuất">
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li><a href="{{ route('login') }}">đăng nhập</a></li>
                @endif
            </ul>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero">

    <div class="info d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <form action="{{ route('search') }}" class="form_box d-flex justify-content-between w-100" method="GET" name="search">
                        @csrf
                        <div class="input-group">
                            <button type="submit" class="btn btn-get-started mr-0 pr-0" id="submit">
                                <i class="fa fa-university" aria-hidden="true"></i>
                            </button>
                            <input type="search" id="form1" name="searchteacher" placeholder="Tìm kiếm thông tin..." data-aos="fade-up" data-aos-delay="200" class="form-control btn-get-started" style="margin-left:-10;" />
                        </div>
                    </form>

                    <p data-aos="fade-up">Khám phá và theo dõi sản phẩm yêu thích một cách thuận lợi. Giao diện thân thiện, dễ sử dụng. Tận hưởng trải nghiệm lưu trữ sản phẩm tại đây!
                        </p>
                </div>
            </div>
        </div>
    </div>

    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

        <div class="carousel-item active" style="background-image: url(assets/img/pn1.png)">
        </div>
        <div class="carousel-item" style="background-image: url(assets/img/pn2.png)"></div>
        <div class="carousel-item" style="background-image: url(assets/img/pn3.png)"></div>
        <div class="carousel-item" style="background-image: url(assets/img/pn4.png)"></div>

        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

    </div>

</section>
