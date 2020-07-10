@extends('layouts.home_nav')
@section('title', '新闻中心-LENKENG-朗强科技')
@section('description', '管理系统后台')
@section('keyword', 'HDMI 4K')
@section('css')
    <link href="{{asset('css/news.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="banners">
        <img src="{{asset('img/news.png')}}" class="img-responsive" alt="Responsive image">
    </div>
    <div class="state row">
        <div class="col-xs-12 col-md-2"></div>
        <div class="col-xs-0 col-md-8">
            <ol class="breadcrumb">
                <li><a href="/">首页</a></li>
                <span class="glyphicon glyphicon-menu-right"></span>
                <li class="active">公司动态</li>
            </ol>
        </div>
        <div class="col-xs-12 col-md-2"></div>
    </div>
    <div class="my_news_list row">
        <div class="col-xs-0 col-sm-1 col-md-2"></div>
        <div class="news_list col-xs-12 col-sm-8 col-md-8">
            <div class="first_one news col-xs-12 col-sm-12 col-md-12 row">
                <div class="col-xs-12 col-sm-6 col-md-6" style="padding: 0!important;">
                    <img src="{{asset('limg/news1.png')}}" class="img-responsive" alt="">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="title_tops"></div>
                    <div class="new_title">朗强科技荣获2018年“广东省优秀自主品牌”</div>
                    <div class="new_content">
                        8月9日，2018年广东企业500强、优秀自主品牌发布大会在广州市白云国际会议中心隆重举行。广东省企业联合会、广东省企业家协会在大会上发布了2018年广东省最佳自主品牌、
                    </div>
                    <div class="title_tops"></div>
                    <div class="get_detail">了解详情<span class="iconfont icon-jiantouyouzuo"></span></div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 row" style="padding: 0!important;">
               <div class="col-xs-12 col-sm-6 col-md-6 news_two" >
                   <div class="second_new">
                       <img src="{{asset('limg/news1.png')}}" class="img-responsive" alt="">
                       <div class="new_title">朗强科技荣获2018年“广东省优秀自主品牌”</div>
                       <div class="new_content">
                           8月9日，2018年广东企业500强、优秀自主品牌发布大会在广州市白云国际会议中心隆重举行。广东省企业联合会、广东省企业家协会在大会上发布了2018年广东省最佳自主品牌、
                       </div>
                       <div class="get_detail">了解详情<span class="iconfont icon-jiantouyouzuo"></span></div>
                   </div>
               </div>
                <div class="col-xs-12 col-sm-6 col-md-6 news_two">
                    <div class="second_new">
                        <img src="{{asset('limg/news1.png')}}" class="img-responsive" alt="">
                        <div class="new_title">朗强科技荣获2018年“广东省优秀自主品牌”</div>
                        <div class="new_content">
                            8月9日，2018年广东企业500强、优秀自主品牌发布大会在广州市白云国际会议中心隆重举行。广东省企业联合会、广东省企业家协会在大会上发布了2018年广东省最佳自主品牌、
                        </div>
                        <div class="get_detail">了解详情<span class="iconfont icon-jiantouyouzuo"></span></div>
                    </div>
                </div>
            </div>
            <div class=" col-xs-12 col-sm-12 col-md-12 row" style="padding: 0!important;">
                <div class="col-xs-12 col-sm-6 col-md-6 news_two ">
                    <div class="second_new">
                        <img src="{{asset('limg/news1.png')}}" class="img-responsive" alt="">
                        <div class="new_title">朗强科技荣获2018年“广东省优秀自主品牌”</div>
                        <div class="new_content">
                            8月9日，2018年广东企业500强、优秀自主品牌发布大会在广州市白云国际会议中心隆重举行。广东省企业联合会、广东省企业家协会在大会上发布了2018年广东省最佳自主品牌、
                        </div>
                        <div class="get_detail">了解详情<span class="iconfont icon-jiantouyouzuo"></span></div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 news_two ">
                    <div class="second_new">
                        <img src="{{asset('limg/news1.png')}}" class="img-responsive" alt="">
                        <div class="new_title">朗强科技荣获2018年“广东省优秀自主品牌”</div>
                        <div class="new_content">
                            8月9日，2018年广东企业500强、优秀自主品牌发布大会在广州市白云国际会议中心隆重举行。广东省企业联合会、广东省企业家协会在大会上发布了2018年广东省最佳自主品牌、
                        </div>
                        <div class="get_detail">了解详情<span class="iconfont icon-jiantouyouzuo"></span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-0 col-sm-1 col-md-2"></div>
    </div>
{{--    {{$news->onEachSide(5)->links()}}--}}
    {{ $news->links()}}
    <script>
        var screen_width = window.screen.width;
        var tips = 4;
        if(screen_width<=768){
            tips = 2;
            $(".news").removeClass('first_one');
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