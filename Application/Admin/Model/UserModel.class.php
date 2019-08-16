<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2019/8/13
 * Time: 11:33
 */

namespace Admin\Model;


use Think\Model;

class UserModel extends Model {
//protected $patchValidate =true;//批量验证
protected $_validate =array(//自动验证
    array('username','require','用户不得为空！'),
    array('username','','用户名已经存在！',0,'unique',1),
    array('password','require','密码不得为空！'),
    array('birthday','require','生日不得为空！'),
    array('tel','require','号码不得为空！'),
    array('email','require','邮箱不得为空！'),
    array('email','email','邮箱格式不合法！'),
);

}
