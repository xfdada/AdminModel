@extends('layouts.home_nav')
@section('title', '解决方案-LENKENG-朗强科技')
@section('description', '管理系统后台')
@section('keyword', 'HDMI 4K')
@section('css')
    <link href="{{asset('css/solution.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="banners">
        <img src="{{asset('img/solution_ban.png')}}" class="img-responsive" alt="Responsive image">
    </div>
    <div class="state row">
        <div class="col-xs-12 col-md-2"></div>
        <div class="col-xs-0 col-md-8">
            <ol class="breadcrumb" style="background: none;">
                <li><a href="/">首页</a></li>
                <span class="glyphicon glyphicon-menu-right"></span>
                <li class="active">解决方案</li>

            </ol>
        </div>
        <div class="col-xs-12 col-md-2"></div>
    </div>
    <div class="my_news_list row">
        <div class="col-xs-0 col-sm-1 col-md-2"></div>
        <div class="news_list col-xs-12 col-sm-8 col-md-8">
            <div class="s_ant row">
                <div class="s_img col-xs-12 col-sm-3"><img src="{{asset('img/controller.png')}}" class="img-responsive" alt=""></div>
                <div class="s_detail col-xs-12 col-sm-9">
                    <div class="s_title"><span>控制室</span><a href="">></a></div>
                    <div class="s_content">控制室广泛的应用于安防、电力、能源等众多领域。无论是监控、指挥调度、决策、还是在协作，朗强控制室解决方案使得控制室显示
                        画面呈现高清还原、信号传输零延时，使得控制室的运行更加稳定、灵活和高效。
                    </div>
                    <div class="s_product"><p>相关产品:</p><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a>
                        <a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a>
                    </div>
                </div>
            </div>
            <div class="s_ant row">
                <div class="s_img col-xs-12 col-sm-3"><img src="{{asset('img/huiyi.png')}}" class="img-responsive" alt=""></div>
                <div class="s_detail col-xs-12 col-sm-9">
                    <div class="s_title"><span>会议室</span><a href="">></a></div>
                    <div class="s_content">会议室是高效沟通的重要场所。朗强会议室解决方案具备稳定性、灵活性和易用性，满足对各类会议室环境的需求。
                    </div>
                    <div class="s_product">
                        <p>相关产品:</p><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a>
                        <a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a>
                    </div>
                </div>
            </div>
            <div class="s_ant row">
                <div class="s_img col-xs-12 col-sm-3"><img src="{{asset('img/jiaoxue.png')}}" class="img-responsive" alt=""></div>
                <div class="s_detail col-xs-12 col-sm-9">
                    <div class="s_title"><span>教室</span><a href="">></a></div>
                    <div class="s_content">随着现代化教学方式和教育理念的发展，教育设施也紧跟教育技术的变化而发展，教室环境的需求也越来越复杂，朗强教室解决方案可以
                        满足多种环境下的教育教学需求，助力教育教学更加生动高效。
                    </div>
                    <div class="s_product">
                        <p>相关产品:</p><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a>
                        <a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a>
                    </div>
                </div>
            </div>
            <div class="s_ant row">
                <div class="s_img col-xs-12 col-sm-3"><img src="{{asset('img/jiatong.png')}}" class="img-responsive" alt=""></div>
                <div class="s_detail col-xs-12 col-sm-9">
                    <div class="s_title"><span>轨道交通</span><a href="">></a></div>
                    <div class="s_content">控制室是许多行业的重要组成部分。无论是监控、决策、响应、控制、协作还是交流，ATEN宏正控制室解决方案使控制室的未来更接近 于给高效的工作和更好的决策重新定义的控制室。
                    </div>
                    <div class="s_product">
                        <p>相关产品:</p><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a>
                        <a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a><a href="#">LKV372PRO</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-0 col-sm-1 col-md-2"></div>
    </div>
    <script>
        var screen_width = window.screen.width;
        if(screen_width<=768){

        }
        $(".uls").css('background','#FFF');
        $(".lis").children('a').css('color','#000');
        $("#logo").attr('src',"{{asset('img/bluelogo.png')}}");
        $("#logo_font").css('color','#474747');
        $(".lists").css('color','#000');
        $(".top_head").css('background','#E6E6E6');
        $(".top_head_list").css('color','#474747');
        $(".line-s").css('background','#474747');
        function hiddens(){
            window.event? window.event.cancelBubble = true : e.stopPropagation();
            $(".search_input").removeClass('search_input_active');
            $(".cancel_input").css('display','none');
        }
    </script>
@endsection