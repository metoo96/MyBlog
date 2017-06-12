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
	<title>zgz博客后台登录</title>
</head>

<body>
<div class="main">
	<!-- HEADER -->
	<div id="header" class="box">

		<h1 id="logo">朱国柱 <span>BlogSystem</span></h1>

		<!-- NAVIGATION -->
		<ul id="nav">
			<li ><a href="<?php echo U('Home/Index/index');?>">博客首页</a></li>
		</ul>
		
	</div> <!-- /header -->
	
	<div id="section" class="box">

		<!-- CONTENT -->
		<div id="content">
			<div style="margin:50px 0px 50px 90px">
				<h2>后台登录</h2>
				<div id="form">
					<ul>
						<li>
							<label for="input-01">用户名</label>
							<input type="text" size="45" class="input-text"  placeholder="请输入用户名" id="username"  />
						</li>
						
						<li>
							<label for="input-03">密码</label>
							<input type="password" size="45" class="input-text" id="password" placeholder="请输入密码"  />
						</li>
                        <li>
                            <span><img src="<?php echo U('Admin/Index/yzm');?>" alt="xcode" onClick="this.src=this.src+'?'+Math.random();" title="看不清楚?点击刷新验证码?" style="border:1px solid gray;" /></span>
                        </li>
						<li>
						     <label for="input-03">验证码</label>
							 <input type="text" size="45" class="input-text" id="yzm" placeholder="请输入验证码"  />
						</li>
						
						<li>
		
						   <button onclick="check()">
			                 登     录   
				           </button>
				         
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
		<!--<p class="f-right t-right"> 联系我们 | 招聘信息 | 网站律师  使用须知</p>-->
		<p class="f-left">Copyright &copy;&nbsp;2017 朱国柱</p>
	</div> 

</div> <!-- /footer -->

<!--path-->
<div style="visibility:hidden;display:none">
			<div id="loginAjax">
				<?php echo U('Admin/Index/loginAjax');?>
			</div>
			<div id="loginindex">
			    <?php echo U('Admin/Index/index');?>
			</div>
</div>
<!--Datachuli-->
        <script type="text/javascript" src="/myblog/Public/js/jquery-2.2.4.min.js"></script>
		<script type="text/javascript" src="/myblog/Public/js/bootstrap.min.js"></script>
		<script type="text/javascript">
            //点击提交按钮时进行验证
			var check = function(){
				var data = {
					username:$('#username').val(),
					password:$('#password').val(),
					yzm:$('#yzm').val()
				}
				$.ajax({
					url:$('#loginAjax').html(),
					type:'post',
					data:data,
					//请求成功
					success:function(res){
						if(res.success){
							alert(res.msg);
							window.location.href = $('#loginindex').html();
						}else {
							alert(res.errmsg);
						}
					},
					//请求失败
					error:function(){
						alert('网络错误');
					}
				})
			}	
		</script>
		</body>
</html>