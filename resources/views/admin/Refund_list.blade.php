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
        layui.use('table', function(){
            var table = layui.table;
            var form = layui.form;
            //第一个实例
            table.render({
                elem: '#test'
                ,url: 'http://www.model.com/test.json' //数据接口
                ,toolbar:'#toolbarDemo'
                ,defaultToolbar: ['', '', '']
                ,page:{theme: '#1E9FFF'}
                ,id:'#test3'
                ,cols: [[ //表头
                    {field: 'id', title: 'ID',  sort: true}
                    ,{field: 'username', title: '订单号'}
                    ,{field: 'sex', title: '申请人'}
                    ,{field: 'city', title: '退款产品'}
                    ,{field: 'sign', title: '退款金额'}
                    ,{field: 'sign', title: '退款原因'}
                    ,{field: 'sign', title: '申请时间'}
                    ,{field: 'sign', title: '是否同意申请',templet:function (p){return getStatus(p);}}
                    ,{field: 'sign', title: '退款状态',templet:function (p){return p.sign===1?'是':'否';}}
                    ,{field: 'experience', title: '操作员'}
                    ,{field: 'right', title: '操作',toolbar: '#barDemo' }
                ]]
            });
            //监听开关操作
            form.on('switch(sexDemo)', function(obj){
                layer.tips(this.value + ' ' + this.name + '：'+ obj.elem.checked, obj.othis);
            });
            //监听工具条
            table.on('tool(test3)', function(obj){
                var data = obj.data;
                if(obj.event === 'edit'){

                }else if(obj.event ==='refund') {
                    if(data.sign!==1){
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
            if (p.sign===1&&p.sign===1){
                var str = ' <input type="checkbox" name="is_agree" disabled value="'+p.sign+'" checked lay-skin="switch" lay-text="是|否" lay-filter="sexDemo"/>';
            } else {
                var str = ' <input type="checkbox" name="is_agree" value="'+p.sign+'"  lay-skin="switch" lay-text="是|否" lay-filter="sexDemo"/>';
            }
            return str;
        }
    </script>
@endsection

