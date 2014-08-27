<?php $this->_extends('_layouts/index_layout'); ?>
<?php $this->_block('title'); ?>首页<?php $this->_endblock(); ?>
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
			<li><a href="tencent://message/?uin=QQ号&Site=www.xiaoqiao.com&Menu=yes"><img src="images/QQ.jpg"></a></li>
			<li><a href=""><img src="images/Tweet.jpg"></a></li>
			<li><a href=""><img src="images/Wechat.jpg"></a></li>
		</ul>
	</div>
	<!-- 行业动态 -->
	<div class="w1000 industry clearfix">
		<div class="industry_left">
			<img src="images/img_5.jpg">
			<p>上海ST化妆造型彩妆培训工作室是目前国内化妆学校中首家且全日制一对一资深讲师授课、采用国际标准严格教学的上海化妆培训工作室，坐落于上海的时尚繁华中心——上海体育馆。ST已和多家艺术职业专门形成了紧密的教学合作关系，多年来不断进修学习并参加各种国际时尚大赛，是一所以化妆为主导专业的专业性化妆培训工作室……<a href="">【详情】</a></p>
		</div>
		<div class="industry_right">
			<a href="" class="industry_a"><img src="images/industry_trends.jpg"></a>
			<ul>
				<li><a href=""><p>韩式新娘发型欣赏 彰显浪漫气质范儿</p><span>2014-8-9</span></a></li>
				<li><a href=""><p>韩国猫眼妆容化妆教程 清淡紫打造party queen1</p><span>2014-8-9</span></a></li>
				<li><a href=""><p>ST时尚美学专业彩妆培训教你打造立体巴掌小脸的五个化妆技巧</p><span>2014-8-9</span></a></li>
				<li><a href=""><p>2014年康俊养生年会活动 </p><span>2014-8-9</span></a></li>
				<li><a href=""><p>教你怎么打好腮红与修容，大脸变小脸不再难了。</p><span>2014-8-9</span></a></li>
			</ul>
		</div>
	</div>
	<!-- 团队介绍 -->
	<div class="w1000 team">
		<a href=""></a>
		<ul class="clearfix">
			<li class="photo_left">
				<img src="images/laoshi.jpg">
				<span>乔英老师</span>
			</li>
			<li class="photo">
				<img src="images/laoshi.jpg">
				<span>乔英老师</span>
			</li>
			<li class="photo">
				<img src="images/laoshi.jpg">
				<span>乔英老师</span>
			</li>
			<li class="photo_right">
				<img src="images/laoshi.jpg">
				<span>乔英老师</span>
			</li>
		</ul>
	</div>
	<h3 class="w1000"><a href="#"></a></h3>
	<div class="w1000 sutra" id="demo">
		<div id="indemo">
			<div id="demo1">
				<img src="images/LB_1.jpg">
				<img src="images/LB_2.jpg">
				<img src="images/LB_3.jpg">
				<img src="images/LB_4.jpg">
				<img src="images/LB_5.jpg">
				<img src="images/LB_6.jpg">
				<img src="images/LB_7.jpg">
			</div>
			<div id="demo2"></div>
		</div>
	</div>
	<div class="w1000 shadow">
		<img src="images/shadow.jpg">
	</div>
<?php $this->_endblock(); ?>

<?php $this->_block('scripts'); ?>
<script type="text/javascript">
	var div_width = $("#demo1 img").length * 252;
	$("#demo1,#demo2").css("width",div_width); 
	$("#indemo").css("width",2 * div_width);
	var speed=30;
	var tab=document.getElementById("demo");
	var tab1=document.getElementById("demo1");
	var tab2=document.getElementById("demo2");
	tab2.innerHTML=tab1.innerHTML;
		function Marquee(){
			if(tab2.offsetWidth-tab.scrollLeft<=0)
				tab.scrollLeft-=tab1.offsetWidth
			else{
				tab.scrollLeft++;
			}
		}
	var MyMar=setInterval(Marquee,speed);
	tab.onmouseover=function() {clearInterval(MyMar)};
	tab.onmouseout=function() {MyMar=setInterval(Marquee,speed)};

	$(".fixd span").click(function(){
		if (!$(".fixd ul").is(":visible")) {
			$(".fixd ul").animate({width:"show"});
		}
		else{
			$(".fixd ul").animate({width:"hide"});
		}
	});
</script>

<?php $this->_endblock(); ?>