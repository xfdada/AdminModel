<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://www.layuicdn.com/layui/css/layui.css" />
</head>
<body>
<form class="layui-form" action="" style="margin: 20px 10px;">
     <div class="layui-form-item">
       <label class="layui-form-label">名称</label>
        <div class="layui-input-block">
            <input type="text" hidden name="r_url" id="resource_url">
            <input type="text" name="r_name" lay-verify="title" autocomplete="off" required placeholder="请输入固件名称" class="layui-input">
         </div>
         </div>
    <div class="layui-inline" style="margin-bottom: 20px">
        <label class="layui-form-label">归属产品型号</label>
        <div class="layui-input-inline">
            <select name="pr_id" lay-verify="required" lay-search="">
                <option value="">直接选择或搜索选择</option>
                <option value="1">layer</option>
                <option value="2">form</option>
                <option value="3">layim</option>
                <option value="4">element</option>
                <option value="5">laytpl</option>
                <option value="6">upload</option>
                <option value="7">laydate</option>
                <option value="8">laypage</option>
            </select>
        </div>
    </div>
    <div class="layui-form-item"> <label class="layui-form-label">上传</label><div class="layui-input-block"><button type="button"  class="layui-btn layui-btn-normal" id="test3"><i class="layui-icon"></i>点击上传</button><i>文件格式为7z，rar,tar,zip</i></div></div>
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
            $.post('/my_admin/resources',{_token: '{!! csrf_token() !!}',data:data.field},function(res){
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
        upload.render({ //允许上传的文件后缀
            elem: '#test3'
            ,url: '/my_admin/resource/upload'
            ,accept: 'file' //普通文件
            ,exts: '7z|zip|rar|tar' //只允许上传压缩文件
            ,done: function(res){
                if (res.code===0){
                    layer.msg('上传成功');
                    $('#resource_url').val(res.url);
                    return;
                }
                layer.msg('上传失败');
            }
        });
    });
</script>
</html>