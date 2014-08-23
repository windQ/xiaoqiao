<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title><?php echo $title?></title>
<link rel="stylesheet" type="text/css" href="css/admin.css">
<style type="text/css">
    table{width: 100%;margin-top: 20px;border-collapse: collapse;}
    tr,td{border:solid 1px;}
    td{text-align: center;font-size: 14px;height: 42px;line-height: 30px;}
    a{text-decoration: none;}
    td input{border:solid 1px #333;color: #666;height: 30px;line-height: 30px;margin: 5px 0px;text-align: center;}
    td a{display: inline-block;width: 60px;border-radius: 4px;background-color: #c40000;color: #FFF;}
    td a.save{background-color: green;}
    label input{border:solid 1px #333;border-radius: 4px;}
    label .add_column{height: 30px;line-height: 30px;width: 200px;}
    label .submit{height: 33px;line-height: 30px;width: 100px;background-color: #C40000;color: #FFF;border-color: #C40000;cursor: pointer;margin: 20px 0px 0px 60px;}
</style>
<script type="text/javascript" src="<?php echo $_BASE_DIR;?>js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
    $(function(){
        $("table td .edit").live("click",function(){
            var column_val = $(this).parent("td").siblings(".column").text();
            $(this).parent("td").siblings(".column").html("<input type='text' value='"+ column_val +"'>");
            $(this).parent("td").html("<a href='#' class='save'>保存</a>");
        });
        $("table td .save").live("click",function(){
            var save_vla = $(this).parent("td").siblings(".column").find("input").val();
            $(this).parent("td").siblings(".column").html(save_vla);
            $(this).parent("td").html("<a href='#' class='edit'>编辑</a>");
        });
    });
</script>
</head>
<body>
<div class="style-wrap addContent">
	<div class="main addTopicWrap">
	<form method="post" enctype="multipart/form-data" action='' name='spForm' id="myform">
    	<input type='hidden' name='mainID' value='839'>
		<input type='hidden' name='tokenKey' value='023a7eeefd87a4147c5'>
    	<div class="title">添加栏目</div>
        <form>
            <label>
                添加栏目：<input type="text" class="add_column"><br/><input class="submit" type="submit" value="添 加">
            </label>
        </form>
        <table cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td width="10%">I D</td>
                <td width="25%">栏目</td>
                <td width="15%">编辑</td>
                <td width="15%">操作</td>
            </tr>
            <tr>
                <td>1</td>
                <td class="column">行业动态</td>
                <td><a class="edit" href="#">编辑</a></td>
                <td><a href="#">删除</a></td>
            </tr>
            <tr>
                <td>1</td>
                <td class="column">aaa</td>
                <td><a class="edit" href="#">编辑</a></td>
                <td><a href="#">删除</a></td>
            </tr>
        </table>
    </form>
    </div>
</div>
</body>
</html>