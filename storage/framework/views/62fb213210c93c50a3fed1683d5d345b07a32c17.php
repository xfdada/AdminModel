
<?php $__env->startSection('title', '轮播图管理'); ?>
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
                    <h4 class="page-title">轮播图列表</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:''">首页</a></li>
                        <li class="breadcrumb-item"><a href="javaScript:''">界面管理</a></li>
                        <li class="breadcrumb-item active" aria-current="page">轮播图列表</li>
                    </ol>
                </div>
            </div>
    <!-- End Breadcrumb-->
        <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><button type="button" onclick="uploads()" class="btn btn-outline-primary btn-sm waves-effect waves-light m-1">添加轮播图</button></div>
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
    <div id="tong" class="hide" style=" display: none;">
        <img id="tong_img" src="" style="width: 100%;height: 100%;">
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
                ,url: '/api/banner_list' //数据接口
                ,toolbar:'#toolbarDemo'
                ,defaultToolbar: ['', '', '']
                ,page:{theme: '#1E9FFF'}
                ,id:'#test3'
                ,cols: [[ //表头
                    {field: 'ba_id', title: 'ID',  sort: true}
                    ,{field: 'ba_urls', title: '缩略图(点击图片可查看)',templet:function (p){return getPicture(p.ba_urls);} }
                    ,{field: 'ba_href', title: '指向url'}
                    ,{field: 'ba_desc', title: '简述'}
                    ,{field: 'ba_time', title: '添加时间'}
                    ,{field: 'ba_index', title: '排序', edit: 'number',sort: true}
                    ,{field: 'right', title: '操作',toolbar: '#barDemo' }
                ]]
            });
            //开启编辑功能
            table.on('edit(test3)', function(obj){
                var value = obj.value //得到修改后的值
                    ,data = obj.data ;//得到所在行所有键值
                $.post('/banner/sort/'+data.ba_id,{index:value,'_token': "<?php echo csrf_token(); ?>"},function(res){
                    if (res.code===5){
                        layer.msg(res.msg,{icon:5});
                    } else{
                        layer.msg(res.msg,{icon:6});
                    }
                });
            });
            //监听工具条
            table.on('tool(test3)', function(obj){
                var data = obj.data;
              if(obj.event === 'del'){
                  layer.confirm('真的删除行么', function(index){
                      $.post('/banner/'+data.ba_id,{_method:'delete','_token': "<?php echo csrf_token(); ?>"},function(res){
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
                      ,content: '/banner/'+data.ba_id+'/edit'

                  });
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
                    area: ['600px','400px'],
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
    function uploads(){
        layui.use('layer',function () {
            layer.open({
                type: 2,
                title: '添加轮播图',
                area: ['600px','400px'],
                content: '/banner/create'
            });
        })
    }
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\PHPProgram\AdminModel\resources\views/admin/Banner_list.blade.php ENDPATH**/ ?>