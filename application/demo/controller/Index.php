<?php
namespace app\demo\controller;
use app\demo\model\Book;
use app\demo\model\User;
use think\Db;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
        return '这是demo首页';
    }

    public function readAll(){
        $user_all = User::all();
        /*foreach($user_all as $user){
            echo $user['user'].'<br>';
        }*/
        $this->assign('user', $user_all);
        $this->assign('count', count($user_all));
        return $this->fetch();
    }

    public function readOne($id){
        $user=User::get($id);
        //echo "用户名:".$user->user;

        //因为user->books是一对多，不能直接输出kana?
        foreach($user->books as $books){
            //前一个user表示表，后一个表示表内字段
            echo '用户:'.$books['user']['user'].'<br>拥有书籍：'.$books['book'];
        }
        echo '<br><br>id为1的书主人是:'.Book::get(1)->user->user;
    }

    public function addOne(){
        $user=User::get(1);
        $books = [
          ['book'=>'admin第二本书'],
          ['book'=>'admin第三本书']
        ];
        $user->books()->saveAll($books);
        return '给admin添加两本书成功';
    }
}
