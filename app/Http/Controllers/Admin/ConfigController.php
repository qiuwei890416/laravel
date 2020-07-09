<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Config;
use Illuminate\Support\Facades\DB;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list=Config::get();
        foreach($list as $key=>$val){
            switch ($val->fiele_type){
                case 'input';
                $val->conf_contents=' <input type="text" value="'.$val->conf_content.'" name="conf_content[]" class="layui-input">';
                    break;
                case 'textarea';
                    $val->conf_contents='<textarea name="conf_content[]"  class="layui-textarea">'.$val->conf_content.'</textarea>';
                    break;
                case 'radio';
                    $str='';
                    $all=explode(',',$val->fiele_value);
                    foreach($all as $k=>$v){
                        $a=explode('|',$v);
                        if($val->conf_content==$a[0]){
                            $str.='<input type="radio" name="conf_content[]" checked value="'.$a[0].'" title="'.$a[1].'">';
                        }else{
                            $str.='<input type="radio" name="conf_content[]" value="'.$a[0].'" title="'.$a[1].'">';

                        }

                    }
                    $val->conf_contents=$str;

                    break;
            }
        }


        return view('Admin/Config/index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/Config/create');
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
        $res=Config::create($input);

        if($res){
            $this->xieru();
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
        $data=Config::find($id);

        return view('Admin/Config/edit',compact('data'));
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
        $data=Config::find($id);

        $conf_title=$request->input('conf_title');
        $conf_name=$request->input('conf_name');
        $conf_content=$request->input('conf_content');
        $conf_tips=$request->input('conf_tips');
        $fiele_type=$request->input('fiele_type');
        $fiele_value=$request->input('fiele_value');

        $data->conf_title=$conf_title;
        $data->conf_name=$conf_name;
        $data->conf_content=$conf_content;
        $data->conf_tips=$conf_tips;
        $data->fiele_type=$fiele_type;
        $data->fiele_value=$fiele_value;


        $res=$data->save();

        if($res){
            $this->xieru();
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
        $data=Config::find($id);
        $res=$data->delete();
        if($res){
            $this->xieru();
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
    //批量修改
    public function editall(Request $request)
    {
        $input=$request->except('_token');
        //重新排序
        $i=0;
        $arr=array();
        foreach($input['conf_content'] as $key=>$val){
            $arr[$i]=$val;
            $i++;
        }

        //事务
        DB::beginTransaction(); //开启事务

        try {
            foreach ($input['id'] as $key=>$val){

                DB::table('config')->where('id',$val)->update(['conf_content' => $arr[$key]]);

            }

            DB::commit();//事务提交
            $this->xieru();
            return redirect('admin/Config');
        } catch (\Exception $e) {
            DB::rollBack();//事务回滚
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }




    }
    public function xieru()
    {
        //all()返回基本数组
        $list=Config::pluck('conf_content','conf_name')->all();

       //把数组变字符串模式的数组
       $str='<?php return '.var_export($list,true).';';

       //将内容写入文件
        file_put_contents(config_path().'\webconfig.php',$str);

    }

}
