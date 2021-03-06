﻿<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://www.layuicdn.com/layui/css/layui.css" />
    <script src="https://www.layuicdn.com/layui/layui.js"></script>
</head>
<body>
                            <form class="layui-form" action="">
                                <div class="layui-form-item">
                                    <label class="layui-form-label">新闻标题</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="n_title" lay-verify="n_title" autocomplete="off" value="{{$res->n_title}}" required placeholder="请输入标题" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">新闻类型</label>
                                    <div class="layui-input-block">
                                        <select name="n_type" lay-filter="n_type">
                                            <option value="">请选择</option>
                                            <option value="1" {{$res->n_type==1?'selected':''}}>新产品新闻</option>
                                            <option value="2" {{$res->n_type==2?'selected':''}}>行业新闻</option>
                                            <option value="3" {{$res->n_type==3?'selected':''}}>企业新闻</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">新闻简介</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="n_desc" lay-verify="required" value="{{$res->n_desc}}" lay-reqtext="描述必填" placeholder="请输入" autocomplete="off" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item" style="height: 120px">
                                    <label for="layui-form-label">新闻缩略图</label>
                                    <div style="display: flex;margin-left:100px;position: relative;top: -30px;">
                                        <div class="layui-upload">
                                            <button type="button" class="layui-btn" id="test1">上传图片</button>
                                            <input type="text" hidden id="n_icon" value="{{$res->n_icon}}"  lay-verify="required" lay-reqtext="缩略图必须上传" name="n_icon">
                                        </div>
                                        <div class="layui-upload-list" style="margin: 0 20px">
                                            <img class="layui-upload-img" src="{{$res->n_icon}}" style="width: 60px;height: 60px" id="demo1">
                                            <p id="demoText"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">新闻内容</label>
                                    <div class="layui-input-block">
                                        <script id="container" name="n_content"  style="height:400px;" type="text/plain">{!! $res->n_content !!}</script>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-input-block">
                                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                        <button type="submit" class="layui-btn" lay-submit="" lay-filter="demo1">提交</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!--End Row-->
        </div>
        <!-- End container-fluid-->

    </div><!--End content-wrapper-->
</body>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('ueditor/ueditor.config.js')}}"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="{{asset('ueditor/ueditor.all.js')}}"></script>

    <!--Form 表格验证js -->
    <script>
        $().ready(function() {
            var ue = UE.getEditor('container');
        });
        layui.use(['form', 'layedit', 'laydate','upload'], function(){
            var index = parent.layer.getFrameIndex(window.name);
            var form = layui.form,layer = layui.layer;
            var upload = layui.upload;
            //监听提交
            form.on('submit(demo1)', function(data){
               $.post('/my_admin/my_admin/news/{{$res->n_id}}',{data:data.field, '_token': "{!! csrf_token() !!}",_method:'put'},function(res){
                  if (res.code!==0){
                      layer.msg(res.msg, {icon: 4});
                      return;
                  }
                  layer.msg(res.msg,{icon:6});
                   parent.layer.close(index);
                   parent.location.reload();

               });
                return false;
            });
            $("#reset").click(function () {
                $("#searchContent").val("");
                $("#selectKey").val("");
                form.render();
            })
            //普通图片上传
            var uploadInst = upload.render({
                elem: '#test1'
                ,url: '/my_admin/my_admin/product/upload'
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
                    $("#n_icon").val(res.url);
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
        });
    </script>
</html>

