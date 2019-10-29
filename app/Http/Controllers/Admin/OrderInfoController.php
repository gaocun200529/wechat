<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderInfoController extends Controller
{
    public function orderinfo(Request $request){
    	return view('admin.admin.orderinfo');
    }
}
