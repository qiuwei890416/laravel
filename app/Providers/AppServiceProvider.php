<?php

namespace App\Providers;

use App\Model\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //导航


//        $list=Category::get();
//        $one=array();
//        $two=array();
//        foreach($list as $key=>$val){
//            if($val->cate_pid==0){
//                $one[$key]=$val;
//
//                foreach($list as $k=>$v){
//                    if($val->id==$v->cate_pid){
//                        $two[$key][$k]=$v;
//                    }
//
//                }
//            }
//
//        }
//
//        view()->share('one',$one);
//        view()->share('two',$two);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
