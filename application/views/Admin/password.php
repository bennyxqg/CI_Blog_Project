<div class="col-sm-6">
	<h4 class="text-danger">修改管理员密码：</h4>
	<hr>
	<div class = "text-success" style = "font-size:17px"><?php echo $update_error; ?></div>
	<form class="form-horizontal" method="post" action = "<?php echo site_url('Admin/updatepass');?>">
		<div class="form-group">
			<label for="inputName1" class="col-sm-2 control-label">管理员名：</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="inputName1" placeholder="Username" name = "username">
			</div>
			<?php echo form_error('username','<p class="help-inline text-danger">','</p>');?>
		</div>
		<hr>
		<div class="form-group">
			<label for="inputPass1" class="col-sm-2 control-label">原&nbsp;&nbsp;密&nbsp;码：</label>
			<div class="col-sm-5">
				<input type="password" class="form-control" id="inputPass1" placeholder="PrePassword" name = "prepass">
			</div>
			<?php echo form_error('prepass','<p class="help-inline text-danger">','</p>');?>
		</div>
		<hr>
		<div class="form-group">
			<label for="inputPass2" class="col-sm-2 control-label">新&nbsp;&nbsp;密&nbsp;码：</label>
			<div class="col-sm-5">
				<input type="password" class="form-control" id="inputPass2" placeholder="NewPassword" name = "newpass">
			</div>
			<?php echo form_error('newpass','<p class="help-inline text-danger">','</p>');?>
		</div>
		<hr>
		<div class="form-group">
			<label for="inputPass3" class="col-sm-2 control-label">确认密码：</label>
			<div class="col-sm-5">
				<input type="password" class="form-control" id="inputPass3" placeholder="Confirm" name = "conpass">
			</div>
			<?php echo form_error('conpass','<p class="help-inline text-danger">','</p>');?>
		</div>
		<hr>
		<div class="col-sm-offset-3">
			<button type="submit" class="btn btn-primary">提交</button>
		</div>
	</form>
</div>