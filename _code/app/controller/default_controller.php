<?php

/**
 * 默认控制器
 */
class Controller_Default extends Controller_Abstract
{
    function actionIndex()
    {
        // 为 $this->_view 指定的值将会传递数据到视图中
		# $this->_view['text'] = 'Hello!';
		echo 'index';
    }
    
    /**
     * 验证码
     */
    function actionCode()
    {
    	return Helper_ImgCode::create(4, 900, 'simple');
    }
}

