<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 引入门面类
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use App\Models\Subdent;
use Validator;

class SubdentsController extends Controller
{
    public function select(Request $request){
    	$all=$request->all();
    	$where=[];
    	if (!empty($all['name'])) {
    		$where[]=['name','like','%'.$all['name'].'%'];
    	}

    	if (!empty($all['age'])) {
    		$where[]=['age','=',$all['age']];
    	}
    	if (!empty($all['sex'])) {
    		$where[]=['sex','=',$all['sex']];
    	}

    	if (!empty($all['order'])) {
    		$order=$all['order']." ".$all['order_do'];
    	}else{
    		$order="id";
    	}
        // conso();die;

        // Cache::flush();
        // die;
        // 先查看缓存中有没有数据
        $p=$request->input('page') ?? 1;
        $list=Cache::get('list-'.$p);
         Log::info('缓存在list=',['list'=>$list]);

        if (!$list) {
            // 如果缓存中没有此数据查看数据库
            $list=Subdent::where($where)->orderByRaw($order)->paginate(2);
            Cache::set('list-'.$p,$list);
            Log::info('数据库list=',['list'=>$list]);
        }

    	
    	return view('index.subdents.select',['list'=>$list]);
    }

    public function inse(Request $request){
    	if ($request->isMethod('POST')) {
    		$data=$request->except('_token');
    		$validator=Validator::make($data,[
    			'name'=>'required|max:30'

    			],[
    			'required'=>':attribute 必填写',
    			'max'=>':attribute 长度不能超过30'
    			],[
    			'name'=>'姓名'
    			]);

    		 if ($validator->fails()) {
            return redirect()
            	 ->back()
                 ->withErrors($validator)
                 ->withInput();
        	}

        	$res=Subdent::create($data);
        	if ($res) {
        		return redirect('/select');
        	}

        	return redirect()->back();
    	}

    	return view('index.subdents.inse');
    }

    // 修改
    public function updates(Request $request){
    	$data=$request->all();
    	$res=Subdent::where(['id'=>$data['id']])->first();
    	return view('index.subdents.updates',['res'=>$res]);
    }

    // 执行修改
    public function update_dos(Request $request){
    	$data=$request->except('_token');
    	$validator=Validator::make($data,[
    			'name'=>'required|max:30'

    			],[
    			'required'=>':attribute 必填写',
    			'max'=>':attribute 长度不能超过30'
    			],[
    			'name'=>'姓名'
    			]);

    		 if ($validator->fails()) {
            return redirect()
            	 ->back()
                 ->withErrors($validator)
                 ->withInput();
        	}
        	$res=Subdent::where(['id'=>$data['id']])->update([
        		'name'=>$data['name'],
        		'age'=>$data['age'],
        		'sex'=>$data['sex']

        		]);

        	if ($res) {
        		return redirect('/select');
        	}

        	return redirect()->back();

    }

   	// 删除
   	public function delete(Request $request){
   		$data=$request->all();
   		$res=Subdent::where(['id'=>$data['id']])->delete();
   		if ($res) {
   			return redirect('/select');
   		}

   		return redirect()->back();
   	}
}
