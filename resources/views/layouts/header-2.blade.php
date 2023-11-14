<header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1>UpConstruction<span>.</span></h1>
        </a>

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="{{url('/Project')}}">Projects</a></li>
                <li><a href="{{ route('reviews.index') }}" class="{{ Route::currentRouteName() == 'reviews.index' ? 'active' : '' }}">review</a></li>
                <li><a href="blog.html">Blog</a></li>
                {{-- <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li><a href="#">Dropdown 1</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                            <ul>
                                <li><a href="#">Deep Dropdown 1</a></li>
                                <li><a href="#">Deep Dropdown 2</a></li>
                                <li><a href="#">Deep Dropdown 3</a></li>
                                <li><a href="#">Deep Dropdown 4</a></li>
                                <li><a href="#">Deep Dropdown 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Dropdown 2</a></li>
                        <li><a href="#">Dropdown 3</a></li>
                        <li><a href="#">Dropdown 4</a></li>
                    </ul>
                </li> --}}
                <li><a href="contact.html">Contact</a></li>
                @if (Auth::check())
                    <li class="dropdown">
                        <a href="#">
                            <img class="rounded-full mr-2" src="{{ Auth::user()->avatar }}" width="30" height="30" alt="avatar">
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
