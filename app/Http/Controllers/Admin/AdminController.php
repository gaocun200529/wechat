<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){
    	return view('admin.admin.index');
    }

    public function add(){
    	return view('admin.admin.add');
    }
}
