<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Admin as AdminModel;
class Admin extends Controller
{
  public function lst()
  {
    $data = db('admin') -> select();
    // $this -> assign()
    return $this -> fetch('lst');
  }

  public function add()
  {
    // $data = input('post.');
    // if (request() -> isPost()) {
    //   $res = db('admin') -> insert($data);
    //   if ($res) {
    //     $this -> success('添加管理员成功！','admin/lst');
    //   }else{
    //     $this -> error('添加管理员失败');
    //   }
    //   return;
    // }
    if (request() -> isPost()) {
      $admin = new AdminModel();
      if ($admin -> addadmin(input('post.'))) {
        $this -> success('添加管理员成功！','lst');
      }else{
        $this -> error('添加管理员失败!');
      }
    }
    return $this -> fetch('add');
  }

  public function edit()
  {
    return $this -> fetch('edit');
  }

}
