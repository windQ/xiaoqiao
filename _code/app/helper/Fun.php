<?php
    /**
     * 工具帮助类
     * @author Administrator
     *
     */
    class Helper_Fun {
    	
    	/**
    	 * 去除uedit插入的分页标识
    	 */
    	static function remove_page_break( $contents )
    	{
    		return str_replace( '_ueditor_page_break_tag_' , '', $contents );
    	}
    }

?>