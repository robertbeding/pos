<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ config ('app.name') }} | @yield('title')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
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

    {{-- datatable css --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">




    <link href="{{ asset('NAdmin/assets/css/style.css') }}" rel="stylesheet">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



    <!-- SELECT 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">



    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>



    {{-- Sweet Alert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    {{-- <script src="{{ asset('js/functions.js') }}" defer></script> --}}


    <!-- Datatables required scripts -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


  <!-- =======================================================
  * Template Name: NAdmin - v2.2.2
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
  {{-- <script src="{{ asset('NAdmin/assets/vendor/tinymce/tinymce.min.js') }}"></script> --}}
  <script src="{{ asset('NAdmin/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('NAdmin/assets/js/main.js') }}"></script>
  {{-- validasi js --}}
  {{-- <script src="{{ asset('NAdmin/assets/js/validator.min.js')}}"></script> --}}
  <script src="{{ asset('NAdmin/assets/js/jquery.min.js')}}"></script>
  <script src="{{asset('js/validator.min.js')}}"></script>

  <!-- DataTables niceadmin-->
  <script src="{{ asset('NAdmin/assets/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('NAdmin/assets/js/dataTables.bootstrap.min.js') }}"></script>


  <script>
      function preview(selector, temporaryFile, width = 200) { // selector = class, temporaryFile = this.files[0]
          $(selector).empty();
          $(selector).append(`<img src="${window.URL.createObjectURL(temporaryFile)}" width="${width}">`);
      }

  </script>

  {{--@stack('scripts') bertujuan untuk naru script yang di panggil dari layout lain dengan cara @push('scripts')  --}}
  @stack('scripts')
  @yield('scripts')
  <script>
      function numberWithCommas(x) {
          return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      }

  </script>
</body>

</html>