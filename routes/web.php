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

//用户个人资料
Route::get('/profile','HomeController@profile');

//系统主页
Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');
Route::get('/middle', 'HomeController@middle');

//用户资料
Route::get('/profile', 'HomeController@profile');

//申请成为咨询师
Route::get('/apply', 'HomeController@apply');

//处理申请
Route::get('dealApply/{id}','HomeController@deal_apply');
Route::get('dealApply/delete/{id}','HomeController@delete_apply');

//从回收站中还原申请
Route::get('backApply/{id}','HomeController@back_apply');

//从回收站中删除申请
Route::get('apply/tDelete/{id}','HomeController@tDelete');

//撤销处理
Route::get('backDeal/{id}','HomeController@back_deal');

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
Route::get('/gaugeShow','TestsController@showTest');

//查看量表结果
Route::get('/gaugecheck/{id}', 'TestsController@gaugecheck');


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
Route::get('/appoint/{id}','ConsultController@delete');
Route::post('/appoint/add','ConsultController@add');
Route::get('/appointcoach', 'ConsultController@appointcoach');
Route::get('/appointmy', 'ConsultController@appointmy');
Route::post('/appointmy/order','ConsultController@order'); //我的预约

//档案管理
Route::get('/archivestest', 'ManagementController@archivestest');
Route::get('/archivespersonal', 'ManagementController@archivespersonal');
Route::get('/archivesquest', 'ManagementController@archivesquest');
Route::get('/archivesall', 'ManagementController@archivesall');

//显示量表
Route::get('/scaleManage/{id}','ScaleController@show');

//删除量表 软删除
Route::get('/scaleManage/delete/{id}','ScaleController@softDelete');
Route::get('/scaleManage/tDelete/{id}','RecycleController@tDelete');
Route::get('/scaleManage/back/{id}','RecycleController@back');

//显示用户想要测试的量表 量表可填写
Route::get('/scale/{id}','ScaleController@showDetail');

//量表分配
Route::post('/scale/allot','ScaleController@allot');

//删除分配记录
Route::get('/scale/fDelete/{id}','ScaleController@fDelete');
Route::get('/scale/tDelete/{id}','ScaleController@tDelete');

//还原删除记录
Route::get('/scale/back/{id}','ScaleController@backRecord');

//处理用户提交的量表
Route::post('scale/{id}','ScaleController@scaleDeal');

//处理用户的预约申请
Route::get('order/{id}','OrderController@orderDeal');
Route::get('order/delete/{id}','OrderController@orderDelete');
Route::get('order/back/{id}','OrderController@orderBack');
Route::get('order/restore/{id}','OrderController@restore');
Route::get('order/tDelete/{id}','OrderController@tDelete');

//回收站 显示
Route::get('/recycle','RecycleController@recycleShow');













