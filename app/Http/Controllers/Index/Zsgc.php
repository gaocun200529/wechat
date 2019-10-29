<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Zsgcer;

class Zsgc extends Controller
{
   	public function zsgcadd(Request $request){
   		return view('index.index.zsgcadd');
   	}
   	public function zsgcadd_do(Request $request){
   		$data=$request->except('_token');
   		$res=Zsgcer::create($data);
   		if ($res) {
   			$arr=[
   				'err'=>1,
   				'msg'=>'添加成功'
   			];

   			return json_encode($arr);
   		}else{
   			$arr=[
   				'err'=>2,
   				'msg'=>'添加失败'
   			];

   			return json_encode($arr);
   		}
   	}

   	public function weiyixing(Request $request){
   		$data=$request->except('_token');
   		$weiyi=Zsgcer::where(['name'=>$data['name']])->first();
   		if ($weiyi) {
   			$arr=[
   				'err'=>1,
   				'msg'=>'用户名已存在'
   			];

   			return json_encode($arr);
   		}else{
   				$arr=[
   				'err'=>2,
   				'msg'=>'用户名可注册'
   			];

   			return json_encode($arr);
   		}

   	}

   	//展示
   public function zsgcselect(Request $request){
   	$data=$request->all();
   	$where=[];
   	if (!empty($data['name'])) {
   		$where[]=['name','like',"%".$data['name']."%"];
   	}

   	if (!empty($data['age'])) {
   		$where[]=['age','=',$data['age']];
   	}

   	if (!empty($data['order'])) {
   		$order=$data['order']." ".$data['order_do'];
   	}else{
   		$order='id';
   	}

   	$res=Zsgcer::where($where)->orderByRaw($order)->get();

   	return view('index.index.zsgcselect',['res'=>$res]);
   }

   public function daleteso(Request $request){
   		$data=$request->all();
   		$res=Zsgcer::where(['id'=>$data['id']])->delete();
   		if ($res) {
   			echo 1;
   		}else{
   			echo 2;
   		}
   }

   public function updateso(Request $request){
   		$data=$request->all();
   		$res=Zsgcer::where(['id'=>$data['id']])->first();
   		return view('index.index.updateso',['res'=>$res]);
   }

   public function updateso_do(Request $request){
   		$data=$request->all();
   		$res=Zsgcer::where(['id'=>$data['id']])->update([
   				'name'=>$data['name'],
   				'age'=>$data['age'],
   				'sex'=>$data['sex']
   			]);

   		if ($res) {
   			$arr=[
   				'err'=>1,
   				'msg'=>'修改成功'
   			];

   			return json_encode($arr);
   		}else{
   			$arr=[
   				'err'=>2,
   				'msg'=>'修改失败'
   			];

   			return json_encode($arr);
   		}

   }
 }