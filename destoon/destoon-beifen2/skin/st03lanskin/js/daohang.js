//右则导航收展效果
$(document).ready(function() {
 
 $("#fn_down_up,#fn_up").click(function(){
$("#fn_body").slideToggle("fast",function(){
if($("#fn_body").css("display")=="none"){
$("#fn_up").css({backgroundPosition:"center -18px"});
}else{
$("#fn_up").css({backgroundPosition:"center -38px"});
}
});
});
$(".fn_body .hang").click(function(){
var href = $(this).attr("href");
var pos = $(href).offset().top;
$(this).addClass("cur").siblings().removeClass("cur"); 
 $("html,body").animate({scrollTop: pos},300);
});
function changelf(){
var topSize = $(document).scrollTop();
$(".float_nav").hide();
if(topSize>601){
$(".float_nav").show();
switch(true){
case topSize>621&&topSize<1300:
$("#fn_body .hang:eq(1)").addClass("cur").siblings().removeClass("cur"); 
break;
case topSize>1300&&topSize<2200:
$("#fn_body .hang:eq(2)").addClass("cur").siblings().removeClass("cur"); 
break;
case topSize>2200&&topSize<2900:
$("#fn_body .hang:eq(3)").addClass("cur").siblings().removeClass("cur"); 
break;
case topSize>2900&&topSize<3730:
$("#fn_body .hang:eq(4)").addClass("cur").siblings().removeClass("cur"); 
break;
case topSize>3730&&topSize<4430:
$("#fn_body .hang:eq(5)").addClass("cur").siblings().removeClass("cur"); 
break;
case topSize>4430&&topSize<5260:
$("#fn_body .hang:eq(6)").addClass("cur").siblings().removeClass("cur"); 
break;
case topSize>5260&&topSize<5960:
$("#fn_body .hang:eq(7)").addClass("cur").siblings().removeClass("cur"); 
break;
case topSize>5960&&topSize<6790:
$("#fn_body .hang:eq(8)").addClass("cur").siblings().removeClass("cur"); 
break;
case topSize>6790&&topSize<7490:
$("#fn_body .hang:eq(9)").addClass("cur").siblings().removeClass("cur"); 
break;
case topSize>7490&&topSize<8320:
$("#fn_body .hang:eq(10)").addClass("cur").siblings().removeClass("cur"); 
break;
case topSize>8320&&topSize<8670:
$("#fn_body .hang:eq(11)").addClass("cur").siblings().removeClass("cur"); 
break;
case topSize>8670&&topSize<9000:
$("#fn_body .hang:eq(12)").addClass("cur").siblings().removeClass("cur"); 
break;
default:
;
}
}
}
$(window).scroll(function(){changelf();})
});


