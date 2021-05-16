<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ Session::token() }}"> 
  <title>Choco | @yield('title') </title>


  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

  <!-- Toastr style -->
  <link href="{{ asset('assets/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

  <!-- Gritter -->
  <link href="{{ asset('assets/js/plugins/gritter/jquery.gritter.css') }}" rel="stylesheet">
  @stack('custom_script')
  <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>
<body>

  <!-- Wrapper-->
  <div id="wrapper">

    <!-- Navigation -->
    @include('admin.layouts.navigation')

    <!-- Page wraper -->
    <div id="page-wrapper" class="gray-bg">

      <!-- Page wrapper -->
      @include('admin.layouts.topnavbar')

      <!-- Main view  -->
      @yield('content')

      <!-- Footer -->
      @include('admin.layouts.footer')

    </div>
    <!-- End page wrapper-->

  </div>
  <!-- End wrapper-->
@include('admin.layouts.scripts')
@stack('scripts')
</body>
</html>
