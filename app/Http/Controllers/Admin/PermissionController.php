<?php

namespace App\Http\Controllers\Admin;

use App\Model\Permission;
use App\Model\Wuxianji;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){


        $list = Wuxianji::showType();

        return view('Admin/Permission/index',compact('list'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $list = Wuxianji::showType();
        return view('Admin/Permission/create',compact('list'));
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
        $result=Permission::where('per_name',$input['per_name'])->first();
        if($result){
            $data=array(
                'status'=>2,
                'message'=>'添加失败，权限名已存在'
            );
            return $data;

        }
        $res=Permission::insertGetId($input);


        if($res){
            DB::table('role_permission')->insert([
                'role_id' => 1,
                'permission_id' => $res,
            ]);

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

        $list = Wuxianji::ShowType();
        $data=Permission::find($id);
        return view('Admin/Permission/edit',compact('data','list'));
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
        $data1=Permission::find($id);
        $oldper_name=$data1->per_name;
        if($oldper_name!=$request->input('per_name')){
            $result=Permission::where('per_name',$input['per_name'])->first();
            if($result){
                $data=array(
                    'status'=>2,
                    'message'=>'修改失败，权限名已存在'
                );
                return $data;

            }
        }
        if($request->input('old_pid')==0){
            if($request->input('pid')!=0){
                $data=array(
                    'status'=>3,
                    'message'=>'修改失败，根目录层级不可改变'
                );
                return $data;
            }
        }


        $data=Permission::find($id);
        $per_name=$request->input('per_name');
        $pre_url=$request->input('pre_url');
        $pre_pid=$request->input('pid');
        $data->per_name=$per_name;
        $data->pre_url=$pre_url;
        $data->pid=$pre_pid;
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

        $data1=Permission::find($id);
        if($data1->pid==0){
            $res=DB::table('permission')->where('pid',$id)->get();
            if(count($res)!=0){
                $data=array(
                    'status'=>3,
                    'message'=>'删除失败，该权限下存在子权限'
                );
                return $data;
            }
        }

        $yan=DB::table('role_permission')->where([
            ['permission_id', '=', $id],
            ['role_id', '<>', 1]
        ])->get();


        if(count($yan)==0){
            DB::table('role_permission')->where([
                ['permission_id', '=', $id],
                ['role_id', '=', 1]
            ])->delete();
            $data=Permission::find($id);

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
                'message'=>'有角色关联的权限禁止删除'
            );
        }
        return $data;
    }

    public function delall(Request $request){
        $ids=$request->input('ids');
        $list=DB::table('permission')->whereIn('id',$ids)->get();
        foreach($list as $key=>$val){
            $res=DB::table('permission')->where('pid',$val->id)->get();
            if(count($res)!=0){
                $data=array(
                    'status'=>3,
                    'message'=>'删除失败，有权限下存在子权限'
                );
                return $data;
            }
        }

        $where = function ($query) use($ids){
            $query->whereIn( 'permission_id', $ids );
        };
        $yan=DB::table('role_permission')->where('role_id','<>',1)->where($where)->get();


        if(count($yan)==0){
            DB::table('role_permission')->where('role_id','=',1)->where($where)->delete();

            $res=Permission::destroy($ids);
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
                'message'=>'有角色关联的权限禁止删除'
            );
        }

        return $data;
    }
}
