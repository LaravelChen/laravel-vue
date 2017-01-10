<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//显示所有文章
Route::get('/article','ArticlesController@allarticle')->middleware('api');

//显示单个文章
Route::get('article/{id}', 'ArticlesController@singlearticle')->middleware('api');

//获取单个文章的内容
Route::get('commentcontent', 'ArticlesController@singlearticle')->middleware('api');

