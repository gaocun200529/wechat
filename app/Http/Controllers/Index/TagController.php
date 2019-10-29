<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tools\Tools;
class TagController extends Controller
{
	public $tools;
    public function __construct(Tools $tools)
    {
           $this->tools = $tools;
    }

	public function pushTag(Request $request){
		$data=$request->all();
		return view('index.tag.pushTag',['data'=>$data['tagid']]);
	}

	// 标签列表
	public function tagList(){
		$result=$this->tools->tagList();
        // dd($result);
        return view('index.tag.tagList',['data'=>$result['tags']]);
	}

	// 标签添加
	public function addTag(){
		return view('index.tag.addTag');

	}

	// 执行添加
	public function do_addTag(Request $request){
		$req=$request->all();
		$data = [
            'tag'=>[
                'name'=>$req['tag_name']
            ]
        ];
		$url = 'https://api.weixin.qq.com/cgi-bin/tags/create?access_token='.$this->tools->get_access_token();
		$re=$this->tools->curl_post($url,json_encode($data,JSON_UNESCAPED_UNICODE));
		$resuel=json_decode($re,1);
		return redirect('/tagList');
	}

	// 修改
	public function tagupdate(Request $request){
	$data=$request->all();
// dd($data);
	return view('index.tag.tagupdate',['tag_id'=>$data['tag_id'],'tag_name'=>$data['tag_name']]);
	}

	// 执行修改
	public function tagupdate_do(Request $request){
		$req=$request->all();
		$url="https://api.weixin.qq.com/cgi-bin/tags/update?access_token=".$this->tools->get_access_token();
		$data=[
			'tag'=>[
				'id'=>$req['tag_id'],
				'name'=>$req['tag_name']
			]
		];

		$re=$this->tools->curl_post($url,json_encode($data,JSON_UNESCAPED_UNICODE));
		$resuel=json_decode($re,1);
		return redirect('/tagList');
	}

	public function tagdal(Request $request){
		$req=$request->all();
		$url="https://api.weixin.qq.com/cgi-bin/tags/delete?access_token=".$this->tools->get_access_token();
		$data=[
			'tag'=>[
				'id'=>$req['tag_id']
			]
		];
		$re=$this->tools->curl_post($url,json_encode($data,JSON_UNESCAPED_UNICODE));
		$resuel=json_decode($re,1);
		return redirect('/tagList');

	}

	// 给用户打标签
	public function tag_user(Request $request){
		$req=$request->all();
		// dd($req);
		$url="https://api.weixin.qq.com/cgi-bin/tags/members/batchtagging?access_token=".$this->tools->get_access_token();
		$data=[
				'tagid'=>$req['tag_id'],
				'openid_list'=>$req['opneid_list']
			];

		$re=$this->tools->curl_post($url,json_encode($data,JSON_UNESCAPED_UNICODE));
		$resuel=json_decode($re,1);
		dd($resuel);
	}


	// 群发消息
	public function push_tag_mag(Request $request){
		$req=$request->all();
		$url="https://api.weixin.qq.com/cgi-bin/message/mass/sendall?access_token=".$this->tools->get_access_token();
		$data=[
			 "filter"=>[
		      "is_to_all"=>false,
		      "tag_id"=>$req['tag_id']
		   ],
		    "text"=>[
		      "content"=>"111111"
		   ],
		     "msgtype"=>"text"
		];

		$re=$this->tools->curl_post($url,json_encode($data,JSON_UNESCAPED_UNICODE));
		$resuel=json_decode($re,1);
		dd($resuel);
	}
    
}