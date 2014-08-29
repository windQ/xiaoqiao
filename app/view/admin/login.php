<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>网站管理员登陆</title>
<link href="<?php echo $_BASE_DIR;?>images/skin.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #1D3647;
}
-->
</style>
</head>
<body>
<table width="100%" height="166" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="42" valign="top">
	    <table width="100%" height="42" border="0" cellpadding="0" cellspacing="0" class="login_top_bg">
	      <tr>
	        <td width="1%" height="21">&nbsp;</td>
	        <td height="42">&nbsp;</td>
	        <td width="17%">&nbsp;</td>
	      </tr>
	    </table>
    </td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" height="532" border="0" cellpadding="0" cellspacing="0" class="login_bg">
      <tr>
        <td width="32%" align="right">
        </td>
        <td width="1%" >&nbsp;</td>
        <td width="50%" valign="bottom">
        
        <table width="100%" height="59" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="4%">&nbsp;</td>
              <td width="96%" height="38"><span class="login_txt_bt">登陆信息网后台管理</span></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td height="21">
              <form method = 'post' name = 'login' action = "<?php echo url('admin/login');?>">
	              <table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table211" height="328">
	                  <tr>
	                    <td height="164" colspan="2" align="middle"><form name="myform" action="index.html" method="post">
	                        <table cellSpacing="0" cellPadding="0" width="100%" border="0" height="143" id="table212">
	                          <tr>
	                            <td width="13%" height="38" class="top_hui_text"><span class="login_txt">管理员：&nbsp;&nbsp; </span></td>
	                            <td height="38" colspan="2" class="top_hui_text"><input name="username" class="editbox4" value="" size="20">                            </td>
	                          </tr>
	                          <tr>
	                            <td width="13%" height="35" class="top_hui_text"><span class="login_txt"> 密 码： &nbsp;&nbsp; </span></td>
	                            <td height="35" colspan="2" class="top_hui_text"><input class="editbox4" type="password" size="20" name="password">
	                              <img src="images/luck.gif" width="19" height="18"> </td>
	                          </tr>
	                          <tr>
	                            <td width="13%" height="35" ><span class="login_txt">验证码：</span></td>
	                            <td height="35" colspan="2" class="top_hui_text">
	                                <input class="wenbenkuang" name="imgcode" type="text" value="" />
	                                <img style="margin-bottom:-10px;" src="<?php echo url('default/code'); ?>" border="0" onClick = "change_code(this);" />
	                            </td>
	                          </tr>
	                          <tr>
	                            <td height="35" >&nbsp;</td>
	                            <td width="10%" height="35" ><input name="Submit" type="submit" class="button" id="Submit" value="登 陆" /> </td>
	                            <td width="67%" class="top_hui_text"><input name="cs" type="reset" class="button" id="cs" value="取 消" /></td>
	                          </tr>
	                        </table>
	                        <br>
	                    </form></td>
	                  </tr>
	                  <tr>
	                    <td width="433" height="164" align="right" valign="bottom"><img src="images/login-wel.gif" width="242" height="138"></td>
	                    <td width="57" align="right" valign="bottom">&nbsp;</td>
	                  </tr>
	              </table>
              </form>
              
              </td>
            </tr>
          </table>
          </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="20"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="login-buttom-bg">
      <tr>
        <td align="center"><span class="login-buttom-txt">Copyright &copy; 2009-2010 www.865171.cn</span></td>
      </tr>
    </table></td>
  </tr>
</table>
<script type="text/javascript">
    function change_code( ele )
    {
        ele.src = "<?php echo url('default/code')?>"+'&'+Math.random();
    }
</script>
</body>
</html>