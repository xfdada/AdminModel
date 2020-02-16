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
                    <h4 class="page-title">售后列表</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:''">首页</a></li>
                        <li class="breadcrumb-item"><a href="javaScript:''">售后管理</a></li>
                        <li class="breadcrumb-item active" aria-current="page">售后列表</li>
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
                        <a style="color: #fff;" class="layui-btn layui-btn-xs layui-btn-normal" lay-event="send">发货</a>
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
                    ,{field: 'sex', title: '订单号'}
                    ,{field: 'city', title: '申请人'}
                    ,{field: 'experience', title: '售后原因',sort: true}
                    ,{field: 'sign', title: '故障图(点击图片可查看)',templet:function (p){return getPicture(p);}}
                    ,{field: 'experience', title: '售后类型'}
                    ,{field: 'experience', title: '是否过保',templet:function (p){return p.sign===1?'是':'否';}}
                    ,{field: 'experience', title: '维修金额'}
                    ,{field: 'experience', title: '是否同意',templet:function (p){return getStatus(p);}}
                    ,{field: 'experience', title: '是否付款',templet:function (p){return p.sign===1?'是':'否';}}
                    ,{field: 'experience', title: '快递单号'}
                    ,{field: 'sign', title: '申请时间',sort: true}
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
              if(obj.event === 'send'){
                  if(data.sign!==1){
                      layer.alert('已付款后再进行发货操作！！');
                      return;
                  }
                   //执行发货操作
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
            if (p.sign===1&&p.experience!==''){
                var str = ' <input type="checkbox" name="is_show" disabled value="'+p.sign+'" checked lay-skin="switch" lay-text="是|否" lay-filter="sexDemo"/>';
            } else {
                var str = ' <input type="checkbox" name="is_show" value="'+p.sign+'"  lay-skin="switch" lay-text="是|否" lay-filter="sexDemo"/>';
            }
            return str;
        }
    </script>
@endsection

