<?php $this->_extends('_layouts/index_layout'); ?>
<?php $this->_block('title'); ?>作品发布<?php $this->_endblock(); ?>
<?php $this->_block('style'); ?>
<style type="text/css">
.cont {overflow: hidden;padding-bottom: 40px;}
.cont .list{margin: 20px 0px 0px 20px;display: inline-block;}
.cont .list li{width: 140px;height: 30px;line-height: 30px;margin-top: 5px;background-color: #ccc;padding-left: 10px;border-radius: 5px;font-size: 14px;cursor: pointer;}
.cont .list li:hover,.cont .list li.cur{background-color: #000;color: #FFF;}
.cont_right{float: right;width: 720px;margin-right: 20px;margin-top: 20px;}
.cont_right span{display: block;height: 20px;background-color: #ddd;margin-top: 5px;}
.cont_right ul{display: none;}
.cont_right ul li{float: left;width: 150px;margin-top: 30px;margin-left: 25px;}
.cont_right ul li p{text-align: center;height: 25px;line-height: 25px;font-weight: bold;color: #000;}
</style>
<?php $this->_endblock(); ?>
<?php $this->_block('contents'); ?>
	<div class="cont w1000">
		<ul class="list">
		<?php foreach( $sub_column as $ls_sub ):;?>
			<li class="<?php $curr = 'ck_'.$ls_sub->id;echo $$curr;?>">
			    <a href = "<?php echo url('/photos',array('column'=>$column,'sub_id'=>$ls_sub->id));?>" title = "<?php echo $ls_sub->name;?>"><?php echo $ls_sub->name;?></a>
			</li>
		<?php endforeach;?>
		</ul>
		<div class="cont_right">
			<span></span>
			
			<ul style="display:block">
			    <?php foreach( $photos as $data ):;?>
				<li>
					<a href="<?php echo url('/photolist',array('column'=>$column,'id'=>$data->id,'sub_id'=>$data->sub_column_id));?>">
						<img src="<?php echo $_BASE_DIR.$data->cover;?>">
						<p><?php echo $data->title;?></p>
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
			$(this).siblings().removeClass("cur");
			$(this).addClass("cur");
			var show_index = $(this).index();
			$(".cont_right ul").hide();
			$(".cont_right ul").eq(show_index).show();
		});
	});
</script>
<?php $this->_endblock(); ?>