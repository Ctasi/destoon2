<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?> 
<script type="text/javascript">var module_id= <?php echo $moduleid;?>,item_id=<?php echo $itemid;?>,content_id='content',img_max_width=<?php echo $MOD['max_width'];?>;</script>
<div class="wrapper">
      <div class="mt0">
    <div class="nav"><a href="<?php echo $MODULE['1']['linkurl'];?>">首页</a> <i>&gt;</i> <a href="<?php echo $MOD['linkurl'];?>"><?php echo $MOD['name'];?></a> <i>&gt;</i> <?php echo cat_pos($CAT, ' <i>&gt;</i> ');?></div>
  <div class="wrapper mt0"> 
    <!--大左边-->
   <div class="summary clear"> 
      <!--左图-->
   <div class="item-info">
          <div class="left">
            <div class="gallery">
            <div id="mid_pos"></div>
                <div id="mid_div" onmouseover="SAlbum();" onmouseout="HAlbum();" onclick="PAlbum(Dd('mid_pic'));"> <img src="<?php echo $albums['0'];?>" width="300" height="290" id="mid_pic" onerror="this.src='<?php echo DT_SKIN;?>image/nopic200.gif'"/><span id="zoomer"></span> </div>
              <ul class="clear">
                <?php if(is_array($thumbs)) { foreach($thumbs as $k => $v) { ?>
                <li class="<?php if($k) { ?>ab_im<?php } else { ?>ab_on<?php } ?>" id="t_<?php echo $k;?>"><img src="<?php echo $v;?>" width="60" height="60" onmouseover="if(this.src.indexOf('nopic60.gif')==-1)Album(<?php echo $k;?>, '<?php echo $albums[$k];?>');"  onerror="this.src='<?php echo DT_SKIN;?>image/nopic60.gif'"/></li>
                <?php } } ?>
                <li class="ab_im" onclick="PAlbum(Dd('mid_pic'));"><img src="<?php echo DT_SKIN;?>image/zoom.png" width="60" height="60"/></li>
              </ul>
            </div>      
          </div>
            <!--右文字-->
          <div class="right">
            <div class="wrap">
              <div class="title-new">
                <h3 id="title"><?php echo $title;?></h3>
            <div id="big_div" style="display:none;"><img src="" id="big_pic"/></div>
                <p><?php echo $introduce;?></p>
              </div>
              <ul class="promo-meta clear">
                <li> <span>产品单价:</span> <strong class="promo-price"> <em class="rmb"><?php echo $DT['money_sign'];?></em> <?php if($price>0) { ?><em class="rmb-num"><?php echo $price;?></em><?php echo $DT['money_unit'];?>/<?php echo $unit;?><?php } else { ?>面议<?php } ?></em> </strong> </li>
                <li><span>品牌:</span><p><?php echo $brand;?></p></li>
                <li><span>产地:</span><p><?php echo area_pos($areaid, ' ');?></p></li>
                <li><span>产品类别:</span><?php echo cat_name($catid);?></li>
                <li><span>有效期:</span><p>长期有效 </p></li>
                <li><span>发布时间:</span><p><?php echo $editdate;?></p></li>
                <li class="counter">
                  <?php if($MOD['hits']) { ?><div class="browse-counter clear"> <a href="javascript:;"> <b><?php echo $hits;?></b><span>访问人数</span> </a> </div><?php } ?>
                  <div class="sell-counter clear"> <a href="#detail-tag04"> <b id="comment_count">0</b><span>累计评论</span> </a> </div>
                  <div class="rate-counter clear" onmouseout="document.getElementById('qrcode_con').style.display='none'" onmouseover="document.getElementById('qrcode_con').style.display='block'"> 
                  <img src="<?php echo DT_SKIN;?>image/sell/sell-ewm.jpg" width="94" height="48" data-bd-imgshare-binded="1"></div>
                  <div class="qrcode_con" id="qrcode_con" style="display: none;"><img src="<?php echo DT_PATH;?>api/qrcode.png.php?auth=<?php echo $head_mobile;?>" width="130" height="130" data-bd-imgshare-binded="1">
<p>手机扫码，简单快捷</p>
</div>
                  <?php if($groupid > 6) { ?><span class="vip_pic1"></span><?php } else { ?><span class="vip_pic0"></span><?php } ?>
                </li>
              </ul>
              
              <div class="roduct-button">
              <?php if(SELL_ORDER && $price>0 && $minamount>0 && $amount>0 && $unit) { ?>
              <a class="button-gou" onclick="Go('<?php echo $MODULE['2']['linkurl'];?>cart.php?action=add&mid=<?php echo $moduleid;?>&itemid=<?php echo $itemid;?>');" href="javascript:void(0);"><i></i>加入购物车</a>
              <a class="button-buy" onclick="Go('<?php echo $MODULE['2']['linkurl'];?>buy.php?mid=<?php echo $moduleid;?>&itemid=<?php echo $itemid;?>');" href="javascript:void(0);">购买</a>
              <?php } else { ?>
              <a class="button-red" onclick="Go('<?php echo $MOD['linkurl'];?><?php echo rewrite('inquiry.php?itemid='.$itemid);?>');" href="javascript:void(0);"><i></i>留言询价</a>
              <?php } ?>
              <a class="button-cart button-cart-add" href="javascript:SendFav();"><i></i><span>加入收藏</span></a>
                <ul class="collect-share">
                <li class="shares"><a href="javascript:void(0);"onclick="Dshare(<?php echo $moduleid;?>, <?php echo $itemid;?>);"><img src="<?php echo DT_SKIN;?>image/ico-share.png" class="share" title="分享好友"/>分享</a></li>
                </ul>
              </div>
              <div class="clear"></div>
            </div>
          </div>
      </div>
      </div>
  <!--大右边资料-->   
      <div class="sidebar clear">
        <div class="shop-infotop">
        <div class="companytitle"><dl><dd>诚信商家资料</dd></dl></div>
        <div id="contact"><?php include template('contact', 'chip');?></div>
   <?php if(!$username) { ?>
<br/>
&nbsp;<strong class="f_red">注意</strong>:发布人未在本站注册，建议优先选择<a href="<?php echo $MODULE['2']['linkurl'];?>grade.php"><strong><?php echo VIP;?>会员</strong></a>
<?php } ?>
        </div>
      </div>
  </div>
<div class="clear"></div>  
<!--内容开始-->
    <div class="detail-content clear">
      <div class="detail-left">
      <?php if($username) { ?>
      <div class="list-sidebarcenshow nomb"><div class="uselltit"><span>该企业其他产品</span><b class="f_r"><a href="<?php echo userurl($username, 'file=sell');?>">更多&raquo;</a></b></div></div>
      <div class="detail-sidebar">
  <?php echo tag("moduleid=$moduleid&length=28&condition=status=3 and thumb<>'' and username='$username'&pagesize=5&order=edittime desc&width=220&height=220&template=xiaohei-show_tj");?> 
 </div>
     <?php } else { ?>
     <div class="list-sidebarcenshow nomb"><div class="uselltit"><span>同类<?php echo $MOD['name'];?></span><b class="f_r"><a href="<?php echo $MOD['linkurl'];?><?php echo $CAT['linkurl'];?>">更多&raquo;</a></b></div></div>
      <div class="detail-sidebar">
      <?php echo tag("moduleid=$moduleid&length=28&condition=status=3 and thumb<>''&catid=$catid&pagesize=5&order=edittime desc&width=220&height=220&template=xiaohei-show_tj");?> 
     </div>
     <?php } ?>
      </div>
      <div class="detail-right">
        <div class="detail-info">
          <div class="detail-navwarp"><div class="detail-nav detail-navfloat"><ul><li name="detail-tag01" class="lishow current"><span><i>产品详情</i></span></li></ul></div></div>
          <div class="detail-con">
            <h3 class="detail-contit"><span>产品参数</span></h3>
            <div class="prodetail" id="content">
   <table width="100%" cellpadding="0" cellspacing="1" border="0" bgcolor="#e5e5e5" class="ke-zeroborder">
          <tbody>
            <tr height="36" bgcolor="#ffffff">
              <td class="pt-name"><h4>品牌：</h4></td>
              <td class="pt-cent"><?php if($brand) { ?><?php echo $brand;?><?php } else { ?>未填<?php } ?></td>
            </tr>
            <tr height="36" bgcolor="#ffffff">
              <td class="pt-name"><h4>所在地：</h4></td>
              <td class="pt-cent"><?php echo area_pos($areaid, ' ');?></td>
            </tr>
            <tr height="36" bgcolor="#ffffff">
              <td class="pt-name"><h4>起订：</h4></td>
              <td class="pt-cent"><?php if($minamount) { ?>≥<?php echo $minamount;?> <?php echo $unit;?><?php } else { ?>未填<?php } ?></td>
            </tr>
            <tr height="36" bgcolor="#ffffff">
              <td class="pt-name"><h4>供货总量：</h4></td>
              <td class="pt-cent"><?php if($amount) { ?><?php echo $amount;?> <?php echo $unit;?><?php } else { ?>未填<?php } ?></td>
            </tr>
            <tr height="36" bgcolor="#ffffff">
              <td class="pt-name"><h4>有效期至：</h4></td>
              <td class="pt-cent"><?php if($todate) { ?><?php echo $todate;?><?php } else { ?>长期有效<?php } ?><?php if($expired) { ?> <span class="f_red">[已过期]</span><?php } ?></td>
            </tr>
          <?php if($n3 && $v3) { ?>
          <tr height="36" bgcolor="#ffffff">
            <td class="pt-name"><h4><?php echo $n1;?>：</h4></td>
            <td class="pt-cent"><?php echo $v1;?></td>
          </tr>
          <?php } ?>
          <?php if($n2 && $v2) { ?>
          <tr height="36" bgcolor="#ffffff">
            <td class="pt-name"><h4><?php echo $n2;?>：</h4></td>
            <td class="pt-cent"><?php echo $v2;?></td>
          </tr>
          <?php } ?>
          <?php if($n3 && $v3) { ?>
          <tr height="36" bgcolor="#ffffff">
            <td class="pt-name"><h4><?php echo $n3;?>：</h4></td>
            <td class="pt-cent"><?php echo $v3;?></td>
          </tr>
          <?php } ?>
            </tbody>
        </table>
<h3 class="detail-contit" id="detail-tag01"><span>详情介绍</span></h3>
     <?php if($CP) { ?><?php include template('property_show', 'chip');?><?php } ?>
    <div id="content"><?php echo $content;?></div>
    <?php if($MOD['fee_award']) { ?>
  <div class="award"><div onclick="Go('<?php echo $MODULE['2']['linkurl'];?>award.php?mid=<?php echo $moduleid;?>&itemid=<?php echo $itemid;?>');">打赏</div></div>
  <?php } ?>
            </div>
     </div>
  <div class="detail-comment">
  <?php include template('comment-sell', 'chip');?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- main end --> 
  </div>
</div>
<div class="clear"></div>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/album.js"></script> 
<?php if($content) { ?><script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/content.js"></script><?php } ?> 
<!-- footer --> 
<?php include template('footer');?>