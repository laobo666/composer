<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:80:"D:\phpstudy_pro\WWW\laobophp.cn\public/../application/admin\view\index\home.html";i:1593662465;s:73:"D:\phpstudy_pro\WWW\laobophp.cn\application\admin\view\public\header.html";i:1593662466;s:74:"D:\phpstudy_pro\WWW\laobophp.cn\application\admin\view\public\base_js.html";i:1593662466;}*/ ?>
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
    <div class="head">
        <span>首页面板</span>
        <strong id="time"></strong>
        <hr>
    </div>
    <table class="layui-table">
        <tr>
            <td>系统版本：</td>
            <td><?php echo \think\Request::instance()->server('systemroot'); ?></td>
        </tr>
        <tr>
            <td>服务器信息：</td>
            <td><?php echo \think\Request::instance()->server('server_software'); ?></td>
        </tr>
        <tr>
            <td>网站名称：</td>
            <td><?php echo \think\Request::instance()->server('http_host'); ?></td>
        </tr>
        <tr>
            <td>ThinkPHP版本：</td>
            <td>5.0.24</td>
        </tr>
        <tr>
            <td>PHP版本：</td>
            <td>7.3.4</td>
        </tr>
        <tr>
            <td>数据库信息</td>
            <td>Mysql</td>
        </tr>
    </table>

    <script type="text/javascript" src="/static/admin/layui/layui.js"></script>
<script type="text/javascript" src="/static/admin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/static/admin/ueditor/ueditor.all.js"></script>
    <script type="text/javascript">
        function time() {
            var weeks = ['星期日', '星期一', '星期二', '星期三', '星期四', '星期五', '星期六'];
            var date = new Date();
            var year = date.getFullYear();
            var month = date.getMonth() + 1;
            var day = date.getDate();
            var hours = date.getHours();
            var minutes = date.getMinutes();
            var seconds = date.getSeconds();
            var week = date.getDay();
            document.getElementById('time').innerHTML = year + '年' + month + '月' + day + '日' + '\t' + hours + '时' + minutes + '分' + seconds + '秒' + '\t' + weeks[week];
        };
    
        setInterval('time()', 1000);
    </script>
</body>
</html>