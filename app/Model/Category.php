<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    //1.关联的数据表
    public $table='category';
    //2.主键
    public $primaryKey='id';
    //3.允许批量操作的字段
    // public $fillable=['user_name','user_pass'];
    //所有字段都可以操作
    public $guarded = [];
    //4.是否维护两个时间字段
    public $timestamps=false;
    //获取格式化分类数据
    //二级分类
    public function tree(){
        //获取所有分类
        $cate=$this->orderBy('cate_order','asc')->get();
//        $cate= DB::table('category')->orderBy('cate_pid','asc')->get();

       return $this->gettree($cate);
    }
    //二级分类
    public function gettree($cate){
        //排序
        //获取一级类

        $arr=array(); //存放最终数据
        foreach ($cate as $key=>$val){
            //如果是一级类
            if($val->cate_pid==0){
                $arr[]=$val;
                //获取一级类下的二级类
                foreach ($cate as $k=>$v){
                    if($val->id==$v->cate_pid){
                        //给二级分类添加缩进
                        $v->cate_name='|----'. $v->cate_name;
                        $arr[]=$v;

                    }
                }
            }
        }

        return $arr;

    }
    //关联文章模型1对多
    public function article(){
        //cate_id 关联表的 关联字段 id当前表的ID
        return $this->hasMany('App\Model\Article', 'cate_id', 'id');
    }
    //无限极分类
    public function wuxianji($data,$fid,$level){

        static $array = array();

        foreach ($data as $k => $v) {

            if($fid == $v->cate_pid){

                $v->level = $level;

                $array[] = $v;

                $this->wuxianji($data,$v->id,$level+1);
            }
        }

        return $array;

    }
}
