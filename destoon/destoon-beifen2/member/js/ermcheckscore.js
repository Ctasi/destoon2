/*
  add by xiaohei
*/
//星级显示
  function showxing(score){
	if(score>=2 && score<=3){  		
  		$("#xj").html("★<font color='#999'>★★★★</font>");
		$("#jy").show();
		$("#wxcp").hide();
  	}else if(score>=4 && score<=5){
  		$("#xj").html("★★<font color='#999'>★★★</font>");
		$("#jy").show();
		$("#wxcp").hide();
  	}else if(score>=6 && score<=7){
  		$("#xj").html("★★★<font color='#999'>★★</font>");
		$("#jy").show();
		$("#wxcp").hide();
  	}else if(score>=8 && score<=9){
  		$("#xj").html("★★★★<font color='#999'>★</font>");
		$("#jy").show();
		$("#wxcp").hide();
  	}else if(score>=10 && score<=15){
  		$("#xj").html("★★★★★");
		$("#jy").hide();
		$("#wxcp").show();
  	}else{
  		$("#xj").html("<font color='#999'>★★★★★</font>");  	
  	}
  }
  //1标题评分
  function title(){
  	 var score = 0;
  	 var title = $("#title").val();
  	 if(title.length>4){
		 score=2;
		 }
  	 else if(title.length>0){
		  score=0;
		  }
	 $("#num_title").val(score);
	 showScore();
  }
  //2品牌得分
  function brand(){
  	 var score = 0;
  	 var brand = $("#brand").val();
  	 if(brand.length>0){
		 score=2;
		 }
  	 else if(brand.length>0){
		  score=0;
		  }
	 $("#num_brand").val(score);
	 showScore();
  }
  //3详细信息评分
 /* function content(){
  	var score = 0;
	var content = $("#content").val();
  	if(content.length>50){
  		score = 2;
  	}else if(content>0){
  		score = 0;
  	}
  	$("#num_content").val(score);
  	showScore();
  }*/
  //4主要参数评分
  function checkcs(){
	var n1=$("#n1").val()&&$("#v1").val();
	var n2=$("#n2").val()&&$("#v2").val();
	var n3=$("#n3").val()&&$("#v3").val();
  	var score = 0;
  	if(n1!=''){
  		score = 2;
  	} 
  	if(n2!='' && n3!=''){
  		score = score+0;
  	}
  	$("#num_zycs").val(score);
  	showScore();
  }
  //5交易条件评分
  function checkjy(){
  	var unit = $("#u0").val();
  	var price = $("#w1").val();
  	var minamount = $("#w2").val();
  	var amount = $("#w3").val();
  	var score = 0;
  	if(unit!=''){
  		score = 2;
  	} 
  	if(price!='' && minamount!='' && amount!=''){
  		score = score+0;
  	}
  	$("#num_jydj").val(score);
  	showScore();
  }
  //6自定义分类评分
  function checkgroup(){
  	var group = $("select[name='post[mycatid]']").val();
  	if(group==0){
  		$("#num_group").val(0);
  	}else{
  		$("#num_group").val(2);
  	}
  	showScore();
  }
  //总分
  function sumScore(){
  	var score = 0;
  	var num_title = parseInt($("#num_title").val());
  	var num_brand = parseInt($("#num_brand").val());
  	//var num_content = parseInt($("#num_content").val());
  	var num_zycs = parseInt($("#num_zycs").val());
  	var num_jydj = parseInt($("#num_jydj").val());
	  var num_group = parseInt($("#num_group").val());
  	if(num_title<2){
  		$("#pfx1").show();
  	}else{
  		$("#pfx1").hide();
  	}
  	if(num_brand<1){
  		$("#pfx2").show();
  	}else{
  		$("#pfx2").hide();
  	}
  	/*if(num_content<2){
  		$("#pfx3").show();
  	}else{
  		$("#pfx3").hide();
  	}*/
  	if(num_zycs<2){
  		$("#pfx4").show();
  	}else{
  		$("#pfx4").hide();
  	}
  	if(num_jydj<2){
  		$("#pfx5").show();
  	}else{
  		$("#pfx5").hide();
  	}
  	if(num_group>0){
  		$("#pfx6").hide();
  	}else{
  		$("#pfx6").show();
  	}
  	score = num_title + num_brand + num_zycs + num_jydj + num_group;
  	return score;
  }
  function showScore(){
  	 var sum = sumScore();
	 showxing(sum);
  }
 setInterval(title,1000);
 setInterval(brand,1000);
 setInterval(checkcs,1000);
 setInterval(checkjy,1000);
 setInterval(checkgroup,1000);
