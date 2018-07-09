<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Title</title>
    <link rel="stylesheet" href="<?php echo e(url('public/admin/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('public/admin/css/style.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="<?php echo e(url('public/admin/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(url('public/admin/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(url('public/admin/js/popper.min.js')); ?>"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-light" style="background-color: #388FF4">
    <div class="container">

    <div class="col-sm-4">
    <a class="navbar-brand" href="#">NTU</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    </div>
        <div class="col-sm-4">
        <form class="form-inline">

            <div class="input-group">
                <input class="form-control form-control-sm input-radius" type="text" placeholder="Tìm kiếm">
                <span class="input-group-btn">
                <button class="btn btn-sm" type="submit"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        </div>


    <div class="col-sm-4 topnav-right">

        <a href="#" class="btn btn-sm"><i class="fa fa-bell-o"></i> Thông báo</a>
        <a href="#" class="btn btn-sm"><i class="fa fa-envelope-o"></i> Tin nhắn</a>
        <a href="#" class="btn btn-sm"><i class="fa fa-cog"></i> Cài đặt</a>
    </div>
    </div>
</nav>

