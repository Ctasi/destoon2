$(function vsend(){
	//账户名称
	$("#username").bind('focus',function(){
		$(this).siblings(".errorFontTip").attr('class','errorFontTip');
		$("#accTS").addClass("errorBgGay").text("4-20个字符，由中英文字母、数字、\"-\"、\"_\"组成").show();
			if($(this).parents(".firmBox").hasClass("borderReds"))
		{
			$(this).parents(".firmBox").removeClass("borderReds");
		}
		$(this).siblings(".errorIcon").css('display','none');
	});

	$("#username").bind('blur',function(){
		checkFrimAccount(0);
	});

	function checkFrimAccount(type){
		var $obj = $('#username');
		var value=jQuery.trim($obj.val());
		var flag1 = /^([\u2E80-\u9FFF]{1}|[a-zA-Z-_]{1})+([\u2E80-\u9FFFa-zA-Z0-9_-]{3,19})$/;
		$('#accTS').removeClass("errorBgPea");
		$('#accTS').removeClass("errorBgGay");
		if(value==""){
			$obj.siblings(".errorIcon").addClass("st").show();
			$obj.parents(".firmBox").addClass('borderReds')
			$obj.siblings(".errorFontTip").text("请输入用户名");
			$obj.siblings(".errorFontTip").addClass("errorBgPea").show();
			return false;
		}else{
			if(type==1){
				return true;
			}else{
				return checkAccountExist($obj,type);
			}
		}
	}

	//邮箱验证
	$("#email").bind('focus',function(){
		var $obj = $(this);
		$obj.siblings(".errorFontTip").attr('class','errorFontTip');
		$obj.siblings(".errorFontTip").addClass("errorBgGay").text("请设置常用邮箱").show();
		if($obj.parents(".firmBox").hasClass("borderReds"))
		{
			$obj.parents(".firmBox").removeClass("borderReds");
		}
		$obj.siblings(".errorIcon").css('display','none');
	});

	$("#email").bind('blur',function(){
		checkEmail(0);
	});

	function checkAccountExist($obj,type){
		if(type==1){
			return true;
		}else{

			validator('username');
		}
	}

	function checkEmail(type){
		var $obj = $('#email');
		var a=	$obj.siblings(".errorIcon");
		a.attr('class','errorIcon')
		a.show();
		$obj.siblings(".errorFontTip").removeClass("errorBgPea");
		$obj.siblings(".errorFontTip").removeClass("errorBgGay");
		var flag =/^([a-zA-Z0-9_\.]+)@([a-zA-Z0-9\-]+\.)+[a-zA-Z0-9]{2,4}$/;
		var value=jQuery.trim($obj.val());
		if(value=='')
		{
			$obj.siblings(".errorFontTip").text('请输入邮箱').show();
			$obj.parents(".firmBox").addClass('borderReds');
			$obj.siblings(".errorIcon").addClass("st").show();
			$obj.siblings(".errorFontTip").addClass("errorBgPea").show();
			a.addClass('st');
			return false;
		}
		else if(!flag.test(value))
		{
			$obj.siblings(".errorIcon").addClass("st").show();
			$obj.parents(".firmBox").addClass('borderReds');
			$obj.siblings(".errorFontTip").addClass("errorBgPea").text('请输入正确的邮箱格式').show();
			a.addClass('st');
			return false;
		}
		else
		{
			if(type==1){
				return true;
			}else{
				return checkAccountExist($obj,type);
			}
		}
	}

		//设置密码
	$("#password").bind('focus',function(){
		var $obj = $(this);
		$obj.siblings(".errorFontTip").attr('class','errorFontTip');
		$obj.siblings(".errorFontTip").addClass("errorBgGay").text("6-20字符，至少包含数字、字母、字符其中两种").show();
			if($obj.parents(".firmBox").hasClass("borderReds"))
		{
			$obj.parents(".firmBox").removeClass("borderReds");
		}
		$obj.siblings(".errorIcon").css('display','none');
	});

	$("#password").bind('blur',function(){
		checkPwd();
	});

function checkPwd(){
			var $obj = $('#password');
			var regexp=/(\w|\d)/;
			var regexp1=/^\d+$/g;
			var regexp2=/^[a-zA-Z]+$/g;
			var regexp3=/^[\;!,@#$%^&*?_~`(){}\[\]\-\+:"'|\\<>\/\.=]+$/g;
			var password = $obj.val();
			var userName = jQuery.trim($("#username").val());

			if(password==''){
				$obj.siblings(".errorFontTip").text('请输入密码').show();
				$obj.parents(".firmBox").addClass('borderReds');
				$obj.siblings(".errorIcon").addClass("st").show();
				$obj.siblings(".errorFontTip").addClass("errorBgPea").show();
				return false;
			}else if(password.length<6||password.length>20){
				$obj.siblings(".errorIcon").addClass("st").show();
				$obj.parents(".firmBox").addClass('borderReds');
				$obj.siblings(".errorFontTip").addClass("errorBgPea").text('密码长度为6-20位').show();
				return false;
			}else if(regexp1.test(password)||regexp2.test(password)||regexp3.test(password)){
				$obj.siblings(".errorIcon").addClass("st").show();
				$obj.parents(".firmBox").addClass('borderReds');
				$obj.siblings(".errorFontTip").addClass("errorBgPea").text('由数字、字母、字符至少包含两种组成').show();
				return false;
			}else if(firmAccount==password){
				$obj.siblings(".errorIcon").addClass("st").show();
				$obj.parents(".firmBox").addClass('borderReds');
				$obj.siblings(".errorFontTip").addClass("errorBgPea").text('密码和用户名不能相同').show();
				return false;
			}else{
				$obj.siblings(".errorIcon").removeClass("st").addClass("pass").show();
				$obj.parents(".firmBox").removeClass('borderReds');
				//showRight($obj);
				return true;
			}
		}



	$("#cpassword").bind('focus',function(){
		var $obj = $(this);
		$obj.siblings(".errorFontTip").attr('class','errorFontTip');
		$obj.siblings(".errorFontTip").addClass("errorBgGay").text("请再次输入密码").show();
			if($obj.parents(".firmBox").hasClass("borderReds"))
		{
			$obj.parents(".firmBox").removeClass("borderReds");
		}
		$obj.siblings(".errorIcon").css('display','none');
	});

	$("#cpassword").bind('blur',function(){
		checkRepwd();
	});

	function checkRepwd(){
		var $obj = $("#cpassword");
		var a=	$obj.siblings(".errorIcon");
		a.show();
		a.attr('class','errorIcon');
		$obj.siblings(".errorFontTip").removeClass("errorBgPea");
		$obj.siblings(".errorFontTip").removeClass("errorBgGay");
		if($obj.val()=="")
		{
			$obj.siblings(".errorFontTip").text('请输入密码').show();
			$obj.parents(".firmBox").addClass('borderReds');
			$obj.siblings(".errorIcon").addClass("st").show();
			$obj.siblings(".errorFontTip").addClass("errorBgPea").show();
			return false;
		}
		else if($obj.val()!=$("#password").val())
		{
			$obj.siblings(".errorFontTip").text('两次密码不一致').show();
			$obj.parents(".firmBox").addClass('borderReds');
			$obj.siblings(".errorIcon").addClass("st").show();
			$obj.siblings(".errorFontTip").addClass("errorBgPea").show();
			return false;
		}else
		{
			$obj.parents(".firmBox").removeClass('borderReds');
			$obj.siblings(".errorIcon").addClass("pass").show();
			$obj.siblings(".errorFontTip").removeClass("errorBgPea").hide();
			return true;
		}
	}

	//联系人名称
	$("#truename").bind('blur',function(){
		checkUsername();
	});

	function checkUsername(){
		var $obj = $("#truename");
		var a=	$obj.siblings(".errorIcon");
		a.show();
		a.attr('class','errorIcon')
		var flag =/^([\u4E00-\u9FA5]|[a-zA-Z]){2,30}$/;
		var value=$obj.val();
		if(value=='')
		{
			$obj.siblings(".errorFontTip").text('请输入联系人姓名').show();
			$obj.parents(".firmBox").addClass('borderReds');
			$obj.siblings(".errorIcon").addClass("st").show();
			$obj.siblings(".errorFontTip").addClass("errorBgPea").show();
			return false;
		}
		else if(!flag.test(value))
		{
			$obj.siblings(".errorIcon").addClass("st").show();
			$obj.parents(".firmBox").addClass('borderReds');
			$obj.siblings(".errorFontTip").addClass("errorBgPea").text('请输入真实姓名').show();
			return false;
		}
		else
		{
			$obj.parents(".firmBox").removeClass('borderReds');
			$obj.siblings(".errorIcon").addClass("pass").show();
			$obj.siblings(".errorFontTip").removeClass("errorBgPea").hide();
			return true;
		}
	}

	//验证手机号
	$("#mobile").bind('blur',function(){
		checkPhone();
	});

	function checkPhone(){
		var $obj = $("#mobile");
		var a=	$obj.siblings(".errorIcon");
		a.show();
		a.attr('class','errorIcon')
		var flag =/^(13|15|18|17)[0-9]{9}$/;
		var value=$obj.val();
		if(value=='')
		{
				if($obj.parents(".ln_addressTr").next().find(".errorIcon").hasClass("pass"))
				{
					$obj.parents(".ln_addressTr").find(".firmBox").attr('class','firmBox');
					$obj.parents(".ln_addressTr").find(".errorIcon").attr('class','errorIcon');
					return false;
				}else
				{
					$obj.siblings(".errorFontTip").text('请输入手机号').show();
					$obj.parents(".firmBox").addClass('borderReds');
					$obj.siblings(".errorIcon").addClass("st").show();
					$obj.siblings(".errorFontTip").addClass("errorBgPea").show();
					return false;
				}
		}
		else if(!flag.test(value))
		{
			$obj.siblings(".errorIcon").addClass("st").show();
			$obj.parents(".firmBox").addClass('borderReds');
			$obj.siblings(".errorFontTip").addClass("errorBgPea").text('请输入正确的手机号').show();
			return false;
		}
		else
		{
			$obj.parents(".firmBox").removeClass('borderReds');
			$obj.siblings(".errorIcon").addClass("pass").show();
			$obj.siblings(".errorFontTip").removeClass("errorBgPea").hide();
			if($('#telephone').siblings(".errorIcon").hasClass("st")&&$('#telephone').val()=='')
			{
				$('#telephone').siblings(".errorIcon").hide();
				$('#telephone').parents(".firmBox").removeClass('borderReds');
				$('#telephone').siblings(".errorFontTip").hide();
				return false;
			}else{
				return true;
			}
		}
	}

	//验证固定电话
	$("#telephone").bind('blur',function(){
		checkTel();
	});

	function checkTel(){
		var $obj = $("#telephone");
		var a=	$obj.siblings(".errorIcon");
		a.show();
		a.attr('class','errorIcon')
		var flag =/^(\d{3,4}-)?\d{7,12}$/;
		var value=$obj.val();
		if(value=='')
		{
				if($obj.parents(".ln_addressTr").prev().find(".errorIcon").hasClass("pass"))
			{
				$obj.parents(".ln_addressTr").find(".firmBox").attr('class','firmBox');
				$obj.parents(".ln_addressTr").find(".errorIcon").attr('class','errorIcon');
				return false;
			}else
			{
				$obj.siblings(".errorFontTip").text('请输入固定电话').show();
				$obj.parents(".firmBox").addClass('borderReds');
				$obj.siblings(".errorIcon").addClass("st").show();
				$obj.siblings(".errorFontTip").addClass("errorBgPea").show();
				return false;
			}

		}
		else if(!flag.test(value))
		{
			$obj.siblings(".errorIcon").addClass("st").show();
			$obj.parents(".firmBox").addClass('borderReds');
			$obj.siblings(".errorFontTip").addClass("errorBgPea").text('请输入正确的电话号码').show();
			return false;
		}
		else
		{
			$obj.parents(".firmBox").removeClass('borderReds');
			$obj.siblings(".errorIcon").addClass("pass").show();
			$obj.siblings(".errorFontTip").removeClass("errorBgPea").hide();

			if($('#mobile').siblings(".errorIcon").hasClass("st")&&$('#mobile').val()=='')
			{
				$('#mobile').siblings(".errorIcon").hide();
				$('#mobile').parents(".firmBox").removeClass('borderReds');
				$('#mobile').siblings(".errorFontTip").hide();
				return false;
			}else{
				return true;
			}

		}
	}

	//验证公司名称
	$("#company").bind('blur',function(){
		checkCompany();
	});

	function checkCompany(){
		var $obj = $("#company");
		var a=	$obj.siblings(".errorIcon");
		a.show();
		a.attr('class','errorIcon')
		var value=$obj.val();
			if(value=='')
		{
			$obj.siblings(".errorFontTip").text('请输入公司名称').show();
			$obj.parents(".firmBox").addClass('borderReds');
			$obj.siblings(".errorIcon").addClass("st").show();
			$obj.siblings(".errorFontTip").addClass("errorBgPea").show();
			return false;
		}
		else
		{
			$obj.parents(".firmBox").removeClass('borderReds');
			$obj.siblings(".errorIcon").addClass("pass").show();
			$obj.siblings(".errorFontTip").removeClass("errorBgPea").hide();
			return true;
		}
	}

	//验证详细地址
	$("#firmDetailAdd").bind('blur',function(){
		checkDetail();
	});

	function checkDetail(){
		var $obj = $("#firmDetailAdd");
		var a=	$obj.siblings(".errorIcon");
		a.show();
		a.attr('class','errorIcon');
		var value=$obj.val();
			if(value=='')
		{
			$obj.siblings(".errorFontTip").text('请输入公司详细地址').show();
			$obj.parents(".firmBox").addClass('borderReds');
			$obj.siblings(".errorIcon").addClass("st").show();
			$obj.siblings(".errorFontTip").addClass("errorBgPea").show();
			return false;
		}
		else
		{
			$obj.parents(".firmBox").removeClass('borderReds');
			$obj.siblings(".errorIcon").addClass("pass").show();
			$obj.siblings(".errorFontTip").removeClass("errorBgPea").hide();
			return true;
		}
	}

	//验证码
	$("#captcha").bind('blur',function(){
		checkCode()
	});

	function checkCode(){
		var $obj = $("#captcha");
		var a=	$obj.siblings(".errorIcon");
		a.show();
		a.attr('class','errorIcon')
		var value=$obj.val();
			if(value=='')
		{
			$obj.siblings(".errorFontTip").text('请输入验证码').show();
			$obj.parents(".firmBox").addClass('borderReds');
			$obj.siblings(".errorFontTip").addClass("errorBgPea").show();
			return false;
		}
		else
		{
			$obj.parents(".firmBox").removeClass('borderReds');
			$obj.siblings(".errorFontTip").removeClass("errorBgPea").hide();
			return true;
		}
	}

	$('#area').bind('click',function(){
		var street = $("#area option:selected").val();
		var $obj = $("#area");
		if(street==''){
			$obj.siblings(".errorFontTip").show();
			$obj.parents(".firmBox").addClass('borderReds');
			$obj.siblings(".errorFontTip").addClass("errorBgPea").show();
		}else{
			$obj.parents(".firmBox").removeClass('borderReds');
			$obj.siblings(".errorFontTip").removeClass("errorBgPea").hide();
		}
	});


	//清除错误提示
	$(".mainBox input:gt(3)").bind("focus",function(){
		var $obj = $(this);
		if($obj.parents(".firmBox").hasClass("borderReds"))
		{
			$obj.parents(".firmBox").removeClass("borderReds");
		}
		$obj.siblings(".errorIcon").css('display','none');
		$obj.siblings(".errorFontTip").hide();
	});


	/****************密码强度验证************************/
	 /*密码强弱验证*/
	  $('#password').keyup(function(){
  	   var value=$.trim($(this).val());
  	   var length=value.length;
  	   var $strength=$(this).parent().next();
  	   if(length<6){
			 $strength.hide();
	       }

	/*密码弱：数字、字母、符号双双或三个共同组合小于10位*/
	 if(((value.match(/[a-z]/) && value.match(/\d/))|| (value.match(/\d/) && value.match(/[!,@#$%^&*?_~]/))||(value.match(/[a-z]/) && value.match(/[!,@#$%^&*?_~]/)))&&(length>=6)&&(length<=10))
		{
			$(".strength").show();
			$(".strength i").removeClass("strength2").removeClass("strength3").addClass("strength1")
			$(this).removeClass("on");
			$(this).siblings(".poiFalse").hide();
	    }

	/*密码中：数字、字母、符号双双或三个共同组合大于等于11位至20位*/
   if((((value.match(/[a-z]/) && value.match(/\d/)) || (value.match(/\d/) && value.match(/[!,@#$%^&*?_~]/))||(value.match(/[a-z]/) && value.match(/[!,@#$%^&*?_~]/)))&&(length>11)&&(length<20))||((value.match(/[a-z]/) && value.match(/\d/))|| (value.match(/\d/) && value.match(/[!,@#$%^&*?_~]/))||(value.match(/[a-z]/) && value.match(/[!,@#$%^&*?_~]/)))&&(value.match(/[A-Z]/))&&(length>=6)&&(length<=10))
		{
			$(".strength").show();
			$(".strength i").removeClass("strength3").removeClass("strength1").addClass("strength2")
			$(this).removeClass("on");
			$(this).siblings(".poiFalse").hide();
		}

	/*密码强： 以上两个等级任加至少1个大写字母，等级加一级，例如弱变中，中变强*/
	if(((value.match(/[a-z]/) && value.match(/\d/)) || (value.match(/\d/) && value.match(/[!,@#$%^&*?_~]/))||(value.match(/[a-z]/) && value.match(/[!,@#$%^&*?_~]/)))&&value.match(/[A-Z]/)&&(length>10)&&(length<20))
		{
			$(".strength").show();
			$(".strength i").removeClass("strength1").removeClass("strength2").addClass("strength3")
			$(this).removeClass("on");
			$(this).siblings(".poiFalse").hide();
		}


});
});