<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="/admin/dashboard">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Bảng điều khiển</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-circle-outline menu-icon"></i>
                <span class="menu-title">Quản lý</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.allsp')}}">Quản lý sản phẩm</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.allus')}}">Quản Lý người dùng</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.allfd')}}">Quản Lý môn học</a></li>

                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/allorder">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Đơn hàng</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/charts/chartjs.html">
                <i class="mdi mdi-chart-pie menu-icon"></i>
                <span class="menu-title">Biểu đồ</span>
            </a>
        </li>
    </ul>
</nav>
