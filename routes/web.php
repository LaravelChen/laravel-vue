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
Route::get('logout','UsersController@loginout');


//接口(登陆之后的接口全写在这个文件，我暂时写在这，至于原因之后再说吧...)
Route::get('api/userprofile', 'UsersController@profile');
Route::post('api/commentstore', 'CommentsController@store');
Route::get('api/commentlist/{id}', 'CommentsController@commentlist');
Route::post('api/replystore','CommentsController@reply');