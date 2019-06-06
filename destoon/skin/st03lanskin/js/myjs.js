/*栏目固定*/
$.fn.smartFloat = function() {
	var position = function(element) {
		var top = element.position().top, pos = element.css("position");
		$(window).scroll(function() {
			var scrolls = $(this).scrollTop();
			if (scrolls > top) {
				if (window.XMLHttpRequest) {
					element.css({
						position: "fixed",
						top: 0
					});
				} else {
					element.css({
						top: scrolls
					});
				}
			}else {
				element.css({
					position: pos,
					top: top
				});
			}
		});
};
	return $(this).each(function() {
		position($(this));
	});
};


//产品信息标题固定
  function detailTitleHeight() {
  var e = $(".detail-nav li.lishow");
  for (df = [], i = 0; i < e.length; i++) {
    var a = $(e[i]).attr("name");
    if ($("#" + a) && $("#" + a).length > 0) {
      var t = $("#" + a).offset().top;
      df.push([a, t])
    }
  }
}
function detailTitle() {
  var e = $(".detail-nav").offset().top,
  a = ($(window).scrollTop(), $(window).scrollTop() + 55);
  if ($(window).scrollTop() < e - 1 || e < $(".detail-navwarp").offset().top) $(".detail-nav").removeClass("detail-navfloat").css({
    position: "static",
    top: "55px"
  });
  else if (jQuery.browser.msie && "6.0" == jQuery.browser.version) {
    var t = $(window).scrollTop() - $(".detail-navwarp").offset().top;
    $(".detail-nav").addClass("detail-navfloat").css({
      position: "absolute",
      left: "0",
      top: t
    })
  } else $(".detail-nav").addClass("detail-navfloat").css({
    top: "0",
    position: "fixed"
  });
  for (j = 0; j < df.length; j++) {
    if (a <= df[j][1]) {
      if (0 == j) break;
      $(".detail-nav li").removeClass("current"),
      $($(".detail-nav li.lishow").eq(j - 1)).addClass("current");
      break
    }
    if (j == df.length - 1) {
      $(".detail-nav li").removeClass("current"),
      $($(".detail-nav li.lishow").eq(j)).addClass("current");
      break
    }
  }
}
var df = [];
$(document).ready(function() {
  $(".detail-nav") && $(".detail-nav").length > 0 && ($(".detail-nav .detail-navbut").append($(".roduct-button").children("a").clone()), $(".detail-nav li:first").addClass("current"), detailTitleHeight(), detailTitle(), $(window).scroll(function() {
    detailTitleHeight(),
    detailTitle()
  }), $(".detail-nav li.lishow").live("click",
  function() {
    var e = $(this).attr("name");
    if ($("#" + e).length > 0) {
      var a = $("#" + e).offset().top - 50;
      $("html, body").animate({
        scrollTop: a
      },
      0)
    }
  })),
  $(".moreaddress").click(function() {
    $(".detail-nav li:first").trigger("click")
  }),
  $(".to-comment-detail").click(function() {
    $(".detail-nav li.detail-nav-comment").trigger("click")
  })
});

//产品页面多选框判断

 //鼠标经过添加CLASS
	  function hover(obj,subObj) {
	      var oUl = document.getElementById(obj);
	      var aLi = oUl.getElementsByTagName(subObj);

	      for (i = 0; i < aLi.length; i++) {

	          aLi[i].onmouseover = function() {

	              for (var i = 0; i < aLi.length; i++) {
	                  aLi[i].className = "";
	              }
	              this.className = "hover";
	          }
	      }
	      oUl.onmouseout = function() {
	          for (i = 0; i < aLi.length; i++) {
	              aLi[i].className = "";
	          }
	      }
	  }
/*搜索选择*/
function dtmubanModule(i, o) {
	Dd('destoon_search').action = DTPath+'api/search.php';
	Dd('destoon_moduleid').value = i;
	searchid = i;
	var lis = Dd('search_module').getElementsByTagName('li');
	for(var i=0;i<lis.length;i++) {
		lis[i].className = lis[i] == o ? 'orange' : '';
	}
}
