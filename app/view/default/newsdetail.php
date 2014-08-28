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
	<?php $this->_element('contact'); ?>
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
            <h3><?php echo $news_detail->title;?></h3>
            <h3><?php echo Helper_Fun::remove_page_break( $news_detail->contents );?></h3>
		</div>
		<p>
		    <?php if( $prev_news->id != '' ):;?>
		    <a href = "<?php echo url('/newsdetail',array('id'=>$prev_news->id,'column'=>$column));?>">上一篇:<?php echo Helper_Fun::_substr( $prev_news->title );?></a>
		    <?php endif;?>
		    <?php if( $next_news->id != '' ):;?>
		    <a href = "<?php echo url('/newsdetail',array('id'=>$next_news->id,'column'=>$column));?>">下一篇:<?php echo Helper_Fun::_substr( $next_news->title );?></a>
		    <?php endif;?>
		</p>
	</div>
<?php $this->_endblock(); ?>