<?php

namespace app\admin\controller;

use app\admin\common\Base;
use think\Db;

class Link extends Base
{
    public function link()
    {
        $link = Db::name('link')->order('add_time desc')->select();
        $count = Db::name('link')->count();
        $this->assign('link', $link);
        $this->assign('count', $count);
        return $this->fetch();
    }

    public function add()
    {
        $id = (int)input('get.id');
        $link = Db::name('link')->where('id', $id)->find();
        $this->assign('link', $link);
        return $this->fetch();
    }

    public function save()
    {
        if (request()->isAjax()) {
            $id = (int)input('post.id');
            $data['name'] = trim(input('post.name'));
            $data['url'] = trim(input('post.url'));

            if ($id) {
                $res = Db::name('link')->where('id', $id)->update($data);
            } else {
                $res = Db::name('link')->insert($data);
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
            $res = Db::name('link')->where('id', $id)->delete();
            if ($res) {
                exit(json_encode(array('status' => 1, 'message' => '删除成功')));
            } else {
                exit(json_encode(array('status' => 0, 'message' => '删除失败')));
            }
        }
    }

    public function deleteAll()
    {
        if (request()->isAjax()) {
            $id = input('post.id/a');
            $res = Db::name('link')->where('id', 'in', $id)->delete();
            if ($res) {
                exit(json_encode(array('status' => 1, 'message' => '删除成功')));
            } else {
                exit(json_encode(array('status' => 0, 'message' => '删除失败')));
            }
        }
    }
}