<?php $this->_extends('_layouts/index_layout'); ?>
<?php $this->_block('title'); ?>新闻发布<?php $this->_endblock(); ?>
<?php $this->_block('style'); ?>
<style type="text/css">
.cont {overflow: hidden;padding-bottom: 40px;}
.cont .list{margin: 20px 0px 0px 20px;display: inline-block;}
.cont .list li{margin-top: 5px;}
.cont .list li a{display: block;width: 140px;height: 30px;line-height: 30px;overflow: hidden;color: #000;background-color: #ccc;padding-left: 10px;border-radius: 5px;font-size: 14px;cursor: pointer;}
.cont .list li a:hover,.cont .list li a.cur{background-color: #000;color: #FFF;}
.cont_right{float: right;width: 720px;margin-right: 20px;margin-top: 20px;}
.cont_right span{display: block;height: 30px;margin-top: 5px;line-height: 30px;padding-left: 10px;font-size: 14pt;font-weight: bold;    font-family: Arial,Tahoma,PMingLiu,sans-serif;}
.cont_right ul li{border-top:dashed 1px #5e5e5e;height: 140px;cursor: pointer;}
.cont_right ul li dl dt,.cont_right ul li dl dd{float: left;padding:15px;height: 105px;}
.cont_right ul li dl dt{width: 85px;color: #444;}
.cont_right ul li dl .dd_image{width: 25px;padding: 8px 0px;}
.cont_right ul li dl .dd_font{width:548px;}
.cont_right ul li dl .dd_font h3{padding: 0px;color: #444;font-weight: bold;overflow: hidden;font-size: 14px;}
.cont_right ul li dl .dd_font p{color: #444;}
.cont_right ul li dl .dd_font b{color: #000;font-weight: normal;}
</style>
<?php $this->_endblock(); ?>
<?php $this->_block('contents'); ?>
	<div class="cont w1000">
		<ul class="list">
			<li><a class="<?php $curr = 'ck_0';echo $$curr;?>" href = "<?php echo url('/news',array('column'=>5));?>" title = '全部'>全部</a></li>
			<?php foreach( $sub_column as $ls_sub ):;?>
			<li><a class="<?php $curr = 'ck_'.$ls_sub->id;echo $$curr;?>" href = "<?php echo url('/news',array('column'=>$column,'sub_id'=>$ls_sub->id));?>" title = "<?php echo $ls_sub->name;?>"><?php echo $ls_sub->name;?></a></li>
			<?php endforeach;?>
		</ul>
		<div class="cont_right">
			<span>全部</span>
			<!-- 彩妆 -->
			<ul style="display:block">
			    <?php foreach( $column_for_data as $news ):;?>
				<li>
					<a href="<?php echo url('/newsdetail',array('id'=>$news->id,'column'=>$column));?>">
						<dl class="clearfix">
							<dt><?php echo date( 'Y-m-d H:i:s', $news->create_time );?></dt>
							<dd class="dd_image"><img src="images/icon_topNews.gif"></dd>
							<dd class="dd_font">
								<h3><?php echo $news->title;?></h3>
								<p><?php echo $news->get_summary;?>...<b>更多</b></p>
							</dd>
						</dl>
					</a>
				</li>
				<?php endforeach;?>
				
			</ul>
		</div>
	</div>
<?php $this->_endblock(); ?>
<?php $this->_block('scripts'); ?>
<script type="text/javascript">
	$(function(){
		$(".list li").click(function(){
			$(this).siblings().find("a")removeClass("cur");
			$(this).find("a").addClass("cur");
		});
		$(".cont_right ul li").hover(function(){
			$(this).css("background-color","#dfdfdf");
			$(this).find(".dd_font h3").css("color","#000");
			$(this).find(".dd_font b").css("color","#C40000");
		},function(){
			$(this).css("background-color","#FFF");
			$(this).find(".dd_font h3").css("color","#444");
			$(this).find(".dd_font b").css("color","#000");
		});
	});
</script>
<?php $this->_endblock(); ?>