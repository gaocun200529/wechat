<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tools\Tools;
use App\Models\Menu;
class MenuController extends Controller
{

	 public $tools;
	 public $request;
    public function __construct(Tools $tools,Request $request)
    {
    		$this->request=$request;
           $this->tools = $tools;
    }


    public function create_menu(Request $request){
    	$req=$request->all();
    	if ($req['type']==1) {
    		$first_count=Menu::where('type','!=',2)->count();
    		if ($first_count>=3) {
    			dd('菜单超限');
    		}

    		Menu::insert([
    			"name"=>$req['first_name'],
    			"event"=>$req['event'],
    			'event_key'=>$req['event_key'],
    			'type'=>$req['type'],
    			'parent_id'=>0
    		]);
    	}elseif($req['type']==2){
    		$menu_count=Menu::where('parent_id','=',$req['name'])->count();
    		if ($menu_count>=5) {
    			dd('菜单超限');
    		}

    		Menu::insert([
    			"name"=>$req['second_name'],
    			"event"=>$req['event'],
    			'event_key'=>$req['event_key'],
    			'type'=>$req['type'],
    			'parent_id'=>$req['name']
    		]);


    	}elseif($req['type']==3){
    		$first_count=Menu::where('type','!=',2)->count();
    		if ($first_count>=3) {
    			dd('菜单超限');
    		}

    		Menu::insert([
    			"name"=>$req['first_name'],
    			"event"=>"",
    			'event_key'=>"",
    			'type'=>$req['type'],
    			'parent_id'=>0
    		]);
    	}
    }


   // 菜单列表
   public function menu_list(){
   		$first_menu=Menu::where(['type'=>3])->select('name','id')->get();
   		// dd($first_menu);
   		return view("index.menu.loadMenu",['first_menu'=>$first_menu]);
   }


// 菜单加载
    public function load_menu(){
    	$menu=Menu::where(['parent_id'=>0])->get();
    	// dd($menu);
    	$data=[];
    	foreach ($menu as $v) {
    		if ($v['type']==1) {

    			// 普通一级菜单
    			 if ($v['event']=='click') {
    			 	$data['button'][]=[
	                    'type'=>'click',
	                    'name'=>$v['name'],
	                    'key'=>$v['event_key']
                   ];
    			 }else if ($v['event']=='view') {
    			 	$data['button'][]=[
	                    'type'=>'view',
	                    'name'=>$v['name'],
	                    'url'=>$v['event_key']
                    ];
    			 }
    		}else if ($v['type']==3) {
    			// 当前一级菜单下有二级菜单
    			$menus=Menu::where(['parent_id'=>$v['id']])->get();//二级菜单
    			$menu_arr=[];
    			$menu_arr['name']=$v['name'];
    			

    			foreach ($menus as $vo) {
    				if ($vo['event']=='click') {
    					$menu_arr['sub_button'][]=[
                            'type'=>'click',
                            'name'=>$vo['name'],
                            'key'=>$vo['event_key']
                        ];
    				}elseif ($vo['event']=='view') {
    					[
                            'type'=>'view',
                           'name'=>$vo['name'],
                            'url'=>$vo['event_key']
                        ];

    				}

    				
    			}

    			$data['button'][]=$menu_arr;
    		}
    		
    	}

    	echo "<pre>";
    	print_r($data);

    	$url="https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$this->tools->get_access_token();
        $re = $this->tools->curl_post($url,json_encode($data,JSON_UNESCAPED_UNICODE));
        $result = json_decode($re,1);
        dd($result);
    }
  
}
