<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2019/8/12
 * Time: 14:23
 */

namespace Admin\Controller;


class UserController extends CommonController{
 public function add(){
     $data=M('Dept')->field(id,name)->select();
     $this->assign('data',$data);

     if(IS_POST){
        $post= I('post.');
        $User=D('User');
        $data=$User->create();
        $data['addtime']=time();
        if(!$data){
           $this->error($User->getError());exit;
        }
        $result=$User->add($data);
        if($result){
            $this->success('添加成功',U('User/add'),3);
        }
        else{
            $this->error('添加失败',3);
        }

     }
    else{
        $this->display();
    }

 }
 public function showList(){
     $User=M('User');
     //select t1.*，t2.name form sp_user as t1 left join sp_dept as t2 on t1.dept_id=t2.id
     $data=$User->Field('t1.*,t2.name as deptname')->alias('t1')->
     join('left join sp_dept as t2 on t1.dept_id=t2.id')->Select();
     $this->assign('data',$data);
     $this->display();
 }
}