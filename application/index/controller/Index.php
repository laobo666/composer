<?php

namespace app\index\controller;

use app\admin\common\Base;
use think\Db;
use app\index\model\Article;

class Index extends Base
{
    public function index()
    {
        $article = Article::getInfoWithCategory();
        $laobo = Db::name('laobo')->find();
        $data = Db::name('article')->order('add_time desc')->field('id, title, heat')->select();
        $link = Db::name('link')->select();
        $category = Db::name('category')->select();
        $this->assign('article', $article);
        $this->assign('laobo', $laobo);
        $this->assign('data', $data);
        $this->assign('link', $link);
        $this->assign('category', $category);
        return $this->fetch();
    }
}
