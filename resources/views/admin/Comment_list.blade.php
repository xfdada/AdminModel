﻿@extends('layouts.head')
@section('title', '评论留言')
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
                    <h4 class="page-title">评论列表</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:''">首页</a></li>
                        <li class="breadcrumb-item"><a href="javaScript:''">评论留言</a></li>
                        <li class="breadcrumb-item active" aria-current="page">评论列表</li>
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
                            <div class="layui-inline">
                                <div class="layui-input-inline">
                                    <select name="product">
                                        <option value="">请选择产品名称</option>
                                        @foreach ($product as $v)
                                            <option value="{{$v->p_id}}">{{$v->p_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button class="layui-btn" id="search" lay-submit lay-filter="searche_btn">搜索</button>
                        </div>
                    </form>
                    <table class="layui-hide" id="test" lay-filter="test3" lay-data="{id: 'idTest'}"></table>
                    <script type="text/html" id="barDemo">
                        <a style="color: #fff;" class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a>
                    </script>
                </div>
            </div>
        </div>
    </div><!-- End Row-->
        </div>
    </div>
{{--    <div id="tong" class="hide" style=" display: none;">--}}
{{--        <img id="tong_img" src="" >--}}
{{--    </div>--}}

@endsection
@section('script')
    <script>
        var imgs = new Array();
        layui.use(['table'], function(){
            var table = layui.table;
            var form = layui.form;
            form.on('submit(searche_btn)', function (data) {
                /**
                 * 数据表格的重载功能
                 */
                table.reload('idTest', {
                    method: 'get'
                    , where: {
                        product: data.field['product'] ,// 添加查询的参数
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
                ,url: '/my_admin/api/comment_list' //数据接口
                ,page:{theme: '#1E9FFF'}
                ,id:'idTest'
                ,cols: [[ //表头
                    {field: 'cm_id', title: 'ID',  sort: true}
                    ,{field: 'user_name', title: '用户名称'}
                    ,{field: 'p_name', title: '商品名称'}
                    ,{field: 'cm_img', title: '评价图片(点击查看)',templet:function (p){return getPicture(p);}}
                    ,{field: 'cm_content', title: '评价内容'}
                    ,{field: 'cm_time', title: '评价时间',sort: true}
                    ,{field: 'cm_score', title: '评分',sort: true}
                    ,{field: 'cm_replay', title: '回复(点击回复)',edit: 'text'}
                    ,{field: 'is_show', title: '是否显示',templet:function (p){return getStatus(p);}}
                    ,{field: 'right', title: '操作',toolbar: '#barDemo' }
                ]]
            });
            //开启编辑功能
            table.on('edit(test3)', function(obj){
                var value = obj.value //得到修改后的值
                    ,data = obj.data ;//得到所在行所有键值
                $.post('/my_admin/comment/replay/'+data.cm_id,{replay:value,'_token': "{!! csrf_token() !!}"},function(res){
                    if (res.code===5){
                        layer.msg(res.msg,{icon:5});
                    } else{
                        layer.msg(res.msg,{icon:6});
                    }
                });
            });

            //监听开关操作
            form.on('switch(sexDemo)', function(obj){
                let value = 0;
                if(obj.elem.checked){
                    value = 1;
                }else {
                    value = 2;
                }
                $.post('/my_admin/comment/is_show/'+obj.value,{_token: "{!! csrf_token() !!}",value:value},function(res){
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
                    layer.confirm('真的删除行么', function(index){
                        obj.del();
                        layer.close(index);
                    });
                } else if(obj.event === 'edit'){
                    layer.alert('编辑行：<br>'+ JSON.stringify(data))
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
        function getPicture(p){
            var str ="";
            if(p.sign!=null&&p.sign!=""){
                str= "<img width='100%' height='100%' style='cursor: pointer' onclick=\"lookimg('"+p.id+"')\" src='"+p.sign[0]+"'>";
              }
            imgs[p.id] = p.sign;
        return str;
    }
        function getStatus(p){
            if (p.is_show===1){
                var str = ' <input type="checkbox" name="is_show" value="'+p.cm_id+'" checked lay-skin="switch" lay-text="是|否" lay-filter="sexDemo"/>';
            } else {
                var str = ' <input type="checkbox" name="is_show" value="'+p.cm_id+'"  lay-skin="switch" lay-text="是|否" lay-filter="sexDemo"/>';
            }
            return str;
        }
    </script>
@endsection

