<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <title>公告 - <?php echo ($web_title); ?></title>
    <meta name="description" content="<?php echo ($web_description); ?>" />
    <meta name="keywords" content="<?php echo ($web_keywords); ?>" />
    <link href="<?php echo ($web_tplpath); ?>css/oenpay.css" rel="stylesheet">
	<link href="<?php echo ($web_tplpath); ?>css/news.css" rel="stylesheet" />
    <!--[if lt IE 8]>
	<style type="text/css">
		.searchs {float:left;width:620px}
		.searchs>form {float:left;width:608px;height:35px;display:block}
		.searchs>.hot-search {float:left;display:block;width:608px}
	</style>
	<![endif]-->
  </head>
  <body>
  	<!--[if lt IE 9]>
  	<div class="chrome">您的浏览器版本太低啦~请升级您的浏览器。本站推荐<a href="http://liulanqi.baidu.com/" class="a1" target="_blank">百度浏览器</a> <a href="http://liulanqi.baidu.com/" class="a1" target="_blank">点击下载</a></div>
<![endif]-->
<div class="top-line">
	<div class="g-wrap">
		<div class="tl-left">欢迎来到<?php echo ($web_title); ?>！</div>
		<div class="tl-right">
			<?php if(isset($_SESSION['hx_users']['user_auth'])): ?><a href="<?php echo U('user/index');?>"><?php echo ($username); ?></a> 
			<a href="<?php echo U('user/index');?>">我的夺宝</a>
			<a href="<?php echo U('public/logout');?>">[ 退出 ]</a>
			<?php else: ?>
			<a href="<?php echo U('public/login');?>">请登录</a> 
			<a href="<?php echo U('public/reg');?>">免费注册</a><?php endif; ?>
		</div>
	</div>
</div>
<div class="top-back">
	<!-- LOGO 开始 -->
  	<div class="container">
		<div class="logos">
			<div class="logo"><img src="<?php echo ($web_logo); ?>" /></div>
			<div class="top-people"></div>
		</div>
  	</div>
	<!-- LOGO 结束 -->
	<!-- 导航开始 -->
	<div class="navbar category">
		<div class="container sNav">
			<div class="navbar-all-class class-hidden">
  				<a href="#">全部商品分类</a>
  				<div class="left-class left-cl-hidden">
	  				<a href="<?php echo U('list/index/');?>"><span class="icon icon-star-empty"></span>全部商品</a>
	  				<?php $_result=R('list/type');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('list/index/?id='.$vo['id']);?>"><span class="<?php echo ($vo['icon']); ?>"></span><?php echo ($vo['title']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
  			</div>
			<div class="navbar-class"><a href="<?php echo U('index/index');?>">首页</a></div>
			<div class="navbar-class"><a href="<?php echo U('user/announced');?>">最新揭晓</a></div>
			<?php $_result=R('ten/ten');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="navbar-class"><a href="<?php echo U('ten/index',array('ten'=>$vo['id']));?>"><?php echo ($vo['title']); ?></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
			<div class="navbar-class"><a href="<?php echo U('user/displays');?>">晒单分享</a></div>
			<div class="navbar-class navbar-message"><a href="<?php echo U('activity/index');?>">发现</a></div>
			<div class="navbar-class"><a href="<?php echo U('user/guide');?>">新手引导</a></div>
			<?php if(isset($_GET['wid'])): if(!empty($menu_url)): ?><div class="navbar-class"><a href="<?php echo ($menu_url); ?>"><?php echo ($menu_name); ?></a></div><?php endif; endif; ?>
		</div>
	</div>
</div>
  	<div class="container">
  		<div class="left-a">
            <h3>帮助中心</h3>
            <dl>
                <dt><span class="icon icon-leanpub"></span> 新手指南</dt>
                <dd><a href="<?php echo U('news/more/id/1');?>" id="help1" class="active">了解<?php echo ($web_title); ?>平台</a></dd>
                <dd><a href="<?php echo U('news/more/id/2');?>" id="help2">服务协议</a></dd>
                <dd><a href="<?php echo U('news/more/id/3');?>" id="help3">常见问题</a></dd>
                <dd><a href="<?php echo U('news/more/id/4');?>" id="help4">推广赚钱</a></dd>
            </dl>
            <dl>
                <dt><span class="icon icon-dunpai"></span> 欢乐保障</dt>
                <dd><a href="<?php echo U('news/more/id/5');?>" id="help5">公平保障</a></dd>
                <dd><a href="<?php echo U('news/more/id/6');?>" id="help6">公正保障</a></dd>
                <dd><a href="<?php echo U('news/more/id/7');?>" id="help7">公开保障</a></dd>
                <dd><a href="<?php echo U('news/more/id/8');?>" id="help8">安全支付</a></dd>
            </dl>
            <dl>
                <dt><span class="icon icon-truck"></span> 商品配送</dt>
                <dd><a href="<?php echo U('news/more/id/9');?>" id="help9">配送费用</a></dd>
                <dd><a href="<?php echo U('news/more/id/10');?>" id="help10">商品验收与签收</a></dd>
                <dd><a href="<?php echo U('news/more/id/11');?>" id="help11">发货未收到商品</a></dd>
                <dd><a href="<?php echo U('news/more/id/12');?>" id="help12">商品配送</a></dd>
            </dl>
            <dl>
                <dt><span class="icon icon-github"></span> 关于我们</dt>
                <dd><a href="<?php echo U('news/more/id/13');?>" id="help13">关于我们</a></dd>
                <?php if(empty($_GET['wid'])): ?><dd><a href="<?php echo U('news/more/id/14');?>" id="help14">公司证件</a></dd><?php endif; ?>
            </dl>
        </div>
		<div class="right-b">
            <h1><span><?php echo str_replace(C("WEB_SITE_TITLE"),$web_title,$title);?></span></h1>
            <div class="new-nav"><?php echo str_replace('欢乐币',$web_currency,str_replace('欢乐GO',$web_title,str_replace(C("WEB_URL"),$web_url,str_replace(C("WEB_SITE_TITLE"),$web_title,stripslashes(htmlspecialchars_decode($content))))));?></div>
        </div>
  	</div>

  	<div class="clear"></div>
  	<div class="bottom">
	<div class="container">
		<div class="bot-left">
			<h3>
				<span class="icon icon-leanpub"></span>
				新手指南
			</h3>
			<ul>
				<li><a href="<?php echo U('news/more/id/1');?>">了解<?php echo ($web_title); ?>平台</a></li>
				<li><a href="<?php echo U('news/more/id/2');?>">服务协议</a></li>
				<li><a href="<?php echo U('news/more/id/3');?>">常见问题</a></li>
				<li><a href="<?php echo U('news/more/id/4');?>">推广赚钱</a></li>
			</ul>
		</div>
		<div class="bot-left">
			<h3>
				<span class="icon icon-dunpai"></span>
				欢乐保障
			</h3>
			<ul>
				<li><a href="<?php echo U('news/more/id/5');?>">公平保障</a>
				</li>
				<li><a href="<?php echo U('news/more/id/6');?>">公正保障</a></li>
				<li><a href="<?php echo U('news/more/id/7');?>">公开保障</a></li>
				<li><a href="<?php echo U('news/more/id/8');?>">安全支付</a></li>
			</ul>
		</div>
		<div class="bot-left">
			<h3>
				<span class="icon icon-truck"></span>
				商品配送
			</h3>
			<ul>
				<li><a href="<?php echo U('news/more/id/9');?>">配送费用</a></li>
				<li><a href="<?php echo U('news/more/id/10');?>">商品验收与签收</a></li>
				<li><a href="<?php echo U('news/more/id/11');?>">发货未收到商品</a></li>
				<li><a href="<?php echo U('news/more/id/12');?>">商品配送</a></li>
			</ul>
		</div>
		<div class="bot-left">
			<h3>
				<span class="icon icon-github"></span>
				关于我们
			</h3>
			<ul>
				<li><a href="<?php echo U('news/more/id/13');?>">关于我们</a></li>
				<?php if(empty($_GET['wid'])): ?><li><a href="<?php echo U('news/more/id/14');?>">公司证件</a></li><?php endif; ?>
			</ul>
		</div>
		<div class="bot-right">
			<div class="bot-gongping">
				<span class="icon icon-zhngpin"></span> <i>100%正品保证</i>
			</div>
			<div class="bot-gongping">
				<span class="icon icon-gongpin"></span> <i>100%公平公正公开</i>
			</div>
			<div class="bot-gongping">
				<span class="icon icon-gongzheng"></span>
				<i>100%权益保障</i>
			</div>
		</div>

		<div class="copyright">
			Copyright &copy; 2015 <?php echo ($web_title); ?> <?php echo ($web_url); ?> 版权所有 <?php echo ($web_icp); ?>
		</div>
	</div>
</div>
	<script src="<?php echo ($web_tplpath); ?>js/jquery.min.js"></script>
	<script type="text/javascript">
        highlight_subnav(window.location.pathname);
        function highlight_subnav(url){
        	$('.left-a dl').find('a').removeClass('active');
    		$('.left-a dl').find('a[href="'+url+'"]').addClass("active");
    	}
	</script>
	<!--[if lt IE 9]>
	<script src="<?php echo ($web_tplpath); ?>js/jquery.pseudo.js"></script>
	<![endif]-->
  </body>
</html>