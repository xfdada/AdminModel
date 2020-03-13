@extends('layouts.head')
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
                    <h4 class="page-title">退款列表</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:''">首页</a></li>
                        <li class="breadcrumb-item"><a href="javaScript:''">售后管理</a></li>
                        <li class="breadcrumb-item active" aria-current="page">退款列表</li>
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
                            <div class="layui-inline">
                                <div class="layui-input-inline">
                                    <select name="is_agree">
                                        <option value="">请选择是否同意退款</option>
                                        <option value="1">是</option>
                                        <option value="2">否</option>
                                    </select>
                                </div>
                            </div>
                            <button class="layui-btn" id="search" lay-submit lay-filter="searche_btn">搜索</button>
                        </div>
                    </form>
                    <table class="layui-hide" id="test" lay-filter="test3" lay-data="{id: 'idTest'}"></table>
                    <script type="text/html" id="barDemo">
                        <a style="color:#fff;" class="layui-btn layui-btn-xs layui-btn-normal" lay-event="edit">查看</a>
                        <a style="color:#fff;" class="layui-btn layui-btn-xs layui-btn-normal" lay-event="refund">退款</a>
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
            var form = layui.form;
            var laydate = layui.laydate;
            form.on('submit(searche_btn)', function (data) {
                table.reload('idTest', {
                    method: 'get'
                    , where: {
                        o_number: data.field['o_number'] ,// 添加查询的参数
                        is_agree:data.field['is_agree'] ,// 添加查询的参数
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
            table.render({
                elem: '#test'
                ,url: '/my_admin/api/refund_list' //数据接口
                ,toolbar:'#toolbarDemo'
                ,defaultToolbar: ['', '', '']
                ,page:{theme: '#1E9FFF'}
                ,id:'idTest'
                ,cols: [[ //表头
                    {field: 're_id', title: 'ID',  sort: true}
                    ,{field: 'o_number', title: '订单号'}
                    ,{field: 'user_name', title: '申请人'}
                    ,{field: 'city', title: '退款产品'}
                    ,{field: 're_money', title: '退款金额'}
                    ,{field: 're_reason', title: '退款原因'}
                    ,{field: 're_time', title: '申请时间'}
                    ,{field: 'is_agree', title: '是否同意申请',templet:function (p){return getStatus(p);}}
                    ,{field: 'is_sure', title: '退款状态',templet:function (p){return p.is_sure===1?'是':'否';}}
                    ,{field: 'a_name', title: '操作员'}
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
                $.post('/my_admin/refund/is_agree/'+obj.value,{_token: "{!! csrf_token() !!}",value:value},function(res){
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

                }else if(obj.event ==='refund') {
                    if(data.is_agree!==1){
                        layer.alert('不可操作，请先同意申请在进行操作');
                    }else{
                        layer.confirm('是否收到退货产品，', {
                            btn: ['是','否'] //按钮
                        }, function(){
                            //进行退款的相关逻辑,请求接口刷新当前页面等操作
                            layer.msg('的确很重要', {icon: 1});
                        }, function(){
                            layer.msg('请收到产品后再进行操作', {
                                time: 2000, //20s后自动关闭
                                btn: ['明白了']
                            });
                        });
                    }
                }
            });
        });
        function getStatus(p){
            if (p.is_agree===1){
                var str = ' <input type="checkbox" name="is_agree" value="'+p.re_id+'" checked lay-skin="switch" lay-text="是|否" lay-filter="sexDemo"/>';
            } else {
                var str = ' <input type="checkbox" name="is_agree" value="'+p.re_id+'"  lay-skin="switch" lay-text="是|否" lay-filter="sexDemo"/>';
            }
            return str;
        }
    </script>
@endsection

