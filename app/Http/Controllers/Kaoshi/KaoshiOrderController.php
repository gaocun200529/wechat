<?php

namespace App\Http\Controllers\Kaoshi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class KaoshiOrderController extends Controller
{
    public function orderse(Request $request){
        $data=$request->all();
        $where=[];
        if (!empty($data['order_name'])) {
            $where[]=['order_name','like',"%".$data['order_name']."%"];
        }

        if (!empty($data['order_sn'])) {
           $where[]=['order_sn','=',$data['order_sn']];
        }
        if (!empty($data['order_qr'])) {
            $where[]=['order_qr','=',$data['order_qr']];
        }

        $res=Order::where($where)->paginate(1);;
    	return view('kaoshi.kaoshi.orderse',['res'=>$res]);
    }

}
