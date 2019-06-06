/*20160215搜索滑动*/
$(function(){
	$('.screen-hd').hide();
	$(window).scroll(function () {
		if ($(window).scrollTop() > 100) {
		   
			$('.screen-hd').fadeIn(400);//当滑动栏向下滑动时，按钮渐现的时间
		} else {
		
			$('.screen-hd').fadeOut(0);//当页面回到顶部第一屏时，按钮渐隐的时间
		}
	});

/*全站--悬浮右侧*/
	$('.guess').scrollToFixed({
		marginTop: $('.small').outerHeight(true) + 60,
		limit: function() {
			var limit = $('.other_item').offset().top ;
			return limit;
		},
		minWidth: 1000,
		zIndex: 999,
		fixed: function() {  },
		dontCheckForPositionFixedSupport: true
	});

/*右侧到位自动隐藏*/
function changeScreen() {
	var itemTop = document.getElementById("other_item").offsetTop;
	if ($(document).scrollTop() > itemTop - 60) {
		$(".guess").hide();
	} else if ($(window).width() < 1200) {
		$(".guess").hide();
	} else {
		$(".guess").show();

	}
}

});
