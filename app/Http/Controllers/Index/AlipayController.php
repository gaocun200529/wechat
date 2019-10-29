<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yansongda\Pay\Pay;
use Yansongda\Pay\Log;


class AlipayController extends Controller
{
    public function aindex(Request $request){
    	return view('alipay.aindex');
    }

    public function do(Request $request){
    	// dd($request->all());
    	$config=config('alipay');

    	 $order = [
    	 	// 订单号
            'out_trade_no' => $request->WIDout_trade_no,
            // 金额
            'total_amount' => $request->WIDtotal_amount,
            // 标题
            'subject' => $request->WIDsubject,
        ];

        $alipay = Pay::alipay($config)->web($order);

        return $alipay;
    }

    public function return(Request $request){
    	//验证支付的可靠性
    	$config=config('alipay');
    	try{

    	$data=Pay::alipay($config)->verify();
    	}catch(\Exception $e){
    		exit('验证消息失败');
    	}


    	
    	// dd($data);
    	// 调用查询接口 查询订单状态
    	$res=$this->query($data->out_trade_no);
    	if ($res->trade_status=="TRADE_SUCCESS") {
    		return "支付成功";
    	}

    	return "本次交易失败,订单状态为".$res->trade_status;
    }


    public  function query($orderid){
    	$config=config('alipay');
    	$data=Pay::alipay($config)->find($orderid);
    	return $data;
    }
}
