@extends('layouts.head')
@section('title', '新闻列表')
@section('keyword', '管理系统后台')
@section('content')
    <!--Switchery-->
    <link href="{{asset('plugins/switchery/css/switchery.min.css')}}" rel="stylesheet" />
    <link href="{{asset('plugins/bootstrap-switch/bootstrap-switch.min.css')}}" rel="stylesheet">
    <style>
        .layui-form-onswitch{
            background-color:#14abef !important;
        }
    </style>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                    <h4 class="page-title">新闻列表</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:''">首页</a></li>
                        <li class="breadcrumb-item"><a href="javaScript:''">新闻</a></li>
                        <li class="breadcrumb-item active" aria-current="page">新闻列表</li>
                    </ol>
                </div>
            </div>
    <!-- End Breadcrumb-->
        <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">新闻列表</div>
                    <div class="card-body">
                        <form class="layui-form" action="">
                            <div class="layui-form-item">
                                <div class="layui-input-inline">
                                    <input type="text" name="n_title"  placeholder="请输入要搜索新闻的标题" autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-inline">
                                    <div class="layui-input-inline">
                                        <select name="n_type">
                                            <option value="">请选择新闻类型</option>
                                            <option value="1">新产品新闻</option>
                                            <option value="2">行业新闻</option>
                                            <option value="3">企业新闻</option>
                                        </select>
                                    </div>
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
                        <table class="layui-hide" id="test" lay-filter="test" lay-data="{id: 'idTest'}"></table>
                        <script type="text/html" id="barDemo">
                            <a style="color: #fff;" class="layui-btn layui-btn-xs layui-btn-normal" lay-event="show">查看</a>
                            <a style="color: #fff;"  class="layui-btn layui-btn-xs layui-btn-normal" lay-event="edit">编辑</a>
                            @{{#  if(d.top ==1){ }}
                            <a style="color: #fff;"  class="layui-btn layui-btn-xs layui-btn-normal" lay-event="no_top">取消置顶</a>
                            @{{# } }}
                            @{{#  if(d.top ==2){ }}
                            <a style="color: #fff;"  class="layui-btn layui-btn-xs layui-btn-normal" lay-event="top">置顶</a>
                            @{{# } }}
                            <a style="color: #fff;"  class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a>
                        </script>
                    </div>
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
                        n_title: data.field['n_title'] ,// 添加查询的参数
                        n_type:data.field['n_type'] ,// 添加查询的参数
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
            var tableIns =table.render({
                elem: '#test'
                ,url: '/api/news_list' //数据接口
                ,defaultToolbar: ['', '', '']
                ,page:{theme: '#1E9FFF'}
                ,id:'idTest'
                ,cols: [[ //表头
                    {field: 'n_id', title: 'ID',  sort: true}
                    ,{field: 'n_title', title: '文章标题'}
                    ,{field: 'n_type', title: '文字类型',templet:function (p){ let str=''; if(p.n_type===1){str='新产品新闻';}else if(p.n_type===2){str = '行业新闻';}else{str = '企业新闻';} return str;}}
                    ,{field: 'n_desc', title: '文章简介'}
                    ,{field: 'n_icon', title: '缩略图(点击图片可查看)',templet:function (p){return getPicture(p.n_icon);} }
                    ,{field: 'n_time', title: '发布时间'}
                    ,{field: 'n_read', title: '阅读量'}
                    ,{field: 'is_show', title: '是否显示',templet:function (p){return getStatus(p);}}
                    ,{field: 'right', title: '操作',width:'250',toolbar: '#barDemo' }
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
                $.post('/news/is_show/'+obj.value,{_token: "{!! csrf_token() !!}",value:value},function(res){
                    if(res.code===0){
                        layer.msg(res.msg,{icon:6});
                    }else{
                        layer.msg(res.msg,{icon:5});
                    }
                })
            });
            //监听工具条
            table.on('tool(test)', function(obj){
                var data = obj.data;
                if(obj.event === 'del'){
                    layer.confirm('真的删除行么', function(index){
                        $.post('/news/'+data.n_id,{_method:'delete','_token': "{!! csrf_token() !!}"},function(res){
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
                            area: ['800px','700px'],
                            title:'编辑新闻',
                            content: '/news/'+data.n_id+'/edit'
                        })
                }else if(obj.event ==='top'){
                    $.get('/news/top/'+data.n_id,function(res){
                        if(res.code===0){
                            layer.msg(res.msg,{icon:6});
                            setTimeout(function () {
                                reload();
                            },1000)
                        }else{
                            layer.msg(res.msg,{icon:5});
                        }
                    });

                } else if(obj.event ==='no_top'){
                    $.get('/news/no_top/'+data.n_id,function(res){
                        if(res.code===0){
                            layer.msg(res.msg,{icon:6});
                            setTimeout(function () {
                                reload();
                            },1000)
                        }else{
                            layer.msg(res.msg,{icon:5});
                        }
                    });

                }else if(obj.event ==='show'){

                }
            });

            function reload() {
                tableIns.reload();
            }
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
            if (p.is_show===1){
                var str = ' <input type="checkbox" name="is_show" value="'+p.n_id+'" checked lay-skin="switch" lay-text="是|否" lay-filter="sexDemo"/>';
            } else {
                var str = ' <input type="checkbox" name="is_show" value="'+p.n_id+'"  lay-skin="switch" lay-text="是|否" lay-filter="sexDemo"/>';
            }
            return str;
        }
    </script>
@endsection

