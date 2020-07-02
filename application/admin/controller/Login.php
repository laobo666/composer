<?php

namespace app\admin\controller;

use app\admin\common\Base;
use think\Session;
use app\admin\model\Admin;

class Login extends Base
{
    public function login()
    {
        $this->alreadyLogin();
        return $this->fetch();
    }

    public function checkLogin()
    {
        $username = trim(input('post.username'));
        $password = trim(input('post.password'));
        $captcha = trim(input('post.captcha'));

        $admin = Admin::get(['username' => $username]);

        if (!$admin) {
            exit(json_encode(array('status' => 0, 'message' => '用户名不存在')));
        }
        if (md5($password) !== $admin['password']) {
            exit(json_encode(array('status' => 0, 'message' => '密码错误')));
        }
        if (!captcha_check($captcha)) {
            exit(json_encode(array('status' => 0, 'message' => '验证码错误')));
        }
        if ($admin['status'] == 0) {
            exit(json_encode(array('status' => 0, 'message' => '用户已被禁用')));
        }

        $admin->setInc('login_count');
        $admin->save(['last_time' => date('Y-m-d H:i:s', time())]);
        Session::set('user_id', $username);
        exit(json_encode(array('status' => 1, 'message' => '登录成功')));
    }

    public function logout()
    {
        Session::destroy('admin');
        $this->success('用户退出成功', 'Login/login');
    }
}
