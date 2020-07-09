<?php

namespace App\Model;
use App\Model\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Wuxianji extends Model
{
    public static function showType(){

        $info = DB::table('permission')->get();

        $result = self::list_level($info,$fid=0,$level=0);

        return $result;

    }

    /**
     *书写一个调用无线分类的方法
     *@param $level 分类级别
     *@param $pid 父级id
     *@param $data 所有分类
     */
    public static function list_level($data,$fid,$level){

        static $array = array();

        foreach ($data as $k => $v) {

            if($fid == $v->pid){

                $v->level = $level;

                $array[] = $v;

                self::list_level($data,$v->id,$level+1);
            }
        }

        return $array;
    }
}
