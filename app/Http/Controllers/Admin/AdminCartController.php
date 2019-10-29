<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admincart;
use App\Models\Admingood;


class AdminCartController extends Controller
{
   public function cartadd(Request $request){
   	if ($request->isMethod('POST')) {
   		$data=$request->except('_token');
   		$res=Admincart::create($data);
   		if ($res) {
   			return $resd=['font'=>'','code'=>1];
   		}else{
   			return $resd=['font'=>'加入购物车失败','code'=>2];
   		}
   		return json_encode($resd);
   	}
   }

   public function cartinfo(Request $request){
   		$data=$request->all();
   		// $adminCart=new Admincart;
   		$res=Admincart::join('admingoods','admincarts.goods_id','=','admingoods.goods_id')
   		->get();

   		
   		
   		return view('admin.admin.cartinfo',['res'=>$res]);

   }
   
}
