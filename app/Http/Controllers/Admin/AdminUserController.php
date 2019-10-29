<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Adminuser;
class AdminUserController extends Controller
{
    //注册
    public function reds(Request $request){
        return view('admin.admin.reds');
    }
    public function redsadd(Request $request){
            $data=$request->all();
            $res=Adminuser::create($data);
            // dd($res);die;
            if($res){
                $arr=[
                    'err'=>'1',
                    'msg'=>'成功',

                ];
                return json_encode($arr);
            }else{
                $arr=[
                    'err'=>'2',
                    'msg'=>'失败',

                ];
                 return json_encode($arr);
            }
    }

    //登录
    public function logins(Request $request){

        return view('admin.admin.logins');
    }
    public function  loginsadd(Request $request){
            $all=$request->except('_token');
            $where[]=[
                "user_name",'=',$all['user_name']
            ];
            $UsersModel=new Adminuser;
            $info=$UsersModel->where($where)->first();
            if($info){
                 if($info['user_pwd']==$all['user_pwd']){
                    $arr=[
                        'err'=>'1',
                        'msg'=>'成功',
                    ];
                    return json_encode($arr);
                }else{
                     $arr=[
                    'err'=>'2',
                    'msg'=>'失败',
                ];
                 return json_encode($arr);
                }
            }else{
                $arr=[
                    'err'=>'2',
                    'msg'=>'用户未注册',

                ];
                 return json_encode($arr);
            }
    }

}
