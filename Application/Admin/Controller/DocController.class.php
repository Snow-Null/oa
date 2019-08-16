<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2019/8/14
 * Time: 16:02
 */

namespace Admin\Controller;


class DocController extends CommonController{
    public function add(){
        if(IS_POST){
            $post=I('post.');
            $doc=D('Doc');
            $data=$doc->saveData($post,$_FILES['file']);
            if($data){
                $this->success('添加成功！',U('showList'),3);
            }
            else{
                $this->error('添加失败');
            }
        }else{
            $this->display();
        }

    }
    public function showList(){
        $doc=M('Doc');
        $result=$doc->select();
        $this->assign('result',$result);
        $this->display();
    }
    public function download(){
        $post=I('get.id');
        $doc=M('doc');
        $data=$doc->find($post);
        $file=WORKING_PATH . $data['filepath'];
        header("Content-type: application/octet-stream");
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header("Content-Length: ". filesize($file));
        readfile($file);
        /*header('Content-type: application/octet-steram');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Content-Length: '.filesize($file));
        readfile($file);*/
    }
    public function show(){
        $id=I('get.id');
        $doc=M('Doc');
        $data=$doc->find($id);
        echo html_entity_decode($data['content']);
    }
    public function edit(){
        if(IS_POST){
            $post=I('post.');
            $doc=D('Doc');
            $data=$doc->updateData($post,$_FILES['file']);
            if($data){
                $this->success('添加成功！',U('showList'),3);
            }
            else{
                $this->error('添加失败');
            }
        }else{
            $id=I('get.id');
            $doc=M('Doc');
            $data=$doc->find($id);
            $this->assign('data',$data);
            $this->display();
        }
    }
}