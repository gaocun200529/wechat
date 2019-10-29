<?php

namespace App\Http\Controllers\Kaoshi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goodser;
use App\Models\Cartser;

class KaoshiDetailController extends Controller
{
    public function detailse(Request $request){
        $data=$request->all();
        $res=Goodser::join('orders','goodsers.order_id','=','orders.order_id')->get();
        $resr=Cartser::join('orders','cartsers.order_id','=','orders.order_id')->get();

    	return view('kaoshi.kaoshi.detailse',['res'=>$res,'resr'=>$resr]);
    }

  
}
