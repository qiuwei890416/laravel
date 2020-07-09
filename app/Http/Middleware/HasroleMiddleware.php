<?php

namespace App\Http\Middleware;

use App\Model\User;
use App\Model\Role;
use App\Model\Permission;
use Closure;

class HasroleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


       if(session('uid')==1){
           return $next($request);
       }

        //获取当前请求的路由 对应的控制器方法名
//        $route=\Route::current()->getActionName();
        $route1=request()->route()->getActionName();

//        //获取当前用户信息
//       $user=User::find(session('uid'));
//       //获取当前用户的角色
//        $role=$user->role;
//
//        //根据用户拥有的角色找对应的权限
//        $arr=array();
//        foreach ($role as $key=>$val){
//            $permission=$val->permission;
//
//            foreach ($permission as $k=>$v){
//                if($v->pre_url){
//                    $arr[]=$v->pre_url;
//                }
//
//            }
//        }
//
//        //去掉重复权限
//        $arr= array_unique($arr);
        $arr= session('arr');

       if(in_array($route1,$arr)){
           return $next($request);
       }else{
           
           return redirect()->action('Admin\IndexController@error',['err'=>'没有权限！！']);
       }

    }
}
