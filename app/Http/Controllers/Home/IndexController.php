<?php

namespace App\Http\Controllers\Home;

use App\Model\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Collect;
use App\Org\SendTemplateSMS;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
class IndexController extends CommonController
{
    //密码重置页面->邮箱
    public function yxchongzhi(Request $request){

        $data=DB::table('homeuser')->where([
            ['email', '=', $request->input('email')],
            ['id', '=', $request->input('uid')],
        ])->first();

        return view('Home.yxchongzhi',compact('data'));

    }
    //密码重置上传->邮箱
    public function doyxchongzhi(Request $request){
        $email=$request->input('email');
        $id=$request->input('id');
        $res=DB::table('homeuser')->where([
            ['email', '=', $email],
            ['id', '=', $id],
        ])->update(['user_pass' => md5($request->input('user_pass'))]);
        if($res){
            return redirect('yxlogin');
        }else{
            \Session::flash('error','密码重置失败');
            return back()->withInput();
        }


    }
    //忘记密码页面->邮箱
    public function wangjiyx(){

        return view('Home.wangjiyx');

    }
    //忘记密码上传->邮箱
    public function dowangjiyx(Request $request){
        $input=$request->except('_token');
        $email=$input['email'];
        $data=DB::table('homeuser')->where('email', $input['email'])->first();
       if($data){
           Mail::send('Home.Email.zhaohui',['email'=>$data->email,'id'=>$data->id],  function ($obj) use($email) {
               //用邮件对象执行发送的功能
               $obj->to($email)->subject('重置密码');
           });
           \Session::flash('error','邮请登录您的邮箱查看重置密码邮件，重置密码');
           return back()->withInput();
       }else{
           \Session::flash('error','邮箱不存在');
           return back()->withInput();
       }

    }
    //邮箱登录上传
    public function doyxlogin(Request $request){
        $input=$request->except('_token');
        $email=$input['email'];
        $data=DB::table('homeuser')->where([
            ['email', '=', $input['email']],
            ['user_pass', '=', md5($input['user_pass'])],
        ])->first();
        if($data){
            if($data->active==1){
                session(['homeuid' => $data->id]);
                session(['homeemail' => $email]);

                return redirect('index');
            }else{
                Mail::send('Home.Email.active',['email'=>$data->email,'token'=>$data->token,'id'=>$data->id],  function ($obj) use($email) {
                    //用邮件对象执行发送的功能
                    $obj->to($email)->subject('激活邮箱');
                });
                return redirect('yxlogin')->with('active','请先登录邮箱激活账号');
            }
        }else{
            \Session::flash('active','账号或密码错误');
            return back()->withInput();
        }


    }
    //邮箱登录
    public function yxlogin(){

        return view('Home.yxlogin');

    }
    //邮箱注册页
    public function yxzhuce(){
        return view('Home.yxzhuce');

    }
    //邮箱注册上传，发送邮件
    public function doyxzhuce(Request $request){

        $input=$request->except('_token');
        $email=$input['email'];
        $user_pass=md5($input['user_pass']);
        $token=md5($email.$user_pass.'123');
        $guoqi=time()+3600*24;
        if($input['user_pass']==''||$input['email']==''){
            \Session::flash('error','邮箱或密码不为空');
            return back()->withInput();
        }

        $yanzheng=DB::table('homeuser')->where('email',$email)->first();
        if($yanzheng){
            \Session::flash('error','注册失败,邮箱已存在');
            return back()->withInput();
        }

        $res=DB::table('homeuser')->insertGetId(
            ['email' => $email, 'user_pass' => $user_pass, 'token' => $token, 'guoqi' => $guoqi]
        );
        if($res){
            Mail::send('Home.Email.active',['email'=>$email,'token'=>$token,'id'=>$res],  function ($obj) use($email) {
                //用邮件对象执行发送的功能
                $obj->to($email)->subject('激活邮箱');
            });
            return redirect('yxlogin')->with('active','请先登录邮箱激活账号');
        }else{
            \Session::flash('error','注册失败');
            return back()->withInput();
        }
    }
    //激活账号
    public function active(Request $request){
        $id=$request->input('userid');
        $token=$request->input('token');
        $data= DB::table('homeuser')->where([
            ['id', '=', $id],
            ['token', '=', $token],
        ])->first();
        if($data){
            if(time()>$data->guoqi){
                return'链接过期!!!';
            }
           $res=DB::table('homeuser')->where([
               ['id', '=', $id],
               ['token', '=', $token],
           ])->update(['active' => 1]);
            if($res){
                return redirect('yxlogin')->with('active','账号激活成功,请登录');
            }else{
                return'邮箱激活失败请重新注册账号或此邮箱已激活!!!';
            }
        }else{
            return'激活链接无效，请确保您是通过邮箱激活链接来激活的!!!';
        }


    }
    //手机号登录
    public function plogin(){

        return view('Home.plogin');

    }
    //手机号登录上传
    public function doplogin(Request $request){
        $phone=$request->input('phone');
        $data=DB::table('homeuser')->where([
            ['phone', '=', $phone],
            ['user_pass', '=', md5($request->input('user_pass'))],
        ])->first();
        if($data){
            session(['homeuid' => $data->id]);
            session(['homephone' => $phone]);
            return redirect('index');

        }else{
            \Session::flash('error','账号或密码错误');
            return back()->withInput();
        }

    }
    //手机号注册
    public function pzhuce(){

        return view('Home.pzhuce');

    }
    //手机号注册上传
    public function dopzhuce(Request $request){
        $phone=$request->input('phone');
        $user_pass=md5($request->input('user_pass'));

        $yanzheng=DB::table('homeuser')->where('phone',$phone)->first();
        if($yanzheng){
            \Session::flash('error','注册失败,手机号已存在');
            return back()->withInput();
        }
        $res=DB::table('homeuser')->insertGetId(
            ['phone' => $phone, 'user_pass' => $user_pass]
        );
        if($res){
            return redirect('plogin');
        }else{
            \Session::flash('error','注册失败');
            return back()->withInput();
        }
    }



    //短信发送验证码
    public function phone(Request $request){
       $res= new sendTemplateSMS();
        $res->sendTemplateSMS($request->input('phone'));

    }
    //前台首页
    public function index(){
        $homeuid=session('homeuid');
        $homeemail=session('homeemail');

        $list=Category::where('cate_pid','<>',0)->with('article')->get();

        return view('Home.index',compact('list','homeemail'));
    }
    //前端收藏
    public function shoucang(Request $request){
       $art_id=$request->input('art_id');
        $u_id=$request->input('u_id');
        $act=$request->input('act');


        $data=Collect::where([
            ['art_id', '=',$art_id],
            ['u_id', '=',$u_id],
        ])->first();
        switch ($act){
            case 'add';
            if(!$data){
                $res=Collect::create(['u_id'=>$u_id,'art_id'=>$art_id]);
                if($res){
                    Article::where('id',$art_id)->increment('art_collect');
                    return response()->json([
                        'status' => 100,
                        'msg' => '收藏成功'
                    ]);
                }else{
                    return response()->json([
                        'status' => 201,
                        'msg' => '收藏失败'
                    ]);
                }
            }else{
                return response()->json([
                    'status' => 100,
                    'msg' => '已收藏'
                ]);
            }
            break;
            case 'remove';
                if($data){
                    $res=$data->delete();
                    if($res){
                        Article::where('id',$art_id)->decrement('art_collect');
                        return response()->json([
                            'status' => 100,
                            'msg' => '已取消收藏'
                        ]);
                    }else{
                        return response()->json([
                            'status' => 201,
                            'msg' => '取消收藏失败'
                        ]);
                    }
                }else{
                    return response()->json([
                        'status' => 100,
                        'msg' => '已取消收藏'
                    ]);
                }
            break;
        }
    }

    //文章列表
    public function lists(Request $request ,$id){
        $data=Category::where('id',$id)->first();
        $state='lists';

        $list = Article::orderBy('id', 'desc')
            ->where(function ($query) use($request,$id){
                $art_title=$request->input('art_title');
                if(!empty($art_title)){
                    $query->where('art_title','like','%'.$art_title.'%');
                }
                $query->where('cate_id','=',$id);

            })
            ->paginate(15);

        return view('Home.lists',compact('list','request','data','state'));
    }
    //文章详情
    public function detail($id){
        $state='detail';
        $data = Article::where(function ($query) use($id){
                $query->where('id','=',$id);
            })
            ->first();

        return view('Home.detail',compact('data','state'));
    }
}
