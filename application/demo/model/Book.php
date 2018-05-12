<?php
namespace app\demo\model;
use think\Model;
class Book extends Model
{
    //自定义初始化
    /*protected function initialize()
    {
        parent::initialize();
    }*/

    //设置完整数据表名称
    protected $table='book';

    // 定义关联方法
    public function user()
    {
        // ('关联模型','关联模型外键','当前模型主键');
        return $this->belongsTo('User','id','id');
    }
}