<?php

namespace app\index\controller;

use app\admin\common\Base;
use think\Db;

class About extends Base
{
    public function about()
    {
        $category = Db::name('category')->select();
        $this->assign('category', $category);
        return $this->fetch();
    }
}