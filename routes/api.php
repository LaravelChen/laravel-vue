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

Route::get('/article','ArticlesController@allarticle')->middleware('api');

Route::get('article/{id}', 'ArticlesController@singlearticle')->middleware('api');

Route::get('commentcontent', 'ArticlesController@singlearticle')->middleware('api');

