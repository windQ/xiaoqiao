<?php $this->_extends('_layouts/index_layout'); ?>
<?php $this->_block('title'); ?>关于我们<?php $this->_endblock(); ?>
<?php $this->_block('style'); ?>
<style type="text/css">
.content_left{float: left;width: 270px;}
.content_left ul{display: table;margin: 0px auto;}
.content_left ul li {margin-top:2px;text-align: left;width:240px;background-color: #eee;}
.content_left ul li:hover a{background-color: #F6DBB0;color: #FFF;}
.content_left ul li a{font-size: 14px;color: #5e5e5e;height: 35px;line-height: 35px;display: block;padding-left: 50px;}
.content_left table{margin: 0px auto;color: #5e5e5e;font-size: 13px;}
.content_left p  {margin-left: 37px;color: #5e5e5e;}
.content_right{float: right;width: 660px;padding: 10px;color: #333;}
.content_right p{text-indent: 25px;line-height: 25px;font-size: 13px;}
.content_right p.tc{padding: 10px;background-color: #eee;border: dashed 1px #ddd;}
.content_right h2{color: #FF2233;font-size: 14px;height: 40px;line-height: 40px;text-indent: 2em;font-weight: 700;}
.content_right .yh{border:solid 2px #ddd;padding: 10px;margin-top: 10px;}
.content_right .yh h2{text-indent: 0;}
.content_right .yh ul li{margin-top: 5px;line-height: 25px;font-size: 13px;}
.content_right .yh ul li span{font-weight: bold;color: #000;}
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
			<p class="tc">ST彩妆造型长期致力于影视媒体，舞台媒体，平面媒体广告和形象设计等诸多领域，承接各类影视剧，电影，微电影，大型会展，演出，会议，高档新娘跟妆及众多公益活动，和全上海近百家知名影视，广告，婚庆，美容以及各类广告商长期合作。ST彩妆将会在学员学习期间安排大量实习和实践机会(享受实习津贴)，直接面对新娘、模特、演员等。优秀毕业学员可推荐于ST时尚美学签约，加入ST彩妆一站式造型师服务团队。</p>
			<h2>概况</h2>
			<p>上海ST化妆造型彩妆培训工作室是目前国内化妆学校中首家且全日制一对一资深讲师授课、采用国际标准严格教学的上海化妆培训工作室，坐落于上海的时尚繁华中心——上海体育馆。ST已和多家艺术职业专门形成了紧密的教学合作关系，多年来不断进修学习并参加各种国际时尚大赛，是一所以化妆为主导专业的专业性化妆培训工作室。</p>
			<p>ST以自身的优势将各个国家的时尚潮流带入了中国，并在上海结合中国现代潮流元素，形成了具有中、外特色的ST形象风格。多年来向各个时尚市场输送了大批的优秀化妆师，受到业界一致好评，成为了一所真正具备专业影响力的化妆培训工作室。</p>
			<p>随着欧美时尚，日韩时尚被中国民众接受并追求，ST便成为了众多渴望学习当前最时尚、最潮流化妆技术的学生最渴望进入的专业化妆培训工作室，近年来招生量名列前茅。ST拥有数十名中、资深讲师，采用国际标准化教学方法和教学理念授课，学生毕业可考取专业化妆师资格证书。ST不但为学生们准备精彩丰富的多媒体理论课程，还有众多的项目实践机会，让学生们在毕业的时候就已经具备一个专业化妆师的精湛技艺，更是国内知名专业指导化妆师服务标准的化妆培训工作室。</p>
			<h2>ST理念</h2>
			<p class="tc">上海ST彩妆造型培训工作室自建设初就秉承“责任办学，品质授课”的办学理念发展至今，以学员为本重视质量教育，授课老师也以“追求卓越，精益求精”的授课态度著称。自办学伊始，本校朝着成为化妆培训行业第一品牌的愿景不断前进，从不停止加强对师资队伍的建设和教学品质的改善，创设实践性教学发展平台，使学生在实践历练中走向成功，体现自身价值。为美容化妆产业提供更多优秀化妆造型师是ST的使命。</p>
			<h2>ST承诺</h2>
			<p>ST彩妆造型长期致力于平面媒体广告和形象设计等诸多领域，承接大型会展，演出，高档新娘跟妆及公益活动，和全上海近百家知名婚庆影楼以及广告商长期合作。ST彩妆将会在学员学习期间安排大量实习和实践机会(享受实习津贴)，直接面对新娘、模特、演员等。优秀毕业学员可推荐于ST彩妆签约，加入ST彩妆一站式造型师服务团队</p>
			<h2>ST优势</h2>
			<p>师资雄厚——ST各专业聘用多位权威教师任教，确保教学质量;</p>
			<p>多样开班——部分专业开设早晚班、周末班、业余班等有效缓解工学矛盾;</p>
			<p>教学环境——温馨舒适，配备多层次多规格专用设备;</p>
			<p>教学模式——打破传统教学理念，一对一指导，实践和理论相结合的教学模式，确保毕业学员的实际动手能力适应用人单位的需求。</p>
			<h2>ST产品：</h2>
			<p>彩妆的化妆师产品均采用植村秀、BOBBI BRROWN、BENEFIT、M.A.C、MAKE UP FOR EVER、德国面具、雅诗兰黛、香奈儿、DIOR、资生堂、RMK、YSL、HR、office、BH、KATE、欧莱雅、美宝莲等权威彩妆品牌。造型所用饰品均来自品牌订做。进一步体现了我们推崇高品质的VIP服务理念。</p>
			<p>ST彩妆与相关媒体，时尚杂志均有广泛深入的合作！并被多家媒体跟踪报导。</p>
			<h2>选择化妆行业的理由：</h2>
			<p>很多人对目前的化妆行业并不了解，特别是年龄大点的人，认为和美容美发差不多的，其实现在的人越来越重视自己的仪表了，很多年轻的女孩已经意识到出门化个淡妆是种礼仪，对别人种种的表现。其实在日韩等国家大部分女子都有出门化妆的习惯，包括40几岁的中年女子还会带着假睫毛出门呢！可想而知在国外化妆是多么的普及！化妆师在欧洲，日韩等国家无论受尊重度还是待遇都是极高的，也是目前国内的化妆行业望尘莫及的，发展需要过程！就像十年前心理咨询行业一样，化妆行业需要精英们的加入而崛起！</p>
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
	</div>
	
<?php $this->_endblock(); ?>