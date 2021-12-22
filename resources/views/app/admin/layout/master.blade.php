<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>L-TIX Studio @yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{url('admin/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{url('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{url('admin/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{url('admin/vendors/typicons/typicons.css')}}">
  <link rel="stylesheet" href="{{url('admin/vendors/simple-line-icons/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{url('admin/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  @yield('custom_css')
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{url('admin/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{url('admin/images/favicon.png')}}" />
</head>
<body>
  <?php date_default_timezone_set('Asia/Jakarta'); ?>
  <div class="container-scroller"> 
    <!-- partial:partials/_navbar.html -->
    {{View::make('app.admin.layout.navbar')}}
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      {{View::make('app.admin.layout.setting_panel')}}
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      {{View::make('app.admin.layout.sidebar')}}
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          {{-- <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Library</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
          </nav> --}}
            @yield('content')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        {{View::make('app.admin.layout.footer')}}
        <!-- partial -->
        </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{url('admin/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  @yield('plugin_js')
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{url('admin/js/off-canvas.js')}}"></script>
  <script src="{{url('admin/js/hoverable-collapse.js')}}"></script>
  <script src="{{url('admin/js/template.js')}}"></script>
  <script src="{{url('admin/js/settings.js')}}"></script>
  <script src="{{url('admin/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  @yield('custom_js')
  <!-- End custom js for this page-->
</body>

</html>