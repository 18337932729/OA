<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*前台*/

Route::get('/', 'IndexController@index');
Route::get('/download/app', 'IndexController@downloadApp');
Route::get('/contact', 'IndexController@contact');
Route::post('/contact', 'IndexController@contact_submit');


/*后台*/

//用户登录
Route::get('/login','LoginController@login');
Route::post('/login','LoginController@login_submit');
Route::get('/password','LoginController@password');
Route::post('/password','LoginController@password_submit');

//建立后台路由组，便于应用登陆中间件
Route::group(['middleware'=>'login'],function(){
	/*后台首页*/
	Route::get('/admin','AdminController@index');
	Route::get('/admin/loginout','AdminController@loginout');

	/*用户操作*/
	//用户列表
	Route::get('/admin/user/list','UserController@userlist');
	//用户添加
	Route::get('/admin/user/add','UserController@add');
	//用户添加提交
	Route::post('/admin/user/add/submit','UserController@add_submit');
	//用户更改
	Route::get('/admin/user/update/{id}','UserController@update');
	//用户更改提交
	Route::post('/admin/user/update/submit','UserController@update_submit');
	//用户删除
	Route::get('/admin/user/delete/{id}','UserController@delete');

	/*
	类别管理
	*/
	Route::resource('/admin/cate','CateController');
	/*
	文章管理
	 */
	Route::resource('/admin/article','ArticleController');
	/*
	品种管理
	*/
	Route::resource('/admin/goods','GoodsController');

	// 库存查新
	Route::get('/admin/stock','StockController@index');
	/*
	流向查询
	*/
	Route::get('/admin/report/goujin', 'ReportController@goujin');
	Route::get('/admin/report/peisong', 'ReportController@peisong');
	Route::get('/admin/report/xiaoshou', 'ReportController@xiaoshou');
	Route::get('/admin/report/kucun', 'ReportController@kucun');
	/*
	用户信息
	*/
	Route::resource('/admin/userinfo','UserinfoController');



});

/*服务*/

//发送验证码
Route::any('/sms','SmsController@sendSms');