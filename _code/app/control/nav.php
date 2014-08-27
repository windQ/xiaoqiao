<?php 
class Control_Nav extends QUI_Control_Abstract
{
    function render()
    {
    	$column = $this->_attrs[ 'column' ];
    	$this->_view[ 'column_'.$column ] = 'cur';
        // 渲染视图并返回结果
        return $this->_fetchView(dirname(__FILE__) . '/view/nav');
    }
}
?>