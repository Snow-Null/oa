<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2019/8/14
 * Time: 19:28
 */

namespace Admin\Model;


use Think\Model;

class DocModel extends Model{
    public function saveData($post,$file){
        //先判断有没有文件需要处理
        if(!$file['error']){
            //定义配置
            $cfg=array(
            //配置上传路径
                'rootPath'=> WORKING_PATH.UPLOAD_ROOT_PATH
            );
            //处理上传
            $upload= new \Think\Upload($cfg);
            //开始上传
            $info=$upload->uploadOne($file);
            //判断是否成功上传
           // dump($info); die;
            if($info){
                //补全字段
                $post['filepath']=UPLOAD_ROOT_PATH.$info['savepath'].$info['savename'];
                $post['filename']=$info['name'];
                $post['hasfile']=1;
            }
        }
        //补全addtime
        $post['addtime']=time();
        //添加操作
        return $this->add($post);
    }
    public function updateData($post,$file){
        //先判断有没有文件需要处理
        if(!$file['error']){
            //定义配置
            $cfg=array(
                //配置上传路径
                'rootPath'=> WORKING_PATH.UPLOAD_ROOT_PATH
            );
            //处理上传
            $upload= new \Think\Upload($cfg);
            //开始上传
            $info=$upload->uploadOne($file);
            //判断是否成功上传
            // dump($info); die;
            if($info){
                //补全字段
                $post['filepath']=UPLOAD_ROOT_PATH.$info['savepath'].$info['savename'];
                $post['filename']=$info['name'];
                $post['hasfile']=1;
            }
        }
        //补全updatetime
        $post['updatetime']=time();
        //添加操作
        return $this->save($post);
    }
}