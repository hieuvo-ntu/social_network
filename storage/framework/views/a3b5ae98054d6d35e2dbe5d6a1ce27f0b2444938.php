<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="<?php echo e(url('public/admin/css/bootstrap.min.css')); ?>">
    <script src="<?php echo e(url('public/admin/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(url('public/admin/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(url('public/admin/js/popper.min.js')); ?>"></script>
    <style>
        body{
            background-color: #F5FAFC;
        }
        .btn{
            border-radius: 20px;
        }
        form{
            background-color:#fff;
            padding:40px 20px;
            border-radius:15px;
            padding-top:70px!important;
        }
        .container{
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        img{
            position: relative;
            width: 15px;
            top:70px;
            z-index: 100;
        }
    </style>
</head>

<body>

<div class="container">
    <img style="width: 10%;text-align: center" src="public/source/user/dhnhatrang.gif">
    <div class="col-md-6" style="padding:20px">
    <form action="<?php echo e(route('login')); ?>" method="POST">
        <?php if(count($errors)>0): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="alert alert-danger d-md-block"><?php echo e($error); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <?php if(Session::has('flag')): ?>
            <div class="alert alert-success d-block"><?php echo e(Session::get('message')); ?></div>
        <?php endif; ?>


        <div class="form-group">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <input type="email" class="form-control" placeholder="Địa chỉ email" name="txtemail" value="<?php echo e(old('txtemail')); ?>">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="pwd" placeholder="Mật khẩu" name="txtpswd">
        </div>

        <div class="col-md-6 offset-md-3">
            <button type="submit" class="btn btn-outline-primary btn-block">Đăng nhập</button>
            <span class="" style="margin-right:10px;font-weight:initial"><a href="">Quên mật khẩu</a></span><br>
            <span class="" style="margin-right:10px;font-weight:initial">Chưa có tài khoản <a href="register">Đăng ký</a></span>
        </div>

    </form>
    </div>
</div>
</body>
</html>