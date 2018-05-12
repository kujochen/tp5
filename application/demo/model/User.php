<?php
namespace app\demo\model;
use think\Model;
class User extends Model
{
    //设置完整数据表名称
    protected $table='user';

    // 定义关联方法
    public function books()
    {
        //('关联模型','关联模型外键','当前模型主键');
        return $this->hasMany('Book','uid','id');
    }
}