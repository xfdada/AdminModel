﻿@extends('layouts.head')

@section('title', '添加产品')
@section('keyword', '管理系统后台')
@section('content')
    <style>
        .layui-form-label{
            padding:9px 0 !important;
        }
    </style>
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumb-->
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                    <h4 class="page-title">添加产品</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:void();">首页</a></li>
                        <li class="breadcrumb-item"><a href="javaScript:void();">产品管理</a></li>
                        <li class="breadcrumb-item active" aria-current="page">添加产品</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header text-uppercase">
                            添加产品
                        </div>
                        <div class="card-body" >
                            <form class="layui-form" action="">

                                <div class="step1">
                                <div class="layui-form-item">
                                    <label class="layui-form-label">产品名称</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="p_name" lay-verify="required" autocomplete="off" placeholder="请输入产品名称" class="layui-input">
                                    </div>
                                </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">产品型号</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="p_model" lay-verify="required" autocomplete="off" placeholder="请输入产品型号" class="layui-input">
                                        </div>
                                    </div>
                                <div class="layui-form-item" >
                                    <label class="layui-form-label">产品缩略图</label>
                                    <div style="display: flex">
                                        <div class="layui-upload">
                                            <button type="button"  style="margin-left: 25px" class="layui-btn" id="test1">上传图片</button>
                                            <input type="text" hidden id="product_icon" name="icon">
                                        </div>
                                        <div class="layui-upload-list" style="margin: 0 20px">
                                            <img class="layui-upload-img" style="width: 60px;height: 60px" id="demo1">
                                            <p id="demoText"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">产品简介</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="p_desc" lay-verify="required" lay-reqtext="请输入产品简介" placeholder="请输入" autocomplete="off" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">产品类别</label>
                                    <div class="layui-input-block">
                                        <select name="p_type" lay-verify="required" lay-search="">
                                            <option value="">直接选择或搜索选择</option>
                                            @foreach($data as $v)
                                                <option value="{{$v->c_id}}">{{$v->c_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">产品原价</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="price" lay-verify="required" autocomplete="off" placeholder="请输入产品原价" class="layui-input">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">产品现价</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="now_price" lay-verify="required" autocomplete="off" placeholder="请输入产品现价" class="layui-input">
                                        </div>
                                    </div>
                                <div class="layui-form-item" pane="">
                                    <label class="layui-form-label">是否新品</label>
                                    <div class="layui-input-block">
                                        <input type="radio" name="is_new" value="1" title="是" checked="">
                                        <input type="radio" name="is_new" value="2" title="否">
                                    </div>
                                </div>
                                <div class="layui-form-item" pane="">
                                    <label class="layui-form-label">是否热门</label>
                                    <div class="layui-input-block">
                                        <input type="radio" name="is_hot" value="1" title="是" >
                                        <input type="radio" name="is_hot" value="2" title="否" checked="">
                                    </div>
                                </div>
                                <div class="layui-form-item" pane="">
                                    <label class="layui-form-label">是否显示</label>
                                    <div class="layui-input-block">
                                        <input type="radio" name="is_show" value="1" title="是" checked="">
                                        <input type="radio" name="is_show" value="2" title="否">
                                    </div>
                                </div>

                                <div class="layui-form-item" >
                                        <label class="layui-form-label">产品图</label>
                                        <div class="layui-upload">
                                            <button type="button" class="layui-btn" id="test2">多图片上传</button>
                                            <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                                                预览图：
                                                <div class="layui-upload-list" style="height: 60px" id="demo2"></div>
                                                <input type="text" hidden name="img_pro" id="imgss">
                                            </blockquote>
                                        </div>
                                </div>
                                </div>
                                <div class="step2">
                                    <div class="form-group">
                                        <label for="name2">产品概述</label>
                                        <textarea id="container" name="content" lay-verify="required" lay-reqtext="请输入产品详情"  style="height:400px;" type="text/plain"></textarea>
                                    </div>
                                </div>
                                <div class="step3">
                                    <div class="form-group">
                                        <label for="name2">规格参数</label>
                                        <textarea id="container2" name="content2" lay-verify="required" lay-reqtext="请输入产品参数"  style="height:400px;" type="text/plain"></textarea>
                                    </div>
                                </div>

                                <div class="step4">
                                    <div class="form-group">
                                        <label for="name2">功能特性</label>
                                        <textarea id="container3" name="content3" lay-verify="required"  style="height:400px;" type="text/plain"></textarea>
                                    </div>
                                </div>
                                <div class="step5">
                                    <div class="form-group">
                                        <label for="name2">服务支持</label>
                                        <textarea id="container4" name="content4" lay-verify="required"  style="height:400px;" type="text/plain"></textarea>
                                    </div>
                                </div>
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button type="submit" class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                            </div>
                        </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- End Row-->

        </div>
        <!-- End container-fluid-->

    </div><!--End content-wrapper-->

@endsection
@section('script')
    <script type="text/javascript" src="{{asset('ueditor/ueditor.config.js')}}"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="{{asset('ueditor/ueditor.all.js')}}"></script>
    <script>
        $().ready(function() {
            var ue = UE.getEditor('container');
            var ue2 = UE.getEditor('container2');
            var ue3 = UE.getEditor('container3');
            var ue4 = UE.getEditor('container4');


        });
        layui.use(['form','upload'],function(){
            var $ = layui.jquery,upload = layui.upload;
            var form = layui.form,layer = layui.layer;
            form.on('submit(demo1)', function(data){
                $.post('/my_admin/productadd',{_token: '{!! csrf_token() !!}',data:data.field},function(res){
                    if(res.code===0){
                        var index = parent.layer.getFrameIndex(window.name);
                        layer.msg(res.msg,{icon:6});
                        parent.layer.close(index);
                        parent.location.reload();
                    }else{
                        layer.msg(res.msg,{icon:5});
                    }
                });
                return false;
            });

            //普通图片上传
            var uploadInst = upload.render({
                elem: '#test1'
                ,url: '/my_admin/product/upload'
                ,before: function(obj){
                    //预读本地文件示例，不支持ie8
                    obj.preview(function(index, file, result){
                        $('#demo1').attr('src', result); //图片链接（base64）
                    });
                }
                ,done: function(res){
                    //如果上传失败
                    if(res.code > 0){
                        return layer.msg('上传失败');
                    }
                    //上传成功
                    $("#product_icon").val(res.url);
                }
                ,error: function(){
                    //演示失败状态，并实现重传
                    var demoText = $('#demoText');
                    demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs demo-reload">重试</a>');
                    demoText.find('.demo-reload').on('click', function(){
                        uploadInst.upload();
                    });
                }
            });
            //多图片上传
            upload.render({
                elem: '#test2'
                ,url: '/my_admin/product/upload'
                ,multiple: true
                ,before: function(obj){
                    //预读本地文件示例，不支持ie8
                    obj.preview(function(index, file, result){
                        $('#demo2').append('<img height="60px" width="90px" src="'+ result +'" alt="'+ file.name +'" class="layui-upload-img">')
                    });
                }
                ,done: function(res){
                    //上传完毕
                    if(res.code > 0){
                        return layer.msg('上传失败');
                    }
                    //上传成功
                    let url = $("#imgss").val();
                    if(url!==''){
                        url = url+','+res.url;
                    }else{
                        url = res.url;
                    }
                    $("#imgss").val(url);
                    console.log($("#imgss").val())
                }
            });

        });

    </script>
@endsection

