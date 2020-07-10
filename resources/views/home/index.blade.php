@extends('layouts.home_nav')
@section('title', 'lenkeng 朗强科技')
@section('description', 'lenkeng 朗强科技')
@section('keyword', 'HDMI 4K')
@section('css')
    <link rel="stylesheet" href="{{asset('css/swiper.css')}}">
    <script src="{{asset('js/swiper.min.js')}}"> </script>
    <link href="{{asset('css/index.css')}}" rel="stylesheet" type="text/css"/>

    <style>

        .swiper-container{
            width: 100%;       /*100vw的意思是宽度和浏览器窗口的宽度一样*/
            height:46vw;      /*100vh的意思是宽度和浏览器窗口的高度一样*/
        }

        .my-bullet-active {
            width: 30px;
            height: 3px;
            border-radius: 0;
            background: rgba(255,255,255,1);
            opacity: 1;
        }
        .my-actives {
            height: 20px!important;
            width: auto!important;
            background: none!important;
            color: #FFF!important;
            text-align: left!important;
            border-left: 2px solid #FFF!important;
            border-radius: 0!important;
            padding-left: 10px!important;
            font-size: 14px!important;
        }
        .swiper-pagination-bullet{
            width: 30px;
            height: 3px;
            border-radius: 0;
            background: rgba(255,255,255,1);
        }

        .swiper-bullet{
            /*border-left: 2px solid rgba(255,255,255,0.2);*/
            color:rgba(255,255,255,0.2);
            text-align: left;
            font-size: 10px;
            padding-left: 20px;
            width: auto;
            height: 20px ;
            border-radius: 0;
            background: none!important;
            opacity: 1!important;
            transition: all .3s;
            z-index: 99;
        }
       .swiper-container-h .swiper-pagination-bullet{
            margin: 6px 0 !important;
            display: block;
            height: 20px;
            width: 300px;
           color: rgba(255,255,255,0.4);
            background: none;
           text-align: left;
           padding-left: 15px;
           font-size: 12px;
           opacity: 1;
        }
        .swiper-container-h .swiper-pagination-bullet-active{
            margin: 6px 0;
            display: block;
            font-size: 14px;
            height: 20px;
            width: 300px;
            background: none;
            border-left: 2px solid #FFF;
            color: rgba(255,255,255,1) !important;
            text-align: left;
            padding-left: 15px;
        }
        .one li:nth-child(1){
            transform: translateY(26px);
            color: #FFF!important;
        }
        .one li:nth-child(2){
            transform: translateY(-26px);
        }

        .second li:nth-child(2){
            color: #FFF!important;
        }
        .three li:nth-child(2){
            transform: translateY(26px);
        }
        .three li:nth-child(3){
            color: #FFF!important;
            transform: translateY(-26px);
        }
        .four li:nth-child(2){
            transform: translateY(52px);
        }
        .four li:nth-child(4){
            color: #FFF!important;
            transform: translateY(-52px);
        }
        /*.imgs{*/
        /*    -webkit-transform: scale(1.3);*/
        /*    transform: scale(1.3);*/
        /*    transition: all .6s;*/
        /*}*/
        /*.swiper-slide-duplicate-active .imgs{*/
        /*    transform: scale(1);*/
        /*}*/
    </style>
@endsection
@section('content')

<div class="swiper-container swiper-container-h">
    <div class="swiper-wrapper">
        @foreach($banner as $v)
            <div class="swiper-slide"><img src="{{$v->ba_urls}}" alt="{{$v->ba_desc}}" class="img-responsive imgs"></div>
        @endforeach
    </div>
    <!-- Add Pagination -->
    <div style="left: 7.5%;top: 80%;" class="swiper-scroller swiper-pagination swiper-pagination-v"></div>
</div>

    <div style="padding-bottom:40px">
        <div class="title_center">产品中心</div>
        <div class="line_img"><img  src="{{asset('img/duns.png')}}" alt=""></div>
    </div>
    <div class="content_list row" style="background: #F5F6F9;">
        <div class="col-xs-0 col-md-2"></div>
        <div class="col-xs-12 col-md-8 row" >
            <div class="col-xs-6 col-md-3 ">
                <a href="#" class="product_list">
                    <div class="ps_img"><img src="{{asset('img/cs.png')}}" alt="cs"><div style="padding: 15px 0" class="ps_title">视频传输</div></div>

                </a>

            </div>
            <div class="col-xs-6 col-md-3 ">
                <a href="#" class="product_list">
                    <div class="ps_img"><img src="{{asset('img/KVM.png')}}" alt="KVM"><div style="padding: 15px 0" class="ps_title">KVM</div></div>

                </a>

            </div>
            <div class="col-xs-6 col-md-3 ">
                <a href="#" class="product_list">
                    <div class="ps_img"><img src="{{asset('img/sp.png')}}" alt="sp"><div style="padding: 15px 0" class="ps_title">视频信号处理</div></div>

                </a>

            </div>
            <div class="col-xs-6 col-md-3 ">
                <a href="#" class="product_list">
                    <div class="ps_img"><img src="{{asset('img/mt.png')}}" alt="mt"><div style="padding: 15px 0" class="ps_title">多媒体视频播放</div></div>
                </a>

            </div>
        </div>
        <div class="col-xs-0 col-md-2"></div>
    </div>
<div style="background: #FFF;padding-bottom: 40px">
    <div class="title_center" style="padding-top: 30px;margin-top: 0">案例</div>
    <div class="line_img"><img  src="{{asset('img/duns.png')}}" alt=""></div>
</div>
    <div class="content_list row">
        <div class="col-xs-0 col-md-0"></div>
        <div class="col-xs-12 col-md-12 row">
            <div class="col-xs-12 col-md-12 row">
                <div class="col-xs-12 col-md-4 " style="padding: 4px!important;">
                    <div class="ups"><img src="{{asset('img/controller.png')}}"  class="img-responsive" alt="">
                        <div class="text">
                            <a href="#"><img src="{{asset('img/mores.png')}}" alt=""></a>
                            <div class="text_content">
                                <p class="t_title">游戏娱乐</p>
                                <div class="lines"></div>
                                <p class="t_content">游戏娱乐解决方案</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-md-4 " style="padding: 4px!important;">
                    <div class="ups"><img src="{{asset('img/controller.png')}}"  class="img-responsive" alt="">
                        <div class="text">
                            <a href="#"><img src="{{asset('img/mores.png')}}" alt=""></a>
                            <div class="text_content">
                                <p class="t_title">控制室</p>
                                <div class="lines"></div>
                                <p class="t_content">控制室解决方案</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-md-4 " style="padding: 4px!important;">
                    <div class="ups"><img src="{{asset('img/schooles.png')}}"  class="img-responsive" alt="">
                        <div class="text">
                            <a href="#"><img src="{{asset('img/mores.png')}}" alt=""></a>
                            <div class="text_content">
                                <p class="t_title">多媒体教学</p>
                                <div class="lines"></div>
                                <p class="t_content">多媒体教学解决方案</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xs-12 col-md-12 row">
                <div class="col-xs-12 col-md-6 " style="padding: 4px!important;">
                    <div class="ups"><img src="{{asset('img/huiyis.png')}}" class="img-responsive" alt="">
                        <div class="text">
                            <a href="#"><img src="{{asset('img/mores.png')}}" alt=""></a>
                            <div class="text_content">
                                <p class="t_title">视频会议</p>
                                <div class="lines"></div>
                                <p class="t_content">视频会议解决方案</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-md-6" style="padding: 4px!important;">
                    <div class="ups">
                        <img src="{{asset('img/ditie.png')}}" class="img-responsive" alt="">
                        <div class="text">
                            <a href="#"><img src="{{asset('img/mores.png')}}" alt=""></a>
                            <div class="text_content">
                                <p class="t_title">轨道交通</p>
                                <div class="lines"></div>
                                <p class="t_content">轨道交通解决方案</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-0 col-md-2"></div>
    </div>
    <div class="more_btn" style="padding-top: 42px;"><a>查看更多</a></div>
    <div style="padding-bottom: 40px">
        <div class="title_center">新闻中心</div>
        <div class="line_img"><img  src="{{asset('img/duns.png')}}" alt=""></div>
    </div>

    <div class="news_types sto_height row" style="margin-bottom: 20px!important;">
        <div class="col-xs-0 col-sm-1 col-md-1"></div>
        <div class="col-xs-12 col-sm-10 col-md-10 row new_detail " style="height: 100%">
            <div class="col-md-1"></div>
            <div class="col-xs-12 col-sm-12 col-md-5 one_news" style="margin-bottom:10px !important;padding: 0;height: 100%;">
                <div class="new_imgs" style="overflow: hidden;"><img src="{{asset('img/newss.png')}}"  class="img-responsive" alt=""></div>
                <div class="new_title" style="padding: 0 5%">亮相2019环球资源消费电子展 <span class="iconfont icon-arrow-right" style="float: right"></span></div>
                <div class="new_content" style="padding: 0  5%">
                    8月9日，2018年广东企业500强、优秀自主品牌发布大会在广州市白云国际会议中心隆重举行。
                    广东省企业联合会、广东省企业家协会在大会上发布了2018年广东省最佳自主品牌、018年广东
                    省最佳自主品牌、广东...
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-5 right_news news_list sub_height rightss"style="padding: 0">
                <div  class="one_news row" style="margin-bottom: 2%!important;">
                    <div class="col-xs-12 col-md-4 my_imgs" style="padding: 0;overflow: hidden"><img src="{{asset('limg/small_news.png')}}"  class="img-responsive" alt=""></div>
                    <div class="col-xs-12 col-md-8 my_content">
                        <div class="new_title" style="padding: 0 5%">亮相2019环球资源消费电子展 <span class="iconfont icon-arrow-right" style="float: right"></span></div>
                        <div class="new_content" style="padding: 0 5%">
                            8月9日，2018年广东企业500强、优秀自主品牌发布大会在广州市白云国际会议中心隆重举行。
                            广东省企业联合会、广东省企业家协会在大会上发布了2018年广东省最佳自主品牌、018年广东
                            省最佳自主品牌、广东...
                        </div>
                    </div>
                </div>
                <div style="padding: 0"class="one_news row">
                    <div class="col-xs-12 col-md-4 my_imgs" style="padding: 0;overflow: hidden"><img src="{{asset('limg/small_news.png')}}"  class="img-responsive" alt=""></div>
                    <div class="col-xs-12 col-md-8 my_content">
                        <div class="new_title" style="padding: 0 5%">亮相2019环球资源消费电子展<span class="iconfont icon-arrow-right" style="float: right"></span></div>
                        <div class="new_content" style="padding: 0 5%">
                            8月9日，2018年广东企业500强、优秀自主品牌发布大会在广州市白云国际会议中心隆重举行。
                            广东省企业联合会、广东省企业家协会在大会上发布了2018年广东省最佳自主品牌、018年广东
                            省最佳自主品牌、广东...
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="col-xs-0 col-sm-1 col-md-1"></div>
    </div>
    <div class="more_btn" style="background: #F5F6F9;"><a>查看更多</a></div>
    <div class="smart row" style="padding: 60px 0 60px 0;">
        <div class="col-xs-0 col-sm-0 col-md-1"></div>
        <div class="s_test col-xs-4 col-sm-4 col-md-4" style="text-align: -webkit-center;">
            <img src="{{asset('img/ipcolor.png')}}" class="img-responsive" alt="">
            <div class="s_font">自有创新领先技术ipcolor协议</div>
        </div>
        <div class="s_test col-xs-4 col-sm-4 col-md-2"  style="text-align: -webkit-center;">
            <img src="{{asset('img/safe.png')}}" class="img-responsive" alt="">
            <div class="s_font">稳定可靠的产品</div>
        </div>
        <div class="s_test col-xs-4 col-sm-4 col-md-4"  style="text-align: -webkit-center;">
            <img src="{{asset('img/Pi.png')}}" class="img-responsive" alt="">
            <div class="s_font">全球超过100个国家营销网络
            </div>
        </div>
         <div class="col-xs-0 col-sm-0 col-md-1"></div>
    </div>

    <script>
        var tips = 4;
        window.onresize = function(){
            var screen_width = document.documentElement.clientWidth;
            if(screen_width<=768){
                tips = 2;
                $(".swiper-slide").css('height','auto');
                $(".rightss").removeClass('right_news');
                $(".one_news").css('padding','0px');
                $(".news_types").removeClass('sto_height');
                $(".news_types").addClass('m_height');
                $(".news_list").removeClass('sub_height');
            }else{
                $(".swiper-slide").css('height','auto');
                $(".rightss").removeClass('right_news');
                $(".one_news").css('padding','0px');
                $(".news_types").addClass('sto_height');
                $(".news_types").removeClass('m_height');
                $(".news_list").addClass('sub_height');
            }
        };
        var screen_width = window.screen.width;
        if(screen_width<=768){
            $(".news_types").removeClass('sto_height');
            $(".news_types").removeClass('sto_height');
            $(".news_types").addClass('m_height');
            $(".news_list").removeClass('sub_height');
        }


        {{--var second_swiper=new Swiper('.second-one',{--}}
        {{--    direction: 'vertical',--}}
        {{--    loop:true,--}}
        {{--    pagination: {--}}
        {{--        el: '.swiper-pagination',--}}
        {{--        clickable: true,--}}
        {{--        bulletActiveClass: 'my-bullet-actives',--}}
        {{--        renderBullet: function (index,className) {--}}
        {{--            var span = '';--}}
        {{--            if(index>=1){--}}
        {{--                return span;--}}
        {{--            }--}}
        {{--            @foreach($banner as $v)--}}
        {{--                span+= '<span style class="' + className + '">{{$v->ba_desc}}</span>';--}}
        {{--            @endforeach--}}
        {{--            return span;--}}
        {{--        },--}}
        {{--    },--}}
        {{--});--}}
        var className = "swiper-pagination-bullet";
        var swiperH = new Swiper('.swiper-container-h', {//横向轮播图
            spaceBetween: 50,
            loop:true,
            autoplay:true,
            bulletActiveClass: 'my-bullet-actives',
            pagination: {
                el: '.swiper-pagination-v',
                clickable: true,
                renderBullet: function (index,className) {
                    var span = '';
                    if(index>=1){
                        return span;
                    }
                    @foreach($banner as $v)
                        span+= '<li style="line-height:20px;" class="'+className+'">{{$v->ba_desc}}</li>';
                    @endforeach
                        return "<ul class='my_lis  one ' style='padding-left: 0'>"+span+"</ul>";
                },
            },
            on:{
                slideChange: function(){
                    console.log(this.activeIndex);
                    if(this.activeIndex===1){
                        $('.my_lis').removeClass('second');
                        $('.my_lis').removeClass('three');
                        $('.my_lis').removeClass('four');
                        $('.my_lis').addClass('one');
                    }else if(this.activeIndex===2){
                        $('.my_lis').removeClass('one');
                        $('.my_lis').removeClass('three');
                        $('.my_lis').removeClass('four');
                        $('.my_lis').addClass('second');
                    }else if(this.activeIndex===3){
                        $('.my_lis').removeClass('one');
                        $('.my_lis').removeClass('second');
                        $('.my_lis').removeClass('four');
                        $('.my_lis').addClass('three');
                    }else if(this.activeIndex===4){
                        $('.my_lis').removeClass('one');
                        $('.my_lis').removeClass('second');
                        $('.my_lis').removeClass('three');
                        $('.my_lis').addClass('four');
                    }else if(this.activeIndex===5){
                        $('.my_lis').removeClass('second');
                        $('.my_lis').removeClass('three');
                        $('.my_lis').removeClass('four');
                        $('.my_lis').addClass('one');
                    }
                },
            },
        });

        {{--var swiperV = new Swiper('.swiper-container-v', { //垂直轮播图--}}
        {{--    direction: 'vertical',--}}
        {{--    loop:true,--}}
        {{--    spaceBetween: 50,--}}
        {{--    bulletActiveClass: 'my-bullet-actives',--}}
        {{--    pagination: {--}}
        {{--        el: '.swiper-pagination-v',--}}
        {{--        clickable: true,--}}
        {{--        renderBullet: function (index,className) {--}}
        {{--            var span = '';--}}
        {{--            if(index>=1){--}}
        {{--                return span;--}}
        {{--            }--}}
        {{--            @foreach($banner as $v)--}}
        {{--                span+= '<li style="line-height:20px;" class="'+className+'">{{$v->ba_desc}}</li>';--}}
        {{--            @endforeach--}}
        {{--                return "<ul class='my_lis  one ' style='padding-left: 0'>"+span+"</ul>";--}}
        {{--        },--}}
        {{--    },--}}
        {{--    on:{--}}
        {{--        slideChange: function(){--}}
        {{--            console.log(this.activeIndex);--}}
        {{--           if(this.activeIndex===1){--}}
        {{--               $('.my_lis').removeClass('second');--}}
        {{--               $('.my_lis').removeClass('three');--}}
        {{--               $('.my_lis').addClass('one');--}}
        {{--           }else if(this.activeIndex===2){--}}
        {{--               $('.my_lis').removeClass('one');--}}
        {{--               $('.my_lis').removeClass('three');--}}
        {{--               $('.my_lis').addClass('second');--}}
        {{--           }else if(this.activeIndex===3){--}}
        {{--               $('.my_lis').removeClass('one');--}}
        {{--               $('.my_lis').removeClass('second');--}}
        {{--               $('.my_lis').addClass('three');--}}
        {{--           }else if(this.activeIndex===4){--}}
        {{--               $('.my_lis').removeClass('second');--}}
        {{--               $('.my_lis').removeClass('three');--}}
        {{--               $('.my_lis').addClass('one');--}}
        {{--           }--}}
        {{--        },--}}
        {{--    },--}}
        {{--});--}}
        $(".my_lis li").on('click',function(){
            if($(this).index()===0){
                $('.my_lis').removeClass('second');
                $('.my_lis').removeClass('three');
                $('.my_lis').removeClass('four');
                $('.my_lis').addClass('one');
            }else if($(this).index()===1){
                $('.my_lis').removeClass('one');
                $('.my_lis').removeClass('three');
                $('.my_lis').removeClass('four');
                $('.my_lis').addClass('second');
            }else if($(this).index()===2){
                $('.my_lis').removeClass('one');
                $('.my_lis').removeClass('second');
                $('.my_lis').removeClass('four');
                $('.my_lis').addClass('three');
            }
            else if($(this).index()===3){
                $('.my_lis').removeClass('one');
                $('.my_lis').removeClass('second');
                $('.my_lis').removeClass('three');
                $('.my_lis').addClass('four');
            }
        });

        $(".product_list").on('mouseover',function(){
            var name = $(this).children('div').children('img').attr('alt');
            if(name==='cs'){
                $(this).children('div').children('img').attr('src',"{{asset('img/csb.png')}}");
            }else if(name==='KVM'){
                $(this).children('div').children('img').attr('src',"{{asset('img/KVMb.png')}}");
            }else if(name==='sp'){
                $(this).children('div').children('img').attr('src',"{{asset('img/spb.png')}}");
            }else if(name==='mt'){
                $(this).children('div').children('img').attr('src',"{{asset('img/mtb.png')}}");
            }

        });
        $(".product_list").on('mouseout',function(){
            var name = $(this).children('div').children('img').attr('alt');
            if(name==='cs'){
                $(this).children('div').children('img').attr('src',"{{asset('img/cs.png')}}");
            }else if(name==='KVM'){
                $(this).children('div').children('img').attr('src',"{{asset('img/KVM.png')}}");
            }else if(name==='sp'){
                $(this).children('div').children('img').attr('src',"{{asset('img/sp.png')}}");
            }else if(name==='mt'){
                $(this).children('div').children('img').attr('src',"{{asset('img/mt.png')}}");
            }
        });
        $(".uls").css('background','#FFF');
        $(".lis").children('a').css('color','#000');
        $("#logo").attr('src',"{{asset('img/bluelogo.png')}}");
        $("#logo_font").css('color','#474747');
        $(".lists").css('color','#000');
        $(".top_head").css('background','#f5f6f9');
        $(".top_head_list").css('color','#474747');
        $(".line-s").css('background','#474747');
        {{--$(".lis").on('mouseout',function(){--}}
        {{--    $(".uls").css('background','rgba(0,0,0,0.1)');--}}
        {{--    $(".lis").children('a').css('color','#FFF');--}}
        {{--    $("#logo").attr('src',"{{asset('img/logo.png')}}");--}}
        {{--    $("#logo_font").css('color','#FFF');--}}
        {{--    $(".lists").css('color','#FFF');--}}
        {{--    $(".top_head").css('background','#212020');--}}
        {{--    $(".top_head_list").css('color','#b0b0b0');--}}
        {{--    $(".line-s").css('background','#b0b0b0');--}}
        {{--})--}}
        // $(".contents").css('top','-58px');
        // $(".contents").css('margin-bottom','-58px')
        function hiddens(){
            window.event? window.event.cancelBubble = true : e.stopPropagation();
            $(".search_input").removeClass('search_input_active');
            $(".cancel_input").css('display','none')
            {{--$(".uls").css('background','rgba(0,0,0,0.1)');--}}
            {{--$(".lis").children('a').css('color','#FFF');--}}
            {{--$("#logo").attr('src',"{{asset('img/logo.png')}}");--}}
            {{--$("#logo_font").css('color','#FFF');--}}
            {{--$(".lists").css('color','#FFF');--}}
            {{--$(".top_head").css('background','#212020');--}}
            {{--$(".top_head_list").css('color','#FFF');--}}
            {{--$(".line-s").css('background','#FFF');--}}
        }
    </script>
@endsection