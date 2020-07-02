<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:83:"D:\phpstudy_pro\WWW\laobophp.cn\public/../application/admin\view\system\system.html";i:1593662465;s:73:"D:\phpstudy_pro\WWW\laobophp.cn\application\admin\view\public\header.html";i:1593662466;s:74:"D:\phpstudy_pro\WWW\laobophp.cn\application\admin\view\public\base_js.html";i:1593662466;}*/ ?>
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
        <span>网站设置</span>
        <a href="javascript:location.replace(location.href)">
            <i class="layui-icon layui-icon-refresh"></i>
        </a>
        <hr>
    </div>
    <form class="layui-form system">
        <input type="hidden" name="id" value="<?php echo $system['id']; ?>">
        <div class="layui-form-item">
            <label class="layui-form-label"><span>*</span>网站名称</label>
            <div class="layui-input-block">
                <input type="text" name="title" class="layui-input" value="<?php echo $system['title']; ?>">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><span>*</span>网站描述</label>
            <div class="layui-input-block">
                <input type="text" name="desc" class="layui-input" value="<?php echo $system['desc']; ?>">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><span>*</span>网站关键字</label>
            <div class="layui-input-block">
                <input type="text" name="keywords" class="layui-input" value="<?php echo $system['keywords']; ?>">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><span>*</span>网站状态</label>
            <div class="layui-input-block">
                <select name="status">
                    <?php if($system['status'] == '1'): ?>
                    <option value="1" selected>开启网站</option>
                    <option value="0">关闭网站</option>
                    <?php else: ?>
                    <option value="0" selected>关闭网站</option>
                    <option value="1">开启网站</option>
                    <?php endif; ?>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <button type="button" class="layui-btn" onclick="save()">保存</button>
        </div>
    </form>
    
    <script type="text/javascript" src="/static/admin/layui/layui.js"></script>
<script type="text/javascript" src="/static/admin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/static/admin/ueditor/ueditor.all.js"></script>
    <script type="text/javascript">
        layui.use(['form', 'layer'], function () {
            var form = layui.form;
            $ = layui.jquery;
        });
        
        function save() {
            $.post('<?php echo url("save"); ?>', $('form').serialize(), function (res) {
                if (res.status == 1) {
                    layer.msg(res.message, {icon: 1, anim: 6});
                    setTimeout(function () {
                        window.location.reload();
                    }, 1000);
                } else {
                    layer.msg(res.message, {icon: 2, anim: 6});
                }
            }, 'json');
        }
    </script>
</body>
</html>