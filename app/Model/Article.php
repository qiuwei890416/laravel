<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //1.关联的数据表
    public $table='article';
    //2.主键
    public $primaryKey='id';
    //3.允许批量操作的字段
    // public $fillable=['user_name','user_pass'];
    //所有字段都可以操作
    public $guarded = [];
    //4.是否维护两个时间字段
    public $timestamps=false;
}
