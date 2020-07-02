<?php

namespace app\admin\controller;

use app\admin\common\Base;
use think\Db;

class System extends Base
{
    public function system()
    {
        $this->assign('system', $this->getSystem());
        return $this->fetch();
    }

    public function save()
    {
        if (request()->isAjax()) {
            $id = (int)input('post.id');
            $data['title'] = trim(input('post.title'));
            $data['desc'] = trim(input('post.desc'));
            $data['keywords'] =trim(input('post.keywords'));
            $data['status'] = (int)input('post.status');

            $res = Db::name('system')->where('id', $id)->update($data);
            if ($res) {
                exit(json_encode(array('status' => 1, 'message' => '保存成功')));
            } else {
                exit(json_encode(array('status' => 0, 'message' => '保存失败')));
            }
        }
    }
}