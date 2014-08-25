/**
 * 管理后台使用js
 */

var checkForm = function()
{
	/**
	 * 取出文本编辑器的内容
	 */
	var contents = ue.getContent();
	if( contents == '' )
	{
		alert( '内容不能为空' );
		return false;
	}
	return true;
}


$( function(){
	$( '.add_img' ).click( function(){
		var file_input = '<input class="file_upload" class="file" name="upload_img[]" type="file" /><a class="a_del" href="javascript:;" title="删除">x</a>';
		$( '.images_div' ).append( file_input );
	});
	
	$( '.images_div' ).on( 'click', '.a_del', function(){
		$( this ).prev( 'input' ).remove();
		$( this ).remove();
		
	});
	
	$( '.del_save_img' ).click( function(){
		if( confirm( '您确定要删除此图片?' ) )
		{
			$( this ).closest( 'li' ).remove();
		}
		
	})
});