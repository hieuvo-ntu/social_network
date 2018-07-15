<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">

    <title>Messages</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="<?php echo e(url('public/admin/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(url('public/js/call_function.js')); ?>"></script>

    <style type="text/css">

        html,
        body,
        div,
        span {
            height: 100%;
            width: 100%;
            overflow: hidden;
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {

        }

        .fa-2x {
            font-size: 1.5em;
        }

        .app {
            position: relative;
            overflow: hidden;
            top: 19px;
            height: calc(100% - 38px);
            margin: auto;
            padding: 0;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .06), 0 2px 5px 0 rgba(0, 0, 0, .2);
        }

        .app-one {
            background-color: #f7f7f7;
            height: 100%;
            overflow: hidden;
            margin: 0;
            padding: 0;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .06), 0 2px 5px 0 rgba(0, 0, 0, .2);
        }

        .side {
            padding: 0;
            margin: 0;
            height: 100%;
        }
        .side-one {
            padding: 0;
            margin: 0;
            height: 100%;
            width: 100%;
            z-index: 1;
            position: relative;
            display: block;
            top: 0;
        }

        .side-two {
            padding: 0;
            margin: 0;
            height: 100%;
            width: 100%;
            z-index: 2;
            position: relative;
            top: -100%;
            left: -100%;
            -webkit-transition: left 0.3s ease;
            transition: left 0.3s ease;

        }


        .heading {
            padding: 10px 16px 10px 15px;
            margin: 0;
            height: 60px;
            width: 100%;
            background-color: #eee;
            z-index: 1000;
        }

        .heading-avatar {
            padding: 0;
            cursor: pointer;

        }

        .heading-avatar-icon img {
            border-radius: 50%;
            height: 40px;
            width: 40px;
        }

        .heading-name {
            padding: 0 !important;
            cursor: pointer;
        }

        .heading-name-meta {
            font-weight: 700;
            font-size: 100%;
            padding: 5px;
            padding-bottom: 0;
            text-align: left;
            text-overflow: ellipsis;
            white-space: nowrap;
            color: #000;
            display: block;
        }
        .heading-online {
            display: none;
            padding: 0 5px;
            font-size: 12px;
            color: #93918f;
        }
        .heading-compose {
            padding: 0;
        }

        .heading-compose i {
            text-align: center;
            padding: 5px;
            color: #93918f;
            cursor: pointer;
        }

        .heading-dot {
            padding: 0;
            margin-left: 10px;
        }

        .heading-dot i {
            text-align: right;
            padding: 5px;
            color: #93918f;
            cursor: pointer;
        }

        .searchBox {
            padding: 0 !important;
            margin: 0 !important;
            height: 60px;
            width: 100%;
        }

        .searchBox-inner {
            height: 100%;
            width: 100%;
            padding: 10px !important;
            background-color: #fbfbfb;
        }


        /*#searchBox-inner input {
          box-shadow: none;
        }*/

        .searchBox-inner input:focus {
            outline: none;
            border: none;
            box-shadow: none;
        }

        .sideBar {
            padding: 0 !important;
            margin: 0 !important;
            background-color: #fff;
            overflow-y: auto;
            border: 1px solid #f7f7f7;
            height: calc(100% - 120px);
        }

        .sideBar-body {
            position: relative;
            padding: 10px !important;
            border-bottom: 1px solid #f7f7f7;
            height: 72px;
            margin: 0 !important;
            cursor: pointer;
        }

        .sideBar-body:hover {
            background-color: #f2f2f2;
        }

        .sideBar-avatar {
            text-align: center;
            padding: 0 !important;
        }

        .avatar-icon img {
            border-radius: 50%;
            height: 49px;
            width: 49px;
        }

        .sideBar-main {
            padding: 0 !important;
        }

        .sideBar-main .row {
            padding: 0 !important;
            margin: 0 !important;
        }

        .sideBar-name {
            padding: 10px !important;
        }

        .name-meta {
            font-size: 100%;
            padding: 1% !important;
            text-align: left;
            text-overflow: ellipsis;
            white-space: nowrap;
            color: #000;
        }

        .sideBar-time {
            padding: 10px !important;
        }

        .time-meta {
            text-align: right;
            font-size: 12px;
            padding: 1% !important;
            color: rgba(0, 0, 0, .4);
            vertical-align: baseline;
        }

        /*New Message*/

        .newMessage {
            padding: 0 !important;
            margin: 0 !important;
            height: 100%;
            position: relative;
            left: -100%;
        }
        .newMessage-heading {
            padding: 10px 16px 10px 15px !important;
            margin: 0 !important;
            height: 100px;
            width: 100%;
            background-color: #00bfa5;
            z-index: 1001;
        }

        .newMessage-main {
            padding: 10px 16px 0 15px !important;
            margin: 0 !important;
            height: 60px;
            margin-top: 30px !important;
            width: 100%;
            z-index: 1001;
            color: #fff;
        }

        .newMessage-title {
            font-size: 18px;
            font-weight: 700;
            padding: 10px 5px !important;
        }
        .newMessage-back {
            text-align: center;
            vertical-align: baseline;
            padding: 12px 5px !important;
            display: block;
            cursor: pointer;
        }
        .newMessage-back i {
            margin: auto !important;
        }

        .composeBox {
            padding: 0 !important;
            margin: 0 !important;
            height: 60px;
            width: 100%;
        }

        .composeBox-inner {
            height: 100%;
            width: 100%;
            padding: 10px !important;
            background-color: #fbfbfb;
        }

        .composeBox-inner input:focus {
            outline: none;
            border: none;
            box-shadow: none;
        }

        .compose-sideBar {
            padding: 0 !important;
            margin: 0 !important;
            background-color: #fff;
            overflow-y: auto;
            border: 1px solid #f7f7f7;
            height: calc(100% - 160px);
        }

        /*Conversation*/

        .conversation {
            padding: 0 !important;
            margin: 0 !important;
            height: 100%;
            /*width: 100%;*/
            border-left: 1px solid rgba(0, 0, 0, .08);
            /*overflow-y: auto;*/
        }

        .message {
            padding: 0 !important;
            margin: 0 !important;

            background-size: cover;
            overflow-y: auto;
            border: 1px solid #f7f7f7;
            height: calc(100% - 120px);
        }
        .message-previous {
            margin : 0 !important;
            padding: 0 !important;
            height: auto;
            width: 100%;
        }
        .previous {
            font-size: 15px;
            text-align: center;
            padding: 10px !important;
            cursor: pointer;
        }

        .previous a {
            text-decoration: none;
            font-weight: 700;
        }

        .message-body {
            margin: 0 !important;
            padding: 0 !important;
            width: auto;
            height: auto;
        }

        .message-main-receiver {
            /*padding: 10px 20px;*/
            max-width: 60%;
        }

        .message-main-sender {
            padding: 3px 20px !important;
            margin-left: 40% !important;
            max-width: 60%;
        }

        .message-text {
            margin: 0 !important;
            padding: 5px !important;
            word-wrap:break-word;
            font-weight: 200;
            font-size: 14px;
            padding-bottom: 0 !important;
        }

        .message-time {
            margin: 0 !important;
            margin-left: 50px !important;
            font-size: 12px;
            text-align: right;
            color: #9a9a9a;

        }

        .receiver {
            width: auto !important;
            padding: 4px 10px 7px !important;
            border-radius: 10px 10px 10px 0;
            background: #ffffff;
            font-size: 12px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, .2);
            word-wrap: break-word;
            display: inline-block;
        }

        .sender {
            float: right;
            width: auto !important;
            background: #dcf8c6;
            border-radius: 10px 10px 0 10px;
            padding: 4px 10px 7px !important;
            font-size: 12px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, .2);
            display: inline-block;
            word-wrap: break-word;
        }


        /*Reply*/

        .reply {
            height: 60px;
            width: 100%;
            background-color: #f5f1ee;
            padding: 10px 5px 10px 5px !important;
            margin: 0 !important;
            z-index: 1000;
        }

        .reply-emojis {
            padding: 5px !important;
        }

        .reply-emojis i {
            text-align: center;
            padding: 5px 5px 5px 5px !important;
            color: #93918f;
            cursor: pointer;
        }

        .reply-recording {
            padding: 5px !important;
        }

        .reply-recording i {
            text-align: center;
            padding: 5px !important;
            color: #93918f;
            cursor: pointer;
        }

        .reply-send {
            padding: 5px !important;
        }

        .reply-send i {
            text-align: center;
            padding: 5px !important;
            color: #93918f;
            cursor: pointer;
        }

        .reply-main {
            padding: 2px 5px !important;
        }

        .reply-main textarea {
            width: 100%;
            resize: none;
            overflow: hidden;
            padding: 5px !important;
            outline: none;
            border: none;
            text-indent: 5px;
            box-shadow: none;
            height: 100%;
            font-size: 16px;
        }

        .reply-main textarea:focus {
            outline: none;
            border: none;
            text-indent: 5px;
            box-shadow: none;
        }

        @media  screen and (max-width: 700px) {
            .app {
                top: 0;
                height: 100%;
            }
            .heading {
                height: 70px;
                background-color: #009688;
            }
            .fa-2x {
                font-size: 2.3em !important;
            }
            .heading-avatar {
                padding: 0 !important;
            }
            .heading-avatar-icon img {
                height: 50px;
                width: 50px;
            }
            .heading-compose {
                padding: 5px !important;
            }
            .heading-compose i {
                color: #fff;
                cursor: pointer;
            }
            .heading-dot {
                padding: 5px !important;
                margin-left: 10px !important;
            }
            .heading-dot i {
                color: #fff;
                cursor: pointer;
            }
            .sideBar {
                height: calc(100% - 130px);
            }
            .sideBar-body {
                height: 80px;
            }
            .sideBar-avatar {
                text-align: left;
                padding: 0 8px !important;
            }
            .avatar-icon img {
                height: 55px;
                width: 55px;
            }
            .sideBar-main {
                padding: 0 !important;
            }
            .sideBar-main .row {
                padding: 0 !important;
                margin: 0 !important;
            }
            .sideBar-name {
                padding: 10px 5px !important;
            }
            .name-meta {
                font-size: 16px;
                padding: 5% !important;
            }
            .sideBar-time {
                padding: 10px !important;
            }
            .time-meta {
                text-align: right;
                font-size: 14px;
                padding: 4% !important;
                color: rgba(0, 0, 0, .4);
                vertical-align: baseline;
            }
            /*Conversation*/
            .conversation {
                padding: 0 !important;
                margin: 0 !important;
                height: 100%;
                /*width: 100%;*/
                border-left: 1px solid rgba(0, 0, 0, .08);
                /*overflow-y: auto;*/
            }
            .message {
                height: calc(100% - 140px);
            }
            .reply {
                height: 70px;
            }
            .reply-emojis {
                padding: 5px 0 !important;
            }
            .reply-emojis i {
                padding: 5px 2px !important;
                font-size: 1.8em !important;
            }
            .reply-main {
                padding: 2px 8px !important;
            }
            .reply-main textarea {
                padding: 8px !important;
                font-size: 18px;
            }
            .reply-recording {
                padding: 5px 0 !important;
            }
            .reply-recording i {
                padding: 5px 0 !important;
                font-size: 1.8em !important;
            }
            .reply-send {
                padding: 5px 0 !important;
            }
            .reply-send i {
                padding: 5px 2px 5px 0 !important;
                font-size: 1.8em !important;
            }


            ul {
                display:block;
                background:#45619D;
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

            #noti_Button {
                color:#fff;
            }

            /* THE POPULAR RED NOTIFICATIONS COUNTER. */
            #noti_Counter {
                display:block;
                position:absolute;
                background:#E1141E;
                color:#FFF;
                font-size:12px;
                font-weight:normal;
                padding:1px 3px;
                margin:-8px 0 0 25px;
                border-radius:2px;
                -moz-border-radius:2px;
                -webkit-border-radius:2px;
                z-index:99;
            }

            /* THE NOTIFICAIONS WINDOW. THIS REMAINS HIDDEN WHEN THE PAGE LOADS. */
            #notifications {
                display:none;
                width:400px;
                position:absolute;
                top:42px;

                background:#FFF;
                border:solid 1px rgba(100, 100, 100, .20);
                -webkit-box-shadow:0 3px 8px rgba(0, 0, 0, .20);
                z-index: 100;
            }
            /* AN ARROW LIKE STRUCTURE JUST OVER THE NOTIFICATIONS WINDOW */
            #notifications:before {
                content: '';
                display:block;
                width:0;
                height:0;
                color:transparent;
                border:10px solid #CCC;
                border-color:transparent transparent #FFF;
                margin-top:-20px;
                margin-left:22px;
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
        }
    </style>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />');
            else $('head > link').filter(':first').replaceWith(defaultCSS);
        }
        /*$( document ).ready(function() {
            var iframe_height = parseInt($('html').height());
            window.parent.postMessage( iframe_height, 'https://bootsnipp.com');
        });*/
    </script>
</head>
<body>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<a href="<?php echo e(route('index')); ?>" class="btn btn-outline-info">Quay trở về trang chủ</a>

<div class="container app">
    <div class="row app-one">
        <div class="col-sm-4 side">
            <div class="side-one">
                <div class="row heading">
                    <div class="col-sm-3 col-xs-3 heading-avatar">
                        <div class="heading-avatar-icon">
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png">
                        </div>
                    </div>
                    <div class="col-sm-1 col-xs-1  heading-dot  pull-right">
                        <i class="fa fa-ellipsis-v fa-2x  pull-right" aria-hidden="true"></i>
                    </div>
                    <div class="col-sm-2 col-xs-2 heading-compose  pull-right">
                        <i class="fa fa-comments fa-2x  pull-right" aria-hidden="true"></i>
                    </div>
                </div>

                <div class="row searchBox">
                    <div class="col-sm-12 searchBox-inner">
                        <div class="form-group has-feedback">
                            <input id="searchText" type="text" class="form-control" name="searchText" placeholder="Search">
                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="side-two">
                <div class="row newMessage-heading">
                    <div class="row newMessage-main">
                        <div class="col-sm-2 col-xs-2 newMessage-back">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        </div>
                        <div class="col-sm-10 col-xs-10 newMessage-title">
                            New Chat
                        </div>
                    </div>
                </div>

                <div class="row composeBox">
                    <div class="col-sm-12 composeBox-inner">
                        <div class="form-group has-feedback">
                            <input id="composeText" type="text" class="form-control" name="searchText" placeholder="Search People">
                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                    </div>
                </div>

                <div class="row compose-sideBar">
                    <div class="row sideBar-body">
                        <div class="col-sm-3 col-xs-3 sideBar-avatar">
                            <div class="avatar-icon">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png">
                            </div>
                        </div>
                        <div class="col-sm-9 col-xs-9 sideBar-main">
                            <div class="row">
                                <div class="col-sm-8 col-xs-8 sideBar-name">
                  <span class="name-meta">John Doe
                </span>
                                </div>
                                <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                  <span class="time-meta pull-right">18:18
                </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row sideBar-body">
                        <div class="col-sm-3 col-xs-3 sideBar-avatar">
                            <div class="avatar-icon">
                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png">
                            </div>
                        </div>
                        <div class="col-sm-9 col-xs-9 sideBar-main">
                            <div class="row">
                                <div class="col-sm-8 col-xs-8 sideBar-name">
                  <span class="name-meta">John Doe
                </span>
                                </div>
                                <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                  <span class="time-meta pull-right">18:18
                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row sideBar-body">
                        <div class="col-sm-3 col-xs-3 sideBar-avatar">
                            <div class="avatar-icon">
                                <img src="https://bootdey.com/img/Content/avatar/avatar3.png">
                            </div>
                        </div>
                        <div class="col-sm-9 col-xs-9 sideBar-main">
                            <div class="row">
                                <div class="col-sm-8 col-xs-8 sideBar-name">
                  <span class="name-meta">John Doe
                </span>
                                </div>
                                <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                  <span class="time-meta pull-right">18:18
                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row sideBar-body">
                        <div class="col-sm-3 col-xs-3 sideBar-avatar">
                            <div class="avatar-icon">
                                <img src="https://bootdey.com/img/Content/avatar/avatar4.png">
                            </div>
                        </div>
                        <div class="col-sm-9 col-xs-9 sideBar-main">
                            <div class="row">
                                <div class="col-sm-8 col-xs-8 sideBar-name">
                  <span class="name-meta">John Doe
                </span>
                                </div>
                                <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                  <span class="time-meta pull-right">18:18
                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row sideBar-body">
                        <div class="col-sm-3 col-xs-3 sideBar-avatar">
                            <div class="avatar-icon">
                                <img src="https://bootdey.com/img/Content/avatar/avatar5.png">
                            </div>
                        </div>
                        <div class="col-sm-9 col-xs-9 sideBar-main">
                            <div class="row">
                                <div class="col-sm-8 col-xs-8 sideBar-name">
                  <span class="name-meta">John Doe
                </span>
                                </div>
                                <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                  <span class="time-meta pull-right">18:18
                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row sideBar-body">
                        <div class="col-sm-3 col-xs-3 sideBar-avatar">
                            <div class="avatar-icon">
                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png">
                            </div>
                        </div>
                        <div class="col-sm-9 col-xs-9 sideBar-main">
                            <div class="row">
                                <div class="col-sm-8 col-xs-8 sideBar-name">
                  <span class="name-meta">John Doe
                </span>
                                </div>
                                <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                  <span class="time-meta pull-right">18:18
                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row sideBar-body">
                        <div class="col-sm-3 col-xs-3 sideBar-avatar">
                            <div class="avatar-icon">
                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png">
                            </div>
                        </div>
                        <div class="col-sm-9 col-xs-9 sideBar-main">
                            <div class="row">
                                <div class="col-sm-8 col-xs-8 sideBar-name">
                  <span class="name-meta">John Doe
                </span>
                                </div>
                                <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                  <span class="time-meta pull-right">18:18
                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row sideBar-body">
                        <div class="col-sm-3 col-xs-3 sideBar-avatar">
                            <div class="avatar-icon">
                                <img src="https://bootdey.com/img/Content/avatar/avatar3.png">
                            </div>
                        </div>
                        <div class="col-sm-9 col-xs-9 sideBar-main">
                            <div class="row">
                                <div class="col-sm-8 col-xs-8 sideBar-name">
                  <span class="name-meta">John Doe
                </span>
                                </div>
                                <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                  <span class="time-meta pull-right">18:18
                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row sideBar-body">
                        <div class="col-sm-3 col-xs-3 sideBar-avatar">
                            <div class="avatar-icon">
                                <img src="https://bootdey.com/img/Content/avatar/avatar4.png">
                            </div>
                        </div>
                        <div class="col-sm-9 col-xs-9 sideBar-main">
                            <div class="row">
                                <div class="col-sm-8 col-xs-8 sideBar-name">
                  <span class="name-meta">John Doe
                </span>
                                </div>
                                <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                  <span class="time-meta pull-right">18:18
                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row sideBar-body">
                        <div class="col-sm-3 col-xs-3 sideBar-avatar">
                            <div class="avatar-icon">
                                <img src="https://bootdey.com/img/Content/avatar/avatar5.png">
                            </div>
                        </div>
                        <div class="col-sm-9 col-xs-9 sideBar-main">
                            <div class="row">
                                <div class="col-sm-8 col-xs-8 sideBar-name">
                  <span class="name-meta">John Doe
                </span>
                                </div>
                                <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                  <span class="time-meta pull-right">18:18
                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-8 conversation">
            <div class="row heading">
                <div class="col-sm-2 col-md-1 col-xs-3 heading-avatar">
                    <div class="heading-avatar-icon">
                        <img src="https://bootdey.com/img/Content/avatar/avatar6.png">
                    </div>
                </div>
                <div class="col-sm-8 col-xs-7 heading-name">
                    <a class="heading-name-meta">John Doe
                    </a>
                    <span class="heading-online">Online</span>
                </div>
                <div class="col-sm-1 col-xs-1  heading-dot pull-right">
                    <i class="fa fa-ellipsis-v fa-2x  pull-right" aria-hidden="true"></i>
                </div>
            </div>

            <div class="row message" id="conversation">
                <div class="row message-previous">
                    <div class="col-sm-12 previous">
                        <a onclick="previous(this)" id="ankitjain28" name="20">

                        </a>
                    </div>
                </div>
            <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row message-body">
                <?php if($message->user_from==Auth::user()->id): ?>
                     <div class="col-sm-12 message-main-sender" id="<?php echo e($message->id); ?>">
                         <div class="sender">
                             <div class="message-text"><?php echo e($message->content); ?></div>
                             <span class="message-time pull-right"><?php echo e($message->date); ?></span>
                         </div>
                     </div>


                <?php else: ?>
                     <div class="col-sm-12 message-main-receiver" id="<?php echo e($message->id); ?>">
                         <div class="receiver">
                             <div class="message-text"><?php echo e($message->content); ?></div>
                             <span class="message-time pull-right"><?php echo e($message->date); ?></span>
                         </div>
                     </div>
                <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!--<div class="row message-body">
                    <div class="col-sm-12 message-main-sender">
                        <div class="sender">
                            <div class="message-text">
                                I am doing nothing man!
                            </div>
                            <span class="message-time pull-right">Sun</span>
                        </div>
                    </div>
                </div> -->
            </div>
            <form method="post" action>
                <?php echo e(csrf_field()); ?>

            <div class="row reply">
                
                <div class="col-sm-9 col-xs-9 reply-main">
                    <textarea class="form-control" rows="1" name="textmessage" id="comment"></textarea>
                </div>
                <!--<div class="col-sm-1 col-xs-1 reply-recording">
                    <i class="fa fa-microphone fa-2x" aria-hidden="true"></i>
                </div>-->
                <div class="col-sm-1 col-xs-1 reply-send">
                    <button type="submit" class="btn btn-sm">
                        <i class="fa fa-send fa-2x" aria-hidden="true"></i></button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.js"></script>
<script>
    var socket=io("http://localhost:6001");
    socket.on('chat:message',function(data){
        console.log(data);
        var user_id="<?php echo Auth::user()->id?>";
        console.log(user_id);
        console.log(data.user_from);
        if(data.user_from==user_id && ($('#'+data.id).length == 0)){
            console.log(user_id+"nhan");
            $("#conversation").append('<div class="row message-body"><div class="col-sm-12 message-main-sender" id="'+data.id+'">\n' +
                '                         <div class="sender">\n' +
                '                             <div class="message-text">'+data.content+'</div>\n' +
                '                             <span class="message-time pull-right"></span>\n' +
                '                         </div>\n' +
                '                     </div></div>');
            var div = document.getElementById("conversation");
            div.scrollTop = div.scrollHeight;
            /*console.log(data.content);
            console.log(data.user_from+"nhan");*/
        }

        if(data.user_from !=user_id){
            console.log(user_id+"gui");
            $("#conversation").append('<div class="row message-body"><div class="col-sm-12 message-main-receiver" id="'+data.id+'">\n' +
                '                         <div class="receiver">\n' +
                '                             <div class="message-text">'+data.content+'</div>\n' +
                '                             <span class="message-time pull-right"></span>\n' +
                '                         </div>\n' +
                '                     </div></div>');
            var div = document.getElementById("conversation");
            div.scrollTop = div.scrollHeight;
            /*console.log(data.user_from+"gui");*/

        }
    })
</script>
<script type="text/javascript">
    $(function(){
        $(".heading-compose").click(function() {
            $(".side-two").css({
                "left": "0"
            });
        });

        $(".newMessage-back").click(function() {
            $(".side-two").css({
                "left": "-100%"
            });
        });
    })
    var div = document.getElementById("conversation");
    div.scrollTop = div.scrollHeight;
</script>
</body>
</html>
