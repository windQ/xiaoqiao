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
    	
      /**
       * 截取指定字符串,来自于php.net
       * Substring without losing word meaning and
       * tiny words (length 3 by default) are included on the result.
       * "..." is added if result do not reach original string length
       *
       * @param string $str
       * @param integer $length
       * @access public static
       *
       * @return string
       */
      public static function _substr($str, $length = 10, $minword = 3)
      {
          $str = trim($str);
          $sub = '';
          $len = 0;
   
          foreach (explode(' ', $str) as $word)
          {
              $part = (($sub != '') ? ' ' : '') . $word;
              $sub .= $part;
       
              if (strlen($word) > $minword && strlen($sub) > $length)
              {
                  $sub_arr = explode(' ', $sub);
                  if(count($sub_arr) > 1)
                  {
                      //dump($sub_arr);
                      //删除最后一个元素
                      
                      array_pop($sub_arr);
                      $sub = implode(' ',$sub_arr);
                      
                      self::_substr($sub, $length);
                      
                  }else{
                      $list = substr(self::_cutStr($sub, $length), -3);
                      if($list == '...')
                      {
                          $result_str_len = strlen(self::_cutStr($sub, $length));
                          $len1 = $result_str_len - strlen($list);
                          $sub = substr(self::_cutStr($sub, $length),0,$len1);
                      }
                  }
                    
                  break;
              }
          }
          return $sub . ((strlen($sub) < strlen($str)) ? '...' : '');
      }
      
      
      
      /**
       * 根据长度裁剪字符串
       * 
       * @param string $str
       * 
       * @param integer $start = 0 开始 裁剪位置
       * @param integer $end  末尾裁剪位置
       * @param string $chart = 'UTF-8' 字符编码
       * 
       * @access public static
       *
       * @return string
       */
      
      public static function _cutStr($str, $end, $start = 0, $chart = 'UTF-8')
      {
          $str_len = strlen($str);
          
          if($start == 0 && $str_len > $end){
              
              return mb_substr($str, $start, $end, $chart).'...';
              
          }else{
              
              return mb_substr($str, $start, $end, $chart);
              
          }
          
      }
      
      public static function chmodR( $path, $filePerm=0644, $dirPerm=0755 )
	  {
	      // Check if the path exists
	     if( !file_exists( $path ) )
	     {
	         return( false );
	     }
	     // See whether this is a file
	     if(is_file($path))
	     {
	        // Chmod the file with our given filepermissions
	        chmod( $path, $filePerm );
	      // If this is a directory...
	     } elseif( is_dir( $path ) ) {
	         // Then get an array of the contents
	         $foldersAndFiles = scandir( $path );
	         // Remove "." and ".." from the list
	         $entries = array_slice( $foldersAndFiles, 2 );
	         // Parse every result...
	         foreach( $entries as $entry )
	         {
	            // And call this function again recursively, with the same permissions
	            self::chmodR( $path."/".$entry, $filePerm, $dirPerm);
	         }
	         // When we are done with the contents of the directory, we chmod the directory itself
	         chmod($path, $dirPerm);
	      }
	      // Everything seemed to work out well, return TRUE
	      return(TRUE);
	   }
    }

?>