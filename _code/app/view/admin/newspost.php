<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>
<div class="style-wrap addContent">
	<div class="main addTopicWrap">
	<form method="post" enctype="multipart/form-data" action='/editor/specialTopic_manage_graphic.php?entry=specialTopic_curd' name='spForm' id="myform">
    	<input type='hidden' name='mainID' value='839'>
		<input type='hidden' name='tokenKey' value='023a7eeefd87a4147c5'>
    	<div class="title">发布新闻</div>
        <div class="wrap">
            <ul class="childTopic">
            	<input type='hidden' name='childID[]' value='877'>
                <li><label class="name">标题：</label><input name="child_theme_title[]" class="topicText dashedShow" value="" type="text" placeholder=""></li>
                <li><label class="name">栏目：</label>
                    <select>---请选择---
                        <option>行业动态</option>
                        <option>培训课程</option>
                        <option>商业化妆</option>
                    </select>
                </li>
                <li><label class="name">内容：</label><textarea id="editor1" class="dashedShow" name="child_theme_description[]" cols="" rows="" placeholder=""></textarea></li>
            </ul>
            <ul>
                <input type='hidden' value='839'>
                <li class="tips"><label class="name">图片：</label>
                <div id="queue"></div>
                <input id="file_upload" class="file" name="big_pic" type="file">
                <span>图片尺寸：800*600</span></li>
            </ul>
        </div>
        <div><input class="submitBt green_btn" type="submit" value="提 交" onclick='return checkForm();'><input class="submitBt green_btn ylBt" type="button" value="取 消"></div>
    </form>
    </div>
</div>
</body>
</html>
