<div class = "col-sm-10">
		<?php foreach($article as $val){   
			$segments = array('Home','content',$val['id']);
			$url = site_url($segments);
		?> 
	    <div class="well">
		    
		<a href = "<?php echo $url;?>" class = "text-success" style = "font-size:20px" id = "art_title" name = "<?php echo $val['id']; ?>"><?php echo $val['title'];?></a>
		<br><br>
				
		<p style = "color:grey">
		<span class = "text-info" style = "font-size:18px">摘要内容:</span>
		<?php echo $val['description'];?>
		</p>
		<br>		
		<div class = "col-sm-9">
		<span class = "glyphicon glyphicon-thumbs-up">&nbsp;<?php echo $val['goodjob'];?></span>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<span class = "glyphicon glyphicon-thumbs-down">&nbsp;<?php echo $val['badjob'];?></span>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<span class = "glyphicon glyphicon-eye-open">&nbsp;<?php echo $val['viewnum'];?><span>
		</div>
			 
		<p style = "color:grey">
			作者：<?php echo $val['author'];?>
			&nbsp;&nbsp;
			<?php echo  date("Y-m-d H:i:s",$val['createtime']); ?>  
		</p>
			 
		</div>
		<?php }?>
	<nav>
        <ul class="pager">
			<?php echo $links;?>
		</ul>
    </nav>
