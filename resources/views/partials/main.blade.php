<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ config('app.name') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="shortcut icon" href="{{ URL::asset('assets/img/favicon.ico') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset("assets/img/apple-touch-icon.png") }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset("assets/img/favicon-32x32.png") }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset("assets/img/favicon-16x16.png") }}">
  <link rel="manifest" href="{{ URL::asset("assets/img/site.webmanifest") }}">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ URL::asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  

  <!-- Template Main CSS File -->
  <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet">

  {{-- 
      * Ahmad Shobirin <>
      * Ifan Rifai hardiyanto <ifanrifai24@gmail.com>
  --}}
</head>

<body>

  <!-- ======= Header ======= -->
  @extends('partials.navbar')

  <main id="main">

    @yield('main_content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @extends('partials.footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ URL::asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ URL::asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ URL::asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ URL::asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ URL::asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ URL::asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ URL::asset('assets/vendor/php-email-form/validate.js') }}"></script>



  <!-- Template Main JS File -->
  <script src="{{ URL::asset('assets/js/main.js') }}"></script>

</body>

</html>