<?php

namespace App\Http\Controllers\Admin;

use App\Model\User;
use App\Model\Role;
use App\Model\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Org\Code\Code;
//验证码类
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller{
    public function login(){

        return view('Admin.Login.login');
    }
    public function dologin(Request $request){
        $username =$request->input('username');
        $password = $request->input('password');
        $code=$request->input('code');
        $code1=$request->session()->get('code');

        if(strcasecmp($code,$code1)!=0){
            \Session::flash('error','验证码错误');
            return back()->withInput();
        }
        $result=DB::table('user')->where([
            ['user_name', '=', $username],
        ])->first();
       if($result){
           if($password==Crypt::decrypt($result->user_pass)){
               session(['uid' => $result->id]);
               session(['username' => $username]);

               //获取当前用户信息
               $user=User::find(session('uid'));
               //获取当前用户的角色
               $role=$user->role;

               //根据用户拥有的角色找对应的权限
               $arr=array();
               foreach ($role as $key=>$val){
                   $permission=$val->permission;

                   foreach ($permission as $k=>$v){
                       if($v->pre_url){
                           $arr[]=$v->pre_url;
                       }

                   }
               }

               //去掉重复权限
               $arr= array_unique($arr);

               session(['arr' => $arr]);


               //别名跳转
//            return redirect()->route('index', [1]);
               //重定向跳转
//            return redirect('admin/Index/index/1');
               //重定向到路由
               return redirect()->action('Admin\IndexController@index');
           }else{
               \Session::flash('error','密码错误');
               return back()->withInput();
           }
       }else{
           \Session::flash('error','用户名错误');
           return back()->withInput();
       }




    }
    public function code(){
        $code=new Code();

        return $code->doimg();
    }
    //自带验证码
    public function captcha(Request $request){
        $phrase = new PhraseBuilder;
        //设置验证吗位数
        $code = $phrase->build(4);
        //生成验证码图片build 对象 ，配置相应属性
        $builder = new CaptchaBuilder($code,$phrase);
        //设置背景颜色
        $builder->setBackgroundColor(100,220,200);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        //可以设置图片宽度及字体
        $builder->build($whth=130,$height=50,$font=null);
        //获取验证码内容
        $phrase = $builder->getPhrase();
        //把内容存入session
        \Session::flash('code',$phrase);




        //生成图片
        header('Cache-Control:no-cache,must-revalidate');
        header('Cotent-Type:image/jpeg');
        $builder ->output();

    }
    public function outdenglu(Request $request)
    {
        $request->session()->flush();
        return redirect('/admin');

    }
}
