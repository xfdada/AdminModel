
<?php $__env->startSection('title', '订单列表'); ?>
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
                    <h4 class="page-title">订单列表</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:void();">首页</a></li>
                        <li class="breadcrumb-item"><a href="javaScript:void();">订单管理</a></li>
                        <li class="breadcrumb-item active" aria-current="page">订单列表</li>
                    </ol>
                </div>
            </div>
    <!-- End Breadcrumb-->
        <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">订单列表</div>
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
                        <a style="color: #fff;" class="layui-btn layui-btn-xs layui-btn-normal" lay-event="show">查看</a>
                        <a style="color: #fff;"  class="layui-btn layui-btn-xs layui-btn-normal" lay-event="edit">发货</a>
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
                ,url: '/api/order_list' //数据接口
                ,toolbar:'#toolbarDemo'
                ,defaultToolbar: ['', '', '']
                ,page:{theme: '#1E9FFF'}
                ,id:'#test3'
                ,cols: [[ //表头
                    {field: 'o_id', title: 'ID',  sort: true}
                    ,{field: 'o_number', title: '订单号'}
                    ,{field: 'o_title', title: '订单名称'}
                    ,{field: 'user_name', title: '购买用户'}
                    ,{field: 'addr_pro', title: '地址',templet:function (p){  return p.addr_pro+p.addr_city+p.addr_dist+p.addr_detail;}}
                    ,{field: 'o_money', title: '总价格'}
                    ,{field: 'coupon', title: '优惠金额'}
                    ,{field: 'is_pay', title: '是否付款',templet:function (p){  return p.is_pay===1?'已付款':'未付款' ;}}
                    ,{field: 'pay_time', title: '付款时间',  sort: true}
                    ,{field: 'express_number', title: '快递单号'}
                    ,{field: 'out_time', title: '发货时间',  sort: true}
                    ,{field: 'right', title: '操作',width:'150',toolbar: '#barDemo' }
                ]]
            });
            //监听工具条
            table.on('tool(test3)', function(obj){
                var data = obj.data;
                if(obj.event === 'del'){
                    layer.confirm('真的删除行么', function(index){
                        obj.del();
                        layer.close(index);
                    });
                } else if(obj.event === 'edit'){
                    window.location.href = "/news_edit";
                }else if(obj.event ==='top'){

                } else if(obj.event ==='show'){

                }
            });
        });

        function getStatus(status){
            if (status===1){
                var str = ' <input type="checkbox" name="sex" value="'+status+'" checked lay-skin="switch" lay-text="是|否" lay-filter="sexDemo"/>';
            } else {
                var str = ' <input type="checkbox" name="sex" value="'+status+'"  lay-skin="switch" lay-text="是|否" lay-filter="sexDemo"/>';
            }
            return str;
        }
        function getStatus1(status){
            if (status===1){
                var str = ' <input type="checkbox" name="sex" value="'+status+'" checked lay-skin="switch" lay-text="是|否" lay-filter="sexDemo1"/>';
            } else {
                var str = ' <input type="checkbox" name="sex" value="'+status+'"  lay-skin="switch" lay-text="是|否" lay-filter="sexDemo1"/>';
            }
            return str;
        }
        function getStatus2(status){
            if (status===1){
                var str = ' <input type="checkbox" name="sex" value="'+status+'" checked lay-skin="switch" lay-text="是|否" lay-filter="sexDemo2"/>';
            } else {
                var str = ' <input type="checkbox" name="sex" value="'+status+'"  lay-skin="switch" lay-text="是|否" lay-filter="sexDemo2"/>';
            }
            return str;
        }
        function edit() {
            window.location.href = "/news_edit";
        }
        // 查看
        function see() {
            window.location.href = "/productadd/show";
        }
        // 置顶
        function tops() {

        }

    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\PHPProgram\AdminModel\resources\views/admin/Order_list.blade.php ENDPATH**/ ?>