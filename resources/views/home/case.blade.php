@extends('layouts.home_nav')
@section('title', '工程案例-LENKENG-朗强科技')
@section('description', '工程案例')
@section('keyword', 'HDMI 4K')
@section('css')
    <link href="{{asset('css/case.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="banners">
        <img src="{{asset('img/case_ban.png')}}" class="img-responsive" alt="Responsive image">
    </div>
    <div class="state row" style="margin-top: 15px!important;">
        <div class="col-xs-12 col-md-2"></div>
        <div class="col-xs-0 col-md-8">
            <ol class="breadcrumb" style="background: none;padding-left: 0;">
                <li><a href="/">首页</a></li>
                <span class="glyphicon glyphicon-menu-right"></span>
                <li class="active">案例</li>
            </ol>
        </div>
        <div class="col-xs-12 col-md-2"></div>
    </div>
    <div class="my_news_list row" style="padding-bottom: 30px">
        <div class="col-xs-0 col-md-2"></div>
        <div class="news_list col-xs-12 col-md-8">
            <div class="one_titles actives">政府与公共安全</div>
            <div class="one_titles">交通运输</div>
            <div class="one_titles">教育教学</div>
            <div class="one_titles">广播电视</div>
            <div class="one_titles">消费娱乐</div>
        </div>
        <div class="col-xs-0 col-sm-1 col-md-2"></div>
    </div>
    <div class="my_news_list row">
        <div class="col-xs-0 col-md-2"></div>
        <div class="news_list col-xs-12 col-md-8" style="display: flex;flex-wrap: wrap;">
            <div class="one_case">
                <img src="{{asset('img/classroom.png')}}"class="img-responsive" alt="">
                <div class="more_type"><span>华中科技大学多媒体教学案例</span> <a style="text-align: right" href="#">了解详情<i class="iconfont icon-jiantouyouzuo"></i></a></div>
            </div>
            <div  class="one_case">
                <img src="{{asset('img/classroom.png')}}"class="img-responsive" alt="">
                <div class="more_type"><span>华中科技大学多媒体教学案例</span> <a style="text-align: right" href="#">了解详情<i class="iconfont icon-jiantouyouzuo"></i></a></div>
            </div>
            <div  class="one_case">
                <img src="{{asset('img/classroom.png')}}"class="img-responsive" alt="">
                <div class="more_type"><span>华中科技大学多媒体教学案例</span> <a style="text-align: right" href="#">了解详情<i class="iconfont icon-jiantouyouzuo"></i></a></div>
            </div>
            <div  class="one_case">
                <img src="{{asset('img/classroom.png')}}"class="img-responsive" alt="">
                <div class="more_type"><span>华中科技大学多媒体教学案例</span> <a style="text-align: right" href="#">了解详情<i class="iconfont icon-jiantouyouzuo"></i></a></div>
            </div>

        </div>
        <div class="col-xs-0 col-sm-1 col-md-2"></div>
    </div>
    <script>

        window.onresize = function(){
            var screen_widths = document.documentElement.clientWidth;
            console.log(screen_widths);
            if(screen_widths<=768){

                $(".one_case").css('width','100%')
            }else{
                $(".one_case").css('width','48%')
            }
        };
        var screen_width = window.screen.width;
        if(screen_width<=768){
            $(".one_case").css('width','100%')
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