<?php $this->_extends('_layouts/index_layout'); ?>
<?php $this->_block('title'); ?>团队介绍<?php $this->_endblock(); ?>
<?php $this->_block('style'); ?>
<style type="text/css">
.content_left{float: left;width: 270px;}
.content_left table{margin: 0px auto;color: #5e5e5e;font-size: 13px;}
.content_left p  {margin-left: 37px;color: #5e5e5e;}
.content_right{float: right;width: 660px;color: #333;overflow: hidden;}
.content_right ul li{height: 325px;width: 660px;background: url(images/user_bg.jpg) no-repeat;}
.content_right ul li dl{float: right;width: 340px;margin-right: 10px;margin-top: 20px;}
.content_right ul li dl dt{color:#c4031d;font-size: 14px;font-weight: bold; }
.content_right ul li dl dd{line-height: 25px;font-size: 13px;}
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
			<img src="images/woman.jpg" style="margin-top:20px;">
		</div>
		<div class="content_right">
			<h3><img src="images/team_info.jpg"></h3>
			<ul>
				<li>
					<dl>
						<dt>Jess老师</dt>
						<dd>ST时尚美学创始人</dd>
						<dd>时尚创意协会总监、彩妆造型总监、企业培训总监。</dd>
						<dd>从事电影化妆,电视化妆,广告化妆,为多台多家知名化妆品公司及销售企业担任 指定化妆造型培训讲师。以及复杂的后台形象化妆,影视特技化妆,拥有资深的专业化妆经验。 Jess老师为多家电影公司担任化妆造型师及参于制作组工作。</dd>
					</dl>
				</li>
				<li>
					<dl>
						<dt>Jess老师</dt>
						<dd>ST时尚美学创始人</dd>
						<dd>时尚创意协会总监、彩妆造型总监、企业培训总监。</dd>
						<dd>从事电影化妆,电视化妆,广告化妆,为多台多家知名化妆品公司及销售企业担任 指定化妆造型培训讲师。以及复杂的后台形象化妆,影视特技化妆,拥有资深的专业化妆经验。 Jess老师为多家电影公司担任化妆造型师及参于制作组工作。</dd>
					</dl>
				</li>
				<li>
					<dl>
						<dt>Jess老师</dt>
						<dd>ST时尚美学创始人</dd>
						<dd>时尚创意协会总监、彩妆造型总监、企业培训总监。</dd>
						<dd>从事电影化妆,电视化妆,广告化妆,为多台多家知名化妆品公司及销售企业担任 指定化妆造型培训讲师。以及复杂的后台形象化妆,影视特技化妆,拥有资深的专业化妆经验。 Jess老师为多家电影公司担任化妆造型师及参于制作组工作。</dd>
					</dl>
				</li>
				<li>
					<dl>
						<dt>Jess老师</dt>
						<dd>ST时尚美学创始人</dd>
						<dd>时尚创意协会总监、彩妆造型总监、企业培训总监。</dd>
						<dd>从事电影化妆,电视化妆,广告化妆,为多台多家知名化妆品公司及销售企业担任 指定化妆造型培训讲师。以及复杂的后台形象化妆,影视特技化妆,拥有资深的专业化妆经验。 Jess老师为多家电影公司担任化妆造型师及参于制作组工作。</dd>
					</dl>
				</li>
			</ul>
		</div>
	</div>
<?php $this->_endblock(); ?>