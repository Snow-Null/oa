<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2019/8/12
 * Time: 13:51
 */

namespace Admin\Controller;


use Think\Controller;

class CommonController extends Controller{
    Public function _initialize(){
        $data=session('id');//获取session_id确定有没有登录
        if(empty($data)){//没有登录，跳转登录界面
            $this->error('没有登录',U('Public/login'),3);
        }
    }
}