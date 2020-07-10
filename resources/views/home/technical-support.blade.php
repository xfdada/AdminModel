@extends('layouts.home_nav')
@section('title', '技术支持-LENKENG-朗强科技')
@section('description', '技术支持')
@section('keyword', 'HDMI 4K 产品常见问题')
@section('css')
    <link href="{{asset('css/t_support.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="banners">
        <img src="{{asset('img/support_ban.png')}}" class="img-responsive" alt="Responsive image">
    </div>
    <div class="state row" style="margin-top: 15px!important;">
        <div class="col-xs-12 col-md-2"></div>
        <div class="col-xs-0 col-md-8">
            <ol class="breadcrumb" style="background: none;padding-left: 0;">
                <li><a href="/">首页</a></li>
                <span class="glyphicon glyphicon-menu-right"></span>
                <li class="active">支持中心</li>
                <span class="glyphicon glyphicon-menu-right"></span>
                <li class="active">技术支持</li>
            </ol>
        </div>
        <div class="col-xs-12 col-md-2"></div>
    </div>
    <div class="support-title">支持中心</div>
    <div class="support_list row">
        <div class="col-xs-0 col-md-2"></div>
        <div class="col-xs-12 col-md-8 row">
            <div class="col-xs-12 col-md-6 ">
                <div class="s_list">
                    <div class="iconfont icon-wentipaichu1 icons"></div>
                    <div class="titles">问题排除</div>
                    <div class="desc">快速搜索常见问题解决方法 </div>
                    <div class="s_bottom">更多详情 <span class="iconfont icon-jiantouyouzuo"></span></div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="s_list">
                    <div class="iconfont icon-tiwenti icons"></div>
                    <div class="titles">提问题</div>
                    <div class="desc">详细描述您的问题，以利于提供准确服务。</div>
                    <div class="s_bottom">更多详情 <span class="iconfont icon-jiantouyouzuo"></span></div>
                </div>
            </div>
        </div>
        <div class="col-xs-0 col-md-2"></div>
    </div>
   <div class="wrap"></div>
    <script>
        var screen_width = window.screen.width;
        var tips = 4;
        if(screen_width<=768){
        }
        $(".one_titles").on('click',function(){
            $(".one_titles").removeClass('actives');
            $(this).addClass('actives');
        })
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