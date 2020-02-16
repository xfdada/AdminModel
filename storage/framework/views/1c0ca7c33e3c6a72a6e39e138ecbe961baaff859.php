
<?php $__env->startSection('title', '用户管理'); ?>
<?php $__env->startSection('keyword', '管理系统后台'); ?>
<?php $__env->startSection('content'); ?>
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
                        <a style="color: #fff;" class="layui-btn layui-btn-xs layui-btn-normal" lay-event="edit">查看</a>
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
            table.render({
                elem: '#test'
                ,url: '/api/user_list' //数据接口
                ,toolbar:'#toolbarDemo'
                ,defaultToolbar: ['', '', '']
                ,page:{theme: '#1E9FFF'}
                ,id:'#test3'
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
            //监听开关操作
            form.on('switch(sexDemo)', function(obj){
                let value = 0;
                if(obj.elem.checked){
                    value = 2;
                }else {
                    value = 1;
                }
                $.post('/user/is_show/'+obj.value,{_token: "<?php echo csrf_token(); ?>",value:value},function(res){
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
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\PHPProgram\AdminModel\resources\views/admin/User_list.blade.php ENDPATH**/ ?>