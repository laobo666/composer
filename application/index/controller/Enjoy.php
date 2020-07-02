<?php

namespace app\index\controller;

use app\admin\common\Base;
use think\Db;

class Enjoy extends Base
{
    public function enjoy()
    {
        $category = Db::name('category')->select();
        $this->assign('category', $category);
        return $this->fetch();
    }
}