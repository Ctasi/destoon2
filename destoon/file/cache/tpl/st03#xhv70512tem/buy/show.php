<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?> 
<script type="text/javascript">var module_id= <?php echo $moduleid;?>,item_id=<?php echo $itemid;?>,content_id='content',img_max_width=<?php echo $MOD['max_width'];?>;</script> 
<script type="text/javascript">
$(document).ready(function() {
//收起列表
$(".t_pack").click(function(){
$(this).parent().toggleClass("packed_up");
});
});
</script> 
<!--main begin-->
<div class="wrapper mt0">
    <div class="nav"><div><img src="<?php echo DT_SKIN;?>image/ico-share.png" class="share" title="分享好友" onclick="Dshare(<?php echo $moduleid;?>, <?php echo $itemid;?>);"/></div><a href="<?php echo $MODULE['1']['linkurl'];?>">首页</a> <i>&gt;</i> <a href="<?php echo $MOD['linkurl'];?>"><?php echo $MOD['name'];?></a> <i>&gt;</i> <?php echo cat_pos($CAT, ' <i>&gt;</i> ');?></div>
  <!--left product begin-->
  <div class="wrap_buypro fl">
      <div class="wrap_buypro_detail">
       <div class="buypro_title">
        <h1 id="title"><?php echo $title;?></h1>
        <p>采购截止日期：<?php if($todate) { ?><?php echo $todate;?><?php } else { ?>长期有效<?php } ?><?php if($expired) { ?> <span class="f_red">[已过期]</span><?php } ?></p>
        <p>发布日期：<?php echo $editdate;?></p>
        <?php if($groupid > 6) { ?><span class="vip_picbuy1"></span><?php } else { ?><span class="vip_picbuy0"></span><?php } ?>
      </div>
      <!--buy product detail-->
      <div class="buypro_detail"> 
      <!--采购产品详情-->
        <div class="buypro_list fl">
        <div id="big_div" style="display:none;"><img src="" id="big_pic" onerror="this.src='<?php echo DT_SKIN;?>image/nopic200.gif'"/></div>
          <div class="time_out">
            <h2>距离结束时间：<span id="timer"></span>
<?php if($totime) { ?>
        <script type="text/javascript">  
function TimeTo(dd){  
    var t = new Date(dd),//取得指定时间的总毫秒数  
        n = new Date().getTime(),//取得当前毫秒数  
        c = t - n;//得到时间差  
    if(c<=0){//如果差小于等于0  也就是过期或者正好过期，则推出程序  
        document.getElementById('timer').innerHTML ='本次采购已经结束';  
        clearInterval(window['ttt']);//清除计时器  
        return;//结束执行  
    }  
    var ds = 60*60*24*1000,//一天共多少毫秒  
        d = parseInt(c/ds),//总毫秒除以一天的毫秒 得到相差的天数  
        h = parseInt((c-d*ds)/(3600*1000)),//然后取完天数之后的余下的毫秒数再除以每小时的毫秒数得到小时  
        m = parseInt((c - d*ds - h*3600*1000)/(60*1000)),//减去天数和小时数的毫秒数剩下的毫秒，再除以每分钟的毫秒数，得到分钟数  
        s = parseInt((c-d*ds-h*3600*1000-m*60*1000)/1000);//得到最后剩下的毫秒数除以1000 就是秒数，再剩下的毫秒自动忽略即可  
        document.getElementById('timer').innerHTML = ' <b>'+d+'</b> 天 <b>'+h+'</b> 时 </b> : <b>'+m+'</b> 分 : <b class="ss">'+s+'</b> 秒';//最后这句讲定义好的显示 更新到 ID为 timer的 div中  
}  
(function(){  
    window['ttt']=setInterval(function(){  
    TimeTo('<?php echo date('Y/m/d', $totime);?> 23:59:59');//定义倒计时的结束时间，注意格  
    },1000);//定义计时器，每隔1000毫秒 也就是1秒 计算并更新 div的显示  
})();  
</script>  
  <?php } else { ?>
      长期有效（请联系我们）         
      <?php } ?></h2>
            <span class="time_tip"></span> </div>
          <div class="buypro_detail_list">
            <ul>
              <li class="buypro_list1">需求数量： <?php echo $amount;?></li>
              <li class="buypro_list2">所在地： <?php echo area_pos($areaid, '');?></li>
              <?php if($MOD['hits']) { ?><li class="buypro_list3">已有 <?php echo $hits;?> 人浏览</li><?php } ?>
              <li class="buypro_list4 last">已有 <?php echo $pricenums;?> 条报价</li>
            </ul>
          </div>
          <div class="wrap_quote">
          <?php if($username && !$expired) { ?>
              <a href="javascript:SendFav();" class="collect fl"><span>收藏本单</span></a>
            <div class="offer_tip">or</div>
            <a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('price.php?itemid='.$itemid);?>" class="quote_price fl"><span>立即报价</span></a>
            <?php } else { ?>
            <a href="javascript:SendFav();" class="quote_price fl"><span>收藏本单</span></a>
            <div class="offer_tip">or</div>  
            <a href="javascript:;" class="collect fl"><span><?php if($username) { ?>停止报价<?php } else { ?>不支持<?php } ?></span></a>
            <?php } ?>   
             </div>
        </div>
        <!--采购产品图片-->
         <div class="wrap_buypro_pic fl"> 
 <div id="mid_pos"></div>
                <div class="mid_div" id="mid_div" onmouseover="SAlbum();" onmouseout="HAlbum();" onclick="PAlbum(Dd('mid_pic'));"> <img src="<?php echo $albums['0'];?>" width="298" height="214" id="mid_pic" onerror="this.src='<?php echo DT_SKIN;?>image/nopic100.gif'"/><span id="zoomer"></span> </div>
              <ul class="rightpic clear">
                <?php if(is_array($thumbs)) { foreach($thumbs as $k => $v) { ?>
                <li class="<?php if($k) { ?>ab_im<?php } else { ?>ab_on<?php } ?>" id="t_<?php echo $k;?>"><img src="<?php echo $v;?>" width="60" height="60" onmouseover="if(this.src.indexOf('nopic60.gif')==-1)Album(<?php echo $k;?>, '<?php echo $albums[$k];?>');" onerror="this.src='<?php echo DT_SKIN;?>image/nopic60.gif'"/></li>
                <?php } } ?>
                <li class="ab_im" onclick="PAlbum(Dd('mid_pic'));"><img src="<?php echo DT_SKIN;?>image/zoom.png" width="60" height="60"/></li>
              </ul>
             </div> 
 </div>
     
    </div>
    <!--product detail description-->
    <div class="buypro_des">
      <div class="des_title">
        <h3>采购清单</h3>
        <span></span> </div>
      <table class="buypro_des_table">
        <tr>
          <th class="row1">价格要求： <?php echo $price;?></th>
          <th class="row1">包装要求： <?php echo $pack;?></th>
          <th class="row1">所在地： <?php echo area_pos($areaid, '');?></th>
        </tr>
        <tr>
          <td class="row1">采购单位：<?php echo $company;?></td>
          <td class="row1">联系人： <?php echo $truename;?></td>
          <td class="row1">有效期至： <?php if($todate) { ?><?php echo $todate;?><?php } else { ?>长期有效<?php } ?><?php if($expired) { ?> <span class="f_red">[已过期]</span><?php } ?></td>
        </tr>
         <tr>
          <?php if($n1 && $v1) { ?><th class="row1"><?php echo $n1;?>: <?php echo $v1;?></th><?php } ?>
          <?php if($n2 && $v2) { ?><th class="row1"><?php echo $n2;?>: <?php echo $v2;?></th><?php } ?>
          <?php if($n3 && $v3) { ?><th class="row1"><?php echo $n3;?>: <?php echo $v3;?></th><?php } ?>
        </tr>
      </table>
    </div>
    <div class="buypro_des">
      <div class="des_title">
        <h3>产品详细说明</h3>
        <span></span> </div>
        <?php if($CP) { ?><?php include template('property_show', 'chip');?><?php } ?>
      <div class="content" id="content"><?php echo $content;?></div>
      <?php if($MOD['fee_award']) { ?>
  <div class="award"><div onclick="Go('<?php echo $MODULE['2']['linkurl'];?>award.php?mid=<?php echo $moduleid;?>&itemid=<?php echo $itemid;?>');">打赏</div></div>
  <?php } ?>
</div>
      <?php include template('comment-buy', 'chip');?>
    <div class="wrap_recom">
      <div class="recom_title">
        <h3>全网推荐</h3>
      </div>
      <div class="ask_recom">
        <ul>
         <?php $tags=tag("moduleid=6&length=24&condition=status=3&areaid=$cityid&pagesize=4&order=addtime desc&template=null");?>
<?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
          <li>
            <div class="recom recom1">
              <h4><a href="<?php echo $t['linkurl'];?>"><?php echo $t['title'];?></a></h4>
              <p>采购数量<span><?php if($t['amount']) { ?><?php echo $t['amount'];?><?php } else { ?>不限量<?php } ?></span></p>
            </div>
            <div class="recom recom2">
              <p class="recom2_line1">来自<span>[<?php echo area_pos($t['areaid'], '');?>]</span>的采购商</p>
              <p class="integrity"><?php echo group_name($t['groupid']);?></p>
              <p class="verify last"><?php if($t['validated']) { ?>已通过认证<?php } else { ?>身份未认证<?php } ?> </p>
            </div>
            <div class="recom recom3">
              <p class="recom3_line1">已有<span> <?php echo $t['hits'];?> </span>家关注</p>
              <p class="recom3_line2"><a href="<?php echo $t['linkurl'];?>">立即报价</a></p>
              <p class="recom3_line3">有效期至<span><?php if($t['totime']) { ?><?php echo timetodate($t['totime'], 5);?><?php } else { ?>长期有效<?php } ?></span></p>
              <span class="recom3_tip"></span> </div>
          </li>
          <?php } } ?>
        </ul>
      </div>
    </div>
  </div>
  <!--left product over--> 
  <!--right content begin-->
  <div class="wrap_right_con fr">
    <div class="wrap_purchase_mes">
    <?php if($username) { ?>
      <div class="purchase_mes">
        <div class="purchase_mes_title t_pack">
          <h4>本商家信息统计</h4>
        </div>
        <div class="purchase_mes_list pack_list">       
<p>供应数：<span><?php echo $db->count($DT_PRE.'sell_5', 'status=3 and username="'.$username.'"', 1800);?></span></p>
<p class="last">采购数：<span><?php echo $db->count($DT_PRE.'buy_6', 'status=3 and username="'.$username.'"', 1800);?></span></p>     
        </div>
      </div>
      <?php } ?>
      <?php if($username) { ?>
      <div class="purchase_mes">
        <div class="purchase_mes_title t_pack">
          <h4>本商家的其他采购单</h4>
        </div>
        <div class="other_data_list pack_list">
         <?php $tags=tag("moduleid=$moduleid&length=20&condition=status=3 and username='$username'&areaid=$cityid&pagesize=10&order=addtime desc&template=null");?>
        <?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
          <div class="odata_list">
            <div class="out_data fl"> <span class="out_data_t">截止日期</span> <span class="out_data_d"><?php if($t['totime']) { ?><?php echo timetodate($t['totime'], 3);?><?php } else { ?>长期有效<?php } ?></span> </div>
            <div class="odata_detail last fl">
              <p><a href="<?php echo $t['linkurl'];?>"><?php echo $t['title'];?></a></p>
              <p>采购数量：<a class="odata_num" href="<?php echo $t['linkurl'];?>"><?php if($t['amount']) { ?><?php echo $t['amount'];?><?php } else { ?>不限量<?php } ?></a></p>
            </div>
          </div>
        <?php } } ?>
        </div>
      </div>
      <?php } else { ?>
      <div class="purchase_mes">
        <div class="purchase_mes_title t_pack">
          <h4>同类<?php echo $MOD['name'];?>采购单</h4>
        </div>
        <div class="other_data_list pack_list">
         <?php $tags=tag("moduleid=$moduleid&length=20&condition=status=3&catid=$catid&areaid=$cityid&pagesize=10&order=addtime desc&template=null");?>
        <?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
          <div class="odata_list">
            <div class="out_data fl"> <span class="out_data_t">截止日期</span> <span class="out_data_d"><?php if($t['totime']) { ?><?php echo timetodate($t['totime'], 3);?><?php } else { ?>长期有效<?php } ?></span> </div>
            <div class="odata_detail last fl">
              <p><a href="<?php echo $t['linkurl'];?>"><?php echo $t['title'];?></a></p>
              <p>采购数量：<a class="odata_num" href="<?php echo $t['linkurl'];?>"><?php if($t['amount']) { ?><?php echo $t['amount'];?><?php } else { ?>不限量<?php } ?></a></p>
            </div>
          </div>
        <?php } } ?>
        </div>
      </div>
      <?php } ?>
      <div class="purchase_mes">
        <div class="purchase_mes_title t_pack">
          <h4>联系方式</h4>
        </div>
        <div class="purchase_mes_list contact_list pack_list">
        <div class="contact_body" id="contact"><?php include template('contact', 'chip');?></div>
<?php if(!$username) { ?>
<br/>
&nbsp;<strong class="f_red">注意</strong>:发布人未在本站注册，建议优先选择<a href="<?php echo $MODULE['2']['linkurl'];?>grade.php"><strong><?php echo VIP;?>会员</strong></a>
<?php } ?>
        </div>
      </div>
    </div>
    <div class="buypro_ad"> 
      <!-- 广告 --> 
    </div>
  </div>
  <!--right content over--> 
</div>
<!--main over--> 
<div class="clear"></div>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/album.js"></script> 
<?php if($content) { ?><script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/content.js"></script><?php } ?> 
<!--footer begin--> 
<!--底部版权--> 
<?php include template('footer');?>