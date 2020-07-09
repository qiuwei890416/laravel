<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model{
    //1.关联的数据表
    public $table='user';
    //2.主键
    public $primaryKey='id';
    //3.允许批量操作的字段
   // public $fillable=['user_name','user_pass'];
    //所有字段都可以操作
    public $guarded = [];
    //4.是否维护两个时间字段
    public $timestamps=false;
    //添加动态属性关联角色模型
    public function role(){
        //user_role 链接表名  user_id：User模型在连接表里的键名  role_id：Role模型在连接表里的键名
        return $this->belongsToMany('App\Model\Role','user_role','user_id','role_id');
    }
}
