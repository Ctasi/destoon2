//xiaohei-qq：290948585-st06-20171117
//关闭效果
function removeElement(id){
        document.getElementById(id).style.display="none";
}
//新版会员中心头部鼠标效果
//收藏
$(function() {
$(".al_wrap").hover(function() {
    $(this).addClass("quick_hove");
    $(this).find(".nav-hover").show()
},
function() {
    $(this).removeClass("quick_hove");
    $(this).find(".nav-hover").hide()
});
});
//消息
$(function() {
$(".msg").hover(function() {
    $(this).addClass("current");
    $(this).find(".msg-hover").show()
},
function() {
    $(this).removeClass("current");
    $(this).find(".msg-hover").hide()
});
});
//快捷菜单
$(function() {
 $('.shortcut').mouseover(function(){
        $('.shortcut-mu').show('fast');
        $(this).addClass("current");
        $('.shortcut').bind('mouseleave',
        function(){ 
            $(this).removeClass("current");
            $('.shortcut-mu').hide(); 
        });
});
}); 
//浏览器缓存时间
function getCookie(name) {
    var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
    if (arr = document.cookie.match(reg))
        return unescape(arr[2]);
    else
        return null;
}
function setCookie(name, value) {
    var Days = 30;
    var exp = new Date();
    exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
    document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString();
}
//浮动客服
$(function() {
$(".service-box").hover(function() {
    $(this).addClass("current");
    $(this).find(".expand").show()
},
function() {
    $(this).removeClass("current");
    $(this).find(".expand").hide()
});
});
//数据统计
$(function() {
$(".chart-txt").hover(function() {
    $(this).find(".tooltip").show()
},
function() {
    $(this).find(".tooltip").hide()
});
});
