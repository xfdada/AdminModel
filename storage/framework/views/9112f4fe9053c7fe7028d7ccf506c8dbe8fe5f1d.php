
<?php $__env->startSection('title', '产品列表'); ?>
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
                    <h4 class="page-title">产品列表</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:void();">首页</a></li>
                        <li class="breadcrumb-item"><a href="javaScript:void();">产品管理</a></li>
                        <li class="breadcrumb-item active" aria-current="page">产品列表</li>
                    </ol>
                </div>
            </div>
    <!-- End Breadcrumb-->
        <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">产品列表</div>
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
                        <a style="color: #fff;"  class="layui-btn layui-btn-xs layui-btn-normal" lay-event="edit">编辑</a>
                        <a style="color: #fff;"  class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a>
                    </script>
                </div>
            </div>
        </div>
    </div><!-- End Row-->
        </div>
    </div>
    <div id="tong" class="hide" style=" display: none;">
        <img id="tong_img" src="" style="max-width: 100%;">
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
                ,url: '/api/product_list' //数据接口
                ,toolbar:'#toolbarDemo'
                ,defaultToolbar: ['', '', '']
                ,page:{theme: '#1E9FFF'}
                ,id:'#test3'
                ,cols: [[ //表头
                    {field: 'p_id', title: 'ID',  sort: true, fixed: 'left'}
                    ,{field: 'p_name', title: '产品名称'}
                    ,{field: 'p_desc', title: '产品简介'}
                    ,{field: 'p_icon', title: '缩略图(点击图片可查看)',templet:function (p){return getPicture(p.p_icon);} }
                    ,{field: 'c_name', title: '产品类别'}
                    ,{field: 'is_hot', title: '是否热门',templet:function (p){return getStatus(p);}}
                    ,{field: 'is_new', title: '是否新品',templet:function (p){return getStatus1(p);}}
                    ,{field: 'is_show', title: '是否显示',templet:function (p){return getStatus2(p);}}
                    ,{field: 'right', title: '操作',width:'200',toolbar: '#barDemo' }
                ]]
            });
            form.on('switch(sexDemo)', function(obj){
                let value = 0;
                if(obj.elem.checked){
                    value = 1;
                }else {
                    value = 2;
                }
                $.post('/productadd/is_hot/'+obj.value,{_token: "<?php echo csrf_token(); ?>",value:value},function(res){
                    if(res.code===0){
                        layer.msg(res.msg,{icon:6});
                    }else{
                        layer.msg(res.msg,{icon:5});
                    }
                })
            });
            form.on('switch(sexDemo1)', function(obj){
                let value = 0;
                if(obj.elem.checked){
                    value = 1;
                }else {
                    value = 2;
                }
                $.post('/productadd/is_new/'+obj.value,{_token: "<?php echo csrf_token(); ?>",value:value},function(res){
                    if(res.code===0){
                        layer.msg(res.msg,{icon:6});
                    }else{
                        layer.msg(res.msg,{icon:5});
                    }
                })
            });
            form.on('switch(sexDemo2)', function(obj){
                let value = 0;
                if(obj.elem.checked){
                    value = 1;
                }else {
                    value = 2;
                }
                $.post('/productadd/is_show/'+obj.value,{_token: "<?php echo csrf_token(); ?>",value:value},function(res){
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
                    layer.confirm('真的删除该产品吗？', function(index){
                        $.post('/productadd/'+data.p_id,{_method:'delete','_token': "<?php echo csrf_token(); ?>"},function(res){
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
                    window.location.href = "/news_edit";
                }else if(obj.event ==='top'){

                } else if(obj.event ==='show'){

                }
            });
        });

        function lookimg(url){
            $("#tong_img").attr('src',url);
            layui.use('layer',function () {
                layer.open({
                    type: 1,
                    title: false,
                    closeBtn: 0,
                    area: ['auto'],
                    skin: 'layui-layer-nobg', //没有背景色
                    shadeClose: true,
                    content: $('#tong')
                });
            })
        }
        function getPicture(p){
            var str ="";
            if(p!=null&&p!=""){
                str= "<img width='100%' height='100%' onclick=\"lookimg('"+p+"')\" src='"+p+"'>";
            }
            return str;
        }
        function getStatus(p){
            if (p.is_hot===1){
                var str = ' <input type="checkbox" name="sex" value="'+p.p_id+'" checked lay-skin="switch" lay-text="是|否" lay-filter="sexDemo"/>';
            } else {
                var str = ' <input type="checkbox" name="sex" value="'+p.p_id+'"  lay-skin="switch" lay-text="是|否" lay-filter="sexDemo"/>';
            }
            return str;
        }
        function getStatus1(p){
            if (p.is_new===1){
                var str = ' <input type="checkbox" name="sex" value="'+p.p_id+'" checked lay-skin="switch" lay-text="是|否" lay-filter="sexDemo1"/>';
            } else {
                var str = ' <input type="checkbox" name="sex" value="'+p.p_id+'"  lay-skin="switch" lay-text="是|否" lay-filter="sexDemo1"/>';
            }
            return str;
        }
        function getStatus2(p){
            if (p.is_show===1){
                var str = ' <input type="checkbox" name="sex" value="'+p.p_id+'" checked lay-skin="switch" lay-text="是|否" lay-filter="sexDemo2"/>';
            } else {
                var str = ' <input type="checkbox" name="sex" value="'+p.p_id+'"  lay-skin="switch" lay-text="是|否" lay-filter="sexDemo2"/>';
            }
            return str;
        }

    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\phpstudy_pro\WWW\AdminModel\resources\views/admin/Product_list.blade.php ENDPATH**/ ?>