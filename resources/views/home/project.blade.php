@extends('layouts.home_nav')
@section('title', '工程案例与解决方案-LENKENG-朗强科技')
@section('description', '工程案例与解决方案')
@section('keyword', '视频会议,多媒体教学,控制室,轨道交通,游戏娱乐,安防监控,教育系统')
@section('css')
    <link href="{{asset('css/project.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="banners" style="background: #FFF;">

    </div>
    <div class="state row">
        <div class="col-xs-12 col-md-2"></div>
        <div class="col-xs-0 col-md-8">
            <ol class="breadcrumb">
                <li><a href="/">首页</a></li>
                <span class="glyphicon glyphicon-menu-right"></span>
                <li class="active">工程案例与解决方案</li>
            </ol>
        </div>
        <div class="col-xs-12 col-md-2"></div>
    </div>
        <div class="onimg_bg">
            <div class="onimg">
                <span class="onimg_title">应用方案</span>
            </div>
        </div>
    <div class="row pro_list">
        <div class="col-xs-0 col-md-2"></div>
        <div class="col-xs-12 col-md-8">
            <div class="col-xs-6 col-md-6  lefts">
                <div class="pro_list_one my_left">
                    <div class="pro_img"><img src="{{asset('img/huiyi.png')}}" class="img-responsive" alt="视频会议"></div>
                    <div class="news_type"><div class="types">视频会议</div><div  class="iconss"><span class="glyphicon glyphicon-menu-right double"></span><span class="glyphicon glyphicon-menu-right"></span></div></div>
                </div>
                <div class="pro_list_one my_left">
                    <div class="pro_img"><img src="{{asset('img/huiyi.png')}}" class="img-responsive" alt="视频会议"></div>
                    <div class="news_type"><div class="types">控制室</div><div  class="iconss"><span class="glyphicon glyphicon-menu-right double"></span><span class="glyphicon glyphicon-menu-right"></span></div></div>
                </div>
            </div>
            <div class="col-xs-6 col-md-6 rights">
                <div class="pro_list_one my_left">
                    <div class="pro_img"><img src="{{asset('img/huiyi.png')}}" class="img-responsive" alt="视频会议"></div>
                    <div class="news_type"><div class="types">视频会议</div><div  class="iconss"><span class="glyphicon glyphicon-menu-right double"></span><span class="glyphicon glyphicon-menu-right"></span></div></div>
                </div>
                <div class="pro_list_one my_left">
                    <div class="pro_img"><img src="{{asset('img/huiyi.png')}}" class="img-responsive" alt="视频会议"></div>
                    <div class="news_type"><div class="types">控制室</div><div  class="iconss"><span class="glyphicon glyphicon-menu-right double"></span><span class="glyphicon glyphicon-menu-right"></span></div></div>
                </div>
            </div>
        </div>
        <div class="col-xs-0 col-md-2"></div>
    </div>
    <div class="onimg_bg">
        <div class="onimg">
            <span class="onimg_title">工程案例</span>
        </div>
    </div>
    <div class="case row">
        <div class="col-xs-0 col-md-2"></div>
        <div class="col-xs-12 col-md-8">
            <div class="case_one">
                <img src="{{asset('img/game.png')}}" class="img-responsive" alt="游戏娱乐">
                <div class="case_alt">游戏娱乐</div>
            </div>
        </div>
        <div class="col-xs-0 col-md-2"></div>
    </div>
    <div class="case row">
        <div class="col-xs-0 col-md-2"></div>
        <div class="col-xs-12 col-md-8">
            <div class="case_one">
                <img src="{{asset('img/zf.png')}}" class="img-responsive" alt="政府工程">
                <div class="case_alt">政府工程</div>
            </div>
        </div>
        <div class="col-xs-0 col-md-2"></div>
    </div>
    <div class="case row">
        <div class="col-xs-0 col-md-2"></div>
        <div class="col-xs-12 col-md-8">
            <div class="case_one">
                <img src="{{asset('img/af.png')}}" class="img-responsive" alt="安防监控">
                <div class="case_alt">安防监控</div>
            </div>
        </div>
        <div class="col-xs-0 col-md-2"></div>
    </div>
    <div class="case row">
        <div class="col-xs-0 col-md-2"></div>
        <div class="col-xs-12 col-md-8">
            <div class="case_one">
                <img src="{{asset('img/dt.png')}}" class="img-responsive" alt="地铁案例">
                <div class="case_alt">地铁案例</div>
            </div>
        </div>
        <div class="col-xs-0 col-md-2"></div>
    </div>
    <div class="case row">
        <div class="col-xs-0 col-md-2"></div>
        <div class="col-xs-12 col-md-8">
            <div class="case_one">
                <img src="{{asset('img/jy.png')}}" class="img-responsive" alt="教育系统">
                <div class="case_alt">教育系统</div>
            </div>
        </div>
        <div class="col-xs-0 col-md-2"></div>
    </div>
    <script>
        var screen_width = window.screen.width;
        var tips = 4;
        if(screen_width<768){
            tips = 2;
            $(".my_left").css('padding','0');
        }
    </script>
@endsection