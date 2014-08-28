<?php $this->_extends('_layouts/index_layout'); ?>
<?php $this->_block('title'); ?>商业合作<?php $this->_endblock(); ?>
<?php $this->_block('style'); ?>
<style type="text/css">
.cont dl dd{width: 165px;height: 360px;border:solid 1px #ddd;float: left;margin-left: 40px;padding:10px;margin-bottom: 10px;}
.cont dl dd span{color: #ff2233;height: 30px;line-height: 30px;display: block;font-weight: bold;}
.cont dl dd p{color: #5e5e5e;line-height: 25px;margin: 12px 0px;}
.cont dl dd a{display: block;width: 80px;height: 30px;line-height: 30px;text-align: center;background-color: #eee;color: #c10023;}
.cont dl dd a:hover{background-color: green;color: #FFF;}

.yh{border:solid 2px #ddd;padding: 10px;margin-top: 10px;color: #5e5e5e;margin: 0px 40px;padding-bottom: 40px;}
.yh h2{color: #FF2233;font-size: 14px;height: 40px;line-height: 40px;font-weight: 700;border-bottom: dashed 1px #ddd;}
.yh ul li{margin-top: 5px;line-height: 25px;font-size: 13px;}
.yh ul li span{font-weight: bold;}
</style>
<?php $this->_endblock(); ?>
<?php $this->_block('contents'); ?>

    <!-- 联系方式 -->
	<?php $this->_element('contact'); ?>

	<div class="w1000 cont">
		<h3><img src="images/cooperation.jpg"></h3>
		<dl class="clearfix cooperation_dl">
			<?php foreach( $column_for_data as $ls_sub ):;?>
			<dd>
				<span><?php echo $ls_sub->name;?></span>
				<img src="<?php echo $_BASE_DIR.$ls_sub->get_news->cover;?>">
				<p><?php echo $ls_sub->get_news->get_summary;?></p>
				<a href="<?php echo url('/newsdetail',array('id'=>$ls_sub->get_news->id,'column'=>$column));?>">查看详情</a>
			</dd>
			<?php endforeach;?>
		</dl>
		<div class="yh">
			<h2>ST承接项目</h2>
			<ul>
				<li><span>1.影视剧形象设计服务</span>（电影，电视剧，微电影等剧组的形象设计）,价格面议。</li>
				<li><span>2.舞台表演形象设计</span>（T台秀场，舞台演出，文艺汇演，庆典晚会，时装发布会，车展，会展，年会表演，会议演出）价格面议。</li>
				<li><span>3.广告形象设计</span>（服装广告，化妆品广告，珠宝广告，视频广告，杂志封面广告，电子品牌营销广告等商业广告）价格面议。</li>
				<li><span>4.新娘形象设计服务</span>（摄影新娘形象设计，当日新娘形象设计，新娘礼服形象设计等）价格面议。</li>
				<li><span>5.个人生活形象设计服务</span>（个人写真形象设计，模特形象设计，主持人形象设计，职业形象设计，面试形象设计，晚宴形象设计，各类Party形象设计，个人日常妆形象设计，家庭成员生活写真形象设计等）价格面议。</li>
				<li><span>6.公益性形象设计活动</span>（学校公益活动，社区文化公益活动，社区敬老院公益活动，边远山区公益性活动，残障性儿童公益活动，慈善捐赠性公益活动）。</li>
				<li>ST时尚美学团队为承接项目提供的便捷服务：（ST资深时尚彩妆大师，摄影，摄像，司仪，服饰道具，婚礼策划，舞台策划，会议策划等一站式ST时尚美学精英团队服务。）</li>
			</ul>
		</div>
	</div>
<?php $this->_endblock(); ?>