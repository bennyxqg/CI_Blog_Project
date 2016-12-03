	<!-- 2.加载jQuery库，同时加载该库必须在加载bootstrap.min.js之前 -->
    <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
    <!-- 3.加载bootstrap的核心js库 -->
    <script src="<?php echo base_url();?>/public/js/bootstrap.min.js"></script>
	<script type = "text/javascript">
		$(function(){
			$("#art_title").click(function(){
				var aid = $(this).attr('name');
				$.post("<?php echo site_url('Home/viewnum');?>",
					{
						id:aid
					});
			});
		});
	</script>
  </body>
</html>