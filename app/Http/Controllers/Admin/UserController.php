<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use App\Model\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list=User::where(function ($query) use($request){
                $user_name=$request->input('user_name');
                if(!empty($user_name)){
                $query->where('user_name','like','%'.$user_name.'%');
                }
            })
            ->with('role')
            ->paginate(!empty($request->input('num'))?$request->input('num'):10);



//        foreach($list as $key=>$val){
//            if(count($val->role)!=0){
//                $a='';
//                foreach($val->role as $k=>$v){
//                    $a.=$v->role_name.',';
//                }
//                $list[$key]->role=rtrim($a, ",");
//            }else{
//                $list[$key]->role='';
//            }
//
//
//        }

        return view('Admin/User/index',['list' => $list,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/User/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_name=$request->input('user_name');
        $user_pass=Crypt::encrypt($request->input('user_pass'));
        $result=DB::table('user')->where([
            ['user_name', '=', $user_name],
        ])->first();
        if($result){
            $data=array(
                'status'=>2,
                'message'=>'添加失败，用户名已存在'
            );
            return $data;

        }

        $res=DB::table('user')->insert([
            'user_name' => $user_name,
            'user_pass' => $user_pass,
        ]);
        if($res){
           $data=array(
               'status'=>0,
               'message'=>'添加成功'
           );
        }else{
            $data=array(
                'status'=>1,
                'message'=>'添加失败'
            );
        }
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=DB::table('user')->where('id', '=', $id)->first();

        return view('Admin/User/edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data1=$result=DB::table('user')->where([
            ['id', '=', $id],
        ])->first();
        $oldrole_name=$data1->user_name;
        if($oldrole_name!=$request->input('user_name')){
            $result=DB::table('user')->where([
                ['user_name', '=', $request->input('user_name')],
            ])->first();
            if($result){
                $data=array(
                    'status'=>2,
                    'message'=>'修改失败，用户名已存在'
                );
                return $data;

            }
        }

        $user_name=$request->input('user_name');
        if($request->input('user_pass')!=''){
            $user_pass=Crypt::encrypt($request->input('user_pass'));
        }else{
            $user_pass=$data1->user_pass;
        }

        $res= DB::table('user')
            ->where('id', $id)
            ->update([
                'user_name' => $user_name,
                'user_pass' => $user_pass,
            ]);


        if($res){
            $data=array(
                'status'=>0,
                'message'=>'修改成功'
            );
        }else{
            $data=array(
                'status'=>1,
                'message'=>'修改失败或没有修改'
            );
        }
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res=DB::table('user')->where('id', '=', $id)->delete();
        if($res){
            $data=array(
                'status'=>0,
                'message'=>'删除成功'
            );
        }else{
            $data=array(
                'status'=>1,
                'message'=>'删除失败'
            );
        }
        return $data;
    }
    public function delall(Request $request){
        $ids=$request->input('ids');


        $res=DB::table('user')->whereIn('id',$ids)->delete();
        if($res){
            $data=array(
                'status'=>0,
                'message'=>'删除成功'
            );
        }else{
            $data=array(
                'status'=>1,
                'message'=>'删除失败'
            );
        }
        return $data;
    }
    //权限显示
    public function auth($id){
        $user=DB::table('user')->where([
            ['id', '=', $id],
        ])->first();
        $role=DB::table('role')->get();

        $own_permission=DB::table('user')
            ->where('id',$id)
            ->join('user_role', 'user.id', '=', 'user_role.user_id')
            ->select('user_role.role_id')
            ->get();

        $own_permid=array();

        foreach ($own_permission as $key=>$value){
            $own_permid[]=$value->role_id;
        }

        return view('Admin/User/auth',compact('user','role','own_permid'));
    }
    //权限上传
    public function doauth(Request $request){
        $input=$request->except('_token');

        //删除当前角色已有的权限
        DB::table('user_role')->where('user_id', '=', $input['user_id'])->delete();
        //添加新的权限
        if(!empty($input['role_id'])){
            $data=array();
            foreach ($input['role_id'] as $key=>$val){
                $data[]=array(
                    'user_id'=>$input['user_id'],
                    'role_id'=>$val,
                );
            }
            DB::table('user_role')->insert($data);

        }

        return redirect('admin/User');

    }
}
