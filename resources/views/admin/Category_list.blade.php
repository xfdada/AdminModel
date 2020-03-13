@extends('layouts.head')
@section('title', '类别管理')
@section('keyword', '管理系统后台')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                    <h4 class="page-title">类别管理</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:void();">首页</a></li>
                        <li class="breadcrumb-item"><a href="javaScript:void();">产品管理</a></li>
                        <li class="breadcrumb-item active" aria-current="page">类别管理</li>
                    </ol>
                </div>
            </div>
    <!-- End Breadcrumb-->
        <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"> <button type="button" onclick="uploads()" class="btn btn-outline-primary btn-sm waves-effect waves-light m-1">添加分类</button></div>
                <div class="card-body">
                    <table class="layui-hide" id="test" lay-filter="test3"></table>
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
            //第一个实例
            table.render({
                elem: '#test'
                ,url: '/my_admin/api/category_list' //数据接口
                ,defaultToolbar: ['', '', '']
                ,page:{theme: '#1E9FFF'}
                ,id:'#test3'
                ,cols: [[ //表头
                    {field: 'c_id', title: 'ID',  sort: true}
                    ,{field: 'c_name', title: '类别名称' }
                    ,{field: 'c_pid', title: '上级分类id'}
                    ,{field: 'c_time', title: '添加时间'}
                    ,{field: 'right', title: '操作',toolbar: '#barDemo' }
                ]]
            });
            //监听工具条
            table.on('tool(test3)', function(obj){
                var data = obj.data;
                if(obj.event === 'del'){
                    layer.confirm('真的删除该类别吗', function(index){
                        $.post('/my_admin/category/'+data.c_id,{_token: '{!! csrf_token() !!}',_method:'delete'},function (res) {
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
                        type:2,
                        area: ['600px','400px'],
                        title:'编辑类别',
                        content: '/my_admin/category/'+data.c_id+'/edit'

                    });
                }
            });
        });

        function uploads(){
            layui.use('layer',function () {
                layer.open({
                    type: 2,
                    title: '添加类别',
                    area: ['600px','400px'],
                    content: '/my_admin/category/create'
                });
            })
        }

    </script>
@endsection

