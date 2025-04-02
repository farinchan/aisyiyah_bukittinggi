<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('seo')
    <meta name="author" content="Fajri Rinaldi Chan - https://gariskode.com">
    <link rel="icon" href="{{ asset('storage/setting/favicon.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('storage/setting/favicon.png') }}" />

    <!-- ========== Start Stylesheet ========== -->
    <link href="{{ asset("front/css/bootstrap.min.css")}}" rel="stylesheet" />
    <link href="{{ asset("front/css/font-awesome.min.css")}}" rel="stylesheet" />
    <link href="{{ asset("front/css/flaticon-set.css")}}" rel="stylesheet" />
    <link href="{{ asset("front/css/magnific-popup.css")}}" rel="stylesheet" />
    <link href="{{ asset("front/css/owl.carousel.min.css")}}" rel="stylesheet" />
    <link href="{{ asset("front/css/owl.theme.default.min.css")}}" rel="stylesheet" />
    <link href="{{ asset("front/css/animate.css")}}" rel="stylesheet" />
    <link href="{{ asset("front/css/bootsnav.css")}}" rel="stylesheet" />
    <link href="{{ asset("front/style.css")}}" rel="stylesheet">
    <link href="{{ asset("front/css/responsive.css")}}" rel="stylesheet" />
    <!-- ========== End Stylesheet ========== -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="{{ asset('front/js/html5/html5shiv.min.js') }}"></script>
      <script src="{{ asset('front/js/html5/respond.min.js') }}"></script>
    <![endif]-->

    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">

    @yield('styles')

</head>

<body>

    <!-- Preloader Start -->
    {{-- <div class="se-pre-con"></div> --}}
    <!-- Preloader Ends -->

    @include('front.partials.header')

    @yield('content')

   @include('front.partials.footer')



    <!-- jQuery Frameworks
    ============================================= -->
    <script src="{{ asset('front/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/js/equal-height.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('front/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('front/js/modernizr.custom.13711.js') }}"></script>
    <script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front/js/wow.min.js') }}"></script>
    <script src="{{ asset('front/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('front/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('front/js/count-to.js') }}"></script>
    {{-- <script src="{{ asset('front/js/jquery.nice-select.min.js') }}"></script> --}}
    <script src="{{ asset('front/js/Chart.min.js') }}"></script>
    <script src="{{ asset('front/js/custom-chart.js') }}"></script>
    <script src="{{ asset('front/js/bootsnav.js') }}"></script>
    <script src="{{ asset('front/js/main.js') }}"></script>

    @include('sweetalert::alert')
    @yield('scripts')


</body>

</html>
