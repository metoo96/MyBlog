<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="en" />
	<meta name="description" content="[HERE PASTE YOUR DESCRIPTION]" />
	<meta name="author" content="Template:TemplatesDock " />
	<link rel="stylesheet" media="screen,projection" type="text/css" href="/myblog/Public/css/main.css" />
	<link rel="stylesheet" media="screen,projection" type="text/css" href="/myblog/Public/css/skin.css" />
	<script type="text/javascript" src="/myblog/Public/js/cufon-yui.js"></script>
	<script type="text/javascript">Cufon.replace('h1, h2, h3, h4, h5, h6', {hover:true});</script>	
	<title>zgz BlogSystem</title>
</head>

<body>

<div class="main">

	<!-- HEADER -->
	<div id="header" class="box">

		<h1 id="logo">朱国柱<span>  BlogSystem</span></h1>

		<!-- NAVIGATION -->
		<ul id="nav">
			<li class="current"><a href="">首页</a></li>
			<!--<li><a href="#">我的博客</a></li>-->
			<li><a href="<?php echo U('Admin/Index/login');?>">后台登录</a></li>
		</ul>
		
	</div> <!-- /header -->
	<!-- COLUMNS -->
	<div id="section" class="box">

		<!-- CONTENT -->
		<div id="content">

			<!-- LIST OF ARTICLES -->
			<ul class="articles box">
			<?php if(is_array($art)): foreach($art as $key=>$art): ?><li>
					<h2><a href="#"><?php echo ($art['art_title']); ?></a></h2>

					<div class="article-info box">

						<p class="f-right"><a href="#" class="comment" >浏览量(<?php echo ($art['art_click']); ?>)</a></p>

						<p class="f-left"><?php echo date('Y-m-d H:i:s',$art['art_pubtime']); ?>  |  作者  <?php echo ($art['art_author']); ?> </p>

					</div> <!-- /article-info -->	

					<p>
					<img src="/myblog/Public/<?php echo ($art['art_thumb_img']); ?>" style="height:100px;width:100px;border:2px solid #999999;border-radius:2px"/>
					</p>
					<p class="more"><a href="<?php echo U('Home/Art/artDetail',array('art_id'=> $art['art_id']));?>">查看全文&raquo;</a></p>
				</li><?php endforeach; endif; ?>
				
			</ul>

			<!-- PAGINATION -->
			<div class="pagination box">

				<p class="f-right">
					<a href="#" class="current">总条数：<?php echo ($sum); ?></a>
					<a href="<?php echo U('Home/Index/index',array('p'=>($page-1)));?>">上一页</a>
					<a href="#" class="current"><?php echo ($page); ?></a>
					<a href="<?php echo U('Home/Index/index',array('p'=>($page+1)));?>">下一页 &raquo;</a>
				</p>
				
				<p class="f-left"> <?php echo ($page); ?>/ <?php echo ($pages); ?>页</p>

			</div> 
		
		</div> 

		<!-- SIDEBAR -->
		<div id="aside">

			<!-- SIDEBAR MENU -->
			<h3>分类目录</h3>
			
			<ul class="menu">
				<!--<li class="current"><a href="#">全部</a></li>-->
				<?php if(is_array($cat)): foreach($cat as $key=>$cat): ?><li><a href="<?php echo U('Home/Cat/catDetail',array('cat_id'=>$cat['cat_id']));?>"><?php echo ($cat['cat_name']); ?></a></li><?php endforeach; endif; ?>
			</ul>		
		
			<h3 class="nomb">热门文章</h3>
			
			<ul class="sponsors">
				<?php if(is_array($hot)): foreach($hot as $key=>$art): ?><li><a href="<?php echo U('Home/Art/artDetail',array('art_id'=>$art['art_id']));?>"><?php echo ($art['art_title']); ?>浏览量(<?php echo ($art['art_click']); ?>)</a></li><?php endforeach; endif; ?>
			</ul>	
			<h3 class="nomb">近期文章</h3>	
			<ul class="menu">
				<!--<li class="current"><a href="#">全部</a></li>-->
				<?php if(is_array($near)): foreach($near as $key=>$art): ?><li><a href="<?php echo U('Home/Art/artDetail',array('art_id'=>$art['art_id']));?>"><?php echo ($art['art_title']); ?> 发布时间:<?php echo date('Y-m-d H:i:s',$art['art_pubtime']);?></a></li><?php endforeach; endif; ?>
			</ul>			
		
		</div> <!-- /aside -->

	</div> <!-- /section -->

</div> <!-- /main -->	
	
<!-- FOOTER -->
<div id="footer">

	<div class="main box">
		<p class="f-left">Copyright &copy;&nbsp;2017 <p>朱国柱</p>
	</div> 

</div> <!-- /footer -->
</body>
</html>