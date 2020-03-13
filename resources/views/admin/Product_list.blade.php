@extends('layouts.head')
@section('title', '产品列表')
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
                    <form class="layui-form" action="">
                        <div class="layui-form-item">
                            <div class="layui-input-inline">
                                <input type="text" name="p_name"  placeholder="请输入要搜索产品名称" autocomplete="off" class="layui-input">
                            </div>
                            <div class="layui-input-inline">
                                <input type="text" name="start_time"placeholder="请选择添加时间" id="dtest1" class="layui-input"/>
                            </div>
                            <div class="layui-input-inline">
                                <input type="text" name="end_time"placeholder="请选择添加时间" id="dtest2" class="layui-input"/>
                            </div>
                            <button class="layui-btn" id="search" lay-submit lay-filter="searche_btn">搜索</button>
                        </div>
                    </form>
                    <table class="layui-hide" id="test" lay-filter="test3" lay-data="{id: 'idTest'}"></table>
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
                        p_name: data.field['p_name'] ,// 添加查询的参数
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
                ,url: '/my_admin/api/product_list' //数据接口
                ,defaultToolbar: ['', '', '']
                ,page:{theme: '#1E9FFF'}
                ,id:'idTest'
                ,cols: [[ //表头
                    {field: 'p_id', title: 'ID',  sort: true, fixed: 'left'}
                    ,{field: 'p_name', title: '产品名称'}
                    ,{field: 'p_desc', title: '产品简介'}
                    ,{field: 'p_icon', title: '缩略图(点击图片可查看)',templet:function (p){return getPicture(p.p_icon);} }
                    ,{field: 'c_name', title: '产品类别'}
                    ,{field: 'now_price', title: '产品价格'}
                    ,{field: 'is_hot', title: '是否热门',templet:function (p){return getStatus(p);}}
                    ,{field: 'is_new', title: '是否新品',templet:function (p){return getStatus1(p);}}
                    ,{field: 'is_show', title: '是否显示',templet:function (p){return getStatus2(p);}}
                    ,{field: 'is_stop', title: '是否停产',templet:function (p){return getStatus3(p);}}
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
                $.post('/my_admin/productadd/is_hot/'+obj.value,{_token: "{!! csrf_token() !!}",value:value},function(res){
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
                $.post('/my_admin/productadd/is_new/'+obj.value,{_token: "{!! csrf_token() !!}",value:value},function(res){
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
                $.post('/my_admin/productadd/is_show/'+obj.value,{_token: "{!! csrf_token() !!}",value:value},function(res){
                    if(res.code===0){
                        layer.msg(res.msg,{icon:6});
                    }else{
                        layer.msg(res.msg,{icon:5});
                    }
                })
            });
            form.on('switch(sexDemo3)', function(obj){
                let value = 0;
                if(obj.elem.checked){
                    value = 1;
                }else {
                    value = 2;
                }
                $.post('/my_admin/productadd/is_stop/'+obj.value,{_token: "{!! csrf_token() !!}",value:value},function(res){
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
                        $.post('/my_admin/productadd/'+data.p_id,{_method:'delete','_token': "{!! csrf_token() !!}"},function(res){
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
                       type:2,
                       title:'编辑类别',
                       area:['800px','600px'],
                       content: '/my_admin/productadd/'+data.p_id+'/edit'
                   })
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
        function getStatus3(p){
            if (p.is_stop===1){
                var str = ' <input type="checkbox" name="sex" value="'+p.p_id+'" checked lay-skin="switch" lay-text="是|否" lay-filter="sexDemo3"/>';
            } else {
                var str = ' <input type="checkbox" name="sex" value="'+p.p_id+'"  lay-skin="switch" lay-text="是|否" lay-filter="sexDemo3"/>';
            }
            return str;
        }
    </script>
@endsection

