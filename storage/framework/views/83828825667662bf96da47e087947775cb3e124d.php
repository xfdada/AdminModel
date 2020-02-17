

<?php $__env->startSection('title', '添加新闻'); ?>
<?php $__env->startSection('keyword', '管理系统后台'); ?>
<?php $__env->startSection('content'); ?>

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('plugins/jquery.steps/css/jquery.steps.css')); ?>">
    <link href="<?php echo e(asset('plugins/dropzone/css/dropzone.css')); ?>" rel="stylesheet" type="text/css">
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumb-->
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                    <h4 class="page-title">添加产品</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javaScript:void();">首页</a></li>
                        <li class="breadcrumb-item"><a href="javaScript:void();">产品管理</a></li>
                        <li class="breadcrumb-item active" aria-current="page">添加产品</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header text-uppercase">
                            添加产品
                        </div>
                        <div class="card-body" >
                            <form id="wizard-validation-form" action="/product">
                                <?php echo csrf_field(); ?>
                                <div >
                                    <h3>基本信息</h3>
                                    <section >
                                        <div class="form-group">
                                            <label for="p_name">产品名称</label>
                                            <input class="required form-control" id="p_name" name="p_name" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="p_desc">产品简介</label>
                                            <input id="p_desc" name="p_desc" type="text" class="required form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="p_type">产品类别</label>
                                            <select class="form-control" style="border: 1px #ccc solid;" id="p_type">
                                                <option value="0">请选择</option>
                                                <option value="1">系列1</option>
                                                <option value="2">系列2</option>
                                                <option value="3">系列3</option>
                                                <option value="4">系列4</option>
                                                <option value="5">系列5</option>
                                            </select>
                                        </div>
                                        <div class="form-group" style="height: 120px">
                                            <label for="p_desc">产品缩略图</label>
                                            <div style="display: flex">
                                                <div class="layui-upload">
                                                    <button type="button" class="layui-btn" id="test1">上传图片</button>
                                                    <input type="text" hidden id="product_icon" name="icon">
                                                </div>
                                                <div class="layui-upload-list" style="margin: 0 20px">
                                                    <img class="layui-upload-img" style="width: 60px;height: 60px" id="demo1">
                                                    <p id="demoText"></p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group" style="display: flex">
                                            <label for="p_desc">是否推荐</label>
                                            <div class="icheck-material-primary" style="padding-left: 15px;margin: 0;">
                                                <input type="radio" id="is_best1" value='1' name="is_best" checked/>
                                                <label for="is_best1">是</label>
                                            </div>
                                            <div class="icheck-material-primary">
                                                <input type="radio" id="is_best2" value='2' name="is_best"/>
                                                <label for="is_best2">否</label>
                                            </div>
                                        </div>
                                        <div class="form-group" style="display: flex">
                                            <label for="p_desc">是否热门</label>
                                            <div class="icheck-material-primary" style="padding-left: 15px;margin: 0;">
                                                <input type="radio" id="is_hot1" value='1' name="is_hot" checked/>
                                                <label for="is_hot1">是</label>
                                            </div>
                                            <div class="icheck-material-primary">
                                                <input type="radio" id="is_hot2" value='2' name="is_hot"/>
                                                <label for="is_hot2">否</label>
                                            </div>
                                        </div>
                                        <div class="form-group" style="display: flex;margin: 0;">
                                            <label for="p_desc">是否隐藏</label>
                                            <div class="icheck-material-primary" style="padding-left: 15px">
                                                <input type="radio" id="is_disable3" value='1' name="is_disable" />
                                                <label for="is_disable3">是</label>
                                            </div>
                                            <div class="icheck-material-primary">
                                                <input type="radio" id="is_disable4" value='2' name="is_disable" checked/>
                                                <label for="is_disable4" >否</label>
                                            </div>
                                        </div>

                                        <div class="form-group" >
                                            <label for="p_desc">产品图</label>
                                            <div class="layui-upload">
                                                <button type="button" class="layui-btn" id="test2">多图片上传</button>
                                                <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                                                    预览图：
                                                    <div class="layui-upload-list" style="height: 60px" id="demo2"></div>
                                                    <input type="text" hidden name="img_pro" id="imgss">
                                                </blockquote>
                                            </div>
                                        </div>
                                    </section>
                                    <h3>产品详请</h3>
                                    <section>

                                        <div class="form-group">
                                            <label for="name2">产品详情</label>
                                            <textarea id="container" name="content" class="required"  style="height:400px;" type="text/plain"></textarea>
                                        </div>
                                    </section>
                                    <h3>产品参数</h3>
                                    <section>
                                        <div class="form-group">
                                            <label for="name2">产品参数</label>
                                            <textarea id="container2" name="content2" class="required"  style="height:400px;" type="text/plain"></textarea>
                                        </div>
                                    </section>
                                    <h3>包装售后</h3>
                                    <section>
                                        <div class="form-group">
                                            <label for="name2">产品参数</label>
                                            <textarea id="container3" name="content3" class="required"  style="height:400px;" type="text/plain"></textarea>
                                        </div>
                                    </section>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- End Row-->

        </div>
        <!-- End container-fluid-->

    </div><!--End content-wrapper-->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

    <script src="<?php echo e(asset('plugins/dropzone/js/dropzone.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('ueditor/ueditor.config.js')); ?>"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="<?php echo e(asset('ueditor/ueditor.all.js')); ?>"></script>
    <!--Form Wizard-->
    <script src="<?php echo e(asset('plugins/jquery.steps/js/jquery.steps.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/jquery-validation/js/jquery.validate.min.js')); ?>"></script>
    <!--wizard initialization-->
    <script src="<?php echo e(asset('plugins/jquery.steps/js/jquery.wizard-init.js')); ?>"></script>
    <script>
        $().ready(function() {
            $("#personal-info").validate();
            var ue = UE.getEditor('container');
            var ue2 = UE.getEditor('container2');
            var ue3 = UE.getEditor('container3');


        });
        layui.use('upload',function(){
            var $ = layui.jquery
                ,upload = layui.upload;

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
                    $("#product_icon").val(res.url);
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
            //多图片上传
            upload.render({
                elem: '#test2'
                ,url: '/product/upload'
                ,multiple: true
                ,before: function(obj){
                    //预读本地文件示例，不支持ie8
                    obj.preview(function(index, file, result){
                        $('#demo2').append('<img height="60px" width="90px" src="'+ result +'" alt="'+ file.name +'" class="layui-upload-img">')
                    });
                }
                ,done: function(res){
                    //上传完毕
                    if(res.code > 0){
                        return layer.msg('上传失败');
                    }
                    //上传成功
                    let url = $("#imgss").val();
                    if(url!==''){
                        url = url+','+res.url;
                    }else{
                        url = res.url;
                    }
                    $("#imgss").val(url);
                    console.log($("#imgss").val())
                }
            });

        });

    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\phpstudy_pro\WWW\AdminModel\resources\views/admin/Productadd.blade.php ENDPATH**/ ?>