<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CGP | @yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    @stack('css')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/logo.png') }}" />
  </head>
  <body>
    @php
        $user = Auth::user();
    @endphp
    <div class="container-scroller">

      <!-- views/common/admin/navbar -->
        @include('common.admin.navbar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- views/common/admin/sidebar -->
        @include('common.admin.sidebar')
        <!-- partial -->
        <div class="main-panel">
        @yield('main-content')
          <!-- content-wrapper ends -->
          <!-- views/common/admin/footer -->
          @include('common.admin.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('admin/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('admin/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('admin/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin/assets/js/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    @stack('javascript')
    <script src="{{ asset('admin/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('admin/assets/js/todolist.js') }}"></script>
    <script src="{{ asset('admin/assets/js/common/common.js') }}"></script>
    <!-- End custom js for this page -->
  </body>
</html>
