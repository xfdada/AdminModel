﻿
<?php $__env->startSection('title', '说明书管理'); ?>
<?php $__env->startSection('keyword', '管理系统后台'); ?>
<?php $__env->startSection('content'); ?>
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
                    <h4 class="page-title">说明书管理</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:void();">首页</a></li>
                        <li class="breadcrumb-item"><a href="javaScript:void();">资源管理</a></li>
                        <li class="breadcrumb-item active" aria-current="page">说明书管理</li>
                    </ol>
                </div>
            </div>
    <!-- End Breadcrumb-->
        <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"> <button type="button" onclick="uploads()" class="btn btn-outline-primary btn-sm waves-effect waves-light m-1">说明书上传</button></div>
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
            var form = layui.form;
            //第一个实例
            var tableIns =table.render({
                elem: '#test'
                ,url: '/api/book_list' //数据接口
                ,toolbar:'#toolbarDemo'
                ,defaultToolbar: ['', '', '']
                ,page:{theme: '#1E9FFF'}
                ,id:'#test3'
                ,cols: [[ //表头
                    {field: 'b_id', title: 'ID',  sort: true}
                    ,{field: 'b_name', title: '说明书名称' }
                    ,{field: 'pr_id', title: '归属产品'}
                    ,{field: 'b_time', title: '上传时间'}
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
                $.post('/books/is_show/'+obj.value,{_token: "<?php echo csrf_token(); ?>",value:value},function(res){
                    if(res.code===0){
                        layer.msg(res.msg,{icon:6});
                    }else{
                        layer.msg(res.msg,{icon:5});
                    }
                })
            });

            //开启编辑功能
            table.on('edit(test3)', function(obj){
                var value = obj.value //得到修改后的值
                    ,data = obj.data //得到所在行所有键值
                    ,field = obj.field; //得到字段
                layer.msg('[ID: '+ data.id +'] ' + field + ' 字段更改为：'+ value);
            });
            //监听工具条
            table.on('tool(test3)', function(obj){
                var data = obj.data;
                if(obj.event === 'del'){
                    layer.confirm('真的删除行么', function(index){
                        $.post('/books/'+data.b_id,{_method:'delete','_token': "<?php echo csrf_token(); ?>"},function(res){
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
                        ,title: '说明书编辑'
                        ,shade: 0.6 //遮罩透明度
                        ,content: '/books/'+data.b_id+'/edit'

                    });
                }
            });
        });
        // 删除
        function getStatus(p){
            if (p.is_down===1){
                var str = ' <input type="checkbox" name="is_down" value="'+p.b_id+'" checked lay-skin="switch" lay-text="是|否" lay-filter="sexDemo"/>';
            } else {
                var str = ' <input type="checkbox" name="is_down" value="'+p.b_id+'"  lay-skin="switch" lay-text="是|否" lay-filter="sexDemo"/>';
            }
            return str;
        }
        function uploads(){
            layui.use('layer',function () {
                layer.open({
                    type: 2 //Page层类型
                    ,area: ['700px', '500px']
                    ,title: '说明书上传'
                    ,shade: 0.6 //遮罩透明度
                    ,content: '/books/create'

                });
            });


        }
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\phpstudy_pro\WWW\AdminModel\resources\views/admin/Productbook_list.blade.php ENDPATH**/ ?>