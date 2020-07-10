@extends('layouts.home_nav')
@section('title', '产品中心-LENKENG-朗强科技')
@section('description', '管理系统后台')
@section('keyword', 'HDMI 4K')
@section('css')
    <link href="{{asset('css/product.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/swiper.css')}}">
    <script src="{{asset('js/swiper.min.js')}}"> </script>
@endsection
@section('content')
    <div class="banners">
        <img src="{{asset('img/product_ban.png')}}" class="img-responsive" alt="Responsive image">
    </div>
    <div class="state row">
        <div class="col-xs-12 col-md-2"></div>
        <div class="col-xs-0 col-md-8" style="padding-left: 0!important;">
            <ol class="breadcrumb" style="padding-left: 0!important;">
                <li><a href="/">首页</a></li>
                <span class="glyphicon glyphicon-menu-right"></span>
                <li>产品</li>
            </ol>
        </div>
        <div class="col-xs-12 col-md-2"></div>
    </div>
    <div class="my_news_list row">
        <div class="col-xs-0 col-sm-1 col-md-2"></div>
        <div class="col-xs-12 col-sm-3 col-md-2 my_type">
            <div class="b_title">
                <li class="p_title"><span class="iconfont icon-shipinchuanshu"></span>视频传输<i class="iconfont icon-arrow-right i-active"></i></li>
                    <ul class="p_list p_list_active">
                        <li>点对点延长器</li>
                        <li>IP延长器</li>
                        <li>分布式矩阵</li>
                        <li>网线分布式矩阵</li>
                        <li>光纤分布式矩阵</li>
                    </ul>

            </div>
            <div class="b_title">
                <li class="p_title"><span class="iconfont icon-KVM"></span>KVM <i class="iconfont icon-arrow-right"></i></li>
                <ul class="p_list">
                    <li>点对点延长器</li>
                    <li>IP延长器</li>
                    <li>分布式矩阵</li>
                    <li>网线分布式矩阵</li>
                    <li>光纤分布式矩阵</li>
                </ul>

            </div>
            <div class="b_title">
                <li class="p_title"><span style="font-size: 20px;" class="iconfont icon-shipinxinhaochuli1"></span>视频信号<i class="iconfont icon-arrow-right"></i></li>
                <ul class="p_list">
                    <li>点对点延长器</li>
                    <li>IP延长器</li>
                    <li>分布式矩阵</li>
                    <li>网线分布式矩阵</li>
                    <li>光纤分布式矩阵</li>
                </ul>
            </div>
            <div class="b_title">
                <li class="p_title"><span class="iconfont icon-duomeitishipinbofang"></span>多媒体视频播放<i class="iconfont icon-arrow-right"></i></li>
                <ul class="p_list">
                    <li>点对点延长器</li>
                    <li>IP延长器</li>
                    <li>分布式矩阵</li>
                    <li>网线分布式矩阵</li>
                    <li>光纤分布式矩阵</li>
                </ul>

            </div>
        </div>
        <div class="product_list col-xs-12 col-sm-6 col-md-6">
            <div class="one_product">
                <div class="product_img"><img src="{{asset('limg/LKV373A.png')}}" class="img-responsive" alt=""></div>
                <div class="product_name">LKV7600 YPbPr转VGA 转换器</div>
                <div class="product_desc">YPbPr转VGA 转换器可以将YPbPr色差信号 转换成VGA信号在CRT/LCD电脑上观看 转换成VGA信号在CRT/LCD电脑上观看</div>
                <div class="get_more">了解更多</div>
            </div>
            <div class="one_product">
                <div class="product_img"><img src="{{asset('limg/LKV373A.png')}}" class="img-responsive" alt=""></div>
                <div class="product_name">LKV7600 YPbPr转VGA 转换器</div>
                <div class="product_desc">YPbPr转VGA 转换器可以将YPbPr色差信号 转换成VGA信号在CRT/LCD电脑上观看 转换成VGA信号在CRT/LCD电脑上观看</div>
                <div class="get_more">了解更多</div>
            </div>
            <div class="one_product">
                <div class="product_img"><img src="{{asset('limg/LKV373A.png')}}" class="img-responsive" alt=""></div>
                <div class="product_name">LKV7600 YPbPr转VGA 转换器</div>
                <div class="product_desc">YPbPr转VGA 转换器可以将YPbPr色差信号 转换成VGA信号在CRT/LCD电脑上观看 转换成VGA信号在CRT/LCD电脑上观看</div>
                <div class="get_more">了解更多</div>
            </div>
            <div class="one_product">
                <div class="product_img"><img src="{{asset('limg/LKV373A.png')}}" class="img-responsive" alt=""></div>
                <div class="product_name">LKV7600 YPbPr转VGA 转换器</div>
                <div class="product_desc">YPbPr转VGA 转换器可以将YPbPr色差信号 转换成VGA信号在CRT/LCD电脑上观看 转换成VGA信号在CRT/LCD电脑上观看</div>
                <div class="get_more">了解更多</div>
            </div>
            <div class="one_product">
                <div class="product_img"><img src="{{asset('limg/LKV373A.png')}}" class="img-responsive" alt=""></div>
                <div class="product_name">LKV7600 YPbPr转VGA 转换器</div>
                <div class="product_desc">YPbPr转VGA 转换器可以将YPbPr色差信号 转换成VGA信号在CRT/LCD电脑上观看 转换成VGA信号在CRT/LCD电脑上观看</div>
                <div class="get_more">了解更多</div>
            </div>
            <div class="one_product">
                <div class="product_img"><img src="{{asset('limg/LKV373A.png')}}" class="img-responsive" alt=""></div>
                <div class="product_name">LKV7600 YPbPr转VGA 转换器</div>
                <div class="product_desc">YPbPr转VGA 转换器可以将YPbPr色差信号 转换成VGA信号在CRT/LCD电脑上观看 转换成VGA信号在CRT/LCD电脑上观看</div>
                <div class="get_more">了解更多</div>
            </div>
            <div class="one_product">
                <div class="product_img"><img src="{{asset('limg/LKV373A.png')}}" class="img-responsive" alt=""></div>
                <div class="product_name">LKV7600 YPbPr转VGA 转换器</div>
                <div class="product_desc">YPbPr转VGA 转换器可以将YPbPr色差信号 转换成VGA信号在CRT/LCD电脑上观看 转换成VGA信号在CRT/LCD电脑上观看</div>
                <div class="get_more">了解更多</div>
            </div>
            <div class="one_product">
                <div class="product_img"><img src="{{asset('limg/LKV373A.png')}}" class="img-responsive" alt=""></div>
                <div class="product_name">LKV7600 YPbPr转VGA 转换器</div>
                <div class="product_desc">YPbPr转VGA 转换器可以将YPbPr色差信号 转换成VGA信号在CRT/LCD电脑上观看 转换成VGA信号在CRT/LCD电脑上观看</div>
                <div class="get_more">了解更多</div>
            </div>
            <div class="one_product">
                <div class="product_img"><img src="{{asset('limg/LKV373A.png')}}" class="img-responsive" alt=""></div>
                <div class="product_name">LKV7600 YPbPr转VGA 转换器</div>
                <div class="product_desc">YPbPr转VGA 转换器可以将YPbPr色差信号 转换成VGA信号在CRT/LCD电脑上观看 转换成VGA信号在CRT/LCD电脑上观看</div>
                <div class="get_more">了解更多</div>
            </div>
        </div>
        <div class="col-xs-0 col-sm-1 col-md-2"></div>
    </div>
    <div class="hot-product">
        <p>热门产品</p>
        <div class="row hots">
            <div class="col-xs-0 col-sm-1 col-md-2"></div>
            <div class="col-xs-0 col-sm-10 col-md-8">
                <div class="swiper-container swiper-container-hot">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="slide_product">
                                <div class="product_img"><img src="{{asset('limg/LKV373A.png')}}" class="img-responsive" alt=""></div>
                                <div class="product_name">LKV7600 YPbPr转VGA 转换器</div>
                            </div></div>
                        <div class="swiper-slide">
                            <div class="slide_product">
                                <div class="product_img"><img src="{{asset('limg/LKV373A.png')}}" class="img-responsive" alt=""></div>
                                <div class="product_name">LKV7600 YPbPr转VGA 转换器</div>
                            </div></div>
                        <div class="swiper-slide">
                            <div class="slide_product">
                                <div class="product_img"><img src="{{asset('limg/LKV373A.png')}}" class="img-responsive" alt=""></div>
                                <div class="product_name">LKV7600 YPbPr转VGA 转换器</div>
                            </div></div>
                        <div class="swiper-slide">
                            <div class="slide_product">
                                <div class="product_img"><img src="{{asset('limg/LKV373A.png')}}" class="img-responsive" alt=""></div>
                                <div class="product_name">LKV7600 YPbPr转VGA 转换器</div>
                            </div></div>
                    </div>
                </div>
            </div>
            <div class="col-xs-0 col-sm-1 col-md-2"></div>
        </div>
    </div>
    <script>
        //热门产品轮播
        var mySwiper = new Swiper('.swiper-container-hot',{
            loop:true,
            slidesPerView : 4,
            spaceBetween : 18,
        })

        //移动端切换
        var screen_width = window.screen.width;
        if(screen_width<=768){
        }
        //设置顶部菜单栏
        $(".uls").css('background','#FFF');
        $(".lis").children('a').css('color','#000');
        $("#logo").attr('src',"{{asset('img/bluelogo.png')}}");
        $("#logo_font").css('color','#474747');
        $(".lists").css('color','#000');
        $(".top_head").css('background','#E6E6E6');
        $(".top_head_list").css('color','#474747');
        $(".line-s").css('background','#474747');
        //隐藏搜索框
        function hiddens(){
            window.event? window.event.cancelBubble = true : e.stopPropagation();
            $(".search_input").removeClass('search_input_active');
            $(".cancel_input").css('display','none');
        }
        //产品侧边菜单切换
        $(".b_title").on('click',function(){
            if( $(this).children('ul').hasClass('p_list_active')){
                $(this).children('ul').removeClass('p_list_active')
                $(this).children('li').children('i').removeClass('i-active')
            }else{
                $(this).children('ul').addClass('p_list_active');
                $(this).children('li').children('i').addClass('i-active')
            }
        })
    </script>
@endsection