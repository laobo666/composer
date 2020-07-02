<?php

namespace app\index\controller;

use app\admin\common\Base;
use think\Db;
use app\index\model\Article as ArticleModel;

class Article extends Base
{
    public function article()
    {
        $article = ArticleModel::getInfoWithCategory();
        $category = Db::name('category')->select();
        $data = Db::name('article')->order('add_time desc')->field('id, title, heat')->select();
        $link = Db::name('link')->select();
        $this->assign('article', $article);
        $this->assign('category', $category);
        $this->assign('data', $data);
        $this->assign('link', $link);
        return $this->fetch();
    }
}