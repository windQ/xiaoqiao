<?php 
class Control_Nav extends QUI_Control_Abstract
{
    function render()
    {
        // 从对象注册表中查询 app 对象
        $app = Q::registry('app');
        // 取得当前用户的信息
        $this->_view['current_user'] = $app->currentUser();
        // 渲染视图并返回结果
        return $this->_fetchView(dirname(__FILE__) . '/sidebar_view');
    }
}
?>