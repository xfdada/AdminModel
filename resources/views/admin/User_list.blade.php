@extends('layouts.head')
@section('title', '用户管理')
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
                    <h4 class="page-title">用户列表</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:''">首页</a></li>
                        <li class="breadcrumb-item"><a href="javaScript:''">用户管理</a></li>
                        <li class="breadcrumb-item active" aria-current="page">用户列表</li>
                    </ol>
                </div>
            </div>
    <!-- End Breadcrumb-->
        <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="layui-form" action="">
                        <div class="layui-form-item">
                            <div class="layui-input-inline">
                                <input type="text" name="params"  placeholder="请输入搜索参数" autocomplete="off" class="layui-input">
                            </div>
                            <div class="layui-input-inline">
                                <input type="text" name="start_time"placeholder="请选择注册时间" id="dtest1" class="layui-input"/>
                            </div>
                            <div class="layui-input-inline">
                                <input type="text" name="end_time"placeholder="请选择注册时间" id="dtest2" class="layui-input"/>
                            </div>
                            <button class="layui-btn" id="search" lay-submit lay-filter="searche_btn">搜索</button>
                        </div>
                    </form>
                    <table class="layui-hide" id="test" lay-filter="test3" lay-data="{id: 'idTest'}"></table>
                    <script type="text/html" id="barDemo">
                        <a style="color: #fff;" class="layui-btn layui-btn-xs layui-btn-normal" lay-event="edit">查看</a>
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
        layui.use(['table','laydate'], function(){
            var table = layui.table;
            var form = layui.form;
            var laydate = layui.laydate;


            form.on('submit(searche_btn)', function (data) {
                table.reload('idTest', {
                    method: 'get'
                    , where: {
                        params: data.field['params'] ,// 添加查询的参数
                        start_time: data.field['start_time'] ,
                        end_time: data.field['end_time'] ,
                    }
                    , page: {
                        curr: 1 // 重载后从第一页开始
                    }
                });
                return false;  // 阻止submit的表单提交
            });

            //第一个实例
            table.render({
                elem: '#test'
                ,url: '/my_admin/api/user_list' //数据接口
                ,toolbar:'#toolbarDemo'
                ,defaultToolbar: ['', '', '']
                ,page:{theme: '#1E9FFF'}
                ,id:'idTest'
                ,cols: [[ //表头
                    {field: 'user_id', title: 'ID',  sort: true}
                    ,{field: 'user_name', title: '用户名'}
                    ,{field: 'phone', title: '电话'}
                    ,{field: 'email', title: '邮箱'}
                    ,{field: 'crate_time', title: '创建时间'}
                    ,{field: 'status', title: '是否禁用',templet:function (p){return getStatus(p);}}
                    // ,{field: 'right', title: '操作',toolbar: '#barDemo' }
                ]]
            });
            laydate.render({
                elem: '#dtest1'
            });
            laydate.render({
                elem: '#dtest2'
                ,max: 0
            });
            //监听开关操作
            form.on('switch(sexDemo)', function(obj){
                let value = 0;
                if(obj.elem.checked){
                    value = 2;
                }else {
                    value = 1;
                }
                $.post('/my_admin/user/is_show/'+obj.value,{_token: "{!! csrf_token() !!}",value:value},function(res){
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
              if(obj.event === 'edit'){
                    layer.open({
                        title:data.user_name+'的详细信息',
                        type: 2,
                        area: ['700px', '500px'],
                        content: '哈哈哈哈'
                    });
                }
            });
        });

        function getStatus(p){
            if (p.status===2){
                var str = ' <input type="checkbox" name="status" value="'+p.user_id+'" checked lay-skin="switch" lay-text="是|否" lay-filter="sexDemo"/>';
            } else {
                var str = ' <input type="checkbox" name="status" value="'+p.user_id+'"  lay-skin="switch" lay-text="是|否" lay-filter="sexDemo"/>';
            }
            return str;
        }
    </script>
@endsection

