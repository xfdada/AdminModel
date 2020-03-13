@extends('layouts.head')
@section('title', '订单管理')
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
                    <h4 class="page-title">支付列表</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:''">首页</a></li>
                        <li class="breadcrumb-item"><a href="javaScript:''">订单管理</a></li>
                        <li class="breadcrumb-item active" aria-current="page">支付列表</li>
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
                            <div class="layui-input-inline">
                                <input type="text" name="o_number"  placeholder="请输入要搜索的订单号" autocomplete="off" class="layui-input">
                            </div>
                            <div class="layui-input-inline">
                                <input type="text" name="start_time"placeholder="请选择开始时间" id="dtest1" class="layui-input"/>
                            </div>
                            <div class="layui-input-inline">
                                <input type="text" name="end_time"placeholder="请选择结束时间" id="dtest2" class="layui-input"/>
                            </div>
                            <button class="layui-btn" id="search" lay-submit lay-filter="searche_btn">搜索</button>
                        </div>
                    </form>
                    <table class="layui-hide" id="test" lay-filter="test3" lay-data="{id: 'idTest'}"></table>
                    <script type="text/html" id="barDemo">
                        <a style="color: #fff;" class="layui-btn layui-btn-xs layui-btn-normal" lay-event="edit">查看</a>
                    </script>
                </div>
            </div>
        </div>
    </div><!-- End Row-->
        </div>
    </div>
@endsection
@section('script')
    <script>
        layui.use(['table','laydate'], function(){
            var table = layui.table;
            var laydate = layui.laydate;
            var form = layui.form;
            form.on('submit(searche_btn)', function (data) {
                /**
                 * 数据表格的重载功能
                 */
                table.reload('idTest', {
                    method: 'get'
                    , where: {
                        o_number: data.field['o_number'] ,// 添加查询的参数
                        start_time: data.field['start_time'] ,// 添加查询的参数
                        end_time: data.field['end_time'] ,
                    }
                    , page: {
                        curr: 1 // 重载后从第一页开始
                    }
                });
                return false;  // 阻止submit的表单提交
            });
            //第一个实例
            laydate.render({
                elem: '#dtest1'
            });
            laydate.render({
                elem: '#dtest2'
                ,max: 0
            });
            //第一个实例
            table.render({
                elem: '#test'
                ,url: '/my_admin/api/pay_list' //数据接口
                ,toolbar:'#toolbarDemo'
                ,defaultToolbar: ['', '', '']
                ,page:{theme: '#1E9FFF'}
                ,id:'idTest'
                ,cols: [[ //表头
                    {field: 'pay_id', title: 'ID',  sort: true}
                    ,{field: 'pay_order', title: '支付订单号'}
                    ,{field: 'pay_money', title: '支付金额',  sort: true}
                    ,{field: 'pay_time', title: '订单生成时间',  sort: true}
                    ,{field: 'pay_type', title: '支付方式'}
                    ,{field: 'is_pay', title: '是否支付',templet:function (p){return p.is_pay===1?'是':'否';}}
                    ,{field: 'success_time', title: '支付时间',  sort: true}
                    ,{field: 'right', title: '操作',toolbar: '#barDemo' }
                ]]
            });
        });
    </script>
@endsection

