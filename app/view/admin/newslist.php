<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" type="text/css" href="css/admin.css">
<style type="text/css">
    table{width: 100%;margin-top: 20px;}
    tr,td{border:solid 1px;}
    td{text-align: center;font-size: 14px;}
    a{text-decoration: none;}
</style>
</head>
<body>
<div class="style-wrap addContent">
	<div class="main addTopicWrap">
    	<div class="title"><?php echo $column_info[ 'name' ];?></div>
        <table cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td width="10%">I D</td>
                <td width="25%">栏目</td>
                <td width="45%">标题</td>
                <td width="15%">操作</td>
            </tr>
            <?php foreach( $news as $ls_news ):;?>
            <tr>
                <td><?php echo $ls_news->id;?></td>
                <td><?php echo $ls_news->news_assoc_sub_column->name;?></td>
                <td><?php echo $ls_news->title;?></td>
                <td>
	                <a href="<?php echo url('admin/newspost',array('column'=>$ls_news->column,'id'=>$ls_news->id));?>">编辑</a>
	                <a href="<?php echo url('admin/del',array('flag'=>'news','id'=>$ls_news->id));?>" onclick = "return confirm( '您确定要删除吗？' )";'>删除</a>
                </td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>
</body>
</html>
