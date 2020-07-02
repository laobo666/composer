<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:79:"D:\phpstudy_pro\WWW\laobo.com\public/../application/index\view\index\index.html";i:1593564931;s:71:"D:\phpstudy_pro\WWW\laobo.com\application\index\view\public\header.html";i:1593328376;s:68:"D:\phpstudy_pro\WWW\laobo.com\application\index\view\public\nav.html";i:1593564915;s:71:"D:\phpstudy_pro\WWW\laobo.com\application\index\view\public\footer.html";i:1593566922;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>老博博客</title>
    <link rel="stylesheet" type="text/css" href="/static/index/css/index/index.css" />
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
    <div class="img">
        <img src="/static/index/images/boy.jpg">
    </div>
    <div class="content">
        <div class="category">
            <ul>
                <li class="left">
                    <h2>----------学无止境----------</h2>
                    <p>永远要相信登峰造极境，也永远要记得我们是永远的学徒。只因学无止境。学无止境，我们曾经擅长的正在被淘汰，不擅长的却是仍然存在。</p>
                </li>
                <li class="center">
                    <h2>----------善于探索----------</h2>
                    <p>“难”也是如此，面对悬崖峭壁，一百年也看不出一条缝来，但用斧凿，能进一寸进一寸，得进一尺进一尺，不断积累，飞跃必来，突破随之。</p>
                </li>
                <li class="right">
                    <h2>----------勇于尝试----------</h2>
                    <p>许多事，都是要经过不断尝试才会成功的，如果因为一次失败就退缩了，就永远不会成功。在人生的旅途中，我们只要不断重复尝试，就一定会成功。</p>
                </li>
            </ul>
        </div>
        <div class="article">
            <div class="list">
                <div class="top">
                    <h3>博主信息</h3>
                    <hr class="layui-bg-green">
                    <i>1.姓名：<?php echo $laobo['name']; ?></i><br>
                    <i>2.职业：<?php echo $laobo['pro']; ?></i><br>
                    <i>3.座右铭：<?php echo $laobo['remark']; ?></i><br>
                    <i>4.QQ：<?php echo $laobo['qq']; ?></i>
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