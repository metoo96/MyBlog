<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="en" />
	<meta name="description" content="[HERE PASTE YOUR DESCRIPTION]" />
	<meta name="author" content="Template:TemplatesDock " />
	<link rel="stylesheet" media="screen,projection" type="text/css" href="/myblog/Public/css/main.css" />
	<link rel="stylesheet" media="screen,projection" type="text/css" href="/myblog/Public/css/skin.css" />
	<link rel="stylesheet" media="screen,projection" type="text/css" href="/myblog/Public/css/botton.css" />
	<script type="text/javascript" src="/myblog/Public/js/cufon-yui.js"></script>
	
	<script type="text/javascript">Cufon.replace('h1, h2, h3, h4, h5, h6', {hover:true});</script>	
	<title>zgz BlogSystem</title>
</head>

<body>

<div class="main">

	<!-- HEADER -->
	<div id="header" class="box">

		<h1 id="logo">朱国柱<span> BlogSystem</span></h1>

		<!-- NAVIGATION -->
		<ul id="nav">
			<li ><a href="<?php echo U('Home/Index/index');?>">首页</a></li>
			<li ><a href="#">我的博客</a></li>
			<li ><a href="<?php echo U('Admin/Index/login');?>">后台登录</a></li>
		</ul>
		
	</div> <!-- /header -->

	<div id="section" class="box">
				<h2><?php echo ($list['art_title']); ?></h2>

				<div >
					<p class="f-left"><?php echo date('Y-m-d H:i:s',$list['art_pubtime']) ?>| 分类 <?php echo ($row['cat_name']); ?> | 点击量：<?php echo ($list['art_click']); ?></p>
				</div>
				
				<div style="border-bottom: 1px dotted #CCC; height:50px;"></div>
				<div style="padding:10px">
					<?php echo ($list['art_content']); ?>
				</div>
				<div style="border-bottom: 1px dotted #CCC;"></div>



				<!--<h3>评论</h3>
				<div style="padding:0 0 0 10px">
					DNNN:说的好啊!
					<br/>
					评论时间:2015/12/19 15:20:23
				</div>
				<div style="border-bottom: 1px dotted #CCC;"></div>
				<div style="padding:0 0 0 10px">
					DNNN:说的好啊!
					<br/>
					评论时间:2015/12/19 15:20:23
				</div>
				<div style="border-bottom: 1px dotted #CCC;"></div>

				<div style="padding:0 0 0 10px">
					DNNN:说的好啊!
					<br/>
					评论时间:2015/12/19 15:20:23
				</div>
				<div style="border-bottom: 1px dotted #CCC;"></div>
				
				<form action="#" method="post" class="form">
					<ul>
						<textarea cols="75" rows="5" class="input-text"  name=""></textarea>
						
						<li><input type="submit" value=" 提交 " class="input-submit"  /></li>
					
					</ul>
				</form>-->
					
	</div> 

</div> 	
	
<!-- FOOTER -->
<div id="footer">

	<div class="main box">
		<p class="f-left">Copyright &copy;&nbsp;2017  朱国柱</p>
	</div> 

</div> <!-- /footer -->
</body>
</html>