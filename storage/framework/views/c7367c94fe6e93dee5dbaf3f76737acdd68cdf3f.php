﻿
<?php $__env->startSection('title', '类别管理'); ?>
<?php $__env->startSection('keyword', '管理系统后台'); ?>
<?php $__env->startSection('content'); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        layui.use('table', function(){
            var table = layui.table;
            //第一个实例
            table.render({
                elem: '#test'
                ,url: '/api/category_list' //数据接口
                ,toolbar:'#toolbarDemo'
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
                        $.post('/category/'+data.c_id,{_token: '<?php echo csrf_token(); ?>',_method:'delete'},function (res) {
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
                        content: '/category/'+data.c_id+'/edit'

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
                    content: '/category/create'
                });
            })
        }

    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\phpstudy_pro\WWW\AdminModel\resources\views/admin/Category_list.blade.php ENDPATH**/ ?>