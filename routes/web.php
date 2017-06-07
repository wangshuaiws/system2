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
Route::get('email/verify/{token}', ['as'=>'email.verify','uses'=>'EmailController@verify']);

//系统主页
Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');
Route::get('/middle', 'HomeController@middle');

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
Route::resource('roles','RolesController');
Route::resource('permissions','PermissionsController');


//心理测验
Route::get('/gaugemanage', 'TestsController@gaugemanage');
Route::get('/gaugeallot', 'TestsController@gaugeallot');
Route::get('/gaugeinput', 'TestsController@gaugeinput');
Route::get('/gaugecheck', 'TestsController@gaugecheck');


//危机预警
Route::get('/warnsee', 'WarningsController@warnsee');
Route::get('/warnsetting', 'WarningsController@warnsetting');


//问卷调查
Route::get('/questmanage', 'SurveyController@questmanage');
Route::get('/questallot', 'SurveyController@questallot');
Route::get('/questresult', 'SurveyController@questresult');


//预约咨询
Route::get('/appointsetting', 'ConsultController@appointsetting');
Route::get('/appointmanage', 'ConsultController@appointmanage');
Route::get('/appointcoach', 'ConsultController@appointcoach');
Route::get('/appointmy', 'ConsultController@appointmy');
Route::get('/order','ConsultController@order');

//档案管理
Route::get('/archivestest', 'ManagementController@archivestest');
Route::get('/archivespersonal', 'ManagementController@archivespersonal');
Route::get('/archivesquest', 'ManagementController@archivesquest');
Route::get('/archivesall', 'ManagementController@archivesall');

//显示量表
Route::get('/scaleManage/{id}','ScaleController@show');



















