@extends('layouts.home_nav')
@section('title', $res->p_name.'LENKENG-朗强科技')
@section('description', $res->p_desc)
@section('keyword', 'HDMI 4K')
@section('css')
    <link href="{{asset('css/case.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/product_detail.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
    <script src="https://unpkg.com/swiper/js/swiper.js"> </script>
    <script src="https://unpkg.com/swiper/js/swiper.min.js"> </script>
@endsection
@section('content')
    <div class="banners">
        <img src="{{asset('img/productss.png')}}" class="img-responsive" alt="Responsive image">
    </div>
    <div class="state row">
        <div class="col-xs-12 col-md-2"></div>
        <div class="col-xs-0 col-md-8">
            <ol class="breadcrumb">
                <li><a href="/">首页</a></li>
                <span class="glyphicon glyphicon-menu-right"></span>
                <li><a href="/project">产品</a></li>
                <span class="glyphicon glyphicon-menu-right"></span>
                <li><a href="/case">视频传输</a></li>
                <span class="glyphicon glyphicon-menu-right"></span>
                <li>延长器</li>
                <span class="glyphicon glyphicon-menu-right"></span>
                <li class="active">网线延长传输</li>
            </ol>
        </div>
        <div class="col-xs-12 col-md-2"></div>
    </div>
    <div class="my_news_list row">
        <div class="col-xs-0 col-sm-1 col-md-2"></div>
        <div class="news_list col-xs-12 col-sm-10 col-md-8">
            <div class="p_top row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="swiper-container gallery-top">
                        <div class="swiper-wrapper">
                            @foreach($img as $i)
                            <div class="swiper-slide" ><img  src="{{$i}}" class="img-responsive" alt=""></div>
                            @endforeach
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next second_swiper"></div>
                        <div class="swiper-button-prev second_swiper"></div>
                    </div>
                    <div class="swiper-container gallery-thumbs">
                        <div class="swiper-wrapper">
                            @foreach($img as $i)
                                <div class="swiper-slide" ><img  src="{{$i}}" class="img-responsive" alt=""></div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="p_name">{{$res->p_name}}</div>
                    <div class="p_desc">
                        {{$res->p_desc}}
                    </div>
                </div>
            </div>

            <div class="p_detail">
                <div class="p_line"></div>
                <div class="text-right my_ul">
                    <ul class="p_menu"  id="myTab">
                        <li><a href="#home" class="my_as">产品概述</a><span class="my_line">&#124;</span></li>
                        <li><a href="#profile" class="my_as">规格参数</a><span class="my_line">&#124;</span></li>
                        <li><a href="#messages" class="my_as">功能特性</a><span class="my_line">&#124;</span></li>
                        <li><a href="#settings" class="my_as">服务支持</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="home">{!! $res->p_detail !!}</div>
                    <div class="tab-pane" id="profile">{!! $res->p_params !!}</div>
                    <div class="tab-pane" id="messages">{!! $res->p_pack !!}}</div>
                    <div class="tab-pane" id="settings">{!! $res->p_support !!}</div>
                </div>
            </div>
        </div>
        <div class="col-xs-0 col-sm-1 col-md-2"></div>
    </div>
    <script>
        $(function(){
            $(".tab-content img").each(function(index, element) {
                $(this).addClass('img-responsive');
            });
        })
        var screen_width = window.screen.width;
        var tips = 4;
        if(screen_width<768){
            tips = 2;
            $(".second_swiper").css('display','none');
            $(".my_img").css('width','100%');
            $(".my_ul").removeClass('text-right');
            $(".my_ul").addClass('text-center');
        }
        $(function () {
            $('#myTab a:first').tab('show');
            $('#myTab a:first').css('color','rgba(1,104,183,1)');
        })
        $('#myTab a').click(function (e) {
            $(".my_as").css('color','rgba(0,0,0,1)');
            $(this).css('color','rgba(1,104,183,1)');
            e.preventDefault();
            $(this).tab('show');
        })
        var galleryThumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 10,
            slidesPerView: 4,
            loop: true,
            freeMode: true,
            loopedSlides: 5, //looped slides should be the same
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
        });
        var galleryTop = new Swiper('.gallery-top', {
            spaceBetween: 10,
            loop:true,
            loopedSlides: 5, //looped slides should be the same
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            thumbs: {
                swiper: galleryThumbs,
            },
        });
    </script>
@endsection