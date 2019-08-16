<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2019/7/29
 * Time: 19:44
 */

namespace Admin\Controller;
use Think\Controller;

class PublicController extends Controller{
    public function regist(){
        $this->display();
    }
    public function login(){
       $this->display();
    }
    //创建captcha方法输出验证码
    public function captcha(){
    //配置
        $cfg = array(
            'fontSize' => 12, //验证码字体大小
            'useCurve' => false, //是否画混淆曲线
            'useNoise' => false, //是否添加杂点
            'length'   => 4,     //  验证码位数
            'imageH'   =>38,
            'imageW'   =>100,
            'fontttf'  => '4.ttf', //验证码字体，不设置随机获取
        );
        //实例化验证码类
        $verify = new \Think\Verify($cfg);
        //输出验证码
        $verify ->entry();
    }
    public function checkLogin(){
        //接收数据
        $post = I('post.');
        //验证验证码
        $verify = new \Think\Verify();
        //验证
        $result=$verify->check($post['captcha']);
        //判断验证码是否正确
        dump($result);
        if($result){
            //验证码正确继续判断用户名和密码
            $user=M('User');
            //删除验证码元素
            unset($post['captcha']);
            //查询
            $data=$user->where($post)->find();
            if($data){
                // 用户存在，用户信息持久化保存到session中，跳转到后台首页
                session('id',$data['id']);
                session('username',$data['username']);
                session('role_id',$data['role_id']);
                $this->success('登陆成功',U('Index/index'),3);
            }else{
                $this->error('您输入的账号或密码有误');
            }
        }else{
            //验证码不正确
            $this->error('您输出的验证码有误.....');
        }
    }
    public function logout(){
        //清除session
        session(null);
        //跳转到登录界面
        $this->success('退出成功',U('login'),3);
    }
}