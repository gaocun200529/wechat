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

Route::get('/', function () {
    return view('welcome');
});

// 文章
// Route::group(['middleware'=>['checklogin']],function(){
	Route::any('/index',"Index\IndexController@index");
	Route::any('/add','Index\IndexController@add');
	Route::any('/update','Index\IndexController@update');
	Route::any('/update_do','Index\IndexController@update_do');
	Route::any('/del','Index\IndexController@del');
	Route::any('/details','Index\IndexController@details');
	Route::any('/dels','Index\IndexController@dels');
	// 学生
	Route::any('/select',"Index\SubdentsController@select");
	Route::any('/inse',"Index\SubdentsController@inse");
	Route::any('/updates',"Index\SubdentsController@updates");
	Route::any('/update_dos',"Index\SubdentsController@update_dos");
	Route::any('/delete',"Index\SubdentsController@delete");
	Route::any('/page',"Index\SubdentsController@page");

	// ajax
	Route::any('/ajaxadd',"Index\Ajaxindex@ajaxadd");
	Route::any('/ajaxadd_do',"Index\Ajaxindex@ajaxadd_do");
	Route::any('/ajaxselect',"Index\Ajaxindex@ajaxselect");
	Route::any('/ajaxdel',"Index\Ajaxindex@ajaxdel");
	


	// 注册
	Route::any('/redse',"Index\LoginController@redse");
	Route::any('/redse_do',"Index\LoginController@redse_do");
	// 登陆
	Route::any('/loginse',"Index\LoginController@loginse");
	Route::any('/loginse_do',"Index\LoginController@loginse_do");
	// 首页
	Route::any('/indexse',"Index\IndexseController@indexse");
	Route::any('/indexse_do',"Index\IndexseController@indexse_do");
	// 查询
	Route::any('/indexseadd',"Index\IndexseController@indexseadd");
	// 删除
	Route::any('/indexsedel',"Index\IndexseController@indexsedel");
	// 修改
	Route::any('/indexseupdata',"Index\IndexseController@indexseupdata");
	Route::any('/indexseupdata_do',"Index\IndexseController@indexseupdata_do");
	
// });

// ========电商=============
// 注册
Route::any('/reds',"Admin\AdminUserController@reds");
Route::any('/redsadd',"Admin\AdminUserController@redsadd");
Route::any('/weiyi',"Index\LoginController@weiyi");

// 登录
Route::any('/logins',"Admin\AdminUserController@logins");
Route::any('/loginsadd',"Admin\AdminUserController@loginsadd");
//首页
Route::any('/admngindex',"Admin\AdminIndexController@adminindex");
// 商品详情
Route::any('/admingoods',"Admin\AdminIndexController@admingoods");

// 加入购物车
// 购物车展示
Route::any('/cartinfo',"Admin\AdminCartController@cartinfo");
// 添加
Route::any('/cartadd',"Admin\AdminCartController@cartadd");

// 确认订单
Route::any('/orderinfo',"Admin\OrderInfoController@orderinfo");
// 收货地址
Route::any('/addressedit',"Admin\AddresseditController@addressedit");


Auth::routes();

Route::get('/logout','Index\UserController@logout')->name('logout');
Route::get('/send','Index\UserController@send');
Route::get('/home', 'HomeController@index')->name('home');

// 支付宝支付
Route::any('/alipay',"Index\AlipayController@aindex");
Route::any('/alipay/do',"Index\AlipayController@do");
Route::any('/return',"Index\AlipayController@return");


// 考试
// 登陆
// Route::group(['middleware'=>['checklogin']],function(){
Route::any('/',"Kaoshi\KaoshiLoginController@loginsert");
Route::any('/loginsert_do',"Kaoshi\KaoshiLoginController@loginsert_do");
// 展示
Route::any('/orderse',"Kaoshi\KaoshiOrderController@orderse");
// 详情
Route::any('/detailse',"Kaoshi\KaoshiDetailController@detailse");
// });

//增删改查
// 添加
Route::any('/zsgcadd',"Index\Zsgc@zsgcadd");
// 执行添加
Route::any('/zsgcadd_do',"Index\Zsgc@zsgcadd_do");
//唯一性
Route::any('/weiyixing',"Index\Zsgc@weiyixing");
// 展示
Route::any('/zsgcselect',"Index\Zsgc@zsgcselect");
//删除
Route::any('/daleteso',"Index\Zsgc@daleteso");
// 修改
Route::any('/updateso',"Index\Zsgc@updateso");
// 执行修改
Route::any('/updateso_do',"Index\Zsgc@updateso_do");
// 微信测试
// 获取access_token授权
Route::any('/wexin',"Index\Ajaxindex@wexin");
// 用户详情
Route::any('/wexinlist',"Index\Ajaxindex@wexinlist");
// 网路授权
Route::any('/author',"Index\Ajaxindex@author");
Route::any('/getUserInfo',"Index\Ajaxindex@getUserInfo");
// Route::any('/favicon.ico',"Index\Ajaxindex@favicon.ico");
// git请求
Route::any('/curl_get',"Index\Ajaxindex@curl_get");

// post请求
Route::any('/curl_post',"Index\Ajaxindex@curl_post");
Route::any('/post_test',"Index\Ajaxindex@post_test");
// 标签
// 增删改查
Route::any('/tagList',"Index\TagController@tagList");
Route::any('/addTag',"Index\TagController@addTag");
Route::any('/do_addTag',"Index\TagController@do_addTag");
Route::any('/tagdal',"Index\TagController@tagdal");
Route::any('/tagupdate',"Index\TagController@tagupdate");
Route::any('/tagupdate_do',"Index\TagController@tagupdate_do");
Route::any('/tag_user',"Index\TagController@tag_user");//给用户打标签
Route::any('/user_tag',"Index\Ajaxindex@user_tag");//查看粉丝身上的标签
Route::any('/push_tag_mag',"Index\TagController@push_tag_mag");//发消息
Route::any('/push_template_msg',"Index\Ajaxindex@push_template_msg");//模板接口


// 素材管理
//素材列表
Route::any('/uploads',"Index\ResourceController@uploads");//添加
Route::any('/do_upload',"Index\ResourceController@do_upload");//执行添加
Route::any('/source_list',"Index\ResourceController@source_list");//展示
Route::any('/download',"Index\ResourceController@download");//下载资源

// 清零
Route::any('/clear_api',"Index\ResourceController@clear_api");//添加

Route::any('/event',"Index\EventController@event");//日志

Route::any('/pushTag',"Index\TagController@pushTag");

// 自定义菜单
// 刷新菜单
Route::any('/load_menu',"Index\MenuController@load_menu");
// 自定义菜单添加
Route::any('/create_menu',"Index\MenuController@create_menu");
// 自定义菜单列表
Route::any('/menu_list',"Index\MenuController@menu_list");
// 带参数的二维码
Route::any('/wechat_list',"Index\Ajaxindex@wechat_list");
Route::any('/create_qrcode',"Index\Ajaxindex@create_qrcode");


