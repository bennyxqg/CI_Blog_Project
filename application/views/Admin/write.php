<div class="col-sm-7">
	<h4 class="text-danger">编辑文章：</h4>
	<form class="form-horizontal" method = "post" action = "<?php echo site_url('Article/insertart');?>">
		<div class="form-group">
			<label for="exampleInputTitle" class="control-label col-sm-2">所属栏目：</label>
			<div class="col-sm-4">
				<select name="category" style="width:90px;height:30px;">
					<?php foreach($category as $val){?>
					<option value="<?php echo $val['cid']?>"><?php echo $val['catename'];?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="exampleInputTitle" class="control-label col-sm-2">文章标题：</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="exampleInputTitle" name = "title">
			</div>
			<label for="exampleInputAuthor" class="control-label col-sm-2">文章作者：</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="exampleInputAuthor" name = "author">
			</div>
			
		</div>
		<div class="form-group">
			<label for="exampleInputDesc" class="control-label col-sm-2">描述内容：</label>
			<div class="col-sm-10">
				<textarea class="form-control" rows="2" name = "description"></textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="exampleInputContent" class="control-label col-sm-2">文章内容：</label>
			<div class="col-sm-10">
				<script id="container" name="content" type="text/plain" style="width:850px;"></script>
			</div>
		</div>
    <!-- 配置文件 -->
    <script type="text/javascript" src="<?php echo base_url();?>/public/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="<?php echo base_url();?>/public/ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');
    </script>
	<div class="col-sm-offset-6">
		<button class="btn btn-primary" type = "submit">发表</button>
	</div>
	</form>
</div>