<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title><?php $this->_block('title'); ?><?php $this->_endblock(); ?></title>
<meta name="Keywords" content="彩妆" />
<meta name="Description" content="彩妆" />
<link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR; ?>css/reset.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR; ?>css/index.css" />
<style type="text/css">
	.contact ul li a{background: inherit;float: none;margin: 0px;padding: 0px;}
	.contact ul li a:hover{opacity: 1;}
	.contact ul li #sina{background: url(images/Tweet.jpg) no-repeat;width: 113px;height: 102px;display: block;}
	.contact ul li #weixin{background: url(images/Wechat.jpg) no-repeat;width: 96px;height: 102px;display: block;}
</style>
<?php $this->_block('style'); ?><?php $this->_endblock(); ?>
</head>
<body>

  	<?php echo $this->_control('nav', 'nav', array( 'column' => $column ) ); ?>

	<?php $this->_block('contents'); ?><?php $this->_endblock(); ?>
	
	<!-- footer -->
	<div class="w1000 contact_bottom clearfix">
		<div class="contact_left">
			<img src="images/img_5.jpg" width="85" height="85" />
			<p>
				<span>ST时尚美学彩妆造型工作室</span>
				上海ST时尚美学彩妆造型工作室是一家专业学化妆,新娘跟妆,广告化妆,彩妆造型培训,个人形象设计,影视化妆,舞台化妆,大型商演化妆造型的工作室，上海专业新娘跟妆,徐汇区专业彩妆造型培训,上海专业礼仪培训,上海专业彩妆造型,上海专业舞台化妆,上海专业舞台化妆培训班,专业舞台化妆培训班,上海专业年会化妆,专业彩妆造型培训，（包教包会，推荐工作，两年内免费进修，,咨询电话:13818843963 ，13651731734 ，021-54653259。
			</p>
		</div>
		<div class="contact_right">
			<ul>
				<li class="user">陈老师、苏老师</li>
				<li class="phone">(M)13651731734 / 13818843963</li>
				<li class="mail">173591863@qq.com</li>
			</ul>
			<img src="images/QRCode.png" />
		</div>
	</div>
	<div class="foot">
		<ul class="clearfix">
			<li>上海专业学化妆造型培训</li>
			<li>上海徐汇专业学化妆盘发培训</li>
			<li>上海专业新娘跟妆盘发培训</li>
			<li>上海专业企业员工形象培训</li>
			<li>上海专业承接商业演出化妆造型</li>
		</ul>
	</div>
	<div class="foot">
		<ul class="clearfix">
			<li>Copyright ©2008 [使用者网站] Powered By [网站程序名称] Version 1.0.0 </li>
		</ul>
	</div>
	
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<?php $this->_block('scripts'); ?><?php $this->_endblock(); ?>
</body>
</html>