<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:79:"D:\phpstudy_pro\WWW\laobo.com\public/../application/admin\view\login\login.html";i:1593172633;s:71:"D:\phpstudy_pro\WWW\laobo.com\application\admin\view\public\header.html";i:1593344043;s:72:"D:\phpstudy_pro\WWW\laobo.com\application\admin\view\public\base_js.html";i:1593076943;}*/ ?>
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
    <div class="login">
        <div class="img">
            <img src="/static/admin/images/icon.jpg" alt="">
        </div>
        <div class="text">
            <form class="layui-form" onsubmit="return login();">
                <div class="layui-form-item">
                    <label class="layui-form-label">
                        <i class="layui-icon layui-icon-username" style="font-size: 24px"></i>
                    </label>
                    <div class="layui-input-block">
                        <input type="text" name="username" id="username" placeholder="用户名" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">
                        <i class="layui-icon layui-icon-password" style="font-size: 24px"></i>
                    </label>
                    <div class="layui-input-block">
                        <input type="password" name="password" id="password" placeholder="密码" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">
                        <i class="layui-icon layui-icon-vercode" style="font-size: 24px"></i>
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" name="captcha" id="captcha" placeholder="验证码" class="layui-input">
                    </div>
                    <div class="captcha">
                        <img src="<?php echo captcha_src(); ?>" id="img" onclick="reload()">
                    </div>
                </div>
                <div class="layui-input-item">
                    <div class="layui-input-block">
                        <button class="layui-btn layui-btn-primary">登录</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="/static/admin/layui/layui.js"></script>
<script type="text/javascript" src="/static/admin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/static/admin/ueditor/ueditor.all.js"></script>
    <script type="text/javascript">
        layui.use(['form', 'layer'], function () {
            var form = layui.form,
                layer = layui.layer;
            $ = layui.jquery;
            
            $('#img').keydown(function (e) {
                if (e.keyCode == 13) {
                    login();
                }
            });
        })
        
        function reload() {
            $('#img').attr('src', '/captcha.html?mt_rand=' + Math.random());
        }
        
        function login() {
            var username = $('#username').val();
            var password = $('#password').val();
            var captcha = $('#captcha').val();
            
            if (username == '') {
                layer.msg('用户名不能为空', {icon: 2, anim: 6});
                return false;
            }
            
            if (password == '') {
                layer.msg('密码不能为空', {icon: 2, anim: 6});
                return false;
            }
            
            if (captcha == '') {
                layer.msg('验证码不能为空', {icon: 2, anim: 6});
                return false;
            }
            
            $.post('<?php echo url("Login/checkLogin"); ?>', $('form').serialize(), function (res) {
                if (res.status == 1) {
                    layer.msg(res.message, {icon: 1, anim: 6});
                    setTimeout(function () {
                        window.location.href = '<?php echo url("Index/index"); ?>';
                    }, 1000);
                } else {
                    layer.msg(res.message, {icon: 2, anim: 6}, function () {
                        $('#img').attr('src', '/captcha.html?rand=' + Math.random());
                    });
                }
            }, 'json');
            return false;
        }
    </script>
</body>
</html>