<!DOCTYPE html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>
        @yield('title')
    </title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.svg')}}" />


    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-5.0.0-alpha-2.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/LineIcons.2.0.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/tiny-slider.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/glightbox.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lindy-uikit.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/base-style.css')}}" />

    @include('layouts/AlertMessage')
</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <div class="preloader">
        <div class="loader">
            <div class="spinner">
                <div class="spinner-container">
                    <div class="spinner-rotator">
                        <div class="spinner-left">
                            <div class="spinner-circle"></div>
                        </div>
                        <div class="spinner-right">
                            <div class="spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('layouts/Header')



    @yield('content')



    @include('layouts/Footer')


    <script src="{{ asset('assets/js/bootstrap.5.0.0.alpha-2-min.js')}}"></script>
    <script src="{{ asset('assets/js/tiny-slider.js')}}"></script>
    <script src="{{ asset('assets/js/count-up.min.js')}}"></script>
    <script src="{{ asset('assets/js/imagesloaded.min.js')}}"></script>
    <script src="{{ asset('assets/js/isotope.min.js')}}"></script>
    <script src="{{ asset('assets/js/glightbox.min.js')}}"></script>
    <script src="{{ asset('assets/js/wow.min.js')}}"></script>
    <script src="{{ asset('assets/js/main.js')}}"></script>

</body>


</html>
