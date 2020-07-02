<?php

namespace app\index\controller;

use app\admin\common\Base;
use think\Db;

class Example extends Base
{
    public function example()
    {
        $category = Db::name('category')->select();
        $this->assign('category', $category);
        return $this->fetch();
    }
}