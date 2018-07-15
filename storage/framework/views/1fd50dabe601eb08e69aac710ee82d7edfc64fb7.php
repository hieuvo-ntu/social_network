<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="<?php echo e(asset('')); ?>">
    <title>Title</title>
    <?php echo $__env->make('script_css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <script src="<?php echo e(url('public/js/call_function.js')); ?>"></script>
    <style>
        ul {

            list-style:none;

        }
        ul li {
            float:left;

            font-weight:bold;
            margin:3px 0;
        }
        ul li a {
            color:#FFF;
            text-decoration:none;
            padding:6px 15px;
            cursor:pointer;
        }
        ul li a:hover {
            background:#425B90;
            text-decoration:none;
            cursor:pointer;
        }



        h3 {
            display:block;
            color:#333;
            background:#FFF;
            font-weight:bold;
            font-size:13px;
            padding:8px;
            margin:0;
            border-bottom:solid 1px rgba(100, 100, 100, .30);
        }

        .seeAll {
            background:#F6F7F8;
            padding:8px;
            font-size:12px;
            font-weight:bold;
            border-top:solid 1px rgba(100, 100, 100, .30);
            text-align:center;
        }
        .seeAll a {
            color:#3b5998;
        }
        .seeAll a:hover {
            background: #F6F7F8;
            color: #3b5998;
            text-decoration: underline;
        }
        .fa {
            padding :0px 15px;
        }
    </style>

</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark fixed-top" style="background-color: #388FF4">
    <div class="container">

    <div class="col-sm-4">
    <a class="navbar-brand logo" href="#"><img src=""></a>
        <a class="navbar-brand" href="<?php echo e(route('index')); ?>">Trang chủ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    </div>
    <div class="col-sm-4">
        <form class="form-inline" action="<?php echo e(route('searchUser')); ?>" name="search-form">

            <div class="input-group">
                <input class="form-control form-control-sm input-radius" type="text" name="s" onkeyup="getSearchUser(this.value)" autocomplete="off" placeholder="Tìm kiếm" id="search_text_input">
                <span class="input-group-btn">
                <button class="btn btn-sm" type="submit"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <div class="search_results">
        </div>
        <div class="search_results_footer_empty">
        </div>
    </div>


    <div class="col-sm-4 topnav-right">
    <ul>
        <li><a id="noti_Button" class="btn btn-sm" onclick="getDropdown('notification')"><i class="fa fa-bell-o fa-lg"></i></a></li>
        <div id="noti_Container">
            <div id="noti_Counter"></div>   <!--SHOW NOTIFICATIONS COUNT.-->

            <!--A CIRCLE LIKE BUTTON TO DISPLAY NOTIFICATION DROPDOWN.-->


            <!--THE NOTIFICAIONS DROPDOWN BOX.-->
            <div id="notifications">
                <h3>Thông báo</h3>
                <div style="height:300px;overflow: auto" class="detailNotifi"></div>
                <div class="seeAll"><a href="#">Xem thêm</a></div>
            </div>
        </div>
        <li><a id="request_Button" class="btn btn-sm"><i class="fa fa-users fa-lg" style="color:#fff"></i></a></li>
            <!--SHOW NOTIFICATIONS COUNT.-->
            <div id="request_Counter"></div>


        <li><a href="" class="btn btn-sm"><i class="fa fa-envelope-o fa-lg"></i></a></li>

        
        <li><div class="dropdown">
                <a type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-cog fa-lg" style="color:#fff"></i>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" style="color:#000" href="#">Cài đặt</a>
                    <a class="dropdown-item" style="color:#000" href="logout">Đăng xuất</a>
                </div>
            </div></li>
    </ul>
    </div>

    </div>
    <script>
        $(document).ready(function () {
            // ANIMATEDLY DISPLAY THE NOTIFICATION COUNTER.
            $('#noti_Counter')
                .css({ opacity: 0 })
                .text(<?php echo e(count($numberUnRead)); ?>)      // ADD DYNAMIC VALUE (YOU CAN EXTRACT DATA FROM DATABASE OR XML).
                .css({ top: '-10px' })
                .animate({ top: '-2px', opacity: 1 }, 500);

            $('#noti_Button').click(function () {
                // TOGGLE (SHOW OR HIDE) NOTIFICATION WINDOW.
                $('#notifications').fadeToggle('fast', 'linear', function () {
                    if ($('#notifications').is(':hidden')) {
                        $('#noti_Button').css('background-color', );
                    }
                    //CHANGE BACKGROUND COLOR OF THE BUTTON.
                    else $('#noti_Button').css('background-color', 'rgb(46, 70, 124)');
                });

                $('#noti_Counter').fadeOut('slow');     // HIDE THE COUNTER.

                return false;
            });

            //Request Notification
            $('#request_Counter')
                .css({ opacity: 0 })
                .text('0')
                .css({ top: '-10px' })// ADD DYNAMIC VALUE (YOU CAN EXTRACT DATA FROM DATABASE OR XML).
                .animate({ top: '-10px', opacity: 1 }, 500);
            $('#request_Button').click(function () {
                // TOGGLE (SHOW OR HIDE) NOTIFICATION WINDOW.

                        $('#request_Button').css('background-color', );

                    //CHANGE BACKGROUND COLOR OF THE BUTTON.
                    $('#request_Button').css('background-color', 'rgb(46, 70, 124)');


                $('#request_Counter').fadeOut('slow');     // HIDE THE COUNTER.

                return false;
            });
            //End Request

            function loadUnseenNotifi() {
                $.ajax({
                    url:"<?php echo e(route('loadNotification')); ?>",
                    method:"POST",
                    dataType:"json",
                    success:function (data) {
                        if(data.unSeeNoti>0){
                            $('#noti_Counter').text(data.unSeeNoti);
                            $('#noti_Counter').fadeIn('slow');
                        }
                    }
                });
            }
            function loadRequestFriend() {
                $.ajax({
                    url:"<?php echo e(route('loadRequestFriend')); ?>",
                    method:"POST",
                    dataType:"json",
                    success:function (data) {
                        if(data.unRequest>0){
                            $('#request_Counter').text(data.unRequest);
                            $('#request_Counter').fadeIn('slow');
                        }
                    }
                })
            }
            /*setInterval(function () {
                loadUnseenNotifi();
                loadRequestFriend();
            },5000);*/

        });
    </script>
</nav>

