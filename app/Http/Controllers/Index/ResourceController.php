<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Resource;
use Illuminate\Support\Facades\Storage;
use App\Tools\Tools;
class ResourceController extends Controller
{

     public $tools;
     public $request;
    public function __construct(Tools $tools,Request $request)
    {
        $this->request=$request;
           $this->tools = $tools;
    }

    // 素材列表

   	//添加
   	public function uploads(){
   		return view('index.resource.upload');
   	}

   	public function do_upload(){
   		$req=$this->request->all();
   		// dd($req);
   		$type_arr=['image'=>1,'voice'=>2,'video'=>3,'thumb'=>4];
   		if (!$this->request->hasFile('rsource')) {
   			dd('没有文件上传');
   		}

   		$file_obj=$this->request->file('rsource');
   		$file_exe=$file_obj->getClientOriginalExtension();
   		$file_name=time().rand(1000,9999).'.'.$file_exe;
   		$path=$this->request->file('rsource')->storeAs('wechat/'.$req['type'],$file_name);
   		$url='https://api.weixin.qq.com/cgi-bin/material/add_material?access_token='.$this->tools->get_access_token().'&type='.$req['type'];

   		 $data=[
            'media'=>new \CURLFile(storage_path('app/public/'.$path)),
        ];
        // dd($data);

        if ($req['type']=='video') {
        	$data['description']=[
        		'title'=>'标题',
        		'introduction'=>'描述'
        	];

        	$data['description']=json_encode($data['description'],JSON_UNESCAPED_UNICODE);
        }

   		$re=$this->tools->wechat_curl_file($url,$data);
   		$result=json_decode($re,1);
   		if (!isset($result['errcode'])) {
   			Resource::insert([
   				'media_id'=>$result['media_id'],
   				'type'=>$type_arr[$req['type']],
   				'path'=>'/storage/'.$path,
   				'addtime'=>time()
   			]);
   		}

   		return redirect('/source_list');

   	}

   // 展示
   	public function source_list(Resource $request){
   		$req=$request->all();
   		$url="https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token=".$this->tools->get_access_token();
   		$data=[
   			"type"=>'image',
   			"offset"=>'0',
   			"count"=>20
   		];
   		$re=$this->tools->curl_post($url,json_encode($data,JSON_UNESCAPED_UNICODE));
   		$result=json_decode($re,1);
   		$res=Resource::all();
   		return view('index.resource.sourceList',['res'=>$res]);
   	}

   	// 调用频次清0
   	  public function clear_api()
    {

//        echo 11;die;
        $url='https://api.weixin.qq.com/cgi-bin/clear_quota?access_token='.$this->tools->get_access_token();
        $data=['appid'=>'wx671adb2c9975f17c'];
        $re=$this->tools->curl_post($url,json_encode($data));
        $result=json_decode($re,1);
        dd($result);
    }

    // 下载资源
    public function download(Request $request){
    	$req=$request->all();
    	$url="https://api.weixin.qq.com/cgi-bin/material/get_material?access_token=".$this->tools->get_access_token();
    	$re=$this->tools->curl_post($url,json_encode(['media_id'=>$req['media_id']]));
    	$result=json_decode($re,1);

    	// 设置超时参数
    	$opts=array(
    			'http'=>array(
    					'method'=>"GET",
    					'timeout'=>3

    				)

    		);

    	// 创建数据流上下文
    	$context=stream_context_create($opts);

    	//$url请求的地址
    	$file_source=file_get_contents($result['down_url'],false,$context);



    	 Storage::put('/wechat/video/7856.MP4', $file_source);

    }
}