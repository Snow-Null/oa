<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2019/7/31
 * Time: 10:43
 */

namespace Admin\Controller;

use Think\Model;

class DeptController extends CommonController{
        public function add(){
            /*$dept=M('Dept');
            $data=array(
                'name'=>'财务部',
                'pid'=>'1',
                'sort'=>'2',
                'remark'=>'这是财务部'
            );
            $result = $dept -> add($data);
            var_dump($result);*/
            if(IS_POST){
                    $post=I('post.');
                    $result=M('Dept')->add($post);
                    if($result){
                        $this->success('添加成功',U('showList'),3);
                    }else{
                        $this->error('添加失败');
                    }
            }else {
                $data=M('Dept')-> field('t1.*,t2.name as deptname')->alias('t1')->
                order('sort asc')->join('left join sp_dept as t2 on t1.pid=t2.id')->select();
                $this->assign('data', $data);
                $this->display();
            }
        }
    public function adds(){
       /* $dept=M('Dept');*/
        $data=array(
                    array(
                        'name'=>'商務部',
                        'pid'=>'2',
                        'sort'=>'3',
                        'remark'=>'这是商務部'
                         ),
                     array(
                         'name'=>'总经办',
                         'pid'=>'3',
                         'sort'=>'4',
                         'remark'=>'总经办'
                     )
        );
        $result = $dept =M('Dept')-> addAll($data);
        dump($result);

    }
    public function update(){
            $dept=M('Dept');
            $data=array(
                'id'=>'3',
                'remark'=>'会议室'
            );
            $result=$dept->save($data);
            dump($result);
    }
    public function search(){
            $dept=M('Dept');
            $result=$dept->select("3,4,5");
            dump($result);
    }
    public function del(){
        $dept=M('Dept');
        $result=$dept->delete("10,11,12,13");
        dump($result);
    }
    public function showList(){
            //select t1.*,t2.name from sp_dept as t1 left join sp_dept as t2 on t1.pid=t2.id
            $data=M('Dept')-> Field('t1.*,t2.name as deptname')->alias('t1')->
            order('sort asc')->join('left join sp_dept as t2 on t1.pid=t2.id')->select();
            $this->assign('data',$data);
            $this->display();
    }
}