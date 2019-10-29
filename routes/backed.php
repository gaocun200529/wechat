<?php 
	// 后台路由
	Route::any('/index',"Admin\AdminController@index");
	Route::any('/add',"Admin\AdminController@add");

 ?>