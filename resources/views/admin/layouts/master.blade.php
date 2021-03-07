<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <meta name="description" content="Binomo Traders offers a professional trading tool to achieve financial independence.">

    <meta property="og:title" content="Binomo Traders - Forex Trading company" />
    <meta property="og:description" content="Binomo Traders offers a professional trading tool to achieve financial independence." />
    <meta property="og:image" content="{{ asset('website/images/header-logo-1.png') }}" />
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ Auth::user()->name }} - {{ Auth::user()->id }} - Binomo Traders</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('website/images/icon.png') }}">
    <link href="{{ asset('dashboard/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('dashboard/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('dashboard/assets/css/style.css') }}" rel="stylesheet" type="text/css">

    <!-- Start custom css -->
    @yield('my-style') 
    <!-- End custom css -->
</head>
<body>
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"> </div>
        </div>
    </div>
    @include('customer.layouts.header')

    <div class="wrapper">        
        @yield('page-content')
    </div>
    <!-- end wrapper -->

    @include('customer.layouts.footer')

    <!--=========================*
                Scripts
    *===========================-->
    <!-- jQuery  -->
    <script src="{{ asset('dashboard/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/waves.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/jquery.nicescroll.js') }}"></script>
    <!-- App js -->
    <script src="{{ asset('dashboard/assets/js/app.js') }}"></script>
    
    <!-- Start custom script -->
    @yield('my-script')
    <!-- End custom script -->
</body>
</html>