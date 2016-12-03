<!-- 文档类型声明 -->
<!DOCTYPE html> 
<!-- 文档使用中文 -->                 
<html lang = "zh-cn">
  <head>
	<!-- 网页标题 -->
    <title>博客后台管理</title>
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
	
	<script type="text/javascript">
		function del(){
			var msg = confirm("确定删除吗？");
			if(msg == true){
				return true;
			}else{
				return false;
			}
		}
	</script>
  </head>
  <body> 
  
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="row">
            <div class="col-sm-1">
				<h4>
					<a href="#" class="btn btn-lg" role="button" style = "color:white;">
						<span class = "glyphicon glyphicon-paperclip"></span>&nbsp;&nbsp;&nbsp;博&nbsp;&nbsp;客&nbsp;&nbsp;管&nbsp;&nbsp;理
					</a>
				</h4>
            </div>
			<div class = "col-sm-offset-10">
				<h4>
					<a href="<?php echo site_url('Login/logout');?>" id = "logout" class = "btn btn-lg" role = "button" style = "color:white;">
						<span class = "glyphicon glyphicon-off"></span>&nbsp;&nbsp;&nbsp;退&nbsp;&nbsp;出
					</a>
				</h4>
			</div>
		
		</div>
    </nav>
	
	<div name="space" style="top:0px;left:0px;height:60px;width:1000px;"></div>
	
	<div style="position:absolute;left:0px;top:0px;width:180px;height:100%;background:#303030;">
		<div style="position:absolute;left:15px;top:80px;width:150px;height:50px;background:#303030;">
			<center>
				<a href = "<?php echo site_url('Admin/index');?>" class="categoryitem" style = "border:0px;width:180px;height:70px;top:0px;left:0px;background:#303030;color:white;font-size:18px;">
					<br>
					<span class="glyphicon glyphicon-home" style = "right:25px;"></span>后台主页
				</a>
			</center>
		</div>
		<div style="position:absolute;left:15px;top:160px;width:150px;height:50px;background:#303030;">
			<center>
				<a href = "<?php echo site_url('Admin/show');?>" class="categoryitem" style = "border:0px;width:180px;height:70px;top:0px;left:0px;background:#303030;color:white;font-size:18px;">
					<br>
					<span class="glyphicon glyphicon-th-list" style = "right:25px;"></span>个人信息
				</a>
			</center>
		</div>
		<div style="position:absolute;left:15px;top:240px;width:150px;height:50px;background:#303030;">
			<center>
				<a href = "<?php echo site_url('Category/index');?>"class="categoryitem" style = "border:0px;width:180px;height:70px;top:0px;left:0px;background:#303030;color:white;font-size:18px;">
					<br>
					<span class="glyphicon glyphicon-th-large" style = "right:25px;"></span>栏目管理
				</a>
			</center>
		</div>
		<div style="position:absolute;left:15px;top:320px;width:150px;height:50px;background:#303030;">
			<center>
				<a href = "<?php echo site_url('Article/index');?>" class="categoryitem" style = "border:0px;width:180px;height:70px;top:0px;left:0px;background:#303030;color:white;font-size:18px;">
					<br>
					<span class="glyphicon glyphicon-folder-open" style = "right:25px;"></span>文章管理
				</a>
			</center>
		</div>
		<div style="position:absolute;left:15px;top:400px;width:150px;height:50px;background:#303030;">
			<center>
				<a href = "<?php echo site_url('Admin/pass');?>" class="categoryitem" style = "border:0px;width:180px;height:70px;top:0px;left:0px;background:#303030;color:white;font-size:18px;">
					<br>
					<span class="glyphicon glyphicon-refresh" style = "right:25px;"></span>修改密码
				</a>
			</center>
		</div>
		<div style="position:absolute;left:15px;top:480px;width:150px;height:50px;background:#303030;">
			<center>
				<a href = "<?php echo site_url('Home/index');?>" class="categoryitem" style = "border:0px;width:180px;height:70px;top:0px;left:0px;background:#303030;color:white;font-size:18px;">
					<br>
					<span class="glyphicon glyphicon-edit" style = "right:25px;"></span>前台首页
				</a>
			</center>
		</div>
		<div style="position:absolute;left:15px;top:560px;width:150px;height:50px;background:#303030;">
			<center>
				<a href = "<?php echo site_url('Settings/index');?>" class="categoryitem" style = "border:0px;width:180px;height:90px;top:0px;left:0px;background:#303030;color:white;font-size:18px;">
					<br>
					<span class="glyphicon glyphicon-cog" style = "right:25px;"></span>站内设置
				</a>
			</center>
		</div>
	</div>
	
	
	
	
	
	
	