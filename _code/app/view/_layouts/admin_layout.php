<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>管理后台</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<frameset rows="64,*"  frameborder="NO" border="0" framespacing="0">
	<frame src="<?php echo url('admin/top');?>" noresize="noresize" frameborder="NO" name="topFrame" scrolling="no" marginwidth="0" marginheight="0" target="main" />


<frameset cols="200,*"  rows="560,*" id="frame">
	<frame src="<?php echo url('admin/left');?>" name="leftFrame" noresize="noresize" marginwidth="0" marginheight="0" frameborder="0" scrolling="no" target="main" />
	<frame src="<?php echo url('admin/newspost');?>" name="main" marginwidth="0" marginheight="0" frameborder="0" scrolling="auto" target="_self" />
</frameset>
<noframes>
  <body></body>
    </noframes>
</html>
