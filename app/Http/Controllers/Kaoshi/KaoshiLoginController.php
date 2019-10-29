<?php

namespace App\Http\Controllers\Kaoshi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Indexuser;

class KaoshiLoginController extends Controller
{
    public function loginsert(Request $request){
    	return view('kaoshi.kaoshi.loginsert');
    }

    public function loginsert_do(Request $request){
    	$data=$request->all();
    	$where[]=[
    		'user_name','=',$data['user_name']
    	];

    	$info=Indexuser::where($where)->first();
    	if ((time()-$info['error_time']<60)) {
    		$time=60-(time()-$info['error_time']);
    		return json_encode(['fond'=>"账号已锁定到".date("Y-m-d H:i:s",$info['error_time']),'msg'=>1]);
    	}

    	if ($info) {
    		if ($info['user_pwd']==$data['user_pwd']) {
    			Indexuser::where(['user_id'=>$info['user_id']])->update(['error_num'=>0,'error_time'=>0]);
    			return json_encode(['fond'=>"登陆成功",'msg'=>2]);
    		}else{
    			$error_num=$info['error_num'];
    			if ($error_num>=2) {
    				Indexuser::where(['user_id'=>$info['user_id']])->update(['error_num'=>0,'error_time'=>time()]);
    				return json_encode(['fond'=>"密码错误,3次将锁定账号",'msg'=>3]);
    			}else{
    				$error=$error_num+1;
    				$num=3-$error;
    				Indexuser::where(['user_id'=>$info['user_id']])->update(['error_num'=>$error]);
    				return json_encode(['fond'=>"密码错误还有".$num."机会",'msg'=>4]);
    			}
    		}
    	}else{
    		return json_encode(['fond'=>"账号未注册",'msg'=>5]);
    	}

    }
}
