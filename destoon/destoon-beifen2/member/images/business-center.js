$(document).ready(function(){
	// click down services
	function clickdownser($ser,$serli1,$serli2,$serli3){
		$ser.on("click",function(){
			var serclass = $(this).attr("class") == 'spread-tip-spread' ? 'spread-tip-packup' : 'spread-tip-spread';
			$(this).attr("class",serclass);
			var serdis1 = $serli1.css("display") == 'none' ? '' : 'none';
			var serdis2 = $serli2.css("display") == 'none' ? '' : 'none';
			var serdis3 = $serli3.css("display") == 'none' ? '' : 'none';
			$serli1.css("display",serdis1);
			$serli2.css("display",serdis2);
			$serli3.css("display",serdis3);
		});
	}
	
	clickdownser($(".spread-tip-spread"),$("#hidden_service_1"),$("#hidden_service_2"),$("#hidden_service_3"));
	
	// click down menu
	function clickdown($topmenu,o){
		$topmenu.on("click",function(){
			var topmenucss = $(this).attr("class") == 'side_head' ? 'side_head2' : 'side_head';
			$(this).attr("class",topmenucss);
			var subdis = $("#sub_"+o).css("display") == 'none' ? '' : 'none';
			$("#sub_"+o).css("display",subdis);
		});
	}

	clickdown($("#h_0"),0);
	clickdown($("#h_1"),1);
	clickdown($("#h_2"),2);
	clickdown($("#h_3"),3);

	// pull down list
	function PullDown($pull, hoverClass){
		$pull.on("mouseover",function(){
			$(this).find($(".menu-hd")).addClass(hoverClass);
			$(this).find($(".menu-bd")).removeClass("hidden");
		});

		$pull.on("mouseout",function(){
			$(this).find($(".menu-hd")).removeClass(hoverClass);
			$(this).find($(".menu-bd")).addClass("hidden");
		});
	}
	
	PullDown($(".pull-down-list"), "menu-hd-hover");
	PullDown($(".basic-message-list .basic-message-detail"), "menu-hd-hover");
	PullDown($(".nav li"), "nav-hover");

	// 二级三级下拉菜单
	function PullDownMenu($hover, hasList, pullClass){
		$hover.on("mouseover", function(){
			if ($(this).hasClass(hasList)) {
				$(this).addClass(pullClass);
			}
		})
		$hover.on("mouseout", function(){
			if ($(this).hasClass(hasList)) {
				$(this).removeClass(pullClass);
			}
		})
	}

	PullDownMenu( $(".application li"), "pull-down", "has-third-nav");

	// customer service
	function CusDown($cus, $cusCon, hoverClass, $close){
		$cus.on("click",function(){
			$cusCon.toggleClass("hidden");
			$(this).toggleClass(hoverClass);
		});
		$close.on("click",function(){
			$cusCon.toggleClass("hidden");
			$cus.toggleClass(hoverClass);
		})
	}
	
	CusDown($(".customer-service-box .menu-hd"), $(".customer-box"), "menu-hd-hover", $(".close-icon"));

	// spread navList
	function SpreadList($list, $listCon){
		$list.on("click", function(){
			var index = $list.index($(this));
			$(this).toggleClass("spreadClass");
			$listCon.eq(index).toggleClass("hidden");
		})
	}

	// left navlist
	SpreadList($(".application dt"), $(".application dd"));

//	// select box
//	function SelectBox($select){
//		var defaultType = $select.find(".option a:first span").text();
//		$select.find(".select-type-text").text(defaultType);
//		$select.find(".search-type-input").val(defaultType);
//
//		$select.find(".select-type").on("click",function(event){
//			event.stopPropagation();
//			$select.find(".option").toggleClass("hidden");
//		});
//
//		$select.find(".option a").on("click",function(){
//			var selectType = $(this).find("span").text();
//			$select.find(".select-type-text").text(selectType);
//			$select.find(".search-type-input").val(selectType);
//			$select.find(".option").addClass("hidden");
//		});
//
//		$(document).on("click",function(){
//			$select.find(".option").addClass("hidden");
//		});
//	}
//
//	SelectBox($(".select-box"));

    /**
     *
     * 顶部搜索框
     */
    var TopSearch = function(){
        this.el = "#top_search";
        this.$el = $(this.el);
        this.$form = $("#top_search_form");
        this.$btn_sel = this.$el.find(".select-type"); //下拉框按钮
        this.$selopt = this.$el.find(".option");      //下拉框选择项
        this.$optItem =  this.$selopt.find(".selitem");  //选择项
        this.$keyword = this.$el.find(".key_word");
        this.$btn = this.$el.find(".search-btn");

        this.type = -1;  //搜索分类
        this.keyWord = -1; //关键字
        this.action = -1;  //提交地址

        this.initialize();
        this.initAction();
    };
    TopSearch.prototype = {
        initialize: function(){
            var initType = this.$selopt.find(".active span").text();
            var datatype = this.$selopt.find(".active").attr("data-type");
            this.setType(initType,datatype);
        },
        //初始化事件绑定
        initAction: function(){
            var self = this;
            //分类按钮点击
            this.$btn_sel.click(function(){
                self.$selopt.toggleClass("hidden");
            });
            //分类点击
            this.$optItem.click(function(){
                var type = $(this).find("span").text();
                var datatype = $(this).attr("data-type");
                self.setType(type,datatype);
                self.$selopt.addClass("hidden");
            });
            //提交按钮
            this.$btn.click(function(e){
                e.preventDefault();
                self.keyWord = self.analyze(self.$keyword.val()); //调用关键字分析函数
                if(self.keyWord == "" || self.keyWord == -1){
                    return;
                }
                self.handleAction();
            });
        },
        //关键字处理
        analyze: function(str){
            var encode = encodeURIComponent($.trim(str))
            encode = encode.replace(/\*/g,"%2A");
            //console.log(encode);
            return encode;
        },
        //设置搜索分类
        setType: function(type,attr){
            this.$el.find(".show_text").text(type);
            this.type = attr;
        },
        //action url 处理
        handleAction: function(){
            $("#m_searchid").val(this.type);
            this.$form.submit();
        }

    };
    new TopSearch;//搜索实例化


	// 上传图片弹出框
	//function PopBox($btn, $closeBtn, $popBg, $popBox){
		var pop_width = $(document).width(),
			pop_height = $(document).height(),
			win_height = $(window).height(),
			box_width = $(".pop-box").width(),
			box_height = $(".pop-box").height(),
			box_top = (win_height - box_height)/2,
			box_left = (pop_width - box_width)/2;
		
		 $(".pop-bg").css({
			width: pop_width,
			height: pop_height
		});
		
		 $(".pop-box").css({
			top: box_top,
			left: box_left
		});

		// 绑定弹出框事件
		$(".upload-btn").on("click", function(){
			var itemid = $(this).siblings(".upload-edit").val();
			//console.log(itemid);
			if(itemid){
				$('#edititemid').val(itemid);
				var thumb = $(this).parent().siblings("img").attr("src");			
				$('.preview-photo').attr("src",thumb);
				$('#oldthumb').val(thumb);							
				$(".upload-photo-list input[name='old']").val(thumb);
				
				var introduce = $(this).parent().siblings(".introduce").val();
				$('#introduce').val(introduce);
				var listorder = $(this).parent().siblings(".listorder").val();
				$('#listorder').val(listorder);
			}
			 $(".pop-bg").removeClass("hidden");
			 $(".pop-box").removeClass("hidden");
		});

		// 关闭弹出框
		$(".close-btn").on("click", function(){
			 $(".pop-bg").addClass("hidden");
			 $(".pop-box").addClass("hidden");
		})
	//}
	//PopBox($(".upload-btn"), $(".close-btn"), $(".pop-bg"), $(".pop-box"));
	//上传弹窗结束
});

//trade

(function($){
    $(document).ready(function(){
        $.each($(".select_like"), function(i,n){
            select_like($(n));
        });
        if(!!$("#btn_direct_pay")[0]){
            payfor_method();
        }
    });

    //交易管理订单页
    function payfor_method(){
        var default_hide = true;
//交易管理订单页 直接付款
        $("#btn_direct_pay").click(function(){
            if(!default_hide){
                var $table = $(this).parents("table");
                $table.find(".default_hide").hide();
                $table.find(".default_show").show();
                default_hide = true;
            }
        });
//交易管理订单页 货到付款
        $("#btn_cash_on_arrival").click(function(){
            if(default_hide){
                var $table = $(this).parents("table");
                $table.find(".default_hide").show();
                $table.find(".default_show").hide();
                default_hide = false;
            }
        });
    }

    //=========================================================
    function select_like($s){
        $s.hover(function(){
            //$(this).addClass("hover");
        },function(){
            $(this).removeClass("hover");
        });
        $s.click(function(){
            $(this).toggleClass("hover");
        });
        var $a = $s.find(".sel_list .active");
        var $b = $s.find(".sel_show");
        var $input = $s.find(".selval");
        //var url = $a.attr("href");
        var val = $a.attr("data-val");
        var text = $a.text();
        //$b.attr( 'href', url);
        $b.text(text);
        $input.val(val);
        //点击选择事件
        $s.find(".sel_list li").click(function(){
            var t = $(this).text();
            var v = $(this).attr("data-val");
            $b.text(t);
            $input.val(v);
            //$s.removeClass("hover");
        });

        function setStyle(){
            var width = 108;
            if($s.attr("data-width") != undefined){
                width = $s.attr("data-width");
            }
            var show_width = (width-37)<25 ? 25 : width-37;
            var w1 = (width-37)<25 ? 62 : width;
            $s.css("width",w1+'px');
            $b.css("width", show_width+"px");

        }
        setStyle();
    }
})(jQuery);