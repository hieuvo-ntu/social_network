<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function () {
    return view('welcome');
});

Route::get('register',['as'=>'register',
    'uses'=>'UserController@getRegister'
]);

Route::post('register',['as'=>'register',
    'uses'=>'UserController@postRegister'
]);

Route::post('login',[
    'as'=>'login',
    'uses'=>'UserController@postLogin'
]);

Route::get('login',[
    'as'=>'login',
    'uses'=>'UserController@getLogin'
]);

Route::get('logout',[
   'as'=>'logout',
   'uses'=>'UserController@getLogout'
]);

Route::group(['middleware'=>'auth'],function() {

    Route::get('index', [
        'as' => 'index',
        'uses' => 'PostController@loadPost'
    ]);

    Route::post('postpost', [
        'as' => 'postpost',
        'uses' => 'PostController@postPost'
    ]);

    Route::post('postPostAjax', [
        'as' => 'postAjax',
        'uses' => 'PostController@postPostAjax'
    ]);
    Route::get('getComment/{id}', [
        'as' => 'getComment',
        'uses' => 'CommentController@getComment'
    ]);
    Route::post('postComment', [
        'as' => 'postComment',
        'uses' => 'CommentController@postComment'
    ]);
    Route::get('profile/{id}', [
        'as' => 'profile',
        'uses' => 'UserController@getProfile'
    ]);

    Route::get('message/{id}', [
        'as' => 'message',
        'uses' => 'RedisController@index'
    ]);
    Route::post('message/{id}', 'RedisController@postSendMessage');

    Route::post('like', [
        'as' => 'like',
        'uses' => 'LikeController@sendLike'
    ]);

    Route::post('unlike', [
        'as' => 'unlike',
        'uses' => 'LikeController@sendUnLike'
    ]);

    Route::post('getNotification', [
        'as' => 'getNotification',
        'uses' => 'NotificationController@getNotification'
    ]);
    //Lấy tên của chủ bài viết
    Route::post('getUserPost', [
        'as' => 'getUserPost',
        'uses' => 'CommentController@getUserNameofPost'
    ]);
    //Gửi yêu cầu kết bạn
    Route::get('getSendFriendRequest/{id}', [
        'as' => 'getSendRequest',
        'uses' => 'UserController@getSendRequest'
    ]);

    //Hủy yêu cầu kết bạn
    Route::get('getReMoveRequest/{id}', [
        'as' => 'getReMoveRequest',
        'uses' => 'UserController@getReMoveRequest'
    ]);
    //Chấp nhận lời mời
    Route::get('getAcceptRequest/{id}', [
        'as' => 'getAcceptRequest',
        'uses' => 'UserController@getAcceptRequest'
    ]);
    //Xóa lời mời
    Route::get('getDeleteRequest/{id}', [
        'as' => 'getDeleteRequest',
        'uses' => 'UserController@getDeleteRequest'
    ]);
    //Xóa bạn bè
    Route::get('deleteFriend/{id}', [
        'as' => 'deleteFriend',
        'uses' => 'UserController@deleteFriend'
    ]);
    //Load bình luận
    Route::post('getCommentPost', [
        'as' => 'getCommentPost',
        'uses' => 'CommentController@loadComment'
    ]);
    Route::get('hideComment/{id}', [
        'as' => 'hideComment',
        'uses' => 'CommentController@hideComment'
    ]);
    Route::get('removeComment/{id}', [
        'as' => 'removeComment',
        'uses' => 'CommentController@removeComment'
    ]);
    //Link tới bài viết
    Route::get('status/{id}',[
       'as'=>'status',
       'uses'=>'PostController@getSinglePost'
    ]);
    Route::get('searchUser',[
        'as'=>'searchUser',
        'uses'=>'UserController@getSearchUser'
    ]);
    Route::post('ajaxSearchUser',[
        'as'=>'ajaxSearchUser',
        'uses'=>'UserController@postAjaxSearchUser'
    ]);
});




