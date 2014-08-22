<?php
// $Id$

/**
 * Controller_Admin 控制器
 */
class Controller_Admin extends Controller_Abstract
{

	function actionIndex()
	{
        // 为 $this->_view 指定的值将会传递数据到视图中
		# $this->_view['text'] = 'Hello!';
		
		$this->_view[ 'title' ] = '管理后台';
	}
}


