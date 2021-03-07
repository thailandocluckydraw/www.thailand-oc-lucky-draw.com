@extends('website.layouts.master')

{{-- @section('my-style')

@endsection --}}

@section('page-content')
    <!-- Start Slider Area -->
    <div class="intro-area intro-area-2">
        <div class="bg-wrapper">
            <img src="{{ asset('website/img/background/bg2.jpg') }}" alt="">
        </div>
        <div class="intro-content">
            <div class="slider-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <!-- layer 1 -->
                            <div class="layer-1 wow fadeInUp" data-wow-delay="0.3s">
                                <h2 class="title2">Play lottery everyday and win big amount</h2>
                            </div>
                            <!-- layer 2 -->
                            <div class="layer-2 wow fadeInUp" data-wow-delay="0.5s">
                                <h5 style="text-align: center;"><span style="color: #000080;">All World Famous <span style="color: #ff0000;">Thai lotto tips</span>,&nbsp;<span style="color: #ff0000;">Thai lottery VIP&nbsp;Paper<span style="color: #000080;">,&nbsp;</span>Thai lottery sure number<span style="color: #000080;">,</span> Thai lottery special paper<span style="color: #000080;">,</span> Thai lottery pair<span style="color: #000080;">,</span> Thai lottery magazine<span style="color: #000080;">,</span> Thai lottery down tips<span style="color: #000080;">,</span> Tass paper<span style="color: #000080;">,</span> sure single digit<span style="color: #000080;">,</span> magazine touch tips</span> Available Here on Our Website..</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Slider Area -->
    
    <!--Start lottry result area -->
    <div class="payment-history-area bg-color-2 fix area-padding" id="lottery-result">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h3>Thailand OC Lottery Results Today</h3>
                        <p>The new draw lottery result is shown below. Wait for the result if no result is shown.</p>
                    </div>
                </div>
            </div>
            @if (count($data) > 0)
                <div class="row">
                    @foreach ($data as $item)
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                            <h4 class="text-red">
                                <img src="{{ asset('website/img/icon/new.gif') }}">
                                <span class="text-warning">Draw Date: {{ date('M d, Y - h:i A', strtotime($item->created_at)) }}</span>
                                <span class="text-info">|</span>
                                <span>Draw Number: THAI-{{ $item->lottery_number }} </span>
                                <img src="{{ asset('website/img/icon/new.gif') }}">
                            </h4>
                        </div>
                    @endforeach  
                    
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <br /><br />
                        <a class="s-menu" href="{{ route('/lottery-results') }}">View Old Results</a>
                    </div>                      
                </div>
            @else
                <div class="row">
                    <div class="col-12 text-center">
                        <p class="text-red">No lottery results found</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- End lottry result area -->
    
    <!-- Start About Area -->
    <div class="about-area about-area-3 fix area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="about-video">
                        <img src="{{ asset('website/img/about/ab.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="about-content">
                        <div class="section-headline">
                            <h3>Thailand OC Lucky Draw provides high secure system</h3>
                        </div>
                        <div class="about-company">
                            <div class="single-about">
                                <span class="about-text">Professional team</span>
                                <span class="about-text">Server secure payments</span>
                                <span class="about-text">Live chat support</span>
                            </div>
                            <div class="single-about">
                                <span class="about-text">Goal achivment</span>
                                <span class="about-text">Worldwide services company</span>
                                <span class="about-text">Marketing expert policy</span>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
        </div>
    </div>
    <!-- End About Area -->

@endsection

{{-- @section('my-script')

@endsection --}}