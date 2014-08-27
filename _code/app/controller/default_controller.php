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
    	
    	switch ( $column )
    	{
    		case '1':
    			//彩妆培训
    			$view_name = 'train';
    		break;
    		
    		case '2':
    			//商业合作
    			$view_name = '';
    		break;
    		
    		case '5':
    			//新闻管理
    			$view_name = '';
    		break;
    		
    		default:
    			exit( 'error' );
    		break;
    	}
    	
    	$sub_column = Column::find( 'p_id = ?', $column )->getAll();
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
    	$prev_news = News::find( 'id < ?', $news_detail->id )->order( 'create_time DESC, id DESC' )->getOne();
    	$next_news = News::find( 'id > ?', $news_detail->id )->order( 'create_time ASC, id ASC' )->getOne();
    	$this->_view[ 'column' ]    = $column;
    	$this->_view[ 'sub_column' ] = $sub_column;
    	$this->_view[ 'news_detail' ]= $news_detail;
    	$this->_view[ 'prev_news' ]= $prev_news;
    	$this->_view[ 'next_news' ]= $next_news;
    }
    
    function actionPhotos()
    {
    	$column = intval( $this->_context-> column );
    	$this->_view[ 'column' ] = 'column_'.$column;
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

