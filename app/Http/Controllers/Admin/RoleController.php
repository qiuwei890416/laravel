<?php

namespace App\Http\Controllers\Admin;

use App\Model\Role;
use App\Model\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = Role::orderBy('id', 'desc')
            ->where(function ($query) use($request){
                $role_name=$request->input('role_name');
                if(!empty($role_name)){
                    $query->where('role_name','like','%'.$role_name.'%');
                }
            })
            ->paginate(!empty($request->input('num'))?$request->input('num'):10);

        return view('Admin/Role/index',compact('list','request'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/Role/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->except('_token');
        $result=Role::where('role_name',$input['role_name'])->first();
        if($result){
            $data=array(
                'status'=>2,
                'message'=>'添加失败，角色名已存在'
            );
            return $data;

        }
        $res=Role::create($input);

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
        $data=Role::find($id);
        return view('Admin/Role/edit',compact('data'));

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
        $input=$request->except('_token');
        $data1=Role::find($id);
        $oldrole_name=$data1->role_name;
        if($oldrole_name!=$request->input('role_name')){
            $result=Role::where('role_name',$input['role_name'])->first();
            if($result){
                $data=array(
                    'status'=>2,
                    'message'=>'修改失败，角色名已存在'
                );
                return $data;

            }
        }



        $data=Role::find($id);
        $role_name=$request->input('role_name');
        $describe=$request->input('describe');
        $data->role_name=$role_name;
        $data->describe=$describe;
        $res=$data->save();

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
        $yan=DB::table('user_role')->where('role_id',$id)->get();

        if(count($yan)==0){
            $data=Role::find($id);

            $res=$data->delete();
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

        }else{
            $data=array(
                'status'=>2,
                'message'=>'有用户关联的角色禁止删除'
            );
        }
        return $data;
    }
    public function delall(Request $request){
        $ids=$request->input('ids');
        $yan=DB::table('user_role')->whereIn('role_id',$ids)->get();
        if(count($yan)==0){
            $res=Role::destroy($ids);
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
        }else{
            $data=array(
                'status'=>2,
                'message'=>'有用户关联的角色禁止删除'
            );
        }

        return $data;
    }
    //权限显示
    public function auth($id){
        $role=Role::find($id);

        $per=DB::table('permission')->get();
        $per1=DB::table('permission')->where('pid',0)->get();

        $permission=array();
        foreach ($per1 as $key=>$val){
            $permission[$key]=$val;
            $permission[$key]->zi[]=array();
            foreach ($per as $k=>$v){
                if($v->pid==$val->id){
                    $permission[$key]->zi[]=$v;
                }


            }

        }


        $own_permission=$role->permission;
        $own_permid=array();

        foreach ($own_permission as $key=>$value){
            $own_permid[]=$value->id;
        }


        return view('Admin/Role/auth',compact('role','permission','own_permid'));
    }
    //权限上传
    public function doauth(Request $request){
        $input=$request->except('_token');


        //删除当前角色已有的权限
        DB::table('role_permission')->where('role_id', '=', $input['role_id'])->delete();
        //添加新的权限
        if(!empty($input['permission_id'])){
            $data=array();
            foreach ($input['permission_id'] as $key=>$val){
                $data[]=array(
                    'role_id'=>$input['role_id'],
                    'permission_id'=>$val,
                );
            }

            $res=DB::table('role_permission')->insert($data);
            if($res){
                return redirect('admin/Role');
            }else{
                echo '失败';
            }

        }else{
            return redirect('admin/Role');
        }



    }
}
