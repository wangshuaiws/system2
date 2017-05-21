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

/*Route::get('/', function () {
    return view('index');
});*/

Auth::routes();

//系统主页
Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');

//用户资料
Route::get('/profile', 'HomeController@profile');
//申请成为咨询师
Route::get('/apply', 'HomeController@apply');
//处理申请
Route::get('/deal','HomeController@deal_apply');

//基础设置
Route::get('/system', 'SettingsController@system');
Route::get('/data', 'SettingsController@data');
Route::get('/rolemanage', 'SettingsController@rolemanage');
Route::get('/membermanage', 'SettingsController@membermanage');