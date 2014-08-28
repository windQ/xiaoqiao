$(function(){
	//点击左右切换
	var li_length = $(".view_box ul li").length;
	var li_width = $(".view_box ul li").width() + 3;
	var ul_width = li_length * li_width;
	$(".view_box ul").css({width:ul_width,"position":"relative","left":0});


	$(".div_box .btn_left").click(function(){
	    var obj_li = $(".view_box ul li:last").clone();
	    obj_li.prependTo($(".view_box ul"));
	    $(".view_box ul li:last").remove();
	    $(".view_box ul").css('left',-li_width);
	    $('.view_box ul').stop().animate({left:0});
	});


	$('.div_box .btn_right').click(function(){
		$('.view_box ul').stop(true,true).animate({left:-li_width},function(){
			var obj_li = $(".view_box ul li").eq(0).clone();
			$(this).css('left',0);
			obj_li.appendTo($(".view_box ul"));
			$(".view_box ul li").eq(0).remove();
		});
	});

	//点击变图
	$(".view_box ul li").live("click",function(){
		$(this).find("img").css("border-color","#000");
		$(this).siblings().find("img").css("border-color","#FFF");
		var origin_img = $(this).find("img").attr("origin-img");
		var middle_img = $(this).find("img").attr("middle-img");
		$(".jqzoom img").attr("src",middle_img);
		$(".jqzoom img").attr("jqimg",origin_img);
	});
});

$(function(){
	$(".list li").click(function(){
		$(this).siblings().removeClass("cur");
		$(this).addClass("cur");
		var show_index = $(this).index();
		$(".cont_right ul").hide();
		$(".cont_right ul").eq(show_index).show();
	});
});