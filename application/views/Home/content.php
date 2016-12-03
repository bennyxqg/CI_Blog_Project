<div class = "col-sm-10">
	<div class = "well">
		<h3 class = "col-sm-offset-4 text-success"><?php echo $content['title'];?></h3>
		<br>
		<h4 class = "col-sm-offset-3 text-warning">作者：<?php echo $content['author'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;发表时间：<?php echo date("Y-m-d H:i:s",$content['createtime']);?></h4>
		<br>
		<div class= "text-default" style = "font-size:15px;">
		<?php echo $content['content'];?>
		<br>
		<hr>
		<br>
		<div class = "col-sm-7">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="#" id = "goodjob" name = "<?php echo $content['id'];?>"><span class = "glyphicon glyphicon-thumbs-up">&nbsp;<?php echo $content['goodjob'];?></span></a>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="#" id = "badjob" name = "<?php echo $content['id'];?>"><span class = "glyphicon glyphicon-thumbs-down">&nbsp;<?php echo $content['badjob'];?></span></a>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<span class = "glyphicon glyphicon-eye-open">&nbsp;<?php echo $content['viewnum'];?><span>
		</div>
		<div class="jiathis_style_24x24">
			<span class = "jiathis_txt" style = "font-size:17px;">分享到：&nbsp;&nbsp;&nbsp;</span>
			<a class="jiathis_button_qzone"></a>
			<a class="jiathis_button_tsina"></a>
			<a class="jiathis_button_tqq"></a>
			<a class="jiathis_button_weixin"></a>
			<a class="jiathis_button_renren"></a>
			<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
			<a class="jiathis_counter_style"></a>
		</div>
		<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
		</div>
		<br><br>
	</div>
	<br><br>
</div>