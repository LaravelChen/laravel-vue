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


Route::get('/', 'ArticlesController@index');
Route::get('/login', 'UsersController@login');
Route::get('/register', 'UsersController@register');
Route::post('user/store', 'UsersController@store');
Route::post('user/attamp', 'UsersController@signin');
Route::get('logout', 'UsersController@loginout');


//接口(登陆之后的接口全写在这个文件，我暂时写在这，至于原因之后再说吧...)
Route::get('api/userprofile', 'UsersController@profile');
//提交评论
Route::post('api/commentstore', 'CommentsController@store');
//显示一篇文章的所有评论
Route::get('api/commentlist/{id}', 'CommentsController@commentlist');
//提交回复评论
Route::post('api/replystore', 'CommentsController@reply');
//用户点赞提交
Route::post('api/vote', 'VotesController@vote');
//获取点赞数
Route::post('api/votecount', 'VotesController@votecount');
//评论汇总
Route::get('api/commenttotal', 'CommentsController@commenttotal');
//显示编辑的评论内容
Route::get('api/editcommentshow/{id}', 'CommentsController@editcommentshow');
//提交编辑的评论
Route::post('api/editcommentupdate/{id}', 'CommentsController@editcommentupdate');

//显示收藏的状态
Route::post('api/lovefont/{id}', 'LovesController@lovefont');
//用户收藏操作
Route::post('api/lovesub/{id}', 'LovesController@lovesub');

//显示所有收藏
Route::get('api/lovetotal', 'LovesController@lovetotal');

//显示通知
Route::get('api/notification', 'NotificationsController@show');

//已读消息
Route::get('api/allread', 'NotificationsController@allread');

//未读消息
Route::get('api/notread', 'NotificationsController@notreadcount');

/*******************************************************************/
//后台
//显示后台首页
Route::group(['middleware' => ['admin']], function () {
    Route::get('admin', 'Admin\AdminController@index');
    Route::get('api/admin/dashboard', 'Admin\AdminController@dashboard');

//获取admin的信息
    Route::get('api/admin/info', 'Admin\AdminController@admininfo');

//获取所有用户的信息
    Route::get('api/admin/users', 'Admin\AdminController@usersinfo');
//获取所有文章
    Route::get('api/admin/articles', 'Admin\AdminController@allarticles');
//获取所有评论
    Route::get('api/admin/commentsinfo', 'Admin\AdminController@commentsinfo');
//编辑用户
    Route::post('api/admin/edituser/{id}', 'Admin\AdminController@editusershow');
    Route::post('api/admin/upateuser/{id}', 'Admin\AdminController@updateuser');
//删除用户
    Route::post('api/admin/deleteuser/{id}', 'Admin\AdminController@deleteuser');
//编辑评论
    Route::post('api/admin/editcomment/{id}', 'Admin\AdminController@editcommentshow');
    Route::post('api/admin/updatecomment/{id}', 'Admin\AdminController@updatecomment');
//删除评论
    Route::post('api/admin/deletecomment/{id}', 'Admin\AdminController@deletecomment');

    Route::post('api/admin/uploadarticle', 'Admin\AdminController@uploadarticle');
    Route::post('api/admin/editarticle/{id}', 'Admin\AdminController@editarticle');

    Route::post('api/admin/updatearticle/{id}', 'Admin\AdminController@updatearticle');

    Route::post('api/deletearticle/{id}', 'Admin\AdminController@deletearticle');
});