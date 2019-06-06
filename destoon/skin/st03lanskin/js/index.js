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

//主菜单
	var $mainNav     = $(".J-mainNav"),
		$li_index    = $mainNav.find(".m_zl .fd-clr"),
	    $float_layer = $(".float-layer"),
		$content     = $float_layer.find(".text-content"),
		i            = 0;

	function navToggle(par1, par2) {
		$float_layer.removeClass(par1).addClass(par2);
	}

	$mainNav.mouseenter(function() {
		navToggle("hide", "show");
		$float_layer.animate({
			left:181
		}, 200);
	});
	$mainNav.mouseleave(function() {
		navToggle("show", "hide");
		$li_index.eq(i).removeClass("active").siblings().removeClass("active");
		$float_layer.css("left",180);
	});

	$li_index.mouseover(function() {
		i = $(this).index();
		$content.eq(i).removeClass("hide").addClass("show").siblings().addClass("hide").removeClass("show");
		$li_index.eq(i).addClass("active").siblings().removeClass("active");
	});

jQuery(".slideBox").slide({mainCell:".bd ul",effect:"left",autoPlay:true});
jQuery(".slideBoxinfo").slide({mainCell:".bd ul",effect:"left",autoPlay:true});
jQuery(".trade").slide({mainCell:".bd ul",autoPage:true,effect:"top",autoPlay:true,vis:3,pnLoop:false});
jQuery(".tradeinfo").slide({mainCell:".bd ul",autoPage:true,effect:"top",autoPlay:true,vis:3,pnLoop:false});
jQuery(".help-tab").slide({effect:"left",pnLoop:false});
jQuery(".buy-cont-c").slide({mainCell:".bd .main-list",autoPage:true,effect:"left",autoPlay:true,interTime:5000});
jQuery(".buy-trade").slide({mainCell:".bd ul",autoPage:true,effect:"topMarquee",autoPlay:true,vis:5,interTime:80});

/*20170329-楼层兴趣设置*/
var menu_h = {};
var menu_hide  = 0;
//修改
    function menu_heigh(){
		menu_h = {};
		$(".main_lb_box:visible").each(function(){
			menu_h[$(this).offset().top] = $(this).attr('t');
		});
		menu_hide = $(".tjcp_box_tr").offset().top-150;
	}
	function menu_adjust(){
		var block_arr =Array();
		$("#block_show").find("[class=main_sz_box_lia]").each(function(){
			block_arr.push($(this).attr('t'));
		})
		var block_hide = 0;
		if($("#block_hide").attr("class")=="main_sz_box_yctl1a") block_hide = 1;
		if(block_hide){
			$(".main_lb_more").show();
		}
		else{
			$(".main_lb_more").hide();
		}
		for(var i=15;i>0;i--){
			if($.inArray(i.toString(),block_arr)!=-1){
				$("#hyzd li[t="+i.toString()+"]").fadeIn();
				$("#hyzd li[t="+i.toString()+"]").insertBefore($("#hyzd li[t]").eq(0));
			}
			else{
				if(block_hide){
					$("#hyzd li[t="+i.toString()+"]").fadeOut();
				}
				else{
					$("#hyzd li[t="+i.toString()+"]").fadeIn();
				}
			}
		}
		menu_heigh();
	}
	var isroll = false;
	
	$(window).scroll(function(){
		if(isroll) return;
		var scrollTop =$(document).scrollTop();
		for(var i in menu_h){
			if(scrollTop<i-50){
				var t = menu_h[i];
				$("#hyzd").find("li").removeClass("main_menuin_liover");
				$("#hyzd").find("li[t="+t+"]").addClass("main_menuin_liover");
				break;
			}
		}
	});
	$('#hyzd li[t]').click(function(e){
		e.preventDefault();
		var ind = $(this).attr('t');
		$("#hyzd").find("li").removeClass("main_menuin_liover");
		$(this).addClass("main_menuin_liover");
		var topVal = $('.main_lb_box[t='+ind+']').offset().top-100;
		isroll = true;
		$('body,html').animate({scrollTop:topVal},{duration:500,complete:function(){isroll=false;}});
		return false;
	})	
	$(".main_lb_more").click(function(){
		$("#block_hide").attr("class","main_sz_box_yctl1");
		$(".main_lb_box[t]").fadeIn();
		//$(".main_lb_more").hide();
		//$("#hyzd li").show();
		menu_adjust();
	})
//	-----以上导航部分
	
//修改
	if(block_hide!='0'){
		$("#block_hide").attr("class","main_sz_box_yctl1a");
	}
	var block_arr = block_show.split(",");
	for(var i = 0; i < block_arr.length; i++) {
		if(block_arr[i]) $("#block_show").find("[t="+block_arr[i]+"]").attr("class","main_sz_box_lia");
	}
	$("#block_hide").click(function(){
		$class = $(this).attr("class");
		if($class=="main_sz_box_yctl1"){
			$(this).attr("class","main_sz_box_yctl1a");
		}
		else{
			$(this).attr("class","main_sz_box_yctl1");
		}
	})
	$("#block_show li").click(function(){
		$class = $(this).attr("class");
		if($class=="main_sz_box_lia"){
			$(this).attr("class","main_sz_box_li");
		}
		else{
			$(this).attr("class","main_sz_box_lia");
		}
	})
	$("#ganxingqu").hover(function(){
		$(".main_sz_box").show();
	},
	function(){
		$(".main_sz_box").show();
	})
	$(".main_sz_box").mouseover(function(){
		$(".main_sz_box").show();
	})
	$(".main_sz_box").mouseout(function(){
		$(".main_sz_box").hide();
	})
	$(".main_sz_box_ipt1").click(function(){
		$(".main_sz_box").hide();
	})
	$(".main_sz_box_ipt2").click(function(){
		$(".main_lb_more").show();
		var block_arr = Array();
		$("#block_show").find("[class=main_sz_box_lia]").each(function(){
			block_arr.push($(this).attr('t'));
		})
		var block_hide = 0;
		if($("#block_hide").attr("class")=="main_sz_box_yctl1a") block_hide = 1;
		var myblocks = block_arr.join(",")+"|"+block_hide;
		$(".main_sz_box").hide();
		setCookie("bids",myblocks,365);
		for(var i=15;i>0;i--){
			if($.inArray(i.toString(),block_arr)!=-1){
				$(".main_lb_box[t="+i.toString()+"]").fadeIn();
				$(".main_lb_box[t="+i.toString()+"]").insertBefore($(".main_lb_box[t]").eq(0));
				
			}
			else{
				if(block_hide){
					$(".main_lb_box[t="+i.toString()+"]").fadeOut();
				}
				else{
					$(".main_lb_box[t="+i.toString()+"]").fadeIn();
				}
			}
		}
		menu_adjust();
		_g_.ajax("member.act_myblocks",
					{act:'set',myblocks:myblocks},
					function(data){
					}
		 );
	})
	menu_adjust();
	function setCookie(c_name,value,expiredays)
	{
		var exdate=new Date()
		exdate.setDate(exdate.getDate()+expiredays)
		document.cookie=c_name+ "=" +escape(value)+
		((expiredays==null) ? "" : ";expires="+exdate.toGMTString())
	}