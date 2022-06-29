<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ config ('app.name') }} | @yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('NAdmin/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('NAdmin/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('NAdmin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('NAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('NAdmin/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('NAdmin/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('NAdmin/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('NAdmin/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('NAdmin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
  <link href="{{ asset('js/dataTables.bootstrap.min.js') }}" rel="stylesheet">
  

  <!-- Template Main CSS File -->
  <link href="{{ asset('NAdmin/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  @includeIf('layouts.header')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @includeIf('layouts.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>@yield('title')</h1>
      <nav>
        <ol class="breadcrumb">
          @section('breadcrumb')
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
          @show
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <!-- main -->
    @yield('content')
    <!-- End #main -->
  </main>

  <!-- ======= Footer ======= -->
  @includeIf('layouts.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('NAdmin/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('NAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('NAdmin/assets/vendor/chart.js/chart.min.js') }}"></script>
  <script src="{{ asset('NAdmin/assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('NAdmin/assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('NAdmin/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('NAdmin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('NAdmin/assets/vendor/php-email-form/validate.js') }}"></script>

  {{-- validasi js --}}

  
 <!-- Template Main JS File -->
 <script src="{{ asset('NAdmin/assets/js/main.js') }}"></script>
 <script src="{{ asset('NAdmin/assets/js/jquery.min.js') }}"></script>
 <script src="{{ asset('NAdmin/assets/js/jquery.dataTables.js') }}"></script>
 <script src="{{ asset('NAdmin/assets/js/dataTables.min.js') }}"></script>

 @method('script')
</body>

</html>