<?php

namespace app\admin\controller;

use  app\admin\common\Base;
use think\Db;

class Laobo extends Base
{
    public function laobo()
    {
        $laobo = Db::name('laobo')->find();
        $this->assign('laobo', $laobo);
        return $this->fetch();
    }

    public function save()
    {
        if (request()->isAjax()) {
            $id = (int)input('post.id');
            $data['name'] = trim(input('post.name'));
            $data['pro'] =trim(input('post.pro'));
            $data['remark'] = trim(input('post.remark'));
            $data['qq'] = trim(input('post.qq'));

            $res = Db::name('laobo')->where('id', $id)->update($data);
            if ($res) {
                exit(json_encode(array('status' => 1, 'message' => '保存成功')));
            } else {
                exit(json_encode(array('status' => 0, 'message' => '保存失败')));
            }
        }
    }
}