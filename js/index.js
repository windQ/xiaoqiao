	var i = 1;
	var interval;
	var scroll_img = function(){
		if(i >= $(".scroll ul li").length)
		{
			i = 0;
		}
		$(".scroll ul li").eq(i).fadeIn(2000);
		$(".scroll ul li").eq(i-1).fadeOut(2000);
		i++;
	}
$(function(){
	// 首页大图轮播
	var li_length = $(".scroll ul li").length;
	$(".scroll ul li").each(function(i){
		$(this).css("z-index",li_length - i);
	});
	var fun = function(){
		interval = setInterval('scroll_img()',5000);
	}
	fun();
});