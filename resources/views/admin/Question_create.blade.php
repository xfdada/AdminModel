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
<style>
    .layui-form-label{
        padding:9px 0 !important;
    }
    .layui-form-select dl{
        z-index: 99999!important;
    }
</style>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body" style="margin: 20px" >
                        <form class="layui-form" action="">
                            <div class="step1">
                                <div class="layui-form-item">
                                    <label class="layui-form-label">常见问题</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="q_title"  lay-verify="required" autocomplete="off" placeholder="请输入问题名称" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">归属产品</label>
                                    <div class="layui-input-block">
                                        <select name="p_id" lay-verify="required" lay-search="">
                                            <option value="">请选择</option>
                                            @foreach($data as $v)
                                                <option value="{{$v->p_id}}">{{$v->p_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            <div class="step2" style="margin: 20px;">
                                <div class="form-group">
                                    <label for="name2">产品详情</label>
                                    <textarea id="container" style="margin: 20px 0 0 40px;" name="q_answer" lay-verify="required" lay-reqtext="请输入解决办法"  style="height:400px;" type="text/plain"></textarea>
                                </div>
                            </div>
                            <div class="layui-form-item" style="margin-top: 20px;">
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
<script src="https://www.layuicdn.com/layui/layui.js"></script>
<script type="text/javascript" src="{{asset('ueditor/ueditor.config.js')}}"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="{{asset('ueditor/ueditor.all.js')}}"></script>
<script>
    $().ready(function() {
        var ue = UE.getEditor('container');
    });
    layui.use(['form','upload'],function(){
        var $ = layui.jquery,upload = layui.upload;
        var form = layui.form,layer = layui.layer;
        form.on('submit(demo1)', function(data){
            $.post('/question',{_token: '{!! csrf_token() !!}',data:data.field},function(res){
                if(res.code===0){
                    var index = parent.layer.getFrameIndex(window.name);
                    layer.msg(res.msg,{icon:6});
                    setTimeout(function(){
                        parent.location.reload();//刷新父页面.
                        parent.layer.close(index);
                    },2000)

                }else{
                    layer.msg(res.msg,{icon:5});
                }
            });
            return false;
        });

    });

</script>
</body>
</html>

