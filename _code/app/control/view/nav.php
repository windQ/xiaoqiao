<div class="header">
	<img src="images/banner.jpg">
	<div class="header_nav">
		<ul class="clearfix">
			<li><a href="<?php echo url('/index');?>" class="<?php echo $column_index;?>">首页</a></li>
			<li><a href="<?php echo url('/about');?>" class="<?php echo $column_about;?>">关于我们</a></li>
			<li><a href="<?php echo url('/team');?>" class="<?php echo $column_team;?>">团队介绍</a></li>
			<li><a href="<?php echo url('/news',array('column'=>1));?>" class="<?php echo $column_1;?>">彩妆培训</a></li>
			<li><a href="<?php echo url('/news',array('column'=>2));?>" class="<?php echo $column_2;?>">商业合作</a></li>
			<li><a href="<?php echo url('/photos',array('column'=>3));?>" class="<?php echo $column_3;?>">新娘跟妆</a></li>
			<li><a href="<?php echo url('/photos',array('column'=>4));?>" class="<?php echo $column_4;?>">工作室动态</a></li>
			<li><a href="<?php echo url('/news',array('column'=>5));?>" class="<?php echo $column_5;?>">新闻发布</a></li>
			<li><a href="<?php echo url('/photos',array('column'=>6));?>" class="<?php echo $column_6;?>">作品发布</a></li>
			<li><a href="<?php echo url('/contact');?>" class="<?php echo $column_contact;?>">联系我们</a></li>
		</ul>
	</div>
</div>