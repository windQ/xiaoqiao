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
		$_POST = array_map( 'trim' , $_POST );
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
		
		if( isset( $_FILES[ 'cover' ] ) )
		{
			if( $_FILES[ 'cover' ][ 'error' ] != 0 )
			{
				return $this->_redirectAlert( $this->_http_referer, "上传失败" );
			}
			//上传封面图
			$uploader = new Helper_Uploader_File( $_FILES[ 'cover' ], 'cover' );
			//判断文件类型
			$allowed_types = Q::ini( 'appini/img_allowed_types' );
			$upload_path   = Q::ini( 'appini/cover_upload_path' );
			if( !$uploader->isValid( $allowed_types ) )
			{
				return $this->_redirectAlert( $this->_http_referer, "图片格式错误\n请上传格式为{$allowed_types}的图片" );
			}
			$extname = $uploader->extname();
			$upload_path .= date( 'Ymd' ).DS;
			if( !is_dir( $upload_path ) )
			{
				mkdir( $upload_path, true, 0777 );
			}
			
			$upload_file = $upload_path.$sub_column.'_'.uniqid( date( 'YmdHis' ) ).'.'.$extname;
			//移动文件 到指定目录
			$uploader->move( $upload_file );
			$cover = $upload_file;
			unset( $uploader );
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
			throw $ex;exit();
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
		$column_info = array( 'id' => $column, 'name' => $columns[ $column ] );
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
	 * 上传图片页面
	 * 图片分成大中小三份，
	 * 大图用作局部放大
	 * 中图查看，
	 * 小图列表
	 */
	function actionPhotoPost()
	{
		$column = intval( $this->_context->column );
		$id = intval( $this->_context->id );
		$columns = Q::ini( 'appini/columns' );
		if( $column == 0 || !isset( $columns[ $column ] ) )
		{
			return $this->_redirectAlert( url( 'admin/index' ) );
		}
		
		if( $id != 0 )
		{
			$product = Product::find( 'id = ?', $id )->getOne();
			$this->_view[ 'product' ] = $product;
		}
		
		$sub_column = Column::find( 'p_id = ?', $column )->getAll();
		$column_info = array( 'id' => $column, 'name' => $columns[ $column ] );
		$this->_view[ 'column_info' ] = $column_info;
		$this->_view[ 'sub_column' ] = $sub_column;
		
	}
	
	/**
	 * 处理图片上传更新
	 */
	function actionPhotoAct()
	{
		$id            = intval( $this->_context->id );
		$title         = $this->_context->title;
		$description   = $this->_context->description;
		$sub_column_id = intval( $this->_context->sub_column_id );
		$column        = intval( $this->_context->column );
	    $save_img      = $this->_context->save_img;
	    $save_img      = is_array( $save_img ) ? $save_img : array();
		if( $title == '' || $sub_column_id == 0 || $column == 0 )
		{
			return $this->_redirectAlert( $this->_http_referer, '请输入正确的内容' );
		}
		try{
			
			if( isset( $_FILES[ 'upload_img' ] ) )
			{
				//上传图片
				$up_all_img = array();
				$photo_upload_path = Q::ini( 'appini/photo_upload_path' );
				$allowed_types = Q::ini( 'appini/img_allowed_types' );
				$thumb_size = Q::ini( 'appini/photo_size/thumb' );
				$middle_size= Q::ini( 'appini/photo_size/middle' );
				
				//文件名---部分
				$photo_upload_path.= date( 'Ymd' ).DS;
				if( !is_dir( $photo_upload_path ) )
				{
					mkdir( $photo_upload_path, true, 0777 );
				}
				$upload_obj = new Helper_Uploader();
				$up_files   = $upload_obj->allFiles(); 
				foreach( $up_files as $up_file )
				{
					//判断格式
					if( !$up_file->isValid( $allowed_types ) )
					{
						return $this->_redirectAlert( $this->_http_referer, "图片格式错误\n请上传格式为{$allowed_types}的图片" );
					}
					$extname = $up_file->extname();
					
					//大图名
					$photo_file_name = $column.'_'.uniqid( date( 'YmdHis' ) );
					//大图路径
					$photo_file = $photo_upload_path.$photo_file_name.'.'.$extname;
					//缩略小图路径
					$photo_thumb_file = $photo_upload_path.$photo_file_name.'_thumb.'.$extname;
					//中图路径
					$photo_middle_file = $photo_upload_path.$photo_file_name.'_middle.'.$extname;
					
					//上传大图
					$up_file->move( $photo_file );
					
					//生成缩略图
					$image_thumb = Helper_Image::createFromFile( $photo_file, $extname );
					$image_middle= Helper_Image::createFromFile( $photo_file, $extname );
					$image_thumb->crop( $thumb_size[ 'width' ], $thumb_size[ 'height' ], array('fullimage' => true) );
					$image_middle->crop( $middle_size[ 'width' ], $middle_size[ 'height' ], array('fullimage' => true) );
					$image_thumb->saveAsJpeg( $photo_thumb_file );
					$image_middle->saveAsJpeg( $photo_middle_file );
					$up_all_img[] = $photo_thumb_file;
					unset( $image_thumb );
					unset( $image_middle );
				}
				unset( $upload_obj );
			}
			
			$up_all_img = array_merge( $save_img, $up_all_img );
			
			//插入数据库
			$product_data = array(
			    'id' => $id,
			    'title' => $title,
			    'description' => $description,
			    'images'      => json_encode( $up_all_img ),
			    'column'      => $column,
			    'sub_column_id'=>$sub_column_id
			);
			
			$product_obj = new Product( $product_data );
			
			if( $id != 0 )
			{
				$product_obj->changePropForce( 'id', $id );
			}
			
			$product_obj->save();
			
		} catch ( Exception $ex ) {
			throw $ex;
		}
		
		return $this->_redirectAlert( url( 'admin/photolist', array( 'column' => $column ) ) );
	}
	
	function actionPhotoList()
	{
		$column = intval( $this->_context->column );
		if( $column == 0 )
		{
			return $this->_redirectAlert( url( 'admin/index' ) );
		}
		
		$products = Product::find( '`column` = ?', $column )->getAll();
		$this->_view[ 'products' ] = $products;
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
				
				case 'product':
					$del_obj = Product::meta();
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


