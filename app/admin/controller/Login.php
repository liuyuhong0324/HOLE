<?php
namespace app\admin\controller;

use app\admin\model\User;
use think\Controller;

class Login extends Controller
{
    function index()
    {
        if(request()->isPost())
        {
            $admin_username = input('post.admin_username') ?: dump("请输入用户名");
            $admin_password = input('post.admin_password') ?: dump("请输入密码");

            $user = User::get(['admin_username' => $admin_username]);
            if(!$user)
            {
                dump("用户名错误");
            }
            else
            {
                if($admin_password !== $user['admin_password'])
                {
                   dump("密码错误");
                }
                else
                {
                    session('user',$user);
                    $url = session('logined') ?: url('admin');
                    return $this->success('登录成功',$url);
                }
            }
        }
        return view();
    }

    function admin()
    {
        return view();
    }
}