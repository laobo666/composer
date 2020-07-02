<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:81:"D:\phpstudy_pro\WWW\laobophp.cn\public/../application/admin\view\admin\admin.html";i:1593662466;s:73:"D:\phpstudy_pro\WWW\laobophp.cn\application\admin\view\public\header.html";i:1593662466;s:74:"D:\phpstudy_pro\WWW\laobophp.cn\application\admin\view\public\base_js.html";i:1593662466;}*/ ?>
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
        <span>管理员列表</span>
        <button class="layui-btn layui-btn-sm" onclick="add()">添加</button>
        <hr>
    </div>
    <table class="layui-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>用户名</th>
                <th>真实姓名</th>
                <th>角色</th>
                <th>状态</th>
                <th>创建时间</th>
                <th>最后登录时间</th>
                <th>登录次数</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($admin) || $admin instanceof \think\Collection || $admin instanceof \think\Paginator): $i = 0; $__LIST__ = $admin;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo $vo['id']; ?></td>
                <td><?php echo $vo['username']; ?></td>
                <td><?php echo $vo['truename']; ?></td>
                <td>
                    <?php if($vo['roles'] == 1): ?>
                    系统管理员
                    <?php else: ?>
                    开发人员
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($vo['status'] == 1): ?>
                    正常
                    <?php else: ?>
                    <span style="color: red">禁用</span>
                    <?php endif; ?>
                </td>
                <td><?php echo $vo['create_time']; ?></td>
                <td><?php echo $vo['last_time']; ?></td>
                <td><?php echo $vo['login_count']; ?></td>
                <td>
                    <button class="layui-btn layui-btn-warm layui-btn-xs" onclick="add(<?php echo $vo['id']; ?>)">编辑</button>
                    <button class="layui-btn layui-btn-danger layui-btn-xs" onclick="del(<?php echo $vo['id']; ?>)">删除</button>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>

    <script type="text/javascript" src="/static/admin/layui/layui.js"></script>
<script type="text/javascript" src="/static/admin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/static/admin/ueditor/ueditor.all.js"></script>
    <script type="text/javascript">
        layui.use(['layer'], function () {
            var layer = layui.layer;
            $ = layui.jquery;
        })
        
        function add(id) {
            layer.open({
                type: 2,
                title: id > 0 ? '编辑管理员' : '添加管理员',
                area: ['400px', '300px'],
                shade: 0,
                content: 'add.html?id=' + id
            })
        }

        function del(id) {
            layer.confirm('确定要删除吗', {
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
    </script>
</body>
</html>