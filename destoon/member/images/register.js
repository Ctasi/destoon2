  $(function(){

    var reg = {
      //CharMode函数，测试某个字符是属于哪一类.
      CharMode: function(iN){
        if (iN>=48 && iN <=57) //数字
          return 1;
        if (iN>=65 && iN <=90) //大写字母
          return 2;
        if (iN>=97 && iN <=122) //小写
          return 4;
        else
          return 8; //特殊字符
      },
      //bitTotal函数，计算出当前密码当中一共有多少种模式
      bitTotal: function(num){
        modes=0;
        for (i=0;i<4;i++){
          if (num & 1) modes++;
          num>>>=1;
        }
        return modes;
      },
      //checkStrong函数，返回密码的强度级别
      checkStrong: function(sPW){
        if (sPW.length<=4)
          return 0; //密码太短
        Modes=0;
        for (i=0;i<sPW.length;i++){
          //测试每一个字符的类别并统计一共有多少种模式.
          Modes|=reg.CharMode(sPW.charCodeAt(i));
        }
        return reg.bitTotal(Modes);
      },
      //设置密码强度显示器class
      setStrongTip: function(level){
        var $s = $(".strong_tip");
        switch(level){
          case 3:
            $s.removeClass("pswState-normal");
            $s.removeClass("pswState-poor");
            $s.addClass("pswState-strong");
            break;
          case 2:
            $s.removeClass("pswState-strong");
            $s.removeClass("pswState-poor");
            $s.addClass("pswState-normal");
            break;
          case 1:
            $s.removeClass("pswState-strong");
            $s.removeClass("pswState-normal");
            $s.addClass("pswState-poor");
            break;
          default:
            $s.find(".i").removeClass("s");
        }
      },
      passStrong: function(){
        reg.setStrongTip(0);
        $(".check_pass_strong").keydown(function(){
          S_level=reg.checkStrong($(this).val());
          reg.setStrongTip(S_level);
        });
      }
    };

    if(!!$(".com_form")[0]){
      reg.passStrong(); //密码强度
    }
  
   
  });