<?php

namespace app\index\controller;

use app\admin\common\Base;
use think\Db;

class Category extends Base
{
    public function category()
    {
        $cate_id = (int)input('get.id');
        $article = Db::name('article')->where('cate_id', $cate_id)->select();
        $category = Db::name('category')->select();
        $cate = Db::name('category')->where('id', $cate_id)->find();
        $data = Db::name('article')->order('add_time desc')->field('id, title, heat')->select();
        $link = Db::name('link')->select();
        $this->assign('article', $article);
        $this->assign('category', $category);
        $this->assign('cate', $cate);
        $this->assign('data', $data);
        $this->assign('link', $link);
        return $this->fetch();
    }
}