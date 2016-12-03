<div class = "col-sm-4">
	<h4 class = "text-danger">管理员信息：</h4>
	<hr>
	<form class="form-horizontal" method = "post" action = "<?php echo site_url('Admin/updateinfo');?>">
	<div class="form-group">
		<label for="inputPhoto" class="col-sm-2 control-label">头&nbsp;&nbsp;&nbsp;像：</label>
		<div class = "col-sm-8">
			<img src="<?php echo base_url();?><?php echo $info['photo']; ?>" style = "width:100px;height:120px;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="#">换一个</a>
		</div>
	</div>
	<hr>
	<div class="form-group">
		<label for="inputName1" class="col-sm-2 control-label">网&nbsp;&nbsp;&nbsp;名：</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="inputName1" placeholder="Username" value = "<?php echo $info['username']; ?>" name = "username">
		</div>
	</div>
	<hr>
	<div class="form-group">
		<label for="inputLocate2" class="col-sm-2 control-label">坐&nbsp;&nbsp;&nbsp;标：</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="inputLocate2" placeholder="Location" value = "<?php echo $info['location']; ?>" name = "location">
		</div>
	</div>
	<hr>
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label">邮&nbsp;&nbsp;&nbsp;箱：</label>
		<div class="col-sm-8">
			<input type="email" class="form-control" id="inputEmail3" placeholder="Emailaddr" value = "<?php echo $info['email']; ?>" name = "email">
		</div>
	</div>
	<hr>
	<div class = "col-sm-offset-2 col-sm-3">
		<button class = "btn btn-danger" id = "changebtn">修改</button>
	</div>
	<div class = "col-sm-3">
		<button class = "btn btn-danger" type = "submit" id = "submit">提交</button>
	</div>
   </form>
</div>
<div class="col-sm-5">
	<h4 class = "text-danger">计划与目标：</h4>
	<br>
	<table class="table" style = "font-size:14px;">
		<tr class="active">
			<th>计划内容</th>
			<th>需要时间</th>
			<th>截止日期</th>
			<th>操作选项</th>
		</tr>
		<?php foreach($plan as $val){?>
		<tr class="success">
			<td class = "<?php echo $val['id']?>" name = "planname"><?php echo $val['planname'];?></td>
			<td class = "<?php echo $val['id']?>" name = "usedtime"><?php echo $val['usedtime'];?></td>
			<td class = "<?php echo $val['id']?>" name = "finished"><?php echo $val['finished'];?></td>
			<td><a href = "#" class = "changeplan" id = "<?php echo $val['id']; ?>">修改</a> | <a href="<?php echo site_url(array('Admin','delplan',$val['id']));?>" onclick = "javascript:return del()">删除</a></td>
		</tr>
		<?php } ?>
		
	</table>
	<hr>
	<form class="form-horizontal" method = "post" action = "<?php echo site_url('Admin/addplan');?>" id = "form_plan">
		<div class="form-group">
			<label for="inputPlan1" class="col-sm-3 control-label">计划内容：</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="inputPlan1" placeholder="Plan" name = "planname">
			</div>
		</div>
		<div class="form-group">
			<label for="inputTime2" class="col-sm-3 control-label">需要时间：</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="inputTime2" placeholder="Time" name = "usedtime">
			</div>
		</div>
		<div class="form-group">
			<label for="inputDate3" class="col-sm-3 control-label">截止日期：</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="inputDate3" placeholder="Date" name = "finished">
			</div>
		</div>
		<hr>
		<div class="col-sm-offset-2 col-sm-3">
			<button class="btn btn-success" type = "submit" id = "addplan">添加</button>
		</div>
		<div class="col-sm-2">
			<button class="btn btn-success" type = "submit">修改</button>
		</div>
	</form>
	
</div>