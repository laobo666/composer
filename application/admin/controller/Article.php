<?php

namespace app\admin\Controller;

use app\admin\common\Base;
use think\Db;
use app\admin\model\Article as ArticleModel;

class Article extends Base
{
    public function article()
    {
        $list = ArticleModel::getInfoWithCategory();
        $count = Db::name('article')->count();
        $this->assign('list', $list);
        $this->assign('count', $count);
        return $this->fetch();
    }

    public function add()
    {
        $id = (int)input('get.id');
        $article = Db::name('article')->where('id', $id)->find();
        $category = Db::name('category')->select();
        $this->assign('article', $article);
        $this->assign('category', $category);
        return $this->fetch();
    }

    public function upload()
    {
        $file = request()->file('file');

        if (!$file) {
            exit(json_encode(array('status' => 0, 'message' => '没有上传文件')));
        }

        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        $ext = $info->getExtension();
        if (!in_array($ext, array('jpg', 'jpeg', 'gif', 'png'))) {
            exit(json_encode(array('status' => 0, 'message' => '文件格式不支持')));
        }
        $img = '/uploads/' . $info->getSaveName();
        exit(json_encode(array('status' => 1, 'message' => $img)));
    }

    public function save()
    {
        if (request()->isAjax()) {
            $id = (int)input('post.id');
            $data['title'] = trim(input('post.title'));
            $data['heat'] = trim(input('post.heat'));
            $data['cate_id'] = (int)input('post.catename');
            $data['img'] = trim(input('post.img'));
            $data['content'] = trim(input('post.content'));

            if ($id) {
                $res = Db::name('article')->where('id', $id)->update($data);
            } else {
                $res = Db::name('article')->insert($data);
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
            $res = Db::name('article')->where('id', $id)->delete();
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
            $res = Db::name('article')->where('id', 'in', $id)->delete();
            if ($res) {
                exit(json_encode(array('status' => 1, 'message' => '删除成功')));
            } else {
                exit(json_encode(array('status' => 0, 'message' => '删除失败')));
            }
        }
    }
}