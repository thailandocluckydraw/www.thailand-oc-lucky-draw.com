<!-- header start -->
<header class="header-one">
    <!-- Start top bar -->
    <div class="topbar-area">
        <div class="container">
            <div class="row">
                <div class=" col-md-8 col-sm-8 col-xs-12">
                    <div class="topbar-left">
                        <ul>
                            <li><a><i class="fa fa-clock-o"></i> Live support</a></li>
                            <li><a><i class="fa fa-envelope"></i> info@thailand-oc-lucky-draw.com</a></li> 
                        </ul>  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End top bar -->
    <!-- header-area start -->
    <div id="sticker" class="header-area header-area-2 hidden-xs">
        <div class="container">
            <div class="row">
                <!-- logo start -->
                <div class="col-md-3 col-sm-3">
                    <div class="logo">
                        <!-- Brand -->
                        <a class="navbar-brand " href="{{ route('/') }}">
                            <img src="{{ asset('website/img/logo/logo.png') }}" width="150" alt="">
                        </a>
                    </div>
                    <!-- logo end -->
                </div>
                <div class="col-md-9 col-sm-9">
                    <div class="header-right-link">
                        <!-- search option end -->
                        <a class="s-menu" href="#lottery-result">Results</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header-area end -->
    <!-- mobile-menu-area start -->
    <div class="mobile-menu-area hidden-lg hidden-md hidden-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mobile-menu">
                        <div class="logo">
                            <a href="{{ route('/') }}"><img src="{{ asset('website/img/logo/logo.png') }}" alt="" /></a>
                        </div>
                        <nav id="dropdown">
                            <ul>
                                <li><a href="{{ route('/') }}">Home</a></li>
                                <li><a href="#lottery-result">Results</a></li>
                            </ul>
                        </nav>
                    </div>					
                </div>
            </div>
        </div>
    </div>
    <!-- mobile-menu-area end -->		
</header>
<!-- header end -->