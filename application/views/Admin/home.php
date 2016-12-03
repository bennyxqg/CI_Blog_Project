<div class = "col-sm-4">
	<h4 class = "text-danger">环境配置信息：</h4>
	<hr>
	<h5 style = "color:black;">PHP版本：<?php echo PHP_VERSION; ?>&nbsp;&nbsp;&nbsp;&nbsp;MySQL版本：<?php echo $this->db->version(); ?></h5>
	<hr>
	<h5 style = "color:black;">环境：<?php echo $_SERVER['SERVER_SOFTWARE']; ?></h5>
	<hr>
	<h5 style = "color:black;">操作系统：<?PHP echo PHP_OS; ?></h5>
	<hr>
	<h5 style = "color:black;">上传限制：<?php $max_upload = ini_get("file_uploads") ? ini_get("upload_max_filesize") : "Disabled"; echo $max_upload;?></h5>
	<hr>
	<h5 style = "color:black;">服务器时间：<?php echo date("Y-m-d H:i:s",time());?></h5>
</div>
<div class = "col-sm-4">
	<h4 class = "text-danger">今日天气信息：</h4>
	<br>
	<iframe name = "weather_inc" src = "http://i.tianqi.com/index.php?c=code&id=55" scrolling="no" width="255" height="294" frameborder="0" ></iframe>
</div>