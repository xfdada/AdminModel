@extends('layouts.head')
@section('title', '顶部banner图管理')
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
                    <h4 class="page-title">banner图列表</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:''">首页</a></li>
                        <li class="breadcrumb-item"><a href="javaScript:''">界面管理</a></li>
                        <li class="breadcrumb-item active" aria-current="page">banner图列表</li>
                    </ol>
                </div>
            </div>
    <!-- End Breadcrumb-->
        <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><button type="button" onclick="uploads()" class="btn btn-outline-primary btn-sm waves-effect waves-light m-1">添加banner图</button></div>
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
    <div id="tong" class="hide" style=" display: none;">
        <img id="tong_img" src="" style="width: 100%;height: 100%;">
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
                ,url: '/my_admin/api/top_banner_list' //数据接口
                ,page:{theme: '#1E9FFF'}
                ,id:'#test3'
                ,cols: [[ //表头
                    {field: 'tb_id', title: 'ID',  sort: true}
                    ,{field: 'tb_url', title: 'banner图(点击查看)',templet:function (p){return getPicture(p.tb_url);} }
                    ,{field: 'tb_name', title: '所属页面'}
                    ,{field: 'tb_time', title: '添加时间'}
                    ,{field: 'right', title: '操作',toolbar: '#barDemo' }
                ]]
            });
            //开启编辑功能
            table.on('edit(test3)', function(obj){
                var value = obj.value //得到修改后的值
                    ,data = obj.data ;//得到所在行所有键值
                $.post('/my_admin/banner/sort/'+data.ba_id,{index:value,'_token': "{!! csrf_token() !!}"},function(res){
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
                  layer.confirm('真的删除么', function(index){
                      $.post('/my_admin/top_banner/'+data.tb_id,{_method:'delete','_token': "{!! csrf_token() !!}"},function(res){
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
                      ,title: '轮播图编辑'
                      ,shade: 0.6 //遮罩透明度
                      ,content: '/my_admin/top_banner/'+data.tb_id+'/edit'

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
                content: '/my_admin/top_banner/create'
            });
        })
    }
    </script>
@endsection

