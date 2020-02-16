@extends('layouts.head')
@section('title', '类别管理')
@section('keyword', '管理系统后台')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                    <h4 class="page-title">类别管理</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:void();">首页</a></li>
                        <li class="breadcrumb-item"><a href="javaScript:void();">产品管理</a></li>
                        <li class="breadcrumb-item active" aria-current="page">类别管理</li>
                    </ol>
                </div>
                <div class="col-sm-3" style="text-align: right;">
                    <button type="button" data-toggle="modal" data-target="#formemodal" class="btn btn-outline-primary btn-sm waves-effect waves-light m-1">添加类别</button>
                    <div class="modal fade" id="formemodal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">添加类别</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="input-1">类别名称</label>
                                            <input type="text" class="form-control" id="c_name" placeholder="请输入类别名称">
                                        </div>
                                        <div class="form-group">
                                            <button type="button" onclick="addto()" class="btn btn-primary px-5"><i class="icon-lock"></i> 提交</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="formemodal2">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">添加类别</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="input-1">类别名称</label>
                                            <input type="text" class="form-control" id="c_names" placeholder="请输入类别名称">
                                        </div>
                                        <div class="form-group">
                                            <button type="button" onclick="updated()" class="btn btn-primary px-5"><i class="icon-lock"></i> 提交</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <!-- End Breadcrumb-->
        <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"> <button type="button" onclick="uploads()" class="btn btn-outline-primary btn-sm waves-effect waves-light m-1">添加分类</button></div>
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
@endsection
@section('script')
    <script>
        layui.use('table', function(){
            var table = layui.table;
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
                    ,{field: 'username', title: '类别名称' }
                    ,{field: 'city', title: '上级分类'}
                    ,{field: 'sex', title: '添加时间'}
                    ,{field: 'right', title: '操作',toolbar: '#barDemo' }
                ]]
            });
            //监听工具条
            table.on('tool(test3)', function(obj){
                var data = obj.data;
                if(obj.event === 'del'){
                    layer.confirm('真的删除该资源么', function(index){
                        obj.del();
                        layer.close(index);
                    });
                } else if(obj.event === 'edit'){
                    layer.open({
                        type: 2 //Page层类型
                        ,area: ['700px', '600px']
                        ,title: '创建分类'
                        ,shade: 0.6 //遮罩透明度
                        ,content: '/book/create'

                    });
                }
            });
        });
    </script>
@endsection

