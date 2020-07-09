<?php

namespace App\Http\Controllers\Admin;

use App\Model\Category;
use App\Model\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Services\OSS;
use Redis;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


//        $list=array();//存放所有文章的空数组
//        $listkey='SET:ARTICLE'; //所有文章的ID
//        $hashkey='HASH:ARTICLE'; //全部文章内容
//        $yan=Article::pluck('id')->toArray();
//
//
//
//
//        if(Redis::exists($listkey)&&count(array_diff($yan,Redis::SMEMBERS($listkey)))==0){ //判断文章IDKEY是否存在和
//            //获取全部文章的ID
//            $lists=Redis::SMEMBERS($listkey);
//            foreach($lists as $key=>$val){
//                //通过ID获取文章并存入数组
//                $list[]=Redis::hgetall($hashkey.$val);
//            }
//
//
//        }else{
////            //取数据 变数组
//            $list=Article::get()->toArray();
//            foreach($list as $key=>$val){
//                //将文章的ID添加到$listkey中
//                Redis::Sadd($listkey,$val['id']);
//                //将文章添加到$hashkey中
//                Redis::Hmset($hashkey.$val['id'],$val);
//            }
//
//        }

//        $new_list=$list;
//
//        if($request->input('art_title')!=''&&$request->input('art_status')!=''){
//            $new_list=array();
//            foreach ($list as $key => $value) {
//                if($value['art_title']==$request->input('art_title')&&$value['art_status']==$request->input('art_status')){
//                    $new_list[]=$value;
//                }
//            }
//        }
//        if($request->input('art_title')!=''&&$request->input('art_status')==''){
//            $new_list=array();
//            foreach ($list as $key => $value) {
//                if($value['art_title']==$request->input('art_title')){
//                    $new_list[]=$value;
//                }
//            }
//        }
//        if($request->input('art_title')==''&&$request->input('art_status')!=''){
//            $new_list=array();
//            foreach ($list as $key => $value) {
//                if($value['art_status']==$request->input('art_status')){
//                    $new_list[]=$value;
//                }
//            }
//        }
        //自定义分页
//    //当前页数 默认1
//    $page = $request->page ?: 1;
//    //每页的条数
//    $perPage = $request->num ?: 3;
//    //计算每页分页的初始位置
//     $offset = ($page * $perPage) - $perPage;
//     //实例化LengthAwarePaginator类，并传入对应的参数
//     $list = new LengthAwarePaginator(array_slice($new_list, $offset,
//         $perPage, true), count($new_list), $perPage,$page, ['path' =>
//         '', 'query' => $request->query()]);
//        return view('Admin/Article/index',compact('list','request','leiming','query'));


        $list = Article::orderBy('id', 'desc')
            ->where(function ($query) use($request){
                $art_title=$request->input('art_title');
                $art_status=$request->input('art_status');
                if(!empty($art_title)){
                    $query->where('art_title','like','%'.$art_title.'%');
                }
                if(!empty($art_status)){
                    $query->where('art_status','=',$art_status);
                }
            })
            ->paginate(!empty($request->input('num'))?$request->input('num'):10);
        $cate=Category::get();
        $leiming=array();
        foreach($cate as $key=>$val){
            $leiming[$val->id]=$val;
        }
        return view('Admin/Article/index',compact('list','request','leiming'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //二级分类
//        $list = (new Category())->tree();
            //      无限极分类
        $cate=Category::orderBy('cate_order','asc')->get();
        $list = (new Category())->wuxianji($cate,$fid=0,$level=0);
        return view('Admin/Article/create',compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $input=$request->except('_token','photo','file');


        $result=Article::where([
            ['art_title', '=',$input['art_title']],
            ['cate_id', '=',$input['cate_id']],
        ])->first();
        if($result){
            $data=array(
                'status'=>2,
                'message'=>'添加失败，相同分类下文章名不能相同'
            );
            return $data;

        }
        if($input['art_status']==1){
            $res=Article::where([
                ['art_status', '=',1],
                ['cate_id', '=',$input['cate_id']],
            ])->first();
            if($res){
                $data=array(
                    'status'=>3,
                    'message'=>'添加失败，相同分类下只能有一篇推荐文章'
                );
                return $data;

            }
        }

        $input['art_time']=date("Y-m-d H:i:s");
        $thumbarr=isset($input['thumball'])?$input['thumball']:'';
        if($thumbarr!=''){
            $input['thumball']=implode(",",$input['thumball']);
        }else{
            $input['thumball']='';
        }

        $res=Article::create($input);

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
        //事务
        DB::beginTransaction(); //开启事务

        try {
            // 校验值...

            DB::commit();//事务提交
            return redirect('admin/Article');
        } catch (\Exception $e) {
            DB::rollBack();//事务回滚
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Article::find($id);
        if($data->thumball!=''){
            $data->thumbarr=explode(',', $data->thumball);
        }else{
            $data->thumbarr=array();
        }


        //二级分类;
//        $list = (new Category())->tree();

        //      无限极分类
        $cate=Category::orderBy('cate_order','asc')->get();
        $list = (new Category())->wuxianji($cate,$fid=0,$level=0);


        return view('Admin/Article/edit',compact('data','list'));
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
        $input=$request->except('_token','file');
        $result=Article::where([
            ['art_title', '=',$input['art_title']],
            ['cate_id', '=',$input['cate_id']],
            ['id', '<>',$id],
        ])->first();
        if($result){
            $data=array(
                'status'=>2,
                'message'=>'修改失败，相同分类下文章名不能相同'
            );
            return $data;

        }

        if($input['art_status']==1){
            $res=Article::where([
                ['art_status', '=',1],
                ['cate_id', '=',$input['cate_id']],
                ['id', '<>',$id],
            ])->first();
            if($res){
                $data=array(
                    'status'=>3,
                    'message'=>'修改失败，相同分类下只能有一篇推荐文章'
                );
                return $data;

            }
        }
        $art_thumb=$request->input('art_thumb');


//        //阿里云图片修改
//        if($art_thumb!=''){
//            OSS::publicDeleteObject('qiuweiboke',$request->input('art_thumb_old'));
//
//        }else{
//            $art_thumb= $request->input('art_thumb_old');
//        }


        //方法1 图片修改
        if($art_thumb!=''){
            if(file_exists('./'.$input['art_thumb_old'])){
                unlink('./'.$input['art_thumb_old']);
            }
        }else{
            $art_thumb= $request->input('art_thumb_old');
        }

        //七牛云图片修改
//        if($art_thumb!=''){
//            $disk = \Storage::disk('qiniu');
//            $exists = $disk->has($request->input('art_thumb_old'));
//            if($exists){
//                $disk->delete($request->input('art_thumb_old'));
//            }
//
//        }else{
//            $art_thumb= $request->input('art_thumb_old');
//        }

        $data=Article::find($id);
        $art_title=$request->input('art_title');
        $art_tag=$request->input('art_tag');
        $art_description=$request->input('art_description');
        $chongchuan=$request->input('chongchuan');

        $duotu=$request->input('thumball');
        $thumbarr=isset($duotu)?$duotu:'';
        if($thumbarr!=''){
            if($chongchuan==1){
                if($input['thumball_old']!=''){
                    $oldarr=explode(',',$input['thumball_old']);
                    foreach ($oldarr as $key=>$val){
                        if(file_exists('./'.$val)){
                            unlink('./'.$val);
                        }
                    }
                }

            }
            $thumball=implode(",",$thumbarr);


        }else{
            $thumball='';
        }

        $art_content=$request->input('art_content');
        $art_editor=$request->input('art_editor');
        $cate_id=$request->input('cate_id');
        $art_status=$request->input('art_status');

        $data->art_title=$art_title;
        $data->thumball=$thumball;
        $data->art_tag=$art_tag;
        $data->art_description=$art_description;
        $data->art_thumb=$art_thumb;
        $data->art_content=$art_content;
        $data->art_editor=$art_editor;
        $data->cate_id=$cate_id;
        $data->art_status=$art_status;

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
        $data=Article::find($id);


        //七牛云删除
        $disk = \Storage::disk('qiniu');
        $exists = $disk->has($data->art_thumb);
        $res=$data->delete();
        if($res){
            //阿里云删除图片
//            OSS::publicDeleteObject('qiuweiboke',$data->art_thumb);
            //方法1删除图片
            if($data->art_thumb!=''){
                if(file_exists('./'.$data->art_thumb)){
                    unlink('./'.$data->art_thumb);
                }
            }
            if($data->thumball!=''){
                $duotu=explode(',',$data->thumball);
                //删除多图
                foreach($duotu as $key=>$val){
                    if($val!=''){
                        if(file_exists('./'.$val)){
                            unlink('./'.$val);
                        }
                    }
                }
            }


            //七牛云删除
            if($exists){
                $disk->delete($data->art_thumb);
            }

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
//        //七牛云删除
//        $disk = \Storage::disk('qiniu');
        $list=Article::whereIn('id',$ids)->pluck('art_thumb');
        $duotu=Article::whereIn('id',$ids)->pluck('thumball');


        $res=Article::destroy($ids);
        if($res){
            //方法1删除图片
            foreach($list as $key=>$val){
                if($val!=''){
                    if(file_exists('./'.$val)){
                        unlink('./'.$val);
                    }
                }

            }
            if(count($duotu)!=0){
                //删除多图
                foreach($duotu as $key=>$val){
                    if($val!=''){
                        $duoarr=explode(',',$val);
                        foreach($duoarr as $k=>$v){
                            if(file_exists('./'.$v)){
                                unlink('./'.$v);
                            }
                        }
                    }
                }
            }

//            //阿里云删除图片
//            foreach($list as $key=>$val){
//                OSS::publicDeleteObject('qiuweiboke',$val);
//            }
//
//            //七牛云删除
//            foreach($list as $key=>$val){
//                $exists = $disk->has($val);
//                if($exists){
//                    $disk->delete($val);
//                }
//            }
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
    //文件上传
    public function upload(Request $request)
    {

        //获取上传文件
        $file = $request->file('photo');

        //源文件名
        $yuanname=$file->getClientOriginalName();
        //文件扩展名
        $ext=$file->getClientOriginalExtension();
        //文件类型
        $type=$file->getClientMimeType();
        //临时文件绝对路径
        $realpath=$file->getRealPath();



        if ($request->hasFile('photo')) {
            if (!$file->isValid()) {
                return response()->json([
                    'status' => 201,
                    'resultdata' => '无效的上传文件'
                ]);
            }
            //方法5 阿里OSS存储

//            $extension = $file->extension();
//            $newfile=date('YmdHis') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT).'.'.$extension;
//            $res=OSS::publicUpload('qiuweiboke', $newfile, $file->getRealPath(), [
//                'ContentType' => $file->getClientMimeType(),
//            ]);
//
//           if($res){
//               return response()->json([
//                   'status' => 100,
//                   'resultdata' => $newfile
//               ]);
//           }else{
//               return response()->json([
//                   'status' => 203,
//                   'resultdata' => '文件上传失败'
//               ]);
//           }




            //方法4文件上传到七牛云
//            $extension = $file->extension();
//            $newfile=date('YmdHis') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT).'.'.$extension;
//           $res=\Storage::disk('qiniu')->writeStream($newfile,fopen($file->getRealPath(),'r'));
//
//
//           if($res){
//               return response()->json([
//                   'status' => 100,
//                   'resultdata' => $newfile
//               ]);
//           }else{
//               return response()->json([
//                   'status' => 203,
//                   'resultdata' => '文件上传失败'
//               ]);
//           }



                //方法2
//            //上传文件扩展名
//            $extension = $file->extension();
//            //上传文件起名
//            $newfile=date('YmdHis') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT).'.'.$extension;
//            //文件上传的指定路径
//            $path=public_path('uploads/'.date('Y-m-d'));
//            //将文件从临时目录移动到指定目录
//            $path=$file->move($path,$newfile);
//            if(!$path){
//                return response()->json([
//                    'status' => 203,
//                    'resultdata' => '文件存储失败'
//                ]);
//            }
//            return response()->json([
//                'status' => 100,
//                'resultdata' => date('Y-m-d').'/'.$newfile
//            ]);

            //方法3
//            $extension = $file->extension();
//            $newfile=date('YmdHis') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT).'.'.$extension;
//            $path=public_path('uploads/'.date('Y-m-d'));
//            //判断目录是否存在不存在则创建
//            $res=$this->mkMutiDir($path);
//            if($res){
//                //Image 组件修改上传图片大小及存放位置
//                //网站：https://packagist.org/packages/intervention/image
//                $img = Image::make($file)->resize(300, 200)->save($path.'/'.$newfile);
//                if($img){
//                    return response()->json([
//                        'status' => 100,
//                        'resultdata' => date('Y-m-d').'/'.$newfile
//                    ]);
//                }else{
//                    return response()->json([
//                        'status' => 203,
//                        'resultdata' => '文件存储失败'
//                    ]);
//                }
//            }


            //方法1
            $path = $request->photo->store('uploads/'.date('Y-m-d'));
            if(!$path){
                return response()->json([
                    'status' => 203,
                    'resultdata' => '文件存储失败'
                ]);
            }
            return response()->json([
                'status' => 100,
                'resultdata' => $path
            ]);
        }else{
            return response()->json([
                'status' => 202,
                'resultdata' => '没有文件'
            ]);
        }
    }
    //判断目录是否存在 不存在则创建
    public static function mkMutiDir($dir){
        if(!is_dir($dir)){
            if(!self::mkMutiDir(dirname($dir))){
                return false;
            }
            if(!mkdir($dir,0777)){
                return false;
            }
        }
        return true;
    }
    //多文件上传
    public function uploadduo(Request $request)
    {

        //获取上传文件
        $file = $request->file('file');

        if ($request->hasFile('file')) {
            if (!$file->isValid()) {
                return response()->json([
                    'status' => 201,
                    'resultdata' => '无效的上传文件'
                ]);
            }


            //方法1
            $path = $request->file->store('uploads/'.date('Y-m-d'));
            if(!$path){
                return response()->json([
                    'status' => 203,
                    'resultdata' => '文件存储失败'
                ]);
            }
            return response()->json([
                'status' => 100,
                'resultdata' => $path
            ]);
        }else{
            return response()->json([
                'status' => 202,
                'resultdata' => '没有文件'
            ]);
        }


    }
    //前端单独删除
    public function duotushan(Request $request)
    {
        $wenjian=$request->input('wenjian');
        if($wenjian!=''){
            if(file_exists('./'.$wenjian)){
                if(unlink('./'.$wenjian)){
                    return response()->json([
                        'status' => 0,
                        'message' => '删除成功'
                    ]);
                }else{
                    return response()->json([
                        'status' => 202,
                        'message' => '图片删除失败'
                    ]);
                }

            }else{
                return response()->json([
                    'status' => 0,
                    'message' => '删除成功'
                ]);
            }
        }else{
            return response()->json([
                'status' => 0,
                'message' => '删除成功'
            ]);
        }



    }
    //前端重选删除
    public function duotushanc(Request $request)
    {
        $wenjian=$request->input('wenjian');
        if($wenjian!=''){
            $all=explode(',',$wenjian);

            foreach ($all  as $k=>$v){
                if(file_exists('./'.$v)){
                    if(!unlink('./'.$v)){
                        return response()->json([
                            'status' => 202,
                            'message' => '图片删除失败'
                        ]);
                    }
                }
            }

            return response()->json([
                'status' => 0,
                'message' => '删除成功'
            ]);


        }else{
            return response()->json([
                'status' => 0,
                'message' => '删除成功'
            ]);
        }



    }
}
