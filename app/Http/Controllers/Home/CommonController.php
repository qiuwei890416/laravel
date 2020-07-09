<?php

namespace App\Http\Controllers\Home;

use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class CommonController extends Controller{
    public function __construct(){
        $list=Category::get();
        $one=array();
        $two=array();
        foreach($list as $key=>$val){
            if($val->cate_pid==0){
                $one[$key]=$val;
                foreach($list as $k=>$v){
                    if($val->id==$v->cate_pid){
                        $two[$key][$k]=$v;
                    }
                }
            }
        }
//        $list=DB::table('category')->get();
//        $arr=array();
//        foreach($list as $key=>$val){
//            if($val->cate_pid==0){
//                $arr[$key]=$val;
//                foreach($list as $k=>$v){
//                    if($val->id==$v->cate_pid){
//                        $arr[$key]->arr[]=$v;
//                    }
//                }
//            }
//
//        }
//        view()->share('arr',$arr);
        $homeemail=session('homeemail');
        view()->share('one',$one);
        view()->share('two',$two);
        view()->share('homeemail',$homeemail);
    }
}
