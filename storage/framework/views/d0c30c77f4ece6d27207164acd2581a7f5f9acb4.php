
<?php $__env->startSection('title', '售后管理'); ?>
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
                    <h4 class="page-title">售后列表</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:''">首页</a></li>
                        <li class="breadcrumb-item"><a href="javaScript:''">售后管理</a></li>
                        <li class="breadcrumb-item active" aria-current="page">售后列表</li>
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
                        <a style="color: #fff;" class="layui-btn layui-btn-xs layui-btn-normal" lay-event="send">发货</a>
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
        var imgs = new Array();
        layui.use(['table'], function(){
            var table = layui.table;
            var form = layui.form;
            //第一个实例
            table.render({
                elem: '#test'
                ,url: '/api/aftersell_list' //数据接口
                ,toolbar:'#toolbarDemo'
                ,defaultToolbar: ['', '', '']
                ,page:{theme: '#1E9FFF'}
                ,id:'#test3'
                ,cols: [[ //表头
                    {field: 'af_id', title: 'ID',  sort: true}
                    ,{field: 'o_number', title: '订单号'}
                    ,{field: 'user_name', title: '申请人'}
                    ,{field: 'af_type', title: '售后类型',templet:function (p){return p.af_type===1?'换货':'维修';}}
                    ,{field: 'af_img', title: '故障图(点击图片可查看)',templet:function (p){return getPicture(p);}}
                    ,{field: 'af_reason', title: '申请原因'}
                    ,{field: 'is_time', title: '是否过保',templet:function (p){return p.sign===1?'是':'否';}}
                    ,{field: 'af_money', title: '维修金额'}
                    ,{field: 'is_agree', title: '是否同意',templet:function (p){return getStatus(p);}}
                    ,{field: 'is_pay', title: '是否付款',templet:function (p){return p.is_pay===1?'是':'否';}}
                    ,{field: 'express_number', title: '快递单号'}
                    ,{field: 'af_time', title: '申请时间',sort: true}
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
                $.post('/after_sell/is_agree/'+obj.value,{_token: "<?php echo csrf_token(); ?>",value:value},function(res){
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
              if(obj.event === 'send'){
                  if(data.is_pay!==1){
                      layer.alert('已付款后再进行发货操作！！');
                      return;
                  }
                   //执行发货操作
                }
            });
        });

        function lookimg(url){
            let str = '';
            for (var i=0;i<imgs[url].length;i++){
                var htmls = '<div><img width="100%" height="100%" src="'+imgs[url][i]+'"/></div>'
               str +=htmls;
            }
            str = '<div class="hide"style="width: 853px;height: 480px;">'+str+'</div>';
            layui.use('layer',function () {
                layer.open({
                    type: 1,
                    title: false,
                    closeBtn: 0,
                    area: ['870px','480px'],
                    skin: 'layui-layer-nobg', //没有背景色
                    shadeClose: true,
                    content: str
                });
            })
        }
        //该方法有问题待解决
        function getPicture(p){
            var str ="";
            if(p.sign!=null&&p.sign!=""){
                str= "<img width='100%' height='100%' style='cursor: pointer' onclick=\"lookimg('"+p.id+"')\" src='"+p.sign[0]+"'>";
              }
            imgs[p.id] = p.sign;
        return str;
    }
        function getStatus(p){
            if (p.is_agree===1){
                var str = ' <input type="checkbox" name="is_show"  value="'+p.af_id+'" checked lay-skin="switch" lay-text="是|否" lay-filter="sexDemo"/>';
            } else {
                var str = ' <input type="checkbox" name="is_show" value="'+p.af_id+'"  lay-skin="switch" lay-text="是|否" lay-filter="sexDemo"/>';
            }
            return str;
        }
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\phpstudy_pro\WWW\AdminModel\resources\views/admin/AfterSell_list.blade.php ENDPATH**/ ?>