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

Route::group(['middleware'=>'auth'],function(){

    Route::get('index',[
        'as'=>'index',
        'uses'=>'PostController@loadPost'
    ]);

    Route::post('postpost',[
        'as'=>'postpost',
        'uses'=>'PostController@postPost'
    ]);
});




