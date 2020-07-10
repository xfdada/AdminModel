@extends('layouts.home_nav')
@section('title','朗强HDMI HDBaseT 单网线延长器产品运用于常德华侨城卡乐星球项目上' )
@section('description','朗强HDMI HDBaseT 单网线延长器产品运用于常德华侨城卡乐星球项目上')
@section('keyword', '高清视频数字传输解')
@section('css')
    <link href="{{asset('css/news_detail.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="banners">
        <img src="{{asset('img/news.png')}}" class="img-responsive" alt="Responsive image">
    </div>
    <div class="state row">
        <div class="col-xs-12 col-md-2"></div>
        <div class="col-xs-0 col-md-10">
            <ol class="breadcrumb">
                <li><a href="/">首页</a></li>
                <span class="glyphicon glyphicon-menu-right"></span>
                <li><a href="/news">工程案例与解决方案</a></li>
                <span class="glyphicon glyphicon-menu-right"></span>
                <li><a href="/news">工程案例</a></li>
                <span class="glyphicon glyphicon-menu-right"></span>
                <li><a href="/news">游戏娱乐</a></li>
                <span class="glyphicon glyphicon-menu-right"></span>
                <li class="active">朗强HDMI HDBaseT 单网线延长器产品运用于常德华侨城卡乐星球项目上</li>
            </ol>
        </div>
    </div>
    <div class="my_news_list row">
        <div class="col-xs-0 col-sm-1 col-md-2"></div>
        <div class="col-xs-12 col-sm-10 col-md-8">
{{--            <h2 class="news_title">{{$banner->n_title}}</h2>--}}
{{--            <div class="new_time">发布时间:{{$banner->n_time}}</div>--}}
{{--            <div class="new_contents">{!! $banner->n_content !!}</div>--}}
            <div class="tui"><div class="prev_new"></div><div class="next_new"></div></div>
        </div>
        <div class="col-xs-0 col-sm-1 col-md-2"></div>
    </div>

    <script>
        var screen_width = window.screen.width;
        var tips = 4;
        if(screen_width<768){
            tips = 2;

        }
    </script>
@endsection