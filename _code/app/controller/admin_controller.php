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
        
    }

	function actionIndex()
	{
		if( is_null( $this->_user ) )
        {
        	return $this->_redirectAlert( url( 'admin/login' ) );
        }
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
		$column = intval( $this->_context->column );
		$id     = intval( $this->_context->id );
		if( $column == 0 )
		{
			return $this->_redirectAlert( 'admin/index' );
		}
		
		if( $id != 0 )
		{
			$news = News::find( 'id = ?', $id )->getOne();
			$this->_view[ 'news' ] = $news;
		}
		
		$sub_column = Column::find( 'p_id = ?', $column )->getAll();
		
		$this->_view[ 'column' ] = $column;
		$this->_view[ 'sub_column' ] = $sub_column;
		
	}
	
	function actionNewsAct()
	{
		$id         = intval( $this->_context->id );
		$title      = $this->_context->title;
		$cover      = $this->_context->cover;
		$column     = intval( $this->_context->column );
		$sub_column = intval( $this->_context->sub_clomun );
		$contents   = $this->_context->contents;
		
		if( $title == '' || $column == 0 || $sub_column == 0 || $contents == '' )
		{
			return $this->_redirectAlert( $this->_http_referer, '请输入正确的内容' );
		}
		
		try{
			$new_data = array(
			    'id'         => $id,
			    'title'      => $title,
			    'cover'      => $cover,
			    'contents'   => $contents,
			    'column'     => $column,
			    'sub_column_id' => $sub_column
			);
			
			$new_obj = new News( $new_data );
			if( $id != 0 )
			{
				$new_obj->changePropForce( 'id', $id );
			}
			$new_obj->save();
			return $this->_redirectAlert( url( 'admin/NewsList', array( 'column' => $column ) ), '保存成功' );
		} catch ( Exception $ex ) {
			return $this->_redirectAlert( $this->_http_referer, '操作失败' );
		}
	}
	
	/**
	 * 新列表
	 */
	function actionNewsList()
	{
		$column = intval( $this->_context->column );
		$page = intval( $this->_context->page );
		$page_size = Q::ini('appini/page_size');
		$columns   = Q::ini('appini/columns');
		if ( $column == 0 || !isset( $columns[ $column ] ) )
		{
			return $this->_redirectAlert( url( 'admin/index' ) );
		}
		
		$page = $page == 0 ? 1 : $page;
		$offset = ( $page - 1 ) * $page_size;
		$news = News::find( '`column` = ?', $column )->limit( $offset, $page_size )->getAll();
		$column_info = array( $column => $columns[ $column ] );
		$this->_view[ 'column_info' ] = $column_info;
		$this->_view[ 'news' ] = $news;
		
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
			$ret = array( 'status' => 'failed', 'msg' => '操作失败', 'flag' => '' );
			try{
				$column_name = trim( $this->_context->column_name );
				$column_id   = intval( $this->_context->clomun_id );
				$check = Column::find( 'name = ? AND p_id = ?', $column_name, $column );
				if( $column_id > 0 )
				{
					$check->where( 'id != ?', $column_id );
				}
				$check = $check->getOne();
				if( $check->id > 0 )
				{
					//添加
					$ret[ 'flag' ] = 'exists';
					throw new Exception( '子栏目已存在' );
				}
				
				//添加或修改记录
				$column_data= array( 'id' => $column_id, 'name' => $column_name, 'p_id' => $column );
				$column_obj = new Column( $column_data );
				if( $column_id != 0 )
				{
					//update
					$column_obj->changePropForce( 'id', $column_id );
					$ret[ 'msg' ] = '修改成功';
					$ret[ 'flag' ] = 'edit';
				} else {
				    $ret[ 'msg' ] = '添加成功';
				    $ret[ 'flag' ] = 'add';
				}
				$column_obj->save();
				$ret[ 'status' ] = 'success';
			} catch ( Exception $ex ) {
				$ret[ 'msg' ] = $ex->getMessage();
				$ret[ 'flag' ] = 'exception';
			}
			exit( json_encode( $ret ) );
		}
		
		//取出该栏目下的所有子分类
		$sub_column = Column::find( 'p_id = ?', $column )->getAll();
		$this->_view[ 'sub_column' ] = $sub_column;
		$this->_view[ 'column' ] = $column;
		$this->_view[ 'title' ] = '添加子栏目';
	}
	
	/**
	 * 删除除非模型定义，一般都是关联删除
	 */
	function actionDel()
	{
		try{
			$flag = $this->_context->flag;
			$id   = intval( $this->_context->id );
			if( empty( $flag ) || empty( $id ) )
			{
				throw new Exception( '删除失败' );
			}
			
			switch( $flag )
			{
				case 'column':
					$del_obj = Column::meta();
				break;
				
				case 'news':
					$del_obj = News::meta();
				break;
			}
			
			$del_obj->destroyWhere( 'id = ?', $id );
			return $this->_redirectAlert( $this->_http_referer, '删除成功' );
		} catch ( Exception $ex ) {
			return $this->_redirectAlert( $this->_http_referer, $ex->getMessage() );
		}
	}
	
	function actionTop()
	{
		
	}
	
	function actionLeft()
	{
		
	}
}


