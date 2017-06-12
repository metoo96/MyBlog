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
				<h2>文章修改</h2>
				<div id="form">
				<form  action="<?php echo U('Admin/Art/editArtAjax');?>" method="post" >
				<ul>
				            <div style="visibility:hidden;">
							<input type="text" size="45" class="input-text"    placeholder="请输入文章标题" name="art_id"  value="<?php echo ($list['art_id']); ?>" />
							</div>
				            <li>
							<label for="input-01">文章标题</label>
							<input type="text" size="45" class="input-text"    placeholder="请输入文章标题" name="art_title"  value="<?php echo ($list['art_title']); ?>" />
							</li>
							<li>
							<!--<label >文章图标</label>
							<img src="/myblog/Public/<?php echo ($list['art_thumb_img']); ?>" width="100" height="100" style="border:3px solid gray;border-radius:3px;">
                            <input type="file" name="art_img" size="30" />
                            </li>-->
                            <li>
						    <label for="input-01">文章内容</label>
											     
							<script type="text/javascript" charset="utf-8" src="/myblog/Public/Ue/ueditor.config.js"></script>
					           <script type="text/javascript" charset="utf-8" src="/myblog/Public/Ue/ueditor.all.min.js"> </script>
					            <script type="text/javascript" charset="utf-8" src="/myblog/Public/lang/zh-cn/zh-cn.js"></script>
					           <script id="editor" type="text/plain" name="art_content"
					             style="width:800px;height:400px;"><?php echo ($list['art_content']); ?></script>
					            <div>
					            <script type="text/javascript">

					    //实例化编辑器
					    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
					    var ue = UE.getEditor('editor');
					    </script>
					   
					            </div>
					            </li>
					            <li>
							<label for="input-01">文章作者</label>
							<input type="text" size="45" class="input-text"    placeholder="请输入文章作者" name="art_author" value="<?php echo ($list['art_author']); ?>" />
							</li>
							<li>
	
						<!--<label for="input-01">类别名称</label>
						<select name="art_catid">
						<?php if(is_array($row)): foreach($row as $key=>$l): ?><option value="<?php echo ($l['cat_id']); ?>"><?php echo ($l['cat_name']); ?></option><?php endforeach; endif; ?>
						</select>-->
						</li>
						<li>
				
						   <input type="submit" value="提交"/>

						</li>
						</li>
						</ul>
					</form>
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
</body>
</html>