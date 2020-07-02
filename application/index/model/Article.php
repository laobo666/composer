<?php

namespace app\index\model;

use think\Model;

class Article extends Model
{
    public function category()
    {
        return $this->belongsTo("Category", 'cate_id');
    }

    public static function getInfoWithCategory()
    {
        return self::with('Category')->order('heat desc')->select();
    }
}