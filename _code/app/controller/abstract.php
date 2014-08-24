<?php

/**
 * 应用程序的公共控制器基础类
 *
 * 可以在这个类中添加方法来完成应用程序控制器共享的功能。
 */
abstract class Controller_Abstract extends QController_Abstract
{
    /**
     * 控制器动作要渲染的数据
     *
     * @var array
     */
    protected $_view = array();

    /**
     * 控制器要使用的视图类
     *
     * @var string
     */
    protected $_view_class = 'QView_Render_PHP';

    /**
     * 控制器要使用的视图
     *
     * @var string
     */
    protected $_viewname = null;

    /**
     * 控制器所属的应用程序
     *
     * @var CommunityApp
     */
    protected $_app;
    
    /**
     * 当前登陆的用户信息
     *
     * @var array | null
     */
    protected $_user = null;
    
    /**
     * 来源url
     * @var string
     */
    protected $_http_referer = null;
    
    /**
     * 构造函数
     */
    function __construct($app)
    {
        parent::__construct();
        $this->_app = $app;
    }
	/**
     * 视图共用变量, 类的继承属性初始化
     *
     * @access protected
     *
     * @return void
     */
    protected function _init()
    {
        $this->_user = $this->_app->currentUser();
        
        $is_login = empty($this->_user) && !isset($this->_user['id']) && $this->_user['id'] < 1 ? false : true;

        //这里定义的视图变量，所有视图都可以访问，只要控制器初始化时调用了该_init()方法，
        //注意在具体action方法中不要定义user视图变量，否者会覆盖该变量
        $this->_view['user'] = $this->_user;
        
        $this->_view['is_admin'] = false;
        
        if ($is_login)
        {
            $this->_current_user = Admin::find( 'id = ?', $this->_user[ 'id' ] )->getOne();
            //再次检查数据库中是否有该用户，没有则设置为未登入
            if( $this->_current_user->id )
            {
                $this->_view[ 'is_admin' ] = true;
            }
            else
            {
                $is_login = false;
            }
        }

        $this->_view['is_login'] = $is_login;

        if (!empty($_SERVER['HTTP_REFERER']))
        {
            $this->_http_referer = $_SERVER['HTTP_REFERER'];
        }
    }

    /**
     * 执行指定的动作
     *
     * @return mixed
     */
    function execute($action_name, array $args = array())
    {
        $action_method = "action{$action_name}";

        // 执行指定的动作方法
        $this->_before_execute();

        #IFDEF DBEUG
        QLog::log('EXECUTE ACTION: '. get_class($this) . '::' . $action_method . '()', QLog::DEBUG);
        #ENDIF

        $response = call_user_func_array(array($this, $action_method), $args);
        $this->_after_execute($response);

        if (is_null($response) && is_array($this->_view))
        {
            // 如果动作没有返回值，并且 $this->view 不为 null，
            // 则假定动作要通过 $this->view 输出数据
            $config = array('view_dir' => $this->_getViewDir());
            $response = new $this->_view_class($config);
            $response->setViewname($this->_getViewName())->assign($this->_view);
            $this->_before_render($response);
        }
        elseif ($response instanceof $this->_view_class)
        {
            $response->assign($this->_view);
            $this->_before_render($response);
        }

        return $response;
    }

    /**
     * 指定的控制器动作未定义时调用
     *
     * @param string $action_name
     */
    function _on_action_not_defined($action_name)
    {
    }

    /**
     * 执行控制器动作之前调用
     */
    protected function _before_execute()
    {
    }

    /**
     * 执行控制器动作之后调用
     *
     * @param mixed $response
     */
    protected function _after_execute(& $response)
    {
    }

    /**
     * 渲染之前调用
     *
     * @param QView_Render_PHP
     */
    protected function _before_render($response)
    {
    }

    /**
     * 准备视图目录
     *
     * @return array
     */
    protected function _getViewDir()
    {
        if ($this->_context->module_name)
        {
            $dir = Q::ini('app_config/MODULE_DIR') . "/{$this->_context->module_name}/view";
        }
        else
        {
            $dir = Q::ini('app_config/APP_DIR') . '/view';
        }

        if ($this->_context->namespace)
        {
            $dir .= "/{$this->_context->namespace}";
        }
        return $dir;
    }

    /**
     * 确定要使用的视图
     *
     * @return string
     */
    protected function _getViewName()
    {
        if ($this->_viewname === false)
        {
            return false;
        }
        $viewname = empty($this->_viewname) ? $this->_context->action_name : $this->_viewname;
        return strtolower("{$this->_context->controller_name}/{$viewname}");
    }

    /**
     * 显示一个提示页面，然后重定向浏览器到新地址
     *
     * @param string $caption
     * @param string $message
     * @param string $url
     * @param int $delay
     * @param string $script
     *
     * @return QView_Render_PHP
     */
    protected function _redirectMessage($caption, $message, $url, $delay = 5, $script = '')
    {
        $config = array('view_dir' => $this->_getViewDir());
        $response = new $this->_view_class($config);
        $response->setViewname('redirect_message');
        $response->assign(array(
            'message_caption'   => $caption,
            'message_body'      => $message,
            'redirect_url'      => $url,
            'redirect_delay'    => $delay,
            'hidden_script'     => $script,
        ));

        return $response;
    }
    
	/**
     * js 警告框跳转
     */
    protected function _redirectAlert($url, $message = '')
    {
    	if( $message == '' )
    	{
    		$response = "<script>window.location.href='" . $url . "';</script>";
    	} else {
        	$response = "<script>alert('" . $message . "'); window.location.href='" . $url . "';</script>";
    	}
        return $response;
    }
}

