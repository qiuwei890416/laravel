<?php

namespace App\Http\Controllers\Admin;
use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //
    public function index()
    {
        //二级分类
//        $list = (new Category())->tree();

        //无限极分类
        $cate=Category::orderBy('cate_order','asc')->get();
        $list = (new Category())->wuxianji($cate,$fid=0,$level=0);


        return view('Admin/Category/index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //二级分类
//        $list=Category::where('cate_pid',0)->get();
        //无限极分类
        $cate=Category::orderBy('cate_order','asc')->get();
        $list = (new Category())->wuxianji($cate,$fid=0,$level=0);
        return view('Admin/Category/create',compact('list'));
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

        if($input['cate_pid']==0){
            $result=Category::where([
                ['cate_name', '=',$input['cate_name']],
                ['cate_pid', '=', '0'],
            ])->first();

            if($result){
                $data=array(
                    'status'=>2,
                    'message'=>'添加失败，分类名已存在'
                );
                return $data;

            }
        }else{
            $result=Category::where([
                ['cate_name', '=',$input['cate_name']],
                ['cate_pid', '=',$input['cate_pid']],
            ])->first();
            if($result){
                $data=array(
                    'status'=>2,
                    'message'=>'添加失败，分类名已存在'
                );
                return $data;

            }
        }





        $res=Category::create($input);

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
        $data=Category::find($id);
        //二级分类
//        $list=Category::where('cate_pid',0)->get();
        //无限极分类
        $cate=Category::orderBy('cate_order','asc')->get();
        $list = (new Category())->wuxianji($cate,$fid=0,$level=0);
        return view('Admin/Category/edit',compact('data','list'));
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
        $data1=Category::find($id);
        $old_cate_pid=$data1->cate_pid;
        if($old_cate_pid==0){
            if($input['cate_pid']!=0){
                $data=array(
                    'status'=>3,
                    'message'=>'修改失败，顶级栏目层级不可改变'
                );
                return $data;
            }
        }
        if($input['cate_pid']==0){
            $result=Category::where([
                ['cate_name', '=',$input['cate_name']],
                ['cate_pid', '=', '0'],
            ])->first();
            if($result){
                $data=array(
                    'status'=>2,
                    'message'=>'修改失败，分类名已存在'
                );
                return $data;

            }
        }else{
            $result=Category::where([
                ['cate_name', '=',$input['cate_name']],
                ['cate_pid', '=',$input['cate_pid']],
            ])->first();
            if($result){
                $data=array(
                    'status'=>2,
                    'message'=>'修改失败，分类名已存在'
                );
                return $data;

            }
        }






        $data=Category::find($id);
        $cate_name=$request->input('cate_name');
        $cate_title=$request->input('cate_title');
        $cate_order=$request->input('cate_order');
        $cate_pid=$request->input('cate_pid');
        $data->cate_name=$cate_name;
        $data->cate_title=$cate_title;
        $data->cate_order=$cate_order;
        $data->cate_pid=$cate_pid;

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
    public function destroy($id){
        $data1=Category::find($id);

        if($data1->cate_pid==0){
            $res=DB::table('category')->where('cate_pid',$id)->get();
            if(count($res)!=0){
                $data=array(
                    'status'=>3,
                    'message'=>'删除失败，该栏目下存在子栏目'
                );
                return $data;
            }
        }
        $data=Category::find($id);

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

        return $data;
    }
    public function delall(Request $request){
        $ids=$request->input('ids');
        $list=DB::table('category')->whereIn('id',$ids)->get();
        foreach($list as $key=>$val){
            $res=DB::table('category')->where('cate_pid',$val->id)->get();
            if(count($res)!=0){
                $data=array(
                    'status'=>3,
                    'message'=>'删除失败，有权限下存在子权限'
                );
                return $data;
            }
        }
            $res=Category::destroy($ids);
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
    public function paixu(Request $request){
        $id=$request->input('id');
        $cate_order=$request->input('cate_order');
        $data=Category::find($id);

        $res=$data->update(['cate_order'=>$cate_order]);
//        $data->cate_order=$cate_order;
//        $res=$data->save();

        if($res){
            $data=array(
                'status'=>0,
                'message'=>'修改成功'
            );
        }else{
            $data=array(
                'status'=>1,
                'message'=>'排序修改失败'
            );
        }

        return $data;
    }
}
