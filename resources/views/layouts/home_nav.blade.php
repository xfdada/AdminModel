<!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content="@yield('description')"/>
        <meta name="keyword" content="@yield('keyword')"/>
        <title>@yield('title')</title>
        @yield('css')
        <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="{{asset('css/home.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('css/animate.css')}}" rel="stylesheet" type="text/css"/>
        <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
{{--        <link rel="stylesheet" href="{{asset('submenu/dist/css/bootstrap-submenu.min.css')}}">--}}
{{--        <script src="{{asset('submenu/dist/js/bootstrap-submenu.min.js')}}"></script>--}}
        <!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/iconfont.css')}}">
        <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>
    <div class="top_head">
        <div class="my_head">
            <div class="top_head_list">联系我们</div>
            <div class="line-s"></div>
            <div class="top_head_list">合作伙伴专区</div>
            <div class="line-s"></div>
            <div class="top_head_list">网上商城</div>
            <div class="line-s"></div>
            <div class="top_head_list">中文</div>
            <div class="line-s"></div>
            <div class="top_head_list">English</div>
        </div>
    </div>
    <div class="navti">
        <div class="navsti">
            <ul class="uls">
                <div class="logo">
                    <a style="display: flex;padding-top: 5px;" href="/">
                        <img id="logo" alt="lenkng 朗强科技" src="{{asset('img/logo.png')}}"><span id="logo_font"> I  高清晰视频传输领先者</span>
                    </a>
                </div>
                <li class="lis">
                    <a href="">解决方案与案例</a>
                    <div class="pull">
                        <div class="pull_list row">
                                        <div  class="col-xs-0 col-sm-0 col-md-2"></div>
                                        <div  class="col-xs-0 col-sm-6 col-md-6 pull_nav_li" style="display: flex;">
                                            <div class="nav_li" style="text-align: left;border-right: 1px dashed #d0d4e0; width: 50%;padding-left: 15%">
                                                <div class="nav_li_title"><a href="/solution"><span class="iconfont icon-jiantouyou1"></span>解决方案</a></div>
                                                <div class="sub_li_list"><a href="/solution"><span class="iconfont icon-kongzhishi1"></span>控制室</a></div>
                                                <div class="sub_li_list"><a href="/solution"><span class="iconfont icon-huiyishi1"></span>会议室</a></div>
                                                <div class="sub_li_list"><a href="/solution"><span class="iconfont icon-jiaoshi1"></span>教室</a></div>
                                                <div class="sub_li_list"><a href="/solution"><span class="iconfont icon-guidaojiaotong1"></span>轨道交通</a></div>
                                                <div class="sub_li_list"><a href="/solution"><span class="iconfont "></span></a></div>
                                            </div>
                                            <div class="nav_li" style="border-right: 1px dashed #d0d4e0;text-align: left; width: 50%;padding-left: 5%">
                                                <div class="nav_li_title"><a href="/case"><span class="iconfont icon-jiantouyou1"></span>案例</a></div>
                                                <div class="sub_li_list"><a href="/case"><span class="iconfont icon-zhengfuyugonggonganquan"></span>政府与公共安全</a></div>
                                                <div class="sub_li_list"><a href="/case"><span class="iconfont icon-jiaotongyunshu"></span>交通运输</a></div>
                                                <div class="sub_li_list"><a href="/case"><span class="iconfont icon-dianshi"></span>广播电视</a></div>
                                                <div class="sub_li_list"><a href="/case"><span class="iconfont icon-jiaoyujiaoxue"></span>教育教学</a></div>
                                                <div class="sub_li_list"><a href="/case"><span class="iconfont icon-yule"></span>消费娱乐</a></div>
                                            </div>
                                        </div>
                                        <div  class="col-xs-0 col-sm-6 col-md-4 pull_select" style="text-align: left;">
                                            <div class="select_img"><img src="{{asset('img/controller.png')}}" height="140" alt=""></div>
                                            <div class="select_title">控制室</div>
                                        </div>
                                    </div>
                    </div>
                </li>
                <li class="lis"><a href="/products">产品中心</a>
                    <div class="pull">
                        <div class="pull_list row">
                            <div  class="col-xs-0 col-sm-0 col-md-1"></div>
                            <div  class="col-xs-12 col-sm-12 col-md-10 pull_nav_li" style="display: flex;">
                                <div class="nav_li" style="text-align: left;border-right: 1px dashed #d0d4e0; width: 50%;padding-left: 15%">
                                    <div class="nav_li_title"><a href=""><span class="iconfont icon-shipinchuanshu"></span>视频传输</a></div>
                                    <div class="sub_li_list"><a href=""><span style="margin-right: 3px;" class="iconfont icon-"></span>点对点延长器</a></div>
                                    <div class="sub_li_list"><a href=""><span style="margin-right: 3px;" class="iconfont icon-"></span>IP延长器</a></div>
                                    <div class="sub_li_list"><a href=""><span style="margin-right: 3px;" class="iconfont icon-"></span>分布式矩阵</a></div>
                                    <div class="sub_li_list"><a href=""><span style="margin-right: 3px;" class="iconfont icon-"></span>无线延长器</a></div>
                                    <div class="sub_li_list"><a href=""><span style="margin-right: 3px;" class="iconfont icon-"></span>延长分配器</a></div>
                                    <div class="sub_li_list"><a href=""><span style="margin-right: 3px;" class="iconfont icon-"></span>电力延长器</a></div>
                                    <div class="sub_li_list"><a href=""><span style="margin-right: 3px;" class="iconfont icon-"></span>同轴延长器</a></div>
                                    <div class="sub_li_list"><a href=""><span style="margin-right: 3px;" class="iconfont "></span></a></div>
                                </div>
                                <div class="nav_li" style="border-right: 1px dashed #A4ADC3;text-align: left; width: 50%;padding-left: 5%">
                                    <div class="nav_li_title"><a href=""><span class="iconfont icon-KVM"></span>KVM</a></div>
                                    <div class="sub_li_list"><a href=""><span style="margin-right: 3px;" class="iconfont icon-"></span>KVM 点对点延长器</a></div>
                                    <div class="sub_li_list"><a href=""><span style="margin-right: 3px;" class="iconfont icon-"></span> KVM IP延长器</a></div>
                                    <div class="sub_li_list"><a href=""><span style="margin-right: 3px;" class="iconfont icon-"></span> KVM延长分配器</a></div>
                                    <div class="sub_li_list"><a href=""><span style="margin-right: 3px;" class="iconfont icon-"></span> KVM分布式矩阵</a></div>
                                </div>
                                <div class="nav_li" style="border-right: 1px dashed #d0d4e0;text-align: left; width: 50%;padding-left: 5%">
                                    <div class="nav_li_title"><a href=""><span class="iconfont icon-shipinxinhaochuli"></span>视频信号处理</a></div>
                                    <div class="sub_li_list"><a href=""><span style="margin-right: 3px;" class="iconfont icon-"></span>视频矩阵</a></div>
                                    <div class="sub_li_list"><a href=""><span style="margin-right: 3px;" class="iconfont icon-"></span>视频分配器</a></div>
                                    <div class="sub_li_list"><a href=""><span style="margin-right: 3px;" class="iconfont icon-"></span>视频切换器</a></div>
                                    <div class="sub_li_list"><a href=""><span style="margin-right: 3px;" class="iconfont icon-"></span>视频拼接分割器</a></div>
                                    <div class="sub_li_list"><a href=""><span style="margin-right: 3px;" class="iconfont icon-"></span>视频转换器</a></div>
                                    <div class="sub_li_list"><a href=""><span style="margin-right: 3px;" class="iconfont icon-"></span>其它</a></div>
                                </div>
                                <div class="nav_li" style="text-align: left; width: 50%;padding-left: 5%">
                                    <div class="nav_li_title"><a href=""><span class="iconfont icon-duomeitishipinbofang"></span>多媒体播放</a></div>
                                    <div class="sub_li_list"><a href=""><span style="margin-right: 3px;" class="iconfont icon-"></span>广告标牌播放盒</a></div>
                                    <div class="sub_li_list"><a href=""><span style="margin-right: 3px;" class="iconfont icon-"></span>智能移动广告播放器</a></div>
                                </div>
                            </div>
                            <div  class="col-xs-0 col-sm-0 col-md-1 pull_select" style="text-align: left;">
                            </div>
                        </div>
                    </div>
                <li class="lis"><a href="/news">新闻中心</a>
                    <div class="pull">
                        <div class="pull_list row">
                            <div  class="col-xs-0 col-sm-0 col-md-2"></div>
                            <div  class="col-xs-0 col-sm-6 col-md-6 pull_nav_li" style="display: flex;">
                                <div class="nav_li" style="text-align: left;border-right: 1px dashed #d0d4e0; width:40%;padding-left: 10%">
                                    <div class="sub_li_list"><a href="/news"><span class="iconfont icon-"></span>公司新闻</a></div>
                                </div>
                                <div class="nav_li" style="text-align: left; width: 60%;padding-left: 10%">
                                    <div class="sub_li_list" style="color: #474747;font-size: 14px">资讯速达，实时了解朗强的最新动态</div>
                                </div>
                            </div>
                            <div  class="col-xs-0 col-sm-6 col-md-4 pull_select" style="text-align: left;">
                                <div class="select_img"><img src="{{asset('img/gsxw.png')}}" height="140" alt=""></div>
                                <div class="select_title">公司新闻</div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="lis"><a href="">支持中心</a>
                    <div class="pull">
                        <div class="pull_list row">
                            <div  class="col-xs-0 col-sm-0 col-md-2"></div>
                            <div  class="col-xs-0 col-sm-6 col-md-6 pull_nav_li" style="display: flex;">
                                <div class="nav_li" style="text-align: left;border-right: 1px dashed #d0d4e0; width:40%;padding-left: 10%">
                                    <div class="sub_li_list"><a href="/technical-support"><span class="iconfont icon-jishuzhichi"></span>技术支持</a></div>
                                    <div class="sub_li_list"><a href=""><span class="iconfont icon-ziliaoxiazai"></span>资料下载</a></div>
                                    <div class="sub_li_list"><a href=""><span class="iconfont icon-zhengpinchaxun"></span>正品查询</a></div>
                                    <div class="sub_li_list"><a href=""><span class="iconfont icon-tingchanchanpin"></span>停产产品</a></div>
                                    <div class="sub_li_list"><a href=""><span class="iconfont icon-chanpinbaoxiuzhengce"></span>产品保修政策</a></div>
                                    <div class="sub_li_list"><a href=""><span class="iconfont icon-changjianwenti"></span>常见问题解答</a></div>
                                    <div class="sub_li_list"><a href=""><span class="iconfont "></span></a></div>
                                </div>
                                <div class="nav_li" style="text-align: left; width: 60%;padding-left: 10%">
                                    <div class="nav_li_title" style="color: #474747;font-size: 14px">产品相关的一些问题解答</div>
                                </div>
                            </div>
                            <div  class="col-xs-0 col-sm-6 col-md-4 pull_select" style="text-align: left;">
                                <div class="select_img"><img src="{{asset('img/zczx.png')}}" height="140" alt=""></div>
                                <div class="select_title">支持中心</div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="l" style="margin-right: 60px"><a style="height:46px;text-outline:none;cursor: pointer;color: #FFF;" class="iconfont icon-sousuo1 lists">
                        <div class="search_input"><i class="iconfont icon-sousuo" style="color: #000;padding-right: 10px"></i><input type="text" placeholder="搜索"><span class="cancel_input" onclick="hiddens()" style="color: #000;width: 15%;"><i class="iconfont icon-quxiao"></i></span></div>
                    </a>
                </li>
            </ul>
            <div class="m_nav">
                <div class="logo">
                    <a style="display: flex;" href="/">
                        <img id="logo" alt="lenkng 朗强科技" src="{{asset('img/logo.png')}}">
                    </a>
                </div>
                <div class="m_nav_btn"><i class="iconfont icon-lishi"></i></div>
            </div>
        </div>
    </div>
    <div class="contents">
        @yield('content')
    </div>
    <div class="footer">
        <div class="container-fluid" style="background: #121212 !important;">
            <div class="row" style="padding: 50px 0;">
                <div  class="col-xs-0 col-sm-1 col-md-1"></div>
                <div class="col-xs-12 col-sm-5 col-md-5">
                    <div class="my_nva row">
                        <div  class="col-xs-0 col-sm-0 col-md-1"></div>
                        <div class="my_about col-xs-6 col-sm-6 col-md-6">
                            <div class="my_title">关于朗强</div>
                            <div class="my_list"><a href="/about#tag1">朗强简介</a></div>
                            <div class="my_list"><a href="/about#tag2">资质荣誉</a></div>
                            <div class="my_list"><a href="/about#tag3">人力资源</a></div>
                            <div class="my_list"><a href="/about#tag4">联系我们</a></div>
                        </div>
                        <div class="connect_us col-xs-6 col-sm-6 col-md-5">
                            <div class="my_title">产品中心</div>
                            <div class="my_list"><a href="/products">视频传输</a></div>
                            <div class="my_list"><a href="/products">KVM</a></div>
                            <div class="my_list"><a href="/products">视频信号处理</a></div>
                            <div class="my_list"><a href="/products">多媒体视频播放</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-5 col-md-5">
                    <div class="row my_select">
                        <div  class="col-xs-12 col-sm-11">
                            <div class="my_title">订阅我们</div>
                            <div style="line-height: 30px">第一时间获得朗强的最新动态</div>
                            <div class="row">
                                <div class="col-xs-12 col-md-6" style="padding-right: 5px!important; padding-left: 0!important;">
                                    <div style="padding-top: 10px">
                                        <input type="text" class="form-control inputss" name="company" placeholder="输入您的公司名称">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6"style="padding-right: 5px!important;padding-left: 0!important;" >
                                    <div>
                                        <div class="input-group my_list">
                                            <input type="text" class="form-control inputss" name="email" autocomplete="off" placeholder="输入您的电子邮件" aria-describedby="basic-addon2">
                                            <span class="input-group-addon " id="basic-addon2">></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  class="col-xs-0 col-sm-1"></div>
                    </div>
                </div>
                <div  class="col-xs-0 col-sm-1 col-md-1"></div>
            </div>
        </div>

        <div class="go_top">
            <div class="lianxi ce"><img src="{{asset('img/kefu1.png')}}" alt="kefu"></div>
            <div class="phone ce"><img src="{{asset('img/phon1.png')}}" alt="phone"></div>
            <div class="go_tops ce" ><img src="{{asset('img/top1.png')}}" alt="top"></div>
        </div>
        <div class="my_footer" style="padding-top: 20px;padding-bottom: 23px;border-top: 1px solid rgba(255,255,255,0.1)">
            <div class="technology">All Rights Reserved by Lenkeng Technology LTD.©2004-2020 <span class="beian" style="margin-left: 10px"><a  href="http://www.beian.miit.gov.cn/">粤ICP备05043343号-1</a></span></div>
        </div>
        
    </div>
    </body>
<script>
    window.onresize = function(){
        var screen_width = document.documentElement.clientWidth;
        if(screen_width<768){
            $(".uls").css('display','none');
            $(".m_nav").css('display','block');
        }else{
            $(".uls").css('display','block');
            $(".m_nav").css('display','none');
        }
        if(screen_width<=1024){
            $(".uls li").css('padding','0 20px');
        }else{
            $(".uls li").css('padding','0 35px');
        }
    };

    $(".my_nave >li").on('mouseover',function(){
        $(".navbar").css('background','#FFF');
    });

    $(".go_tops").hide();
    $(function () {
        $(window).scroll(function () {
            if ($(window).scrollTop() > 100) {
                $(".go_tops").fadeIn(500);
            }
            else {
                $(".go_tops").fadeOut(500);
            }
        });

        $(".go_tops").click(function () {
            $('body,html').animate({scrollTop: 0}, 500);
            return false;
        });
        var screen_width = window.screen.width;
        if(screen_width<=768){
            $("#navs").removeClass("navbar-transparent");
            $("#navs").addClass("navbar-inverse");
            $(".contents").css('position','none');
            $(".contents").css('top','0');
            $(".uls").css('display','none');
            $(".m_nav").css('display','block');
        }
        if(screen_width===1024){
            $(".uls li").css('padding','0 20px');
        }
    });
    {{--$(".lis").on('mouseover',function(){--}}
    {{--    $(".uls").css('background','#FFF');--}}
    {{--    $(".lis").children('a').css('color','#000');--}}
    {{--    $("#logo").attr('src',"{{asset('img/bluelogo.png')}}");--}}
    {{--    $("#logo_font").css('color','#474747');--}}
    {{--    $(".lists").css('color','#000');--}}
    {{--    $(".top_head").css('background','#E6E6E6');--}}
    {{--    $(".top_head_list").css('color','#474747');--}}
    {{--    $(".line-s").css('background','#474747');--}}
    {{--})--}}

    $(".ce").on('mouseover',function(){
        var name = $(this).children('img').attr('alt');
        if(name==='kefu'){
            $(this).children('img').attr('src',"{{asset('img/kefu.png')}}");
        }else if(name==='phone'){
            $(this).children('img').attr('src',"{{asset('img/phone.png')}}");
        }else if(name==='top'){
            $(this).children('img').attr('src',"{{asset('img/top.png')}}");
        }
    })
    $(".ce").on('mouseout',function(){
        var name = $(this).children('img').attr('alt');
        if(name==='kefu'){
            $(this).children('img').attr('src',"{{asset('img/kefu1.png')}}");
        }else if(name==='phone'){
            $(this).children('img').attr('src',"{{asset('img/phon1.png')}}");
        }else if(name==='top'){
            $(this).children('img').attr('src',"{{asset('img/top1.png')}}");
        }
    })
    $(".lists").on('click',function(){
        $(".search_input").addClass('search_input_active');
        $(".cancel_input").css('display','block')
        $(".uls").css('background','#FFF');
        $(".lis").children('a').css('color','#000');
        $("#logo").attr('src',"{{asset('img/bluelogo.png')}}");
        $("#logo_font").css('color','#474747');
        $(".top_head").css('background','#f2f2f2');
        $(".top_head_list").css('color','#474747');
        $(".line-s").css('background','#474747');
    })

</script>
</html>