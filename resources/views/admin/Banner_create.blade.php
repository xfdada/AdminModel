<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://www.layuicdn.com/layui/css/layui.css" />
    <script src="{{asset('js/jquery.min.js')}}"></script>
</head>
<body>
<form class="layui-form" action="" method="post" style="margin: 20px 10px;">
     <div class="layui-form-item">
       <label class="layui-form-label">跳转路由</label>
        <div class="layui-input-block">
            <input type="text" hidden name="ba_url" id="book_url">
            <input type="text" name="ba_href" lay-verify="title" autocomplete="off" required placeholder="请输入跳转的路由" class="layui-input">
         </div>
     </div>
    <div class="layui-form-item">
        <label class="layui-form-label">图片简介</label>
        <div class="layui-input-block">
            <input type="text" name="ba_desc" lay-verify="required" lay-reqtext="描述必填" placeholder="请输入简介" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item" style="height: 120px">
        <label for="layui-form-label">上传轮播图</label>
        <div style="display: flex;margin-left:100px;position: relative;top: -30px;">
            <div class="layui-upload">
                <button type="button" class="layui-btn" id="test1">上传</button>
                <input type="text" hidden id="n_icon" lay-verify="required" lay-reqtext="缩略图必须上传" name="ba_url">
            </div>
            <div class="layui-upload-list" style="margin: 0 20px">
                <img class="layui-upload-img" style="width: 60px;height: 60px" id="demo1">
                <p id="demoText"></p>
            </div>
        </div>
    </div>
    <div class="layui-form-item">
     <div class="layui-input-block">
     <button type="submit" class="layui-btn layui-btn-normal" lay-submit="" lay-filter="demo1">立即提交</button>
            </div>
        </div>
    </form>
</body>
<script src="https://www.layuicdn.com/layui/layui.js"></script>
<script>
    layui.use( ['upload','form'], function() {
        var form = layui.form;
        //监听提交
        form.on('submit(demo1)', function(data){
            $.post('/my_admin/banner',{_token: '{!! csrf_token() !!}',data:data.field},function(res){
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

        var $ = layui.jquery,upload = layui.upload;
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
                $("#n_icon").val(res.url);
                return layer.msg('上传成功');

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