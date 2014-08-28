<?php $this->_extends('_layouts/index_layout'); ?>
<?php $this->_block('title'); ?>彩妆培训<?php $this->_endblock(); ?>
<?php $this->_block('style'); ?>
<style type="text/css">
.cont {overflow: hidden;padding-bottom: 40px;}
.cont .list{margin: 20px 0px 0px 20px;display: inline-block;float: left;}
.cont .list li{width: 140px;height: 30px;line-height: 30px;margin-top: 5px;background-color: #ccc;padding-left: 10px;border-radius: 5px;font-size: 14px;cursor: pointer;}
.cont .list li:hover,.cont .list li.cur{background-color: #000;color: #FFF;}
.jqzoom{border:1px solid #BBB;position:relative;padding:0px;cursor:pointer;display: inline-block;margin-top: 20px;width: 300px;height: 400px;}
.jqzoom img{width: 300px;height: 400px;}
div.zoomdiv {z-index:999;position: absolute;top:0px;left:0px;width: 200px;height: 200px;background: #ffffff;border:1px solid #CCCCCC;display:block;text-align: center;overflow: hidden;}
div.jqZoomPup {z-index: 999;visibility: hidden;position: absolute;top:0px;left:0px;width: 50px;height: 50px;border: 1px solid #aaa;background: #ffffff url(../images/zoomlens.gif) 50% top  no-repeat;opacity: 0.5;-moz-opacity: 0.5;-khtml-opacity: 0.5;filter: alpha(Opacity=50);}
.cont_right {margin-left: 20px;float: left;width: 745px;margin-top: 20px;}
.cont_right h1{font-size: 22px;height: 35px;line-height: 35px;background-color: #ccc;text-align: center;border-radius: 4px;}
.div_box{width: 300px;display: block;position: relative;margin-top: 20px;}
.view_box{width: 300px;overflow: hidden;position: relative;}
.view_box ul li{float: left;margin-left: 3px;}
.view_box ul li img {width: 70px;height: 70px;cursor: pointer;border:solid 1px #FFF;}
.div_box span{display: block;height: 70px;width: 20px;position: absolute;cursor: pointer;opacity: 0.5;filter: alpha(Opacity=50);}
.div_box .btn_left{top: 0px;left: -30px;background: url(images/galler_l.gif) no-repeat 0px center;}
.div_box .btn_left:hover{background: url(images/galler_l.gif) no-repeat 0px center #000;}
.div_box .btn_right{top: 0px;right: -30px;background: url(images/galler_r.gif) no-repeat 0px center;}
.div_box .btn_right:hover{background: url(images/galler_r.gif) no-repeat 0px center #000;}
.cont_right h3 span{color: #C40000;display: block;text-align: center;height: 20px;line-height: 20px;}
.cont_right h3 p{font-size: 22px;text-align: center;color: #FFF;background: url(images/bg.jpg) no-repeat;height: 51px;line-height: 51px;border-radius: 8px;overflow: hidden;}
</style>
<?php $this->_endblock(); ?>
<?php $this->_block('contents'); ?>

	<div class="cont w1000">
		<ul class="list">
		    <?php foreach( $sub_column as $ls_sub ):;?>
			<li class="<?php $curr = 'ck_'.$ls_sub->id;echo $$curr;?>">
				<a href = "<?php echo url('/photos',array('column'=>$column,'sub_id'=>$ls_sub->id));?>"><?php echo $ls_sub->name;?></a>
			</li>
			<?php endforeach;?>
		</ul>
		
		<div class="cont_right">
			<h3>
				<p><?php echo $photo_detail->title;?></p>
				<span><?php echo $photo_detail->description;?></span>
			</h3>
			<div class="jqzoom">
				<img src="<?php echo $_BASE_DIR.$photo_detail->get_images[0]['middle'];?>" jqimg="<?php echo $_BASE_DIR.$photo_detail->get_images[0]['origin'];?>" id="bigImg">
			</div>
			<div class="div_box">
				<div class="view_box">
					<ul class="clearfix">
					<?php foreach( $photo_detail->get_images as $image ):;?>
						<li><img src="<?php echo $_BASE_DIR.$image['thumb'];?>" origin-img="<?php echo $_BASE_DIR.$image['origin'];?>" middle-img="<?php echo $_BASE_DIR.$image['middle'];?>"></li>
					<?php endforeach;?>
					</ul>
				</div>
				<span class="btn_left"></span>
				<span class="btn_right"></span>
			</div>
		</div>
	</div>
<?php $this->_endblock(); ?>
<?php $this->_block('scripts'); ?>
<script type="text/javascript" src="<?php echo $_BASE_DIR;?>js/jquery.jqzoom.js"></script>
<script type="text/javascript" src="<?php echo $_BASE_DIR;?>js/big_img.js"></script>
<script type="text/javascript">
    /*使用jqzoom*/
    $(function() {
        $(".jqzoom").jqueryzoom({
            xzoom: 200, //放大图的宽度(默认是 200)
            yzoom: 200, //放大图的高度(默认是 200)
            offset: 10, //离原图的距离(默认是 10)
            position: "right", //放大图的定位(默认是 "right")
            preload: 1
        });
    });
</script>
<?php $this->_endblock(); ?>