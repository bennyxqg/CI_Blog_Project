<div class = "col-sm-7">
	<h4 class="text-danger">栏目列表：</h4>
	<hr>
	<table class="table" style = "font-size:14px;">
		<tr class="active">
			<th>#</th>
			<th>栏目名称</th>
			<th>文章数量</th>
			<th>创建时间</th>
			<th>操作选项</th>
		</tr>
		<?php
			$var = 1;
			foreach($info as $val){
		?>
		<tr class="success">
			<td><?php echo $var++; ?></td>
			<td class = "<?php echo $val['cid']; ?>" name = "catename"><?php echo $val['catename'];?></td>
			<td><?php echo $val['articlenum'];?></td>
			<td class = "<?php echo $val['cid']; ?>" name = "createtime"><?php echo $val['createtime'];?></td>
			<td><a href = "#" class = "changecate" id = "<?php echo $val['cid'];?>">修改</a> | <a href = "<?php echo site_url("Category/delcate")?>/<?php echo $val['cid'];?>" onclick = "javascript:return del()" >删除</a></td>
		</tr>
		<?php }?>
		
	</table>
	<hr>
	<h4 class="text-danger">栏目操作：</h4>
	<hr>
	<form class="form-horizontal" method="post" action="<?php echo site_url('Category/addcate');?>" id = "form_cate">
		<div class="form-group">
			<label for="inputCate1" class="col-sm-2 control-label">栏目名称：</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="inputCate1" placeholder="Category" name = "category">
			</div>
			<label for="inputTime3" class="col-sm-2 control-label">修改时间：</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="inputTime3" placeholder="Datetime" name = "datetime">
			</div>
		</div>
		<hr>
		<div class="col-sm-offset-3 col-sm-2">
			<button class="btn btn-danger" type = "submit" id = "addcate">添加</button>
		</div>
		<div class="col-sm-2">
			<button class="btn btn-danger" type = "submit" id = "changecate">修改</button>
		</div>
	</form>
</div>


