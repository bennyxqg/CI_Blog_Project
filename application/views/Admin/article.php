<div class = "col-sm-7">
	<form class="form-inline">
	<h4 class="text-danger">文章列表：</h4>
		<div class="btn-group">
			<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">栏目分类 
				<span class="caret"></span>
			</button>
			<ul class="dropdown-menu">
				<li><a href="#">编程语言</a></li>
				<li><a href="#">网站开发</a></li>
				<li><a href="#">移动开发</a></li>
				<li><a href="#">游戏开发</a></li>
				<li><a href="#">职业生涯</a></li>
			</ul>
		</div>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<div class="form-group">
			<label for="exampleInputArticle"></label>
			<input type="text" class="form-control" id="exampleInputArticle" placeholder="Search">
			<button class="btn btn-primary" type="submit">搜索</button>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href = "<?php echo site_url('Article/addarticle'); ?>" role = "button" class="btn btn-danger">添加文章</a>
		</div>
		
	</form>
	<table class="table" style = "font-size:14px;">
		<tr class="active">
			<th>#</th>
			<th>文章名称</th>
			<th>文章作者</th>
			<th>所属栏目</th>
			<th>创建时间</th>
			<th>操作选项</th>
		</tr>
		<?php 
			$var = 1;
			foreach($article as $val){?>
		<tr class="success">
			<td><?php echo $var++; ?>.</td>
			<td><?php echo $val['title']; ?></td>
			<td><?php echo $val['author']; ?></td>
			<td><?php echo $val['cid']; ?></td>
			<td><?php echo date('Y-m-d H:i:s',$val['createtime']); ?></td>
			<td><a href = "<?php echo site_url('Article/editart')?>/<?php echo $val['id'];?>">修改</a> | <a href = "<?php echo site_url('Article/delarticle')?>/<?php echo $val['id']; ?>" onclick = "javascript:return del()">删除</a></td>
		</tr>
		<?php } ?>
	</table>
	<hr>
	<button class="btn btn-warning">批量删除</button>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<?php echo $links; ?>
	
</div>