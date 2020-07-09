<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller{
    public function index(){

        return view('Admin/Index/index');
    }
    public function welcome(){
        $username=session('username');
        return view('Admin/Index/welcome',['username'=>$username]);
    }
    public function error($err){


        return view('Admin/Public/error',['error'=>$err]);
    }
}
