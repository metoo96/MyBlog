<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="en" />
	<meta name="description" content="[HERE PASTE YOUR DESCRIPTION]" />
	<meta name="author" content="Template:TemplatesDock " />
	<link rel="stylesheet" media="screen,projection" type="text/css" href="/myblog/Public/css/main.css" />
	<link rel="stylesheet" media="screen,projection" type="text/css" href="/myblog/Public/css/skin.css" />
	<script type="text/javascript" src="/myblog/Public/cufon-yui.js"></script>
	<script type="text/javascript">Cufon.replace('h1, h2, h3, h4, h5, h6', {hover:true});</script>
	<title>zgz博客后台</title>
</head>
<body>
<div class="main">
	<!-- HEADER -->
	<div id="header" class="box">

		<h1 id="logo">朱国柱 <span>BlogSystem</span></h1>

		<!-- NAVIGATION -->
		<ul id="nav">
			<li ><a href="<?php echo U('Admin/Index/logout');?>">退出</a></li>
		</ul>
		
	</div> <!-- /header -->
	
	<div id="section" class="box">

		<!-- CONTENT -->
		<div id="content">
			<div style="margin:50px 0px 50px 90px">
				<h2>文章详情</h2>
				<div id="form">
					<ul>
						<li>
						    <label>
						    <h4>文章标题:<?php echo ($list['art_title']); ?></h4>
						    </label>
						    <label>
						    文章类别：<?php echo ($list['art_catid']); ?>
						    作者:<?php echo ($list['art_author']); ?>
						    发布时间:<?php echo date('Y-m-d H:i:s',$list['art_pubtime']);?>
						    点击量:<?php echo ($list['art_click']); ?>
                            <p><?php echo ($list['art_content']); ?></p>
						    </label> 
						  
						</li>
					</ul>
				</div>
			</div>
		</div> 

		<!-- SIDEBAR -->
		<div id="aside">
					
		</div> <!-- /aside -->

	</div> <!-- /section -->

</div> <!-- /main -->	
	
<!-- FOOTER -->
<div id="footer">
	<div class="main box">
		<p class="f-left">Copyright &copy;&nbsp;2017 朱国柱</p>
	</div> 

</div> <!-- /footer -->
<!--path-->
    <script type="text/javascript" src="/myblog/Public/js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
		var delArt = function(){
		 if(confirm("确定删除?")){
			window.location.href = $('#dArt').html();
		 }else{
		     alter("error")
	 }
	   }
	</script>	
</body>
</html>