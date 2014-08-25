<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" type="text/css" href="<?php echo $_BASE_DIR;?>css/admin.css">
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
    	<div class="title">新娘跟妆图片删除</div>
        <table cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td width="10%">I D</td>
                <td width="25%">栏目</td>
                <td width="45%">标题</td>
                <td width="15%">操作</td>
            </tr>
            <?php foreach( $products as $ls_prod ):;?>
            <tr>
                <td><?php echo $ls_prod->id;?></td>
                <td><?php echo $ls_prod->prod_assoc_sub_column->name?></td>
                <td><?php echo $ls_prod->title;?></td>
                <td>
                	<a href="<?php echo url('admin/photopost',array('column'=>$ls_prod->column,'id'=>$ls_prod->id));?>">编辑</a>
	                <a href="<?php echo url('admin/del',array('flag'=>'product','id'=>$ls_prod->id));?>" onclick = "return confirm( '您确定要删除吗？' )";'>删除</a>
                </td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>
</body>
</html>
