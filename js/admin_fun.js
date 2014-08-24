/**
 * 管理后台使用js
 */
var ue = UE.getEditor('editor');

var checkForm = function()
{
	/**
	 * 取出文本编辑器的内容
	 */
	var contents = UE.getEditor('editor').getContent();
	if( contents == '' )
	{
		alert( '内容不能为空' );
		return false;
	}
	return true;
}




$( function(){
	
});