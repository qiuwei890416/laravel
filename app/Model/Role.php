<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //1.关联的数据表
    public $table='role';
    //2.主键
    public $primaryKey='id';
    //3.允许批量操作的字段
    // public $fillable=['user_name','user_pass'];
    //所有字段都可以操作
    public $guarded = [];
    //4.是否维护两个时间字段
    public $timestamps=false;

    //添加动态属性关联权限模型
    public function permission(){
        //role_permission 链接表名  role_id：Role模型在连接表里的键名  permission_id：Permission模型在连接表里的键名
        return $this->belongsToMany('App\Model\Permission','role_permission','role_id','permission_id');
    }
}
