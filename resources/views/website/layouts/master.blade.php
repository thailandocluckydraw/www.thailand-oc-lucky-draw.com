<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Thailand OC Lucky Draw</title>
        <meta name="description" content="Thailand OC Lucky Draw">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- favicon -->		
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('website/img/logo/favicon.png') }}">

        <!-- all css here -->

        <!-- bootstrap v3.3.6 css -->
        <link rel="stylesheet" href="{{ asset('website/css/bootstrap.min.css') }}">
        <!-- owl.carousel css -->
        <link rel="stylesheet" href="{{ asset('website/css/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('website/css/owl.transitions.css') }}">
        <!-- Animate css -->
        <link rel="stylesheet" href="{{ asset('website/css/animate.css') }}">
        <!-- meanmenu css -->
        <link rel="stylesheet" href="{{ asset('website/css/meanmenu.min.css') }}">
        <!-- font-awesome css -->
        <link rel="stylesheet" href="{{ asset('website/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('website/css/themify-icons.css') }}">
        <!-- magnific css -->
        <link rel="stylesheet" href="{{ asset('website/css/magnific.min.css') }}">
        <!-- style css -->
        <link rel="stylesheet" href="{{ asset('website/style.css') }}">
        <!-- responsive css -->
        <link rel="stylesheet" href="{{ asset('website/css/responsive.css') }}">

        <!-- modernizr css -->
        <script src="{{ asset('website/js/vendor/modernizr-2.8.3.min.js') }}"></script>

        <!-- Start custom css -->
        @yield('my-style') 
        <!-- End custom css -->
    </head>
    <body>
        @include('website.layouts.header')

        @yield('page-content')

        @include('website.layouts.footer')

        <!-- all js here -->

		<!-- jquery latest version -->
		<script src="{{ asset('website/js/vendor/jquery-1.12.4.min.js') }}"></script>
		<!-- bootstrap js -->
		<script src="{{ asset('website/js/bootstrap.min.js') }}"></script>
		<!-- owl.carousel js -->
		<script src="{{ asset('website/js/owl.carousel.min.js') }}"></script>
		<!-- magnific js -->
        <script src="{{ asset('website/js/magnific.min.js') }}"></script>
        <!-- wow js -->
        <script src="{{ asset('website/js/wow.min.js') }}"></script>
        <!-- meanmenu js -->
        <script src="{{ asset('website/js/jquery.meanmenu.js') }}"></script>
		<!-- plugins js -->
		<script src="{{ asset('website/js/plugins.js') }}"></script>
		<!-- main js -->
		<script src="{{ asset('website/js/main.js') }}"></script>
        
        <!-- Start custom script -->
        @yield('my-script')
        <!-- End custom script -->
    </body>
</html>