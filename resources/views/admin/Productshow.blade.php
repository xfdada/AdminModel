@extends('layouts.head')
@section('title', '产品详情')
@section('keyword', '管理系统后台')
@section('content')
    <style>
        .layui-form-onswitch{
            background-color:#14abef !important;
        }
    </style>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                    <h4 class="page-title">产品详情</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:void();">首页</a></li>
                        <li class="breadcrumb-item"><a href="javaScript:void();">产品管理</a></li>
                        <li class="breadcrumb-item"><a style="cursor: pointer" onclick="window.history.go(-1)">产品列表</a></li>
                        <li class="breadcrumb-item active" aria-current="page">产品详情</li>
                    </ol>
                </div>
            </div>
    <!-- End Breadcrumb-->
            <div class="row">
                <div class="col-lg-12" style="display: flex;">
                    <div class="col-lg-4 col-12">
                        <div class="layui-carousel" id="test1">
                            <div carousel-item>
                                <div><img src="http://www.model.com/product/20200103/2020-01-035e0eec93c5b48.png" alt=""></div>
                                <div><img src="http://www.model.com/product/20200103/2020-01-035e0eec93c5b48.png" alt=""></div>
                                <div><img src="http://www.model.com/product/20200103/2020-01-035e0eec93c5b48.png" alt=""></div>
                                <div><img src="http://www.model.com/product/20200103/2020-01-035e0eec93c5b48.png" alt=""></div>
                                <div><img src="http://www.model.com/product/20200103/2020-01-035e0eec93c5b48.png" alt=""></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-12">
                        <div class="name"><h2>LK2012455Mart</h2></div>
                        <div class="type" style="margin-top: 10px;">类别：<span>手机延长器</span></div>
                        <div class="desc" style="width: 60%;margin-top: 10px;">此款迷你HDMI2.0放大中继器的设计是通过解码和重新编码形成新的标准HDMI信号并将再生的HDMI信号进行长距离无损传输。通过两条HDMI线，高效率传输高清信号25米（4KX2K@60Hz）、30米（4KX2K@30Hz），满足高清信号同步展示的需要。此产品适用于多媒体教育系统、家庭娱乐、数据监控中心等。</div>
                    </div>
                </div>
                <div class="col-12 detail" style="margin-top: 40px">
                    <h4 class="page-title">产品详情</h4>
                    <p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; text-align: center;">
                        <img src="http://lenkeng.com/Data/kindeditor-4.1.7/attached/image/20190709/20190709145810_14146.jpg" alt=""/>
                    </p>
                    <p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal;">
                        <br/>
                    </p>
                    <p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; text-align: center;">
                        <img src="http://lenkeng.com/Data/kindeditor-4.1.7/attached/image/20190709/20190709145830_26558.jpg" alt=""/>
                    </p>
                    <p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal;">
                        <br/>
                    </p>
                    <p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal;">
                        <br/>
                    </p>
                    <p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; text-align: center;">
                        <img src="http://lenkeng.com/Data/kindeditor-4.1.7/attached/image/20190709/20190709145911_44417.jpg" alt=""/>
                    </p>
                    <p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal;">
                        <br/>
                    </p>
                    <p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal;">
                        <br/>
                    </p>
                    <p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; text-align: center;">
                        <img src="http://lenkeng.com/Data/kindeditor-4.1.7/attached/image/20190709/20190709145931_58406.jpg" alt=""/>
                    </p>
                    <p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal;">
                        <br/>
                    </p>
                    <p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal;">
                        <br/>
                    </p>
                    <p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal;">
                        <br/>
                    </p>
                    <p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; text-align: center;">
                        <img src="http://lenkeng.com/Data/kindeditor-4.1.7/attached/image/20190709/20190709145949_14660.jpg" alt=""/>
                    </p>
                    <p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; text-align: center;">
                        <strong style="padding: 0px; margin: 0px;"><br/></strong>
                    </p>
                    <p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; text-align: center;">
                        <strong style="padding: 0px; margin: 0px;"><br/></strong>
                    </p>
                    <p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; text-align: center;">
                        <strong style="padding: 0px; margin: 0px;"><br/></strong>
                    </p>
                    <p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; text-align: center;">
                        <strong style="padding: 0px; margin: 0px;"><br/></strong>
                    </p>
                    <p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; text-align: center;">
                        <strong style="padding: 0px; margin: 0px;"><br/></strong>
                    </p>
                    <p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; text-align: center;">
                        <strong style="padding: 0px; margin: 0px;"><span style="padding: 0px; margin: 0px; font-size: 32px; color: rgb(51, 127, 229);">产品接口示意图</span></strong>
                    </p>
                    <p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; text-align: center;">
                        <strong style="padding: 0px; margin: 0px;"><span style="padding: 0px; margin: 0px; font-size: 32px;"><br/></span></strong>
                    </p>
                    <p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; text-align: center;">
                        <strong style="padding: 0px; margin: 0px;"><span style="padding: 0px; margin: 0px; font-size: 32px;"><img src="http://lenkeng.com/Data/kindeditor-4.1.7/attached/image/20190709/20190709154839_83860.png" alt=""/><br/></span></strong>
                    </p>
                    <p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; text-align: center;">
                        <strong style="padding: 0px; margin: 0px;"><span style="padding: 0px; margin: 0px; font-size: 32px;"><img src="http://lenkeng.com/Data/kindeditor-4.1.7/attached/image/20190709/20190709154905_16331.png" alt=""/><br/></span></strong>
                    </p>
                    <p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; text-align: center;">
                        <strong style="padding: 0px; margin: 0px;"><span style="padding: 0px; margin: 0px; font-size: 32px;"><br/></span></strong>
                    </p>
                    <p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; text-align: center;">
                        <span style="padding: 0px; margin: 0px; font-size: 24px; color: rgb(51, 127, 229);"><strong style="padding: 0px; margin: 0px;"><br/></strong></span>
                    </p>
                    <p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; text-align: center;">
                        <span style="padding: 0px; margin: 0px; font-size: 24px; color: rgb(51, 127, 229);"><strong style="padding: 0px; margin: 0px;"><br/></strong></span>
                    </p>
                    <p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; text-align: center;">
                        <br/>
                    </p>
                    <p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; text-align: center;">
                        <span style="padding: 0px; margin: 0px; font-size: 32px; color: rgb(51, 127, 229);"><strong style="padding: 0px; margin: 0px;">产品连接示意图</strong></span>
                    </p>
                    <p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; text-align: center;">
                        <br/>
                    </p>
                    <p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; text-align: center;">
                        <br/>
                    </p>
                    <p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; text-align: center;">
                        <br/>
                    </p>
                    <p style="padding: 0px; margin-top: 0px; margin-bottom: 0px; color: rgb(102, 102, 102); font-family: Arial, Helvetica, sans-serif; font-size: 12px; white-space: normal; text-align: center;">
                        <span style="padding: 0px; margin: 0px; font-size: 18px;"><strong style="padding: 0px; margin: 0px;"><img src="http://lenkeng.com/Data/kindeditor-4.1.7/attached/image/20190709/20190709145605_13518.jpg" width="900" height="383" alt=""/></strong></span>
                    </p>
                    <p>
                        <br/>
                    </p>

                </div>
                <div class="col-12">
                    <h4 class="page-title">产品参数</h4>
                    <p style="text-align: center">
                        <img src="/ueditor/php/upload/image/20200103/1578043416207336.png" alt=""/>
                    </p>
                </div>

                <div class="col-12" >
                    <h4 class="page-title">包装售后</h4>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        layui.use('carousel', function(){
            var carousel = layui.carousel;
            //建造实例
            carousel.render({
                elem: '#test1'
                ,width: '100%' //设置容器宽度
                ,arrow: 'always' //始终显示箭头
                //,anim: 'updown' //切换动画方式
            });
        });
    </script>
@endsection

