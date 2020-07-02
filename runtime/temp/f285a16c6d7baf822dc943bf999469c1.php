<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:81:"D:\phpstudy_pro\WWW\laobophp.cn\public/../application/admin\view\index\index.html";i:1593662465;s:73:"D:\phpstudy_pro\WWW\laobophp.cn\application\admin\view\public\header.html";i:1593662466;s:74:"D:\phpstudy_pro\WWW\laobophp.cn\application\admin\view\public\base_js.html";i:1593662466;}*/ ?>
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
    <div class="container">
        <div class="nav">
            <span class="title">
                <img src="/static/admin/images/icon.jpg" alt="" style="width: 30px;height: 30px;">&nbsp;&nbsp;
                后台管理中心
            </span>
            <span class="userinfo">
                <a href="<?php echo url('/Index/index/index'); ?>">网站首页</a>&nbsp;&nbsp;&nbsp;
                |&nbsp;&nbsp;
                <a href="<?php echo url('Index/index'); ?>">后台首页</a>&nbsp;&nbsp;&nbsp;
                |&nbsp;&nbsp;&nbsp;
                <a href="<?php echo url('Login/logout'); ?>">退出</a>
            </span>
        </div>
        <div class="menu" id="menu">
            <ul class="layui-nav layui-nav-tree">
                <li class="layui-nav-item layui-nav-itemed">
                    <a href="javascript:;"><i class="layui-icon layui-icon-group" style="padding-right: 10px;font-size: 16px"></i>管理员管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;" onclick="menuFire(this)" src="<?php echo url('Admin/admin'); ?>">管理员列表</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="layui-icon layui-icon-list" style="padding-right: 10px;font-size: 20px"></i>博客管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;" onclick="menuFire(this)" src="<?php echo url('Category/category'); ?>">分类管理</a></dd>
                        <dd><a href="javascript:;" onclick="menuFire(this)" src="<?php echo url('Article/article'); ?>">文章管理</a></dd>
                        <dd><a href="javascript:;" onclick="menuFire(this)" src="<?php echo url('Link/link'); ?>">链接管理</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="layui-icon layui-icon-set-sm" style="padding-right: 10px;font-size: 20px"></i>系统设置</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;" onclick="menuFire(this)" src="<?php echo url('System/system'); ?>">网站设置</a></dd>
                        <dd><a href="javascript:;" onclick="menuFire(this)" src="<?php echo url('Laobo/laobo'); ?>">站长信息</a></dd>
                    </dl>
                </li>
            </ul>
        </div>
        <div class="main" id="main">
            <iframe name="iframeTest" src="<?php echo url('Index/home'); ?>" style="width: 100%;height: 100%" frameborder="0" scrolling="no"></iframe>
        </div>
    </div>
    
    <script type="text/javascript" src="/static/admin/layui/layui.js"></script>
<script type="text/javascript" src="/static/admin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/static/admin/ueditor/ueditor.all.js"></script>
    <script type="text/javascript">
        layui.use(['element', 'layer'], function () {
            var element = layui.element,
                layer = layui.layer;
            $ = layui.jquery;
        });
        
        // 菜单点击
        function menuFire(obj) {
            var src = $(obj).attr('src');
            $('iframe').attr('src', src);
        }
    </script>
</body>
</html>