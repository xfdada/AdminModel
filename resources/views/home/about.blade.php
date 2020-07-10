@extends('layouts.home_nav')
@section('title', '关于朗强-LENKENG-朗强科技')
@section('description', '深圳市朗强科技有限公司是一家集研发、生产、销售和服务为一体高新技术企业，专注于为广大客户提供高清视频传输数字化解决方案。公司成立于2004年，研发和生产基地位
于中国深圳。')
@section('keyword', '高清视频传输,深圳朗强科技有限公司,发展历程,HDMI,4K')
@section('css')
    <link href="{{asset('css/about.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="banners">
        <img src="{{asset('img/contect_ban.png')}}" class="img-responsive" alt="Responsive image">
    </div>
   <div class="row">
       <div class="col-xs-0 col-sm-1 col-md-2"></div>
       <div class="col-xs-12 col-sm-10 col-md-8 tab">
           <div class="tag_one tag_one_active" data-tag="tag1" id="tag1">朗强简介</div>
           <div class="tag_one" id="tag2" data-tag="tag2" id="tag2">资质荣誉</div>
           <div class="tag_one" id="tag3" data-tag="tag3" id="tag3">人力资源</div>
           <div class="tag_one" id="tag4" data-tag="tag4" id="tag4">联系我们</div>
       </div>
       <div class="col-xs-0 col-sm-1 col-md-2"></div>
   </div>
    <div class="about-content">
        <div class="my_tag tag1-content" >
            <div class="row company-base">
                <div class="col-xs-0 col-sm-1 col-md-2"></div>
                <div class="col-xs-12 col-sm-10 col-md-8 about-company row">
                    <div class="col-xs-12 col-sm-3 col-md-3"><div class="title">公司简介</div></div>
                    <div class="col-xs-12 col-sm-9 col-md-9">
                        <ul class="about-li">
                            <li><span>.</span>  全球视频传输和处理领先者, 成立于2004年, 致力于高清视频传输和处理解决方案的研发、生产和营销。</li>
                            <li><span>.</span>  拥有视频传输、KVM、视频信号处理、多媒体视频播放四大产品系列，广泛的应用于监控中心、轨道交通、教育、医疗、会议、家庭娱</li>
                            <li><span>.</span>  16年的快速发展，产品已经出口到全球超过100个国家和地区。</li>
                            <li><span>.</span>  HDMI,HDCP协议的采纳者，HDbaseT 联盟成员, 以及ipcolor技术的全球战略推广者。</li>
                        </ul>
                        <div class="img"><img src="{{asset('img/big_lenkeng.png')}}" class="img-responsive" alt=""></div>
                    </div>
                </div>
                <div class="col-xs-0 col-sm-1 col-md-2"></div>
            </div>
            <div class="bacgrounds">
                <div class="img">
                    <img src="{{asset('img/background.png')}}" id="bacground-img" class="img-responsive" alt="">
                    <div class="smart row">
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
                </div>

            </div>
            <div class="history">

            </div>
            <div class="option">
                <div class="img">
                    <img src="{{asset('img/jiazhi.png')}}" id="bacground-img" class="img-responsive" alt="">
                    <div class="smarts row">
                        <div class="col-xs-0 col-sm-1 col-md-2"></div>
                        <div class="col-xs-0 col-sm-10 col-md-8">
                            <div class="op_title">企业文化</div>
                            <div class="small_title1">愿景</div>
                            <div class="small_desc1">成为全球领先的专业视听系统供应商</div>
                            <div class="line"></div>
                            <div class="small_title">使命</div>
                            <div class="small_desc2"></div>
                            <div class="line"></div>
                            <div class="small_title">价值观</div>
                            <div class="small_desc2"></div>
                        </div>
                        <div class="col-xs-0 col-sm-1 col-md-2"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="my_tag tag2-content">
            <div class="row good-c">
                <div class="col-xs-0 col-sm-1 col-md-2"></div>
                <div class="col-xs-12 col-sm-10 col-md-8">
                   <div class="title">资质荣誉</div>
                    <div class="good-types">
                        <div class="one-type">
                            <img src="{{asset('img/royu1.png')}}" alt="">
                            <div class="type-name">国家高新技术企业</div>
                        </div>
                        <div class="one-type">
                            <img src="{{asset('img/royu1.png')}}" alt="">
                            <div class="type-name">广东省企业家协会</div>
                        </div>
                        <div class="one-type">
                            <img src="{{asset('img/royu1.png')}}" alt="">
                            <div class="type-name">信号处理十佳品牌</div>
                        </div>
                        <div class="one-type">
                            <img src="{{asset('img/royu1.png')}}" alt="">
                            <div class="type-name">ipcolor联盟会员</div>
                        </div>
                        <div class="one-type">
                            <img src="{{asset('img/royu1.png')}}" alt="">
                            <div class="type-name">HDMI采纳者</div>
                        </div>
                        <div class="one-type">
                            <img src="{{asset('img/royu1.png')}}" alt="">
                            <div class="type-name">HDbaseT联盟会员</div>
                        </div>
                        <div class="one-type">
                            <img src="{{asset('img/royu1.png')}}" alt="">
                            <div class="type-name">AVIXA会员</div>
                        </div>
                        <div class="one-type">
                            <img src="{{asset('img/royu1.png')}}" alt="">
                            <div class="type-name">广东企业诚信公约</div>
                        </div>
                        <div class="one-type">
                            <img src="{{asset('img/royu1.png')}}" alt="">
                            <div class="type-name">BSCI</div>
                        </div>
                    </div>
                    <div class="ffc">
                        <div class="one-ffc">
                            <img src="{{asset('limg/renz.png')}}" alt="">
                            <div class="ffc-name">FCC认证</div>
                        </div>
                        <div class="one-ffc">
                            <img src="{{asset('limg/renz.png')}}" alt="">
                            <div class="ffc-name">CE认证</div>
                        </div>
                        <div class="one-ffc">
                            <img src="{{asset('limg/renz.png')}}" alt="">
                            <div class="ffc-name">HDCP</div>
                        </div>
                        <div class="one-ffc">
                            <img src="{{asset('limg/renz.png')}}" alt="">
                            <div class="ffc-name">RoHS认证</div>
                        </div>
                        <div class="one-ffc">
                            <img src="{{asset('limg/renz.png')}}" alt="">
                            <div class="ffc-name">RoHS</div>
                        </div>
                    </div>

                    <div class="title">专利技术</div>
                    <div class="zl">
                        <div>
                            <img src="{{asset('limg/zhuanli.png')}}" alt="Responsive image">
                            <div class="zl-list">
                                <div class="zl-one">
                                    <div class="zl-num">35</div>
                                    <div class="zl-name">实用新型专利</div>
                                </div>
                                <div class="zl-one">
                                    <div class="zl-num">36</div>
                                    <div class="zl-name">发明专利</div>
                                </div>
                                <div class="zl-one">
                                    <div class="zl-num">44</div>
                                    <div class="zl-name">外观专利</div>
                                </div>
                                <div class="zl-one">
                                    <div class="zl-num">17</div>
                                    <div class="zl-name">软件著作权</div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-0 col-sm-1 col-md-2"></div>
            </div>
        </div>
        <div class="my_tag tag3-content">
            <div class="row job-tag">
                <div class="col-xs-0 col-sm-1 col-md-2"></div>
                <div class="col-xs-12 col-sm-10 col-md-8"></div>
                <div class="col-xs-0 col-sm-1 col-md-2"></div>
            </div>
        </div>
        <div class="my_tag tag4-content">
            <div class="row connect-us">
                <div class="col-xs-0 col-sm-1 col-md-2"></div>
                <div class="col-xs-12 col-sm-10 col-md-8">
                    <div class="c_title">在线留言</div>
                    <p>您可以填写以下的资料提交您的需求和建议，或者按照下方的联系方式联系我们，感谢您的支持！</p>
                    <div class="c-table">
                        <div class="c-input">
                            <label>公司名称：</label><input name="company" type="text">
                        </div>
                        <div class="c-input">
                            <label>姓名：</label><input name="user_name" type="text">
                        </div>
                        <div class="c-input">
                            <label>电话：</label><input name="phone" type="text">
                        </div>
                        <div class="c-input">
                            <label>邮箱：</label><input name="email" type="text">
                        </div>
                        <div class="c-input">
                            <label>公司地址：</label><input name="address" type="text">
                        </div>
                        <div class="c-input">
                            <label>验证码：</label>
                            <div class="capt" style="display: flex;width: 80%">
                                <div><img id="code" src="/my_admin/login/captcha" width="100%"  class="img-responsive" alt="" onclick="this.src='/my_admin/login/captcha/'+Math.random()"> <span class="tips">看不清点击图片进行更换</span></div>
                                <input name="captcha" class="captcha" type="text">
                            </div>
{{--                            <input name="address" type="text">--}}
                        </div>
                    </div>
                    <div class="big-txt">
                        <label class="label-a">您的需求和建议:</label>
                        <textarea  name="question"></textarea>

                    </div>
                    <div class="sub-btn" onclick="commit()">提交</div>
                </div>
                <div class="col-xs-0 col-sm-1 col-md-2"></div>
            </div>
            <div class="row connect-way">
                <div class="col-xs-0 col-sm-1 col-md-2"></div>
                <div class="col-xs-12 col-sm-10 col-md-8">
                    <div class="c_title">联系我们</div>
                   <div class="types">
                       <div class="one-type"><span class="iconfont icon-dianhua1 icons"></span><div class="tt"><div class="s">400-1199-755</div><div class="t">24小时全国热线</div></div></div>
                       <div class="one-type"><span class="iconfont icon-chuanzhen icons"></span><div class="tts"><span class="s-name">传真：</span><span class="des">0755-82500201</span></div></div>
                       <div class="one-type"><span style="font-size: 21px;"  class="iconfont icon-zongji icons"></span><div class="tts"><span class="s-name">总机：</span><span class="des">0755-83593885</span></div></div>
                       <div class="one-type"><span class="iconfont icon-youxiang icons"></span><div class="tts"><span class="s-name">邮箱：</span><span class="des">sales@lenkeng.com</span></div></div>
                       <div class="one-type"><span  style="font-size: 28px;" class="iconfont icon-xiaoshou icons"></span><div class="tts"><span class="s-name">销售：</span><span class="des">0755-82500205</span></div></div>
                       <div class="one-type"><span class="iconfont icon-jishuzhichi1 icons"></span><div class="tts"><span class="s-name">售后技术支持：</span><span class="des">0755-83317899</span></div></div>
                       <div class="one-type" style="width: 90%"><span class="iconfont icon-weizhi icons"></span><div class="tts"><span class="s-name">地 址：</span><span class="des">深圳市福田区上梅林广夏路3号金广夏文科园3楼和4楼西</span></div></div>
                   </div>
                </div>
                <div class="col-xs-0 col-sm-1 col-md-2"></div>
            </div>
        </div>

    </div>
    <script>
        $(".tag_one").on('click',function(){
            $(".tag_one").removeClass('tag_one_active');
            $(this).addClass('tag_one_active');
            var tag = $(this).attr('data-tag');
            tag = tag +"-content";
            $(".my_tag").css('display','none');
            $("."+tag).css('display','block');
        })


        $(function () {
            var my_tags = window.location.hash.slice(1);
            $(".my_tag").css('display','none');
            $(".tag_one").removeClass('tag_one_active');
            $("#"+my_tags).addClass('tag_one_active');
            $("."+my_tags+"-content").css('display','block');
        });
        window.onpopstate = function (event) {
            var tag = window.location.hash.slice(1);
            $(".my_tag").css('display','none');
            $(".tag_one").removeClass('tag_one_active');
            $("#"+tag).addClass('tag_one_active');
            $("."+tag+"-content").css('display','block');
        };
        var screen_width = window.screen.width;

        if(screen_width<=768){
          $(".smart").css('top','0');

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