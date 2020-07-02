<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:83:"D:\phpstudy_pro\WWW\laobo.com\public/../application/index\view\article\article.html";i:1593330338;s:68:"D:\phpstudy_pro\WWW\laobo.com\application\index\view\public\nav.html";i:1593564915;s:71:"D:\phpstudy_pro\WWW\laobo.com\application\index\view\public\footer.html";i:1593566922;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>老博博客</title>
    <link rel="stylesheet" type="text/css" href="/static/index/css/article/article.css" />
    <link rel="stylesheet" type="text/css" href="/static/index/layui/css/layui.css" />
    <script type="text/javascript" src="/static/index/layui/layui.js"></script>
</head>
<body>
    <div class="nav">
    <div class="main">
        <a href=""><img src="/static/index/images/icon.jpg"></a>
        <span class="wang">laobophp.cn</span>
        <ul class="layui-nav">
            <li class="layui-nav-item"><a href="<?php echo url('Index/index'); ?>">首页</a></li>
            <li class="layui-nav-item">
                <a href="<?php echo url('Article/article'); ?>">学无止境</a>
                <dl class="layui-nav-child">
                    <?php if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <dd><a href="<?php echo url('Category/category'); ?>?id=<?php echo $vo['id']; ?>"><?php echo $vo['catename']; ?></a></dd>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a href="<?php echo url('Enjoy/enjoy'); ?>">分享无价</a>
            </li>
            <li class="layui-nav-item">
                <a href="<?php echo url('Example/example'); ?>">案例展示</a>
            </li>
            <li class="layui-nav-item">
                <a href="<?php echo url('About/about'); ?>">关于</a>
            </li>
        </ul>
    </div>
</div>
    <div class="content">
        <div class="nav">
            <a href="" class="green">a</a>
            <a href="<?php echo url('Index/index'); ?>" class="index">首页</a>&nbsp;—
            <a href="<?php echo url('Article/article'); ?>">学无止境</a>
        </div>
        <div class="article">
            <div class="list">
                <div class="category">
                    <h3>栏目导航</h3>
                    <hr class="layui-bg-green">
                    <ol>
                        <?php if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <li><a href="<?php echo url('Category/category'); ?>?id=<?php echo $vo['id']; ?>"><?php echo $vo['catename']; ?></a></li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ol>
                </div>
                <div class="center">
                    <h3>最新文章</h3>
                    <hr class="layui-bg-green">
                    <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <p><?php echo $vo['id']; ?>.<?php echo $vo['title']; ?>&nbsp;<span><?php echo $vo['heat']; ?>℃</span></p>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="bottom">
                    <h3>打赏老博</h3>
                    <hr class="layui-bg-green">
                    <img src="/static/index/images/vx.png" alt="aaa">
                    <img src="/static/index/images/zfb.png" alt="aaa">
                </div>
                <div class="footer">
                    <h3>友情链接</h3>
                    <hr class="layui-bg-green">
                    <?php if(is_array($link) || $link instanceof \think\Collection || $link instanceof \think\Paginator): $i = 0; $__LIST__ = $link;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <a href="<?php echo $vo['url']; ?>"><?php echo $vo['name']; ?></a>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <div class="data">
                <?php if(is_array($article) || $article instanceof \think\Collection || $article instanceof \think\Paginator): $i = 0; $__LIST__ = $article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <div class="item">
                    <img src="<?php echo $vo['img']; ?>">
                    <div class="text">
                        <h3><?php echo $vo['title']; ?></h3>
                        <span>
                            <?php echo $vo['add_time']; ?>&nbsp;&nbsp;
                            <strong><?php echo $vo['category']['catename']; ?></strong>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <i class="layui-icon layui-icon-chart"></i>&nbsp;<?php echo $vo['heat']; ?>℃&nbsp;&nbsp;&nbsp;&nbsp;
                            <i class="layui-icon layui-icon-dialogue message"></i>
                        </span>
                        <p><?php echo $vo['content']; ?></p>
                    </div>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>
    <div class="public">
    <p>老博博客&nbsp;©&nbsp;&nbsp;laobophp.com</p><br>
    <p>Powered by laobo</p><br>
    <p>生活不易，多多支持</p>
</div>
<div class="show">
    <i class="layui-icon layui-icon-right"></i>
</div>
<div class="scroll">
    <a onclick="window.scroll(0, 0)">
        <i class="layui-icon layui-icon-top"></i>
    </a>
</div>
<div class="side">
    <ul class="layui-nav layui-bg-green">
        <li class="layui-nav-item"><a href="<?php echo url('Index/index'); ?>">首页</a></li>
        <li class="layui-nav-item">
            <a href="javascript:void(0);">学无止境</a>
            <dl class="layui-nav-child">
                <?php if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <dd><a href="<?php echo url('Category/category'); ?>?id=<?php echo $vo['id']; ?>"><?php echo $vo['catename']; ?></a></dd>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </dl>
        </li>
        <li class="layui-nav-item">
            <a href="<?php echo url('Enjoy/enjoy'); ?>">分享无价</a>
        </li>
        <li class="layui-nav-item">
            <a href="<?php echo url('Example/example'); ?>">案例展示</a>
        </li>
        <li class="layui-nav-item">
            <a href="<?php echo url('About/about'); ?>">关于</a>
        </li>
    </ul>
    <div class="opacity"></div>
</div>

<script type="text/javascript">
    layui.use(['element', 'form'], function () {
        var element = layui.element,
            form = layui.form,
            $ = layui.jquery;
        
        $(function () {
            $(window).scroll(function () {
                var top = $(this).scrollTop();
                if (top > 200) {
                    $('.scroll').css('display', 'block');
                } else {
                    $('.scroll').css('display', 'none');
                }
            });
            $('.article .list .category ol li').hover(function () {
                $(this).css('background', '#009688');
                $(this).css('border', '1px solid #009688');
            }, function () {
                $(this).css('background', '#ffffff');
                $(this).css('border', '1px solid #C9C9C9');
            });
            $('.show').click(function () {
                $('.side').show();
                $('.side .layui-nav').show();
                $(this).hide();
            });
            $('.opacity').click(function () {
                $('.side').hide();
                $('.side .layui-nav').hide();
                $('.show').show();
            });
        });
    });
</script>
</body>
</html>