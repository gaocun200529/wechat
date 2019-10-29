<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\LoginSuccess;
class UserController extends Controller
{
    public $subject="邮箱主题";
   	public function logout(Request $request){
   		//退出登陆
   		Auth::guard()->logout();
   		// 退出后跳转的页面
   		return redirect('/index');
   	}

   	//发送邮箱
   	public function send(Request $request){
   		// dd(Auth::user()->name);
   		 // Mail::to($request->user())->send(new LoginSuccess(Auth::user()->name));
          // $this->dispatch(new SendEmail($request->user(),'测试1','来吧'));
           Mail::to($request->user())->queue(new LoginSuccess($request->user()->name,'来了老弟'));
          return '成功';
   	} 
  
}
