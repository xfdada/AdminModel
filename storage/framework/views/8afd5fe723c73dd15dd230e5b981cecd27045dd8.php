

<?php $__env->startSection('title', '添加新闻'); ?>
<?php $__env->startSection('keyword', '管理系统后台'); ?>
<?php $__env->startSection('content'); ?>
    <style>
        .layui-form-label{
            width: 90px !important;
        }
    </style>
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumb-->
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                    <h4 class="page-title">添加新闻</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:void();">首页</a></li>
                        <li class="breadcrumb-item"><a href="javaScript:void();">新闻</a></li>
                        <li class="breadcrumb-item active" aria-current="page">添加新闻</li>
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
                                    <label class="layui-form-label">新闻标题</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="n_title" lay-verify="n_title" autocomplete="off" required placeholder="请输入标题" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">新闻类型</label>
                                    <div class="layui-input-block">
                                        <select name="n_type" lay-filter="n_type">
                                            <option value="">请选择</option>
                                            <option value="1">新产品新闻</option>
                                            <option value="2">行业新闻</option>
                                            <option value="3">企业新闻</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">新闻简介</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="n_desc" lay-verify="required" lay-reqtext="描述必填" placeholder="请输入" autocomplete="off" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item" style="height: 120px">
                                    <label for="layui-form-label">新闻缩略图</label>
                                    <div style="display: flex;margin-left:100px;position: relative;top: -30px;">
                                        <div class="layui-upload">
                                            <button type="button" class="layui-btn" id="test1">上传图片</button>
                                            <input type="text" hidden id="n_icon" lay-verify="required" lay-reqtext="缩略图必须上传" name="n_icon">
                                        </div>
                                        <div class="layui-upload-list" style="margin: 0 20px">
                                            <img class="layui-upload-img" style="width: 60px;height: 60px" id="demo1">
                                            <p id="demoText"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">新闻内容</label>
                                    <div class="layui-input-block">
                                        <script id="container" name="n_content"  style="height:400px;" type="text/plain"></script>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-input-block">
                                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                        <button type="submit" class="layui-btn" lay-submit="" lay-filter="demo1">提交</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!--End Row-->
        </div>
        <!-- End container-fluid-->

    </div><!--End content-wrapper-->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="<?php echo e(asset('ueditor/ueditor.config.js')); ?>"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="<?php echo e(asset('ueditor/ueditor.all.js')); ?>"></script>
    <!--Form 表格验证js -->
    <script src="<?php echo e(asset('plugins/jquery-validation/js/jquery.validate.min.js')); ?>"></script>
    <script>
        $().ready(function() {
            var ue = UE.getEditor('container');
        });
        layui.use(['form', 'layedit', 'laydate','upload'], function(){
            var form = layui.form,layer = layui.layer;
            var upload = layui.upload;
            //监听提交
            form.on('submit(demo1)', function(data){
               $.post('/news',{data:data.field, '_token': "<?php echo csrf_token(); ?>"},function(res){
                  if (res.code!==0){
                      layer.msg(res.msg, {icon: 4});
                      return;
                  }
                  layer.msg(res.msg,{icon:6});
                  setTimeout(function () {
                      form.render();
                  },1000)

               });
                return false;
            });
            $("#reset").click(function () {
                $("#searchContent").val("");
                $("#selectKey").val("");
                form.render();
            })
            //普通图片上传
            var uploadInst = upload.render({
                elem: '#test1'
                ,url: '/product/upload'
                ,before: function(obj){
                    //预读本地文件示例，不支持ie8
                    obj.preview(function(index, file, result){
                        $('#demo1').attr('src', result); //图片链接（base64）
                    });
                }
                ,done: function(res){
                    //如果上传失败
                    if(res.code > 0){
                        return layer.msg('上传失败');
                    }
                    //上传成功
                    $("#n_icon").val(res.url);
                }
                ,error: function(){
                    //演示失败状态，并实现重传
                    var demoText = $('#demoText');
                    demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs demo-reload">重试</a>');
                    demoText.find('.demo-reload').on('click', function(){
                        uploadInst.upload();
                    });
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\phpstudy_pro\WWW\AdminModel\resources\views/admin/Newsadd.blade.php ENDPATH**/ ?>