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
                        <a style="color: #fff;" class="layui-btn layui-btn-xs layui-btn-normal" lay-event="show">查看</a>
                        <a style="color: #fff;"  class="layui-btn layui-btn-xs layui-btn-normal" lay-event="edit">编辑</a>
                        <a style="color: #fff;"  class="layui-btn layui-btn-xs layui-btn-normal" lay-event="top">置顶</a>
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
                    {field: 'id', title: 'ID',  sort: true, fixed: 'left'}
                    ,{field: 'sex', title: '产品名称'}
                    ,{field: 'city', title: '产品简介'}
                    ,{field: 'username', title: '缩略图(点击图片可查看)',templet:function (p){return getPicture(p.username);} }
                    ,{field: 'sign', title: '产品类别'}
                    ,{field: 'sign', title: '是否推荐',templet:function (p){return getStatus(p.sign);}}
                    ,{field: 'experience', title: '是否热门',templet:function (p){return getStatus1(p.sign);}}
                    ,{field: 'experience', title: '是否显示',templet:function (p){return getStatus2(p.sign);}}
                    ,{field: 'right', title: '操作',width:'250',toolbar: '#barDemo' }
                ]]
            });
            form.on('switch(sexDemo)', function(obj){
                console.log(obj.othis);
                layer.tips(this.value + ' ' + this.name + '：'+ obj.elem.checked, obj.othis);
            });
            form.on('switch(sexDemo1)', function(obj){
                console.log(obj.othis);
                layer.tips(this.value + ' ' + this.name + '：'+ obj.elem.checked, obj.othis);
            });
            form.on('switch(sexDemo2)', function(obj){
                console.log(obj.othis);
                layer.tips(this.value + ' ' + this.name + '：'+ obj.elem.checked, obj.othis);
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
                    window.location.href = "/news_edit";
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

