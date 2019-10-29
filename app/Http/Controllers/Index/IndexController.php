<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Article;
use Validator;

class IndexController extends Controller
{
    //文章管理
    public function index(Request $request){
    	$all=$request->all();
    	$where=[];
    	if (!empty($all['title'])) {
    		$where[]=['title','like',"%".$all['title']."%"];
    	}
    	if (!empty($all['author'])) {
    		$where[]=['author','like','%'.$all['author'].'%'];
    	}

    	if (!empty($all['order'])) {
    		$order=$all['order']." ".$all['order_do'];
    	}else{
    		$order="id";
    	}

    	$list=Article::where($where)->orderByRaw($order)->paginate(4);
    	// dd($list);die;
    	return view('index.index.index',['list'=>$list]);
    }

    public function add(Request $request){
    	if ($request->isMethod('POST')) {
    		$data=$request->except('_token');
    		$validator=Validator::make($data,[
    			'title'=>'required|max:30',
    			'author'=>'required|max:30'

    			],[
    				'required'=>':attribute 必填写',
    				'max'=>':attribute 长度不能超过30'
    			],[
    				'title'=>'标题',
    				'author'=>'作者'

    			]);

    		 if ($validator->fails()) {
            return redirect()
            	 ->back()
                 ->withErrors($validator)
                 ->withInput();
        	}

            // 文件上传
            // $path = $request->file('img')->store('public');
            $path='';
            if ($request->hasFile('img') && $request->file('img')->isValid()){
                 $path = Storage::putFile('imgs', $request->file('img'));
            }
           
            // dd($path);  
            $data['img']=$path;

        	$dt=Article::create($data);
        	if ($dt) {
                 session()->flash('status','添加成功，id为'.$dt->id);
        		return redirect('/index');
        	}

        	return redirect()->back();
    	}
    	return view('index.index.add');
    }

    // 修改
    public function update(Request $request){
    	$data=$request->all();
    	$res=Article::where(['id'=>$data['id']])->first();
    	return view('index.index.update',['res'=>$res]);
    }

    // 执行修改
    public function update_do(Request $request){
    	// $dt=$request->all();
    	$data=$request->except('_token');
    	$validator=Validator::make($data,[
    			'title'=>'required|max:30',
    			'author'=>'required|max:30'

    			],[
    				'required'=>':attribute 必填写',
    				'max'=>':attribute 长度不能超过30'
    			],[
    				'title'=>'标题',
    				'author'=>'作者'

    			]);

    		 if ($validator->fails()) {
            return redirect()
            	 ->back()
                 ->withErrors($validator)
                 ->withInput();
        	}

              // 文件上传
            // $path = $request->file('img')->store('public');
          $path='';
            if ($request->hasFile('img') && $request->file('img')->isValid()){
                 $path = Storage::putFile('imgs', $request->file('img'));
            }
            // dd($path);  
            $data['img']=$path;

        	$res=Article::where(['id'=>$data['id']])->update([
        			'title'=>$data['title'],
        			'author'=>$data['author'],
                    'hits'=>$data['hits'],
        			'content'=>$data['content'],
                    'img'=>$data['img']
        		]);

        	if ($res) {
        		return redirect('/index');
        	}

        	return redirect()->back();
    }

    // 删除
    public function del(Request $request){
    	$data=$request->all();
        // dd($data);
    	$res=Article::where(['id'=>$data['id']])->delete();
    	if ($res) {
           
    		return redirect('/index')->with('success','删除成功id为'.$data['id']);
    	}
    	return redirect()->back();
    }

    // 详情页
    public function details(Request $request){
        $data=$request->all();
        $res=Article::findorFail($data['id']);
        return view('index.index.details',['res'=>$res]);

    }

     public function dels(Request $request){
          $id = $request->input('id');  
          $str = explode(",",$id);  
         // var_dump($str);die; 
          foreach($str as $v){  
             $res=Article::where('id',"=","$v")->delete();  
            }  
           return redirect('/index');
          
    }

}
