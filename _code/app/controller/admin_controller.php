<?php
// $Id$

/**
 * Controller_Admin 控制器
 */
class Controller_Admin extends Controller_Abstract
{
	function __construct($app)
    {
        parent::__construct($app);
        $this->_init();
        if( is_null( $this->_user ) )
        {
        	return $this->_redirectAlert( url( 'admin/login' ) );
        }
    }

	function actionIndex()
	{
	}
	
	/**
	 * 登录
	 */
	function actionLogin()
	{
		/**
		 * 检测登录
		 */
		if( $this->_context->isPOST() )
		{
			//判断验证码
			if( !Helper_ImgCode::isValid( $this->_context->imgcode ) )
			{
				return $this->_redirectAlert( url( 'admin/login' ), '请输入正确的验证码' );
			}
			
			$name = $this->_context->username;
			$password = $this->_context->password;
			
			$admin = Admin::find( 'name = ? AND password = ?', $name, md5( $password ) )->asArray()->getOne();
			if( $admin === false )
			{
				return $this->_redirectAlert( url( 'admin/login' ), '用户名或密码错误' );
			}
			//写入session
			$this->_app->changeCurrentUser( $admin, $admin[ 'roles' ] );
			return $this->_redirectAlert( url( 'admin/index' ) );
			
		}
	}
	
	/**
	 * 登出
	 */
	function actionLogout()
	{
		
	}
	
	/**
	 * 添加新闻
	 */
	function actionNewspost()
	{
		
	}
	
	/**
	 * 新列表
	 */
	function actionNewsList()
	{
		
	}
	
	/**
	 * 添加子栏目
	 */
	function actionAddcolumn()
	{
		$column = intval( $this->_context->column );
		$is_ajax = $this->_context->isAJAX();
		if( $column == 0 )
		{
			if( $is_ajax )
			{
				exit( json_encode( array( 'status' => 'failure', 'msg' => '请选择正确的栏目', 'flag' => 'column' ) ) );
			}
			return $this->_redirectAlert( url( 'admin/index' ) );
		}
		
		//添加子栏目
		if( $is_ajax )
		{
			$column_name = $this->_context->column_name;
			$check = Column::find( 'name = ? AND p_id = ?', $column_name, $column )->getOne();
			if( $check->id )
			{
				exit( json_encode( array( 'status' => 'failure', 'msg' => '子栏目已存在', 'flag' => 'exists' ) ) );
			}
			
		}
		
		
		
		$this->_view[ 'column' ] = $column;
		$this->_view[ 'title' ] = '添加子栏目';
	}
	
	function actionTop()
	{
		
	}
	
	function actionLeft()
	{
		
	}
}


