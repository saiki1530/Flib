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

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
