<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Indexser;
class IndexseController extends Controller
{
	// 添加
    public function indexse(Request $request){

    	return view('index.index.indexse');
    }

    // 执行添加
    public function indexse_do(Request $request){
    	$data=$request->except("_token");
    	$path="";
    	if ($request->hasFile('index_img') && $request->file('index_img')->isValid()) {
    		$path=Storage::putFile('imgs',$request->file('index_img'));
    	}

    	$data['index_img']=$path;
    	$dt=Indexser::create($data);
    	if ($dt) {
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

    // 查询
    public function indexseadd(Request $request){
    	$data=$request->all();
    	$where=[];
    	if (!empty($data['index_name'])) {
    		$where[]=["index_name","like","%".$data['index_name']."%"];
    	}

    	if (!empty($data['index_age'])) {
    		$where[]=['index_age','=',$data['index_age']];
    	}

    	if (!empty($data['index_sex'])) {
    		$where[]=['index_sex','=',$data['index_sex']];
    	}

    	if (!empty($data['order'])) {
    		$order=$data['order']." ".$data['order_do'];
    	}else{
    		$order="index_id";
    	}

    	$res=Indexser::where($where)->orderByRaw($order)->paginate(2);

    	return view('index.index.indexseadd',['res'=>$res]);
    }

    // 删除

    public function indexsedel(Request $request){
    	$data=$request->all();
    	$res=Indexser::where(['index_id'=>$data['index_id']])->delete();
    	if ($res) {
    		echo 1;
    	}else{
    		echo 2;
    	}
    }

    // 修改
    public function indexseupdata(Request $request){
    	$data=$request->all();
    	$res=Indexser::where(['index_id'=>$data['index_id']])->first();
    	return view('index.index.indexseupdata',['res'=>$res]);
    }


    // 执行修改
    public function indexseupdata_do(Request $request){
    	$data=$request->except('_token');
    	$path="";
    	if ($request->hasFile('index_img') && $request->file('index_img')->isValid()) {
    		$path=Storage::putFile('imgs',$request->file('index_img'));
    	}
    	$data['index_img']=$path;
    	$dt=Indexser::where(['index_id'=>$data['index_id']])->update([
    			'index_name'=>$data['index_name'],
    			'index_age'=>$data['index_age'],
    			'index_sex'=>$data['index_sex']
    		]);
    	if ($dt) {
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
