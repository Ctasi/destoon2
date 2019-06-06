(function ($) {
    $(document).ready(function () {

        function cate_list_handle() {
            var str1 = "更多";
            var str2 = "收起";
            var p_w_init_height = $(".pcw").height();
            //console.log("init: " + p_w_init_height)
            $(".pcw").each(function(i,n){
                var p_height = $(n).find("ul").height();
                //console.log(p_height)
                if(p_height<= p_w_init_height){
                    $(n).find(".more").hide();
                }
                if($(n).find("ul")!== ""){
                    //$(n).find(".more").show();
                    $(n).find(".pcw").addClass("close");
                }
            });

            //显示更多地区和产品类型
            $(".more").click(function () {
                if ($(this).hasClass("actived")) {
                    $(this).text(str1);
                }
                else {
                    $(this).text(str2);
                }
                $(this).toggleClass("actived");
                //$(this).prev().find(".com_line").eq(0).siblings().toggleClass("hidden");
                if($(this).hasClass("theca")){
                    $(this).parent().toggleClass("close");
                }
                return false;
            });
        }
        if(!!$(".sort-filter")[0]){
            cate_list_handle();
        }


    });

})(jQuery);


