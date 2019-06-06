$(document).ready(function(){
// click down menu
	function clickdown($topmenu,o){
		$topmenu.on("click",function(){
			var topmenucss = $(this).attr("class") == 'm-item sub-menu-a current' ? 'm-item sub-menu-b current' : 'm-item sub-menu-a current';
			$(this).attr("class",topmenucss);
			var subdis = $("#sub_"+o).css("display") == 'none' ? '' : 'none';
			$("#sub_"+o).css("display",subdis);
		});
	}

	clickdown($("#h_0"),0);
	clickdown($("#h_1"),1);
	clickdown($("#h_2"),2);
	clickdown($("#h_3"),3);
	clickdown($("#h_4"),4);
	clickdown($("#h_5"),5);
	clickdown($("#h_6"),6);
	clickdown($("#h_7"),7);
	clickdown($("#h_8"),8);
	clickdown($("#h_9"),9);
	clickdown($("#h_10"),10);
	clickdown($("#h_11"),11);
	clickdown($("#h_12"),12);

})(jQuery);

