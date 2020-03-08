﻿@extends('layouts.head')
@section('title', '售后管理')
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
                    <h4 class="page-title">常见产品答疑列表</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:''">首页</a></li>
                        <li class="breadcrumb-item"><a href="javaScript:''">售后管理</a></li>
                        <li class="breadcrumb-item active" aria-current="page">常见产品答疑列表</li>
                    </ol>
                </div>
            </div>
    <!-- End Breadcrumb-->
        <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><button type="button" onclick="uploads()" class="btn btn-outline-primary btn-sm waves-effect waves-light m-1">添加答疑</button></div>
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
@endsection
@section('script')
    <script>
        layui.use('table', function(){
            var table = layui.table;
            var form = layui.form;
            //第一个实例
            table.render({
                elem: '#test'
                ,url: '/api/question_list' //数据接口
                ,toolbar:'#toolbarDemo'
                ,defaultToolbar: ['', '', '']
                ,page:{theme: '#1E9FFF'}
                ,id:'#test3'
                ,cols: [[ //表头
                    {field: 'q_id', title: 'ID',  sort: true}
                    ,{field: 'p_name', title: '产品名称'}
                    ,{field: 'q_title', title: '问题'}
                    ,{field: 'q_answer', title: '解决方法',templet:function (p){  return getButton(p);}}
                    ,{field: 'q_time', title: '添加时间',sort: true}
                    ,{field: 'right', title: '操作',toolbar: '#barDemo' }
                ]]
            });
            //监听工具条
            table.on('tool(test3)', function(obj){
                var data = obj.data;
              if(obj.event === 'del'){
                  layer.confirm('真的删除该条数据吗', function(index){
                      $.post('/question/'+data.q_id,{_method:'delete','_token': "{!! csrf_token() !!}"},function(res){
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
                      ,title: '产品答疑编辑'
                      ,shade: 0.6 //遮罩透明度
                      ,content: '/question/'+data.q_id+'/edit'

                  });
                }
            });
        });
        function getButton(p) {
            var str = '<a style="color: #fff;" onclick="see_answer('+p.q_id+')" class="layui-btn layui-btn-xs layui-btn-normal" >查看解决方法</a>';
            return str;
        }
        function see_answer(id){
            layui.use('layer',function () {
                layer.open({
                    type: 2,
                    title: '查看解决方法',
                    area: ['600px','400px'],
                    content: '/question/'+id
                });
            })
    }
    function uploads(){
        layui.use('layer',function () {
            layer.open({
                type: 2,
                title: '添加答疑',
                area: ['800px','400px'],
                content: '/question/create'
            });
        })
    }
    </script>
@endsection

