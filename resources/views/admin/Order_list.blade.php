@extends('layouts.head')
@section('title', '订单列表')
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
                        <a style="color: #fff;" class="layui-btn layui-btn-xs layui-btn-normal" lay-event="show">查看</a>
                        <a style="color: #fff;"  class="layui-btn layui-btn-xs layui-btn-normal" lay-event="edit">发货</a>
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
                ,url: '/api/order_list' //数据接口
                ,defaultToolbar: ['', '', '']
                ,page:{theme: '#1E9FFF'}
                ,id:'idTest'
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
                   if (data.is_pay===2){
                       layer.alert('未付款不能发货');
                       return;
                   }

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
@endsection

