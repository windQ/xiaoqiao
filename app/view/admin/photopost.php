<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR;?>css/admin.css">
</head>
<body>
<div class="style-wrap addContent">
	<div class="main addTopicWrap">
	<form method="post" enctype="multipart/form-data" action="<?php echo url('admin/photoact')?>" name='spForm' id="myform">
    	<div class="title"><?php echo $column_info[ 'name' ];?>图片上传</div>
        <div class="wrap">
            <ul>
                <li class="tips">
	                <label class="name">图片：</label>
	                <div class = 'images_div'>
	                	<input class="file_upload" class="file" name="upload_img[]" type="file" />
	                </div>
	                <div class = "clear">
		                <span>图片尺寸：800*600</span>
		                <span><input class="add_img" type="button" value="增加图片" /></span>
	                </div>
                </li>
            </ul>
            
            <?php 
                if( isset( $product ) ):;
                    $images = json_decode( $product->images, true );
            ?>
            <ul>
                <?php 
                    foreach( $images as $ls_image ):;
                    $big_img = str_replace( '_thumb' , '', $ls_image );
                ?>
                <li class="clearfix">
                    <a href = "<?php echo $_BASE_DIR.$big_img;?>" target="_blank" title = "查看大图" class="big_view">
                        <img src = "<?php echo $_BASE_DIR.$ls_image;?>" alt = "" />
                    </a>
                    <input type = "hidden" name = "save_img[]" value = "<?php echo $ls_image;?>" />
                    <a href = "javascript:;" class = "del_save_img">删除</a>
                </li>
                <?php endforeach;?>
            </ul>
            
            <?php endif;?>
            <ul class="childTopic">
                <li><label class="name">栏目：</label>
                    <select name = 'sub_column_id'>
                        <option value = '0'>---请选择---</option>
                        <?php
                            foreach( $sub_column as $ls_sub ):;
                            if( $product->sub_column_id == $ls_sub->id )
                            {
                            	$selected = "selected='selected'";
                            } else {
                            	$selected = "";
                            }
                        ?>
                        <option <?php echo $selected;?> value = "<?php echo $ls_sub->id;?>"><?php echo $ls_sub->name;?></option>
                        <?php endforeach;?>
                    </select>
                </li>
                <li><label class="name">标题：</label>
                <input name="title" class="topicText dashedShow" value="<?php echo $product->title?>" type="text" placeholder="">
                </li>
                <li><label class="name">描述：</label><textarea id="editor1" class="dashedShow" name="description" cols="" rows="" placeholder=""><?php echo $product->description;?></textarea></li>
            </ul>
        </div>
        <input type = 'hidden' name = 'column' value = "<?php echo $column_info[ 'id' ];?>" />
        <input type = 'hidden' name = 'id' value = "<?php echo $product->id;?>" />
        <div><input class="submitBt green_btn" type="submit" value="提 交"><input class="submitBt green_btn ylBt" type="reset" value="取 消"></div>
    </form>
    </div>
</div>
<script type="text/javascript" charset="utf-8" src="<?php echo $_BASE_DIR;?>js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo $_BASE_DIR;?>js/admin_fun.js"></script>
</body>
</html>
