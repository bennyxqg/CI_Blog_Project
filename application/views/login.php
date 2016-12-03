<!-- 文档类型声明 -->
<!DOCTYPE html> 
<!-- 文档使用中文 -->                 
<html lang = "zh-cn">
  <head>
	<!-- 网页标题 -->
    <title>Login</title>
	<!-- 设置当前文档的编码格式 -->
	<meta charset = "utf-8">
	<!-- 设置IE浏览器的解析模式 -->
	<meta http-equiv = "X-UA-Compatible" content = "IE=edge">
	<!-- 设置视窗 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 1.加载Bootstrap的层叠样式表 -->
    <link rel="stylesheet" href="<?php echo base_url();?>/public/css/bootstrap.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
        <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <br><br><br><br><br>
	<div class = "well col-sm-offset-3 col-sm-5">
    <form class = "form-horizontal" method="post" action = "<?php echo site_url('Login/check');?>">
	
	    <h3 class = "text-info col-sm-offset-4">管理员登录</h3>
		<br>
		<h4 class="text-danger col-sm-offset-2"><?php echo $login_error; ?></h4>
		<div class = "form-group">
			<label class = "col-sm-4 control-label" for = "username">用户名：</label>
			<div class = "col-sm-5">
				<input type = "text" class = "form-control" id = "username" placeholder = "Username" name="username" value = "<?php echo set_value('username');?>">
			</div>
			<?php echo form_error('username','<p class="help-inline text-danger">','</p>');?>
		</div>
		
		<div class = "form-group">
			<label class = "col-sm-4 control-label" for = "password">密&nbsp;&nbsp;&nbsp;码：</label>
			<div class = "col-sm-5">
				<input type = "password" class = "form-control" id = "password" placeholder = "Password" name="password" value = "<?php echo set_value('password');?>">
			</div>
			<?php echo form_error('password','<p class="help-inline text-danger">','</p>');?>
		</div>
		
		<div class = "form-group">
			<label class = "col-sm-4 control-label" for = "password">验证码：</label>
			<div class = "col-sm-5">
				<input type = "text" class = "form-control" id = "checknum" placeholder = "验证码" name="checknum" value = "<?php echo set_value('checknum');?>">
			</div>
			<?php echo form_error('checknum','<p class="help-inline text-danger">','</p>');?>
		</div>
		
		<div class = "form-group">
			<label class = "col-sm-4 control-label" for = "password"></label>
			<div class = "col-sm-5">
				<?php echo $yzm; ?>
			</div>
		</div>
	
		<div class = "form-group">
			<div class = "col-sm-offset-3 col-sm-1">
				<button type = "submit" class = "btn btn-default">登录</button>
			</div>
			<div class = "col-sm-offset-2 col-sm-6">
				<a href="<?php echo site_url('Home/index');?>" class = "btn btn-default" role = "button">返回</a>
			</div>
		</div>
	</form>
	</div>
  
    <!-- 2.加载jQuery库，同时加载该库必须在加载bootstrap.min.js之前 -->
    <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
    <!-- 3.加载bootstrap的核心js库 -->
    <script src="<?php echo base_url();?>/public/js/bootstrap.min.js"></script>
  </body>
</html>