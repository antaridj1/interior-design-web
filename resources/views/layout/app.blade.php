<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link rel="shortcut icon" href="{{asset('assets/img/logo.png')}}">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('asset/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('asset/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('asset/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('asset/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('asset/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('asset/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('asset/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('asset/css/style.css')}}" rel="stylesheet">


  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  @yield('container')

  <!-- Vendor JS Files -->
  <script src="{{asset('asset/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('asset/vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{asset('asset/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('asset/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('asset/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('asset/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('asset/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('asset/js/main.js')}}"></script>

</body>

</html>