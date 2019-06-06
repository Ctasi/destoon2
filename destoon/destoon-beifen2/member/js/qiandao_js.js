/*
xiaohei dtmuban.com QQ:290948585
*/
$(function() {
var desAjax = function(url, dataType) {
		if (url.indexOf('?') <= 0) {
			url = url + '?';
		} else {
			url = url + '&';
		}
		var dt = new Date();
		url = url + "tmp=" + String(Math.round(Math.random() * 10000)) + String(dt.getTime());
		var rst;
		$.ajax({
			url : url,
			type: 'GET',
			async : false,
			dataType : dataType,
			success : function(t) {
				rst = t;
			}
		});
		return rst;
	};
    var signFun = function() {
		var dateArray = desAjax("/member/qiandao.php?action=listday", "json");//假设已经签到的
        var $dateBox = $("#js-qiandao-list"),
            $currentDate = $(".current-date"),
            $qiandaoBnt = $("#js-just-qiandao"),
            _html = '',
            _handle = true,
            myDate = new Date();
        $currentDate.text(myDate.getFullYear() + '年' + parseInt(myDate.getMonth() + 1) + '月' + myDate.getDate() + '日');
        var monthFirst = new Date(myDate.getFullYear(), parseInt(myDate.getMonth()), 1).getDay();
        var d = new Date(myDate.getFullYear(), parseInt(myDate.getMonth() + 1), 0);
        var totalDay = d.getDate(); //获取当前月的天数
        for (var i = 0; i < 42; i++) {
            _html += ' <li><div class="qiandao-icon"></div></li>'
        }
        $dateBox.html(_html) //生成日历网格
        var $dateLi = $dateBox.find("li");
        for (var i = 0; i < totalDay; i++) {
            $dateLi.eq(i + monthFirst).addClass("date" + parseInt(i + 1));
            for (var j = 0; j < dateArray.length; j++) {
                if (i == dateArray[j]) {
                    $dateLi.eq(i + monthFirst).addClass("qiandao");
                }
            }
        } //生成当月的日历且含已签到
        $(".date" + myDate.getDate()).addClass('able-qiandao');
        if(qd_yes==0 && qd_login==1){
        $dateBox.on("click", "li", function() {
                if ($(this).hasClass('able-qiandao') && _handle) {
                    $(this).addClass('qiandao');
                    qiandaoFun();
                }
            }) //签到
		}
        $qiandaoBnt.on("click", function() {
        if (_handle && qd_yes==0) {
         qiandaoFun();
		 }else{alert('亲：您今日已经签到过了哦，请明日再来!')}
        }); //签到
      function qiandaoFun() {
		  $.post('/member/qiandao.php?action=add', function(data) {
		if(data.error == 'ok') {
			alert;//('签到成功！连续签到'+data.signday+'天获得'+data.signget+'积分！');
			$("#signday").text(data.signday);
			$("#signget").text(data.signget);
			$("#todayget").text(data.signget);
			//$("#js-qiandao-list").find("li").eq(data.thisday-1).addClass("qiandao");
			qiandaoFun();
		} else {
			alert(data.error);
		}
	},'json');
            $qiandaoBnt.addClass('qiandao-yes');
            openLayer("qiandao-active", qianDao);
            _handle = false;
        }
        function qianDao() {
            $(".date" + myDate.getDate()).addClass('qiandao');
        }
    }();
    function openLayer(a, Fun) {
        $('.' + a).fadeIn(Fun)
    } //打开弹窗
    var closeLayer = function() {
            $("body").on("click", ".close-qiandao-layer", function() {
                $(this).parents(".qiandao-layer").fadeOut()
            })
        }() //关闭弹窗
 if(qd_login==1){
    $("#js-qiandao-history").on("click", function() {
		myqiandao(destoon_userid);
        openLayer("qiandao-history-layer", myFun);
    function myFun() {
            //myqiandao(3)
        } //打开弹窗返回函数
    })
 }
    function myqiandao(uid) {
		var ret = desAjax("/member/qiandao.php?action=mylist&page=1&uid=3", "json");
		if(ret){
			var data=ret.data;
			    $("#qd_lianxu").text(ret.lxitems);
				$("#qd_benyue").text(ret.byitems);
				$("#qd_total").text(ret.totalCount);
				$("#qd_gets").text(ret.totalgets);
				//$("#qiandao-content").empty();
			    var content = $('#qiandao-content');
                var tpl = $('#qiandao-template').text();
                var tempFn = doT.template(tpl);
			    content.html(tempFn(data));
		}
}
})
//$("#no-login").on("click", function() {
  //alert('尚未登录'); 
//});