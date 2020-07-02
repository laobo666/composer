<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:85:"D:\phpstudy_pro\WWW\laobophp.cn\public/../application/admin\view\article\article.html";i:1593662465;s:73:"D:\phpstudy_pro\WWW\laobophp.cn\application\admin\view\public\header.html";i:1593662466;s:74:"D:\phpstudy_pro\WWW\laobophp.cn\application\admin\view\public\base_js.html";i:1593662466;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>老博博客</title>
    <link rel="stylesheet" type="text/css" href="/static/admin/layui/css/layui.css" />
    <link rel="stylesheet" type="text/css" href="/static/admin/css/admin/admin.css" />
    <link rel="stylesheet" type="text/css" href="/static/admin/css/article/article.css" />
    <link rel="stylesheet" type="text/css" href="/static/admin/css/article/add.css" />
    <link rel="stylesheet" type="text/css" href="/static/admin/css/index/index.css" />
    <link rel="stylesheet" type="text/css" href="/static/admin/css/index/home.css" />
    <link rel="stylesheet" type="text/css" href="/static/admin/css/login/login.css" />
    <link rel="stylesheet" type="text/css" href="/static/admin/css/system/system.css" />
</head>
<body>
    <div class="header">
        <span>文章列表</span>
        <button class="layui-btn layui-btn-sm" onclick="add()">添加</button>
        <hr>
    </div>
    <div class="show">
        <button class="layui-btn layui-btn-danger delete" onclick="delAll()">
            <i class="layui-icon icon">&#xe640;</i>批量删除
        </button>
        <span>共有数据：<?php echo $count; ?>条</span>
    </div>
    <table class="layui-table">
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>文章标题</th>
                <th>文章热度</th>
                <th>文章图片</th>
                <th>文章内容</th>
                <th>添加时间</th>
                <th>所属分类</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><input type="checkbox" name="id" value="<?php echo $vo['id']; ?>"></td>
                <td><?php echo $vo['id']; ?></td>
                <td><?php echo $vo['title']; ?></td>
                <td><?php echo $vo['heat']; ?></td>
                <td>
                    <img src="<?php echo $vo['img']; ?>" alt="">
                </td>
                <td><?php echo $vo['content']; ?></td>
                <td><?php echo $vo['add_time']; ?></td>
                <td><?php echo $vo['category']['catename']; ?></td>
                <td>
                    <button class="layui-btn layui-btn-warm layui-btn-xs" onclick="add(<?php echo $vo['id']; ?>)">编辑</button>
                    <button class="layui-btn layui-btn-danger layui-btn-xs" onclick="del(<?php echo $vo['id']; ?>)">删除</button>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <div class="page">
        <?php echo $list->render(); ?>
    </div>

    <script type="text/javascript" src="/static/admin/layui/layui.js"></script>
<script type="text/javascript" src="/static/admin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/static/admin/ueditor/ueditor.all.js"></script>
    <script type="text/javascript">
        layui.use('layer', function () {
            var layer = layui.layer;
            $ = layui.jquery;
        });
        
        
        function add(id) {
            layer.open({
                type: 2,
                title: id > 0 ? '编辑文章' : '添加文章',
                area: ['1300px', '630px'],
                shade: 0,
                content: 'add.html?id=' + id
            });
        }
        
        function del(id) {
            layer.confirm('确定要删除吗？', {
                icon: 3,
                btn: ['确定', '取消']
            }, function () {
                $.post('<?php echo url("delete"); ?>', {'id': id}, function (res) {
                    if (res.status == 1) {
                        layer.msg(res.message, {icon: 1, anim: 6});
                        setTimeout(function () {
                            window.location.reload();
                        }, 1000);
                    } else {
                        layer.msg(res.message, {icon: 2, anim: 6});
                    }
                }, 'json');
            });
        }

        function delAll() {
            layer.confirm('确定要删除吗？', {
                icon: 3,
                btn: ['确定', '取消']
            }, function () {
                var id = new Array();
                $('input[name="id"]:checked').each(function () {
                    id.push($(this).val());
                });
                $.post('<?php echo url("deleteAll"); ?>', {'id': id}, function (res) {
                    if (res.status == 1) {
                        layer.msg(res.message, {icon: 1, anim: 6});
                        setTimeout(function () {
                            window.location.reload();
                        }, 1000);
                    } else {
                        layer.msg(res.message, {icon: 2, anim: 6});
                    }
                }, 'json');
            });
        }
    </script>
</body>
</html>