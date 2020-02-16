@extends('layouts.head')
@section('title', '固件资源管理')
@section('keyword', '管理系统后台')
@section('content')
    <style>
        .layui-form-onswitch{
            background-color:#14abef !important;
        }
        .table td{
            padding: .15rem;
            vertical-align: initial;
        }
    </style>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                    <h4 class="page-title">固件资源管理</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:'';">首页</a></li>
                        <li class="breadcrumb-item"><a href="javaScript:'';">资源管理</a></li>
                        <li class="breadcrumb-item active" aria-current="page">固件管理</li>
                    </ol>
                </div>
            </div>
    <!-- End Breadcrumb-->
        <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"> <button type="button" onclick="uploads()" class="btn btn-outline-primary btn-sm waves-effect waves-light m-1">固件上传</button></div>
                <div class="card-body">
                    <table class="layui-hide" id="test" lay-filter="test3"></table>
                    <script type="text/html" id="toolbarDemo">
                        <div class="input-group" style="width: 50%">
                            <input type="text" class="form-control" style="border-color: #0f0f0f;" placeholder="搜索关键词">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="button">搜索</button>
                            </div>
                        </div>
                    </script>
                    <script type="text/html" id="barDemo">
                        <a style="color: #fff;" class="layui-btn layui-btn-xs layui-btn-normal" lay-event="edit">编辑</a>
                        <a style="color: #fff;" class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a>
                    </script>
                </div>
            </div>
        </div>
    </div><!-- End Row-->
        </div>
    </div>
@endsection
@section('script')
    <script>

        layui.use('table', function(){
            var table = layui.table;
            var form = layui.form;
            //第一个实例
            table.render({
                elem: '#test'
                ,url: '/api/res_list' //数据接口
                ,toolbar:'#toolbarDemo'
                ,defaultToolbar: ['', '', '']
                ,page:{theme: '#1E9FFF'}
                ,id:'#test3'
                ,cols: [[ //表头
                    {field: 'r_id', title: 'ID',  sort: true}
                    ,{field: 'r_name', title: '固件名称' }
                    ,{field: 'pr_id', title: '归属产品'}
                    ,{field: 'r_time', title: '上传时间'}
                    ,{field: 'is_down', title: '是否提供下载',templet:function (p){return getStatus(p);}}
                    ,{field: 'right', title: '操作',toolbar: '#barDemo' }
                ]]
            });
            //监听开关操作
            form.on('switch(sexDemo)', function(obj){
                let value = 0;
                if(obj.elem.checked){
                    value = 1;
                }else {
                    value = 2;
                }
                $.post('/res/is_show/'+obj.value,{_token: "{!! csrf_token() !!}",value:value},function(res){
                    if(res.code===0){
                        layer.msg(res.msg,{icon:6});
                    }else{
                        layer.msg(res.msg,{icon:5});
                    }
                })
            });
            //监听工具条
            table.on('tool(test3)', function(obj){
                var data = obj.data;
                if(obj.event === 'del'){
                    layer.confirm('真的删除行么', function(index){
                        $.post('/resources/'+data.r_id,{_method:'delete','_token': "{!! csrf_token() !!}"},function(res){
                            if(res.code===0){
                                obj.del();
                                layer.msg(res.msg,{icon:6});
                            }else{
                                layer.msg(res.msg,{icon:5});
                            }
                        });
                        layer.close(index);
                    });
                } else if(obj.event === 'edit'){
                    layer.open({
                        type: 2 //Page层类型
                        ,area: ['700px', '400px']
                        ,title: '固件资源编辑'
                        ,shade: 0.6 //遮罩透明度
                        ,content: '/resources/create'

                    });
                }
            });
        });
        function getStatus(p){
            if (p.is_down===1){
                var str = ' <input type="checkbox" name="is_show" value="'+p.r_id+'" checked lay-skin="switch" lay-text="是|否" lay-filter="sexDemo"/>';
            } else {
                var str = ' <input type="checkbox" name="is_show" value="'+p.r_id+'"  lay-skin="switch" lay-text="是|否" lay-filter="sexDemo"/>';
            }
            return str;
        }
        function uploads(){
            layui.use('layer',function () {
                layer.open({
                    type: 2 //Page层类型
                    ,area: ['600px', '500px']
                    ,title: '说明书上传'
                    ,shade: 0.6 //遮罩透明度
                    ,content: '/resources/create'

                });
            });


        }
    </script>
@endsection

