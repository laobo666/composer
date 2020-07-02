<?php

namespace app\admin\Controller;

use app\admin\common\Base;
use think\Db;

class Category extends Base
{
    public function category()
    {
        $list = Db::name('category')->order('add_time desc')->paginate(3);
        $count = Db::name('category')->count();
        $this->assign('list', $list);
        $this->assign('count', $count);
        return $this->fetch();
    }

    public function add()
    {
        $id = (int)input('get.id');
        $category = Db::name('category')->where('id', $id)->find();
        $this->assign('category', $category);
        return $this->fetch();
    }

    public function save()
    {
        if (request()->isAjax()) {
            $id = (int)input('post.id');
            $data['catename'] = trim(input('post.catename'));

            if ($id) {
                $res = Db::name('category')->where('id', $id)->update($data);
            } else {
                $res = Db::name('category')->insert($data);
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
            $res = Db::name('category')->where('id', $id)->delete();
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
            $res = Db::name('category')->where('id', 'in', $id)->delete();
            if ($res) {
                exit(json_encode(array('status' => 1, 'message' => '删除成功')));
            } else {
                exit(json_encode(array('status' => 0, 'message' => '删除失败')));
            }
        }
    }
}