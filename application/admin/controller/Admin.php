<?php

namespace app\admin\Controller;

use app\admin\common\Base;
use think\Db;

class Admin extends Base
{
    public function admin()
    {
        $admin = Db::name('admin')->select();
        $this->assign('admin', $admin);
        return $this->fetch();
    }

    public function add()
    {
        $id = (int)input('get.id');
        $admin = Db::name('admin')->where('id', $id)->find();
        $this->assign('admin', $admin);
        return $this->fetch();
    }

    public function save()
    {
        if (request()->isAjax()) {
            $id = (int)input('post.id');
            $data['username'] = trim(input('post.username'));
            $data['password'] = md5(trim(input('post.password')));
            $data['truename'] = trim(input('post.truename'));

            if ($id) {
                $res = Db::name('admin')->where('id', $id)->update($data);
            } else {
                $res = Db::name('admin')->insert($data);
            }

            if ($res) {
                exit(json_encode(array('status' => 1, 'message' => '保存成功')));
            } else {
                exit(json_encode(array('status' => 0, 'message' => '保存失败')));
            }
        }
    }

    public function delete()
    {
        if (request()->isAjax()) {
            $id = (int)input('post.id');
            $res = Db::name('admin')->where('id', $id)->delete();
            if ($res) {
                exit(json_encode(array('status' => 1, 'message' => '删除成功')));
            } else {
                exit(json_encode(array('status' => 0, 'message' => '删除失败')));
            }
        }
    }
}