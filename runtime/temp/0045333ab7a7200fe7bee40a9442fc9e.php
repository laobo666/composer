<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:81:"D:\phpstudy_pro\WWW\laobophp.cn\public/../application/admin\view\laobo\laobo.html";i:1593662466;s:73:"D:\phpstudy_pro\WWW\laobophp.cn\application\admin\view\public\header.html";i:1593662466;s:74:"D:\phpstudy_pro\WWW\laobophp.cn\application\admin\view\public\base_js.html";i:1593662466;}*/ ?>
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
        <span>站长信息</span>
        <a href="javascript:location.replace(location.href)">
            <i class="layui-icon layui-icon-refresh"></i>
        </a>
        <hr>
    </div>
    <form class="layui-form system">
        <input type="hidden" name="id" value="<?php echo $laobo['id']; ?>">
        <div class="layui-form-item">
            <label class="layui-form-label"><span>*</span>站长名称</label>
            <div class="layui-input-block">
                <input type="text" name="name" class="layui-input" value="<?php echo $laobo['name']; ?>">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><span>*</span>站长职业</label>
            <div class="layui-input-block">
                <input type="text" name="pro" class="layui-input" value="<?php echo $laobo['pro']; ?>">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><span>*</span>站长座右铭</label>
            <div class="layui-input-block">
                <input type="text" name="remark" class="layui-input" value="<?php echo $laobo['remark']; ?>">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><span>*</span>站长QQ</label>
            <div class="layui-input-block">
                <input type="text" name="qq" class="layui-input" value="<?php echo $laobo['qq']; ?>">
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