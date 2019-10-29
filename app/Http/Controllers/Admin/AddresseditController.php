<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddresseditController extends Controller
{
    public function addressedit(Request $request){
    	return view('admin.admin.addressedit');
    }
}
