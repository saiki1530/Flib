@include('admin.layoutAdmin.head')
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('admin.layoutAdmin.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.layoutAdmin.sidebar')
      <!-- partial -->
      <div class="main-panel">
        @yield('main-content')
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('admin.layoutAdmin.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{asset('assetsAdmin/vendors/base/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{asset('assetsAdmin/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('assetsAdmin/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{asset('assetsAdmin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('assetsAdmin/js/off-canvas.js')}}"></script>
  <script src="{{asset('assetsAdmin/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('assetsAdmin/js/template.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('assetsAdmin/js/dashboard.js')}}"></script>
  <script src="{{asset('assetsAdmin/js/data-table.js')}}"></script>
  <script src="{{asset('assetsAdmin/js/jquery.dataTables.js')}}"></script>
  <script src="{{asset('assetsAdmin/js/dataTables.bootstrap4.js')}}"></script>
  <!-- End custom js for this page-->
  @stack('customJS')

</body>
