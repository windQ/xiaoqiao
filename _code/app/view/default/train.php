<?php $this->_extends('_layouts/index_layout'); ?>
<?php $this->_block('title'); ?>彩妆培训<?php $this->_endblock(); ?>
<?php $this->_block('style'); ?>
<style type="text/css">
.content_left{float: left;width: 270px;}
.content_left ul{display: table;margin: 0px auto;}
.content_left ul li {margin-top:2px;text-align: left;width:240px;background-color: #eee;}
.content_left ul li:hover a{background-color: #F6DBB0;color: #FFF;}
.content_left ul li a{font-size: 14px;color: #5e5e5e;height: 35px;line-height: 35px;display: block;padding-left: 50px;}
.content_right{float: right;width: 660px;padding: 10px;color: #333;}
.content_right ul{border:solid 1px #ddd;padding: 10px;margin: 10px 0px;}
.content_right ul li{color:#5e5e5e;line-height: 25px;}
.content_right ul li span{font-weight: bold;}
</style>
<?php $this->_endblock(); ?>
<?php $this->_block('contents'); ?>
	<!-- 大图切换 -->
	<div class="w1000 scroll">
		<ul>
			<li><img src="images/img_1.jpg"></li>
			<li><img src="images/img_2.jpg"></li>
			<li><img src="images/img_3.jpg"></li>
			<li><img src="images/img_4.jpg"></li>
		</ul>
	</div>
	<!-- 联系方式 -->
	<div class="w1000 contact">
		<ul class="clearfix">
			<li><a href=""><img src="images/address.jpg"></a></li>
			<li><a href=""><img src="images/tel.jpg"></a></li>
			<li><a href=""><img src="images/QQ.jpg"></a></li>
			<li><a href=""><img src="images/Tweet.jpg"></a></li>
			<li><a href=""><img src="images/Wechat.jpg"></a></li>
		</ul>
	</div>
	<div class="w1000 content clearfix">
		<div class="content_left">
			<h3><img src="images/course.jpg"></h3>
			<ul>
			    <?php foreach( $sub_column as $ls_sub ):;?>
				<li><a href="<?php echo url('/news',array('column'=>$ls_sub->p_id,'sub_id'=>$ls_sub->id));?>"><?php echo $ls_sub->name;?></a></li>
				<?php endforeach;?>
			</ul>
			<img src="images/woman.jpg" style="margin-top:20px;">
		</div>

		<div class="content_right">
		    <?php 
		        foreach( $sub_column as $ls_sub ):;
		            if( $ls_sub->get_news->title == '' )
		            {
		            	continue;
		            }
		    ?>
			<span data-id='<?php echo $ls_sub->id;?>'><?php echo $ls_sub->get_news->title;?></span>
			<div>
			    <?php echo $ls_sub->get_news->get_summary;?>...
			    <a href="<?php echo url('/newsdetail',array('id'=>$ls_sub->get_news->id,'column'=>$column));?>">【详情】</a>
			</div>
			<hr />
			<!--<span><img src="images/W_img.jpg"></span>
			<ul>
				<li><span>课程介绍：</span>本课程为化妆基础课程，适合无任何基础的学员学习。</li>
				<li><span>培养目标：</span>对彩妆、美甲、各类盘发造型、服装搭配、形象设计等方面感兴趣的学生、白领、工作族，或因工作、职场、社交、交友等需要自我形象提升的人群。</li>
				<li><span>授课方式：</span>小班制或一对一顾问化教学、创新模块教学、多媒体PPT教学、示范、互动、实训……<a href="#">【详情】</a></li>
			</ul>
			--><?php endforeach;?>
			
		</div>
	</div>
<?php $this->_endblock(); ?>