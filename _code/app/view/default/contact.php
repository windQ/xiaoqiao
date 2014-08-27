<?php $this->_extends('_layouts/index_layout'); ?>
<?php $this->_block('title'); ?>联系我们<?php $this->_endblock(); ?>
<?php $this->_block('style'); ?>
<style type="text/css">
.content_left{float: left;width: 270px;}
.content_left ul{display: table;margin: 0px auto;}
.content_left ul li {margin-top:2px;text-align: left;width:240px;background-color: #eee;}
.content_left ul li:hover a{background-color: #F6DBB0;color: #FFF;}
.content_left ul li a{font-size: 14px;color: #5e5e5e;height: 35px;line-height: 35px;display: block;padding-left: 50px;}
.content_left table{margin: 0px auto;color: #5e5e5e;font-size: 13px;}
.content_left p  {margin-left: 37px;color: #5e5e5e;}
.content_right{float: right;width: 660px;color: #333;border:solid 1px #ddd;height: 260px;margin-top: 10px;}
.content{padding-bottom: 40px;}
</style>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=MG4jjsUTxWpdRF1Y9GsolhlC"></script>
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
			<h3><img src="images/lxwm.jpg"></h3>
			<table>
				<tr>
					<td>联系人：</td>
					<td>Jess老师 13818843963</td>
				</tr>
				<tr>
					<td></td>
					<td>Yuki老师 13651731734 </td>
				</tr>
				<tr>
					<td>QQ：</td>
					<td>173591863、2308148183</td>
				</tr>
				<tr>
					<td>微信：</td>
					<td>Jess老师 jies_xfydq</td>
				</tr>
				<tr>
					<td></td>
					<td>Yuki老师 feiyang080816</td>
				</tr>
				<tr>
					<td>Email：</td>
					<td>173591863@qq.com</td>
				</tr>
				<tr>
					<td></td>
					<td>2308148183@qq.com</td>
				</tr>
				<tr>
					<td></td>
					<td>jies_xfydq@hotmail.com </td>
				</tr>
			</table>
			<p>地址：上海市徐汇区漕溪北路737弄汇翠花园1号楼2703室      靠近影业街路口</p>
		</div>
		<div class="content_right" id="allmap">
			
		</div>
	</div>
	
<?php $this->_endblock(); ?>

<?php $this->_block('scripts'); ?>
<script type="text/javascript">
	// 百度地图API功能
	var map = new BMap.Map("allmap");
	var point = new BMap.Point(116.331398,39.897445);
	map.centerAndZoom(point,12);
	// 创建地址解析器实例
	var myGeo = new BMap.Geocoder();
	// 将地址解析结果显示在地图上,并调整地图视野
	myGeo.getPoint("北京市海淀区上地10街", function(point){
		if (point) {
			map.centerAndZoom(point, 20);
			map.addOverlay(new BMap.Marker(point));             
			map.enableScrollWheelZoom();   //启用滚轮放大缩小，默认禁用
			map.enableContinuousZoom();
			map.addControl(new BMap.NavigationControl());               // 添加平移缩放控件
			map.addControl(new BMap.ScaleControl());
			var stCtrl = new BMap.PanoramaControl(); //构造全景控件
			stCtrl.setOffset(new BMap.Size(20, 20));
			map.addControl(stCtrl);//添加全景控件                    // 添加比例尺控件
		}
	}, "北京市");
</script>
<?php $this->_endblock(); ?>