<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Indexuser;
use Validator;
class LoginController extends Controller
{
	// 注册
	public function redse(Request $request){
	// if ($request->isMethod('POST')) {
	// 	$data=$request->except('_token');
	// 	// $validator=Validator::make($data,[
	// 	// 		'user_name'=>'required|max:30|alpha_dash',
	// 	// 		'user_pwd'=>'required|max:20|alpha_dash',
	// 	// 		'user_pwd1'=>'required|max:20|'

	// 	// 	],[
	// 	// 		'required'=>':attribute 必填写',
	// 	// 		'max'=>':attribute 长度不能超过30',
	// 	// 		'max'=>':attribute 字母,数字,下划线组成'

	// 	// 	],[
	// 	// 		'user_name'=>'用户名',
	// 	// 		'user_pwd'=>'密码',
	// 	// 		'user_pwd1'=>'确认密码'

	// 	// 	]);
	// 	// // dd($validator);

	// 	//   if ($validator->fails()) {
 //  //           return redirect()
 //  //             ->back()
 //  //             ->withErrors($validator)
 //  //             ->withInput();
 //  //       }
  



	// }
		return view('index.index.redse');
	}

	public function redse_do(Request $request){
		$data=$request->except('_token');
		$res=Indexuser::create($data);

		if ($res) {
			$arr=[
				'error'=>1,
				'msg'=>'注册成功'
			];

			return json_encode($arr);
		}else{
			$arr=[
				'error'=>2,
				'msg'=>'注册失败'
			];
			return json_encode($arr);
		}
	}

	// 判断用户唯一性
	 public function weiyi(Request $request){
		$user_name = $request->input('user_name');
		$res=Indexuser::where(['user_name'=>$user_name])->first(); 
		if ($res) {
			$arr=[
				'error'=>1,
				'msg'=>'用户名已存在'
			];

			return json_encode($arr);

		}else{
			$arr=[
				'error'=>2,
				'msg'=>'用户名可注册'
			];

			return json_encode($arr);
		}
    }


	// 登陆
    public function loginse(Request $request){
    	return view('index.index.loginse');
    }


    // 执行登陆  z
    public function loginse_do(Request $request){
    	$data=$request->except('_token');
    	$where[]=[
    		'user_name','=',$data['user_name']
    	];
    	$info=Indexuser::where($where)->first();


    	// 验证密码错误3次锁定账号
    	if ((time()-$info['error_time']<60)) {
    		$time=60-(time()-$info['error_time']);
    		return json_encode(['fond'=>'账号已锁定到'.date("Y-m-d H:i:s",$info['error_time']),'msg'=>1]);
    	}



    	if ($info) {

    		if($info['user_pwd']==$data['user_pwd']){
    			Indexuser::where(['user_id'=>$info['user_id']])->update(['error_num'=>0,'error_time'=>0]);
    			return json_encode(['fond'=>'登陆成功','msg'=>3]);
    		}else{
    			$error_num=$info['error_num'];
    			if ($error_num>=2) {
    				Indexuser::where(['user_id'=>$info['user_id']])->update(['error_num'=>0,'error_time'=>time()]);

    			return json_encode(['fond'=>'密码错误,3次将锁定账号','msg'=>4]);
    			}else{
    				$error=$error_num+1;
    				$num=3-$error;
    				Indexuser::where(['user_id'=>$info['user_id']])->update(['error_num'=>$error]);
    				return json_encode(['fond'=>'密码错误3次,还有'.$num.'机会','msg'=>4]);
    			}
    		}

    	}else{
    		return json_encode(['fond'=>'账号未注册','msg'=>2]);
    	}
    }
}

// if ($info['error_num']==3) {
    		// 	if ($info['error_time']>time()) {
    		// 		return json_encode(['fond'=>'账号已锁定到'.date("Y-m-d H:i:s",$info['error_time']),'msg'=>1]);
    		// 	}else{
    		// 		Indexuser::where(['user_id'=>$info['user_id']])->update(['error_num'=>0,'error_time'=>0]);
    		// 	}
    		// }else if($info['user_pwd']==$data['user_pwd']){
    		// 	return json_encode(['fond'=>'登陆成功','msg'=>3]);
    		// }else{
    		// 	if ($info['error_num']==2) {
    		// 		$error_time=time()+15;
    		// 		Indexuser::where(['user_id'=>$info['user_id']])->update(['error_time'=>$error_time]);
    		// 	}else{
    		// 		Indexuser::where(['user_id'=>$info['user_id']])->update(['error_num'=>$info['error_num']]+1);
    		// 	}

    		// 	return json_encode(['fond'=>'密码错误,3次将锁定账号','msg'=>4]);
    		// }
