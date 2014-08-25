<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR; ?>css/admin.css" />
</head>
<body>
<div class="style-wrap addContent">
	<div class="main addTopicWrap">
	<form method="post" action = "<?php echo url('admin/newsact');?>" enctype="multipart/form-data" id="myform">
    	<div class="title">上传新闻</div>
        <div class="wrap">
            <ul class="childTopic">
                <li><label class="name">标题：</label>
                	<input name="title" class="topicText dashedShow" value="<?php echo $news->title;?>" type="text" />
                </li>
                <li><label class="name">栏目：</label>
                    <select name = 'sub_clomun'>
                        <option value = '0'>---请选择---</option>
                        <?php foreach( $sub_column as $sub_ls ):;
                            $sub_column = $news->sub_column_id;
                            if( $sub_column == $sub_ls->id )
                            {
                            	$select = "selected='selected'";
                            } else {
                            	$select = "";
                            }
                        ?>
                        <option <?php echo $select;?> value = '<?php echo $sub_ls->id?>'><?php echo $sub_ls->name?></option>
                        <?php endforeach;?>
                    </select>
                </li>
                <?php /*商业合作栏目*/if( $column == 2 ):;?>
                <li>
	                <label class="name">封面图：</label>
	                <input type = "file" name = 'cover' value = '' />
                </li>
                <?php if( $news->cover != '' ):;?>
                <li>
                <label class="name">&nbsp;</label>
	                <img src = "<?php echo $_BASE_DIR.$news->cover?>" alt = '封面图' />
                </li>
                <?php endif;?>
                
                <?php endif;?>
                <li><label class="name">内容：</label>
                <script id="editor" style="width:1024px;height:500px;"><?php echo $news->contents;?></script>
                </li>
            </ul>
        </div>
        <div>
            <input type = 'hidden' name = 'id' value = '<?php echo $news->id;?>' />
            <input type = 'hidden' name = 'column' value = '<?php echo $column;?>' />
	        <input class="submitBt green_btn" type="submit" value="提 交" onclick='return checkForm();' />
	        <input class="submitBt green_btn ylBt" type="button" value="取 消" />
        </div>
    </form>
    </div>
</div>
<script type="text/javascript" charset="utf-8" src="<?php echo $_BASE_DIR;?>js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo $_BASE_DIR;?>js/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="<?php echo $_BASE_DIR;?>js/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo $_BASE_DIR;?>js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo $_BASE_DIR;?>js/admin_fun.js"></script>
<script type="text/javascript">
var ue = UE.getEditor('editor');
</script>
</body>
</html>
