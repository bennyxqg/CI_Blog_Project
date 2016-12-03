<!-- 文档类型声明 -->
<!DOCTYPE html> 
<!-- 文档使用中文 -->                 
<html lang = "zh-cn">
<head>
	<!-- 网页标题 -->
    <title>博客前台管理</title>
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
    <h2 class = "text-info">&nbsp;&nbsp;&nbsp;DarkBlue的博客</h2>
	<div class = "container col-sm-12">
    <nav class="navbar navbar-default">
             <ul class="nav nav-pills col-sm-offset-2">
                <li role="presentation"><a href="<?php echo site_url('Home/index')?>" role = "button" class = "btn btn-lg">首页</a></li>
				<?php	foreach($category as $val){
					$segments = array('Home','block',$val['cid']);
					$url = site_url($segments);
					echo '<li role="presentation"><a href='."{$url}".' role = "button" class = "btn btn-lg">'."{$val['catename']}".'</a></li>';
				}?>
				<li role="presentation"><a href="<?php echo site_url('Login/index')?>" role = "button" class = "btn btn-lg">站内管理</a></li>
             </ul>
    </nav>
	</div>
	<div class = "col-sm-2">
	     <div class = "well">
			<p class = "text-muted">个人资料</p>
			<img src = "<?php echo base_url();?><?php echo $userinfo['photo']?>" style = "width:150px;height:150px;">
			<br><br>
			<p class = "text-warning">网名：<?php echo $userinfo['username'];?></p>
			<p class = "text-warning">位置：<?php echo $userinfo['location'];?></p>
			<p class = "text-warning">邮箱：<?php echo $userinfo['email']?></p>
		 </div>	
		 
		 <div class = "well">
			<p class = "text-muted">日程安排</p>
			<?php echo $calendar;?>
		 </div>
		 
		 <div class = "well">
			<p class = "text-muted">站内排名</p>
			<?php $var = 1; foreach($order as $val){ 
				$segments = array('Home','content',$val['id']);
				$url = site_url($segments);
			?>
			<p class = "text-success"><a href = "<?php echo $url;?>"><?php echo $var++;?> <?php echo $val['title'];?></a></p>
			<?php }?>
		 </div>
		 
		 <div class = "well">
			<p class = "text-muted">友情链接</p>
			<p class = "text-success"><a href = "https://github.com/github">GitHub官方网站</a></p>
			<p class = "text-success"><a href = "http://www.csdn.net/">CSDN官方论坛</a></p>
			<p class = "text-success"><a href = "https://linux.cn/">Linux中国官网</a></p>
			<p class = "text-success"><a href = "http://www.oschina.net/">开源中国官网</a></p>
			<p class = "text-success"><a href = "http://www.php1.cn/">中国第一PHP社区</a></p>
			
		 </div>
	</div>