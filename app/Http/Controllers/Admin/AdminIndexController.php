<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admingood;

class AdminIndexController extends Controller
{
    public function adminindex(Request $request){
    	$data=$request->all();
    	$list=Admingood::all();
    	// dd($list);
    	return view('admin.admin.admngindex',['list'=>$list]);
    }

    // 商品详情页
  public function admingoods(Request $request){
  	$goods_id=$request->all();
  	$list=Admingood::where(['goods_id'=>$goods_id['goods_id']])->first();
  	// dd($res);

  	return view('admin.admin.admingoods',['list'=>$list]);
  }

}
