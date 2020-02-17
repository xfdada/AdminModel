<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://www.layuicdn.com/layui/css/layui.css" />
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
</head>
<body>
<form class="layui-form" action="" method="post" style="margin: 20px 10px;">
     <div class="layui-form-item">
       <label class="layui-form-label">类别名称</label>
        <div class="layui-input-block">
            <input type="text" name="c_name" value="<?php echo e($res->c_name); ?>" lay-verify="title" autocomplete="off" required placeholder="类别名称" class="layui-input">
         </div>
     </div>
    <div class="layui-form-item">
        <label class="layui-form-label">产品类别</label>
        <div class="layui-input-block">
            <select class="form-control" lay-search="" name="c_pid" >
                <option value="0" <?php if($res->c_pid===0): ?> selected <?php endif; ?>>顶级类</option>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($v->c_id); ?>" <?php if($res->c_pid===$v->c_id): ?> selected <?php endif; ?>><?php echo e($v->c_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

    </div>
    <div class="layui-form-item">
     <div class="layui-input-block">
     <button type="submit" class="layui-btn layui-btn-normal" lay-submit="" lay-filter="demo1">立即提交</button>
            </div>
        </div>
    </form>
</body>
<script src="https://www.layuicdn.com/layui/layui.js"></script>
<script>
    layui.use( ['form'], function() {
        var form = layui.form;
        //监听提交
        form.on('submit(demo1)', function(data){
            $.post('/category',{_token: '<?php echo csrf_token(); ?>',data:data.field},function(res){
                if(res.code===0){
                    var index = parent.layer.getFrameIndex(window.name);
                    layer.msg(res.msg,{icon:6});
                    parent.layer.close(index);
                    parent.location.reload();
                }else{
                    layer.msg(res.msg,{icon:5});
                }
            });
            return false;
        });
    });
</script>
</html><?php /**PATH C:\phpstudy_pro\WWW\AdminModel\resources\views/admin/Category_edit.blade.php ENDPATH**/ ?>