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
		$this->_view[ 'column' ] = 'index';
    }
    
    function actionAbout()
    {
    	$this->_view[ 'column' ] = 'about';
    }
    
    function actionNews()
    {
    	$column = intval( $this->_context->column );
    	$sub_id = intval( $this->_context->sub_id );
    	$find_obj = Column::find( 'p_id = ?', $column );
    	switch ( $column )
    	{
    		case '1':
    			//彩妆培训
    			$view_name = 'train';
    		break;
    		
    		case '2':
    			//商业合作
    			$view_name = 'cooperation';
    			$find_obj->limit( 0, 4 );
    		break;
    		
    		case '5':
    			//新闻管理
    			$view_name = 'news';
    			$news_obj = $column_for_data = News::find( '`column` = ?', $column );
    			if( $sub_id != 0 )
    			{
    				$news_obj->where( 'sub_column_id = ?', $sub_id );
    			}
    			$column_for_data = $news_obj->order( 'create_time DESC, id DESC' )->getAll();
    			
    		break;
    		
    		default:
    			exit( 'error' );
    		break;
    	}
    	$sub_column = $find_obj->order( 'sort DESC, id DESC' )->getAll();
    	
    	//每个子栏目对应的新闻---涉及栏目 1,2
    	if(in_array( $column, array( 1, 2 ) ) )
    	{
	    	if( $sub_id != 0 )
	    	{
	    		$column_for_data = array( $sub_column->search( 'id', $sub_id ) );
	    	} else {
	    		$column_for_data = $sub_column;
	    	}
    	}
    	$this->_view[ 'ck_'.$sub_id ] = 'cur';
    	$this->_view[ 'column_for_data' ] = $column_for_data;
    	$this->_view[ 'sub_column' ] = $sub_column;
    	$this->_view[ 'column' ]    = $column;
    	$this->_viewname = $view_name;
    }
    
    function actionNewsdetail()
    {
    	$id = intval( $this->_context->get( 'id' ) );
    	$column = intval( $this->_context->get( 'column' ) );
    	
    	if( $id == 0 || $column == 0 )
    	{
    		return $this->_redirectAlert('/');
    	}
    	$news_detail = News::find( 'id = ?', $id )->getOne();
    	$sub_column = Column::find( 'p_id = ?', $column )->getAll();
    	//上一篇
    	$prev_news = News::find( 'id < ? AND `column` = ? AND sub_column_id = ?', $news_detail->id, $column, $news_detail->sub_column_id )->order( 'create_time DESC, id DESC' )->getOne();
    	$next_news = News::find( 'id > ? AND `column` = ? AND sub_column_id = ?', $news_detail->id, $column, $news_detail->sub_column_id )->order( 'create_time ASC, id ASC' )->getOne();
    	$this->_view[ 'column' ]    = $column;
    	$this->_view[ 'sub_column' ] = $sub_column;
    	$this->_view[ 'news_detail' ]= $news_detail;
    	$this->_view[ 'prev_news' ]= $prev_news;
    	$this->_view[ 'next_news' ]= $next_news;
    }
    
    function actionPhotos()
    {
    	$column = intval( $this->_context-> column );
    	$sub_id = intval( $this->_context->sub_id );
    	$find_obj = Column::find( 'p_id = ?', $column );
    	switch ( $column )
    	{
    		case '3':
    			//新娘跟妆
    			$view_name = 'production';
    		break;
    		
    		case '4':
    			//工作室动态
    			$view_name = 'production';
    		break;
    		
    		case '6':
    			//作品发布
    			$view_name = 'production';
    			
    			
    		break;
    		
    		default:
    			exit( 'error' );
    		break;
    	}
    	$prod_obj = Product::find( '`column` = ?', $column );
    	if( $sub_id != 0 )
    	{
    		$prod_obj->where( 'sub_column_id = ?', $sub_id );
    	}
    	$photos = $prod_obj->order( 'create_time DESC, id DESC' )->getAll();
    	$sub_column = $find_obj->order( 'sort DESC, id DESC' )->getAll();
    	
    	$this->_view[ 'ck_'.$sub_id ] = 'cur';
    	$this->_view[ 'photos' ] = $photos;
    	$this->_view[ 'sub_column' ] = $sub_column;
    	$this->_view[ 'column' ]    = $column;
    	$this->_viewname = $view_name;
    	
    }
    
    function actionPhotoList()
    {
    	$id = intval( $this->_context->get( 'id' ) );
    	$column = intval( $this->_context->get( 'column' ) );
    	$sub_id = intval( $this->_context->get( 'sub_id' ) );
    	
    	if( $id == 0 || $column == 0 )
    	{
    		return $this->_redirectAlert('/');
    	}
    	$photo_detail = Product::find( 'id = ?', $id )->getOne();
    	$sub_column = Column::find( 'p_id = ?', $column )->order( 'sort DESC, id DESC' )->getAll();
    	//上下一篇
    	//$prev_obj = Product::find( 'id < ? AND `column` = ?', $news_detail->id, $column );
    	//$next_obj = Product::find( 'id > ? AND `column` = ?', $news_detail->id, $column );
    	//if( $sub_id != 0 )
    	//{
    	//	$prev_obj->where( 'sub_column_id = ?', $sub_id );
    	//	$next_obj->where( 'sub_column_id = ?', $sub_id );
    	//}
    	//$prev_photo = $prev_obj->order( 'create_time DESC, id DESC' )->getOne();
    	//$next_photo = $next_obj->order( 'create_time ASC, id ASC' )->getOne();
    	$this->_view[ 'ck_'.$sub_id ] = 'cur';
    	$this->_view[ 'column' ]    = $column;
    	$this->_view[ 'sub_column' ] = $sub_column;
    	$this->_view[ 'photo_detail' ]= $photo_detail;
    	//$this->_view[ 'prev_photo' ]= $prev_photo;
    	//$this->_view[ 'next_photo' ]= $prev_photo;
    }
    
    function actionContact()
    {
    	$this->_view[ 'column' ] = 'contact';
    }
    
    function actionTeam()
    {
    	$this->_view[ 'column' ] = 'team';
    }
    
    /**
     * 验证码
     */
    function actionCode()
    {
    	return Helper_ImgCode::create(4, 900, 'simple');
    }
}

