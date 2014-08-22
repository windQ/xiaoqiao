<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title><?php $this->_block('title'); ?><?php $this->_endblock(); ?></title>

<!-- 公用样式 -->
<link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR?>css/admin_use.css" />
<link href="<?php echo $_BASE_DIR?>images/skin.css" rel="stylesheet" type="text/css" />
<!-- css 样式块 -->
<?php $this->_block('style'); ?>

<?php $this->_endblock(); ?>
</head>
<body>
    
    <div id = "header">
        <img class = 'logo' src="<?php echo $_BASE_DIR?>images/logo.gif" />
    </div>
    
    
	<table width="100%" height="280" border="0" cellpadding="0" cellspacing="0" bgcolor="#EEF2FB">
	  <tr>
	    <td width="182" valign="top"><div id="container">
	      <h1 class="type"><a href="javascript:void(0)">新闻管理</a></h1>
	      <div class="content">
	        <table width="100%" border="0" cellspacing="0" cellpadding="0">
	          <tr>
	            <td><img src="images/menu_topline.gif" width="182" height="5" /></td>
	          </tr>
	        </table>
	        <ul class="MM">
	          <li><a href="news.html" target="main">上传新闻</a></li>
	          <li><a href="news_del.html" target="main">删除新闻</a></li>
	        </ul>
	      </div>
	      <h1 class="type"><a href="javascript:void(0)">新娘跟妆</a></h1>
	      <div class="content">
	        <table width="100%" border="0" cellspacing="0" cellpadding="0">
	          <tr>
	            <td><img src="images/menu_topline.gif" width="182" height="5" /></td>
	          </tr>
	        </table>
	        <ul class="MM">
	          <li><a href="Make-up.html" target="main">上传图片</a></li>
	          <li><a href="Make-up_del.html" target="main">删除图片</a></li>
	        </ul>
	      </div>
	      <h1 class="type"><a href="javascript:void(0)">工作室动态</a></h1>
	      <div class="content">
	        <table width="100%" border="0" cellspacing="0" cellpadding="0">
	          <tr>
	            <td><img src="images/menu_topline.gif" width="182" height="5" /></td>
	          </tr>
	        </table>
	        <ul class="MM">
			  <li><a href="studio.html" target="main">上传图片</a></li>
	          <li><a href="studio_del.html" target="main">删除图片</a></li>
	        </ul>
	      </div>
	      <h1 class="type"><a href="javascript:void(0)">作品发布</a></h1>
	      <div class="content">
	        <table width="100%" border="0" cellspacing="0" cellpadding="0">
	          <tr>
	            <td><img src="images/menu_topline.gif" width="182" height="5" /></td>
	          </tr>
	        </table>
	        <ul class="MM">
	          <li><a href="production.html" target="main">上传图片</a></li>
	          <li><a href="production_del.html" target="main">删除图片</a></li>
	          <li><a href="add_column.html" target="main">添加栏目</a></li>
	        </ul>
	      </div>
	    </div>
	    </td>
	  </tr>
	</table>
    <!-- 主内容 块 -->
    <?php $this->_block('contents'); ?>
  
    <?php $this->_endblock(); ?>
  
  
    <?php $this->_block('javascript'); ?>
    <script type = 'javascript'>
		function logout(){
			if (confirm("您确定要退出控制面板吗？"))
			top.location = "out.asp";
			return false;
		}
		
		function showsubmenu(sid) {
			var whichEl = eval("submenu" + sid);
			var menuTitle = eval("menuTitle" + sid);
			if (whichEl.style.display == "none"){
				eval("submenu" + sid + ".style.display=\"\";");
			}else{
				eval("submenu" + sid + ".style.display=\"none\";");
			}
		}
		
		function showsubmenu(sid) {
			var whichEl = eval("submenu" + sid);
			var menuTitle = eval("menuTitle" + sid);
			if (whichEl.style.display == "none"){
				eval("submenu" + sid + ".style.display=\"\";");
			}else{
				eval("submenu" + sid + ".style.display=\"none\";");
			}
		}

		var contents = document.getElementsByClassName('content');
		var toggles = document.getElementsByClassName('type');
	
		var myAccordion = new fx.Accordion(
			toggles, contents, {opacity: true, duration: 400}
		);
		myAccordion.showThisHideOpen(contents[0]);
	</script>
    <?php $this->_endblock(); ?>
  
</body>
</html>
