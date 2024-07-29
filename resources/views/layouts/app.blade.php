<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title id="project_title">@yield('title')</title>

    <link rel="icon" href="{{ asset('assets/images/site_logo.png') }}">
    <!-- Scripts -->
    <script src="{{ asset('assets/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/flickity.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/fullscreen.css') }}" rel="stylesheet">

    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/flickity.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/fullscreen.js') }}"></script>

    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('assets/css/Image_expanding_animation.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">


</head>

@yield('style')

@php
    $site_info = App\Models\Setting::first();

@endphp

<body>



    <div>


        @include('layouts.includes.nav')

        <main>
            @yield('content')
        </main>

        @include('layouts.includes.contact')

    </div>








    <script>
        // Get the button
        let mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    <script src="{{ asset('assets/js/site.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>


</body>

</html>
