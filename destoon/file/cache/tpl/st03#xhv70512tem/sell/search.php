<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<script type="text/javascript">var sh = '<?php echo $MOD['linkurl'];?>search.php?catid=<?php echo $catid;?>';</script>
<script type="text/javascript" src="<?php echo DT_SKIN;?>js/category_list.js"></script>
<div class="wrapper mt20 clear">
<div class="main-content clear">
<div class="sort-filter ">
<div class="sf-hot">
<h3>你现在的位置：</h3>
    <ul>
  <li><a href="<?php echo $MODULE['1']['linkurl'];?>" target="_self">首页</a> » <a href="<?php echo $MOD['linkurl'];?>"><?php echo $MOD['name'];?></a> » <?php echo cat_pos($CAT, ' » ');?> </li>
   <li class="fr mr-10">共找到 <b class="red"><?php echo $items;?></b> 条产品信息</li> 
    </ul>
</div>
<div class="sf-content">
    <h3>分  类：</h3>
    <div class="sf-link">
    <div class="zk close">
<ul>
        <li class="li_1"><a  href="<?php echo $MOD['linkurl'];?>" <?php if($catid==0) { ?>class="current"<?php } else { ?><?php } ?>>全部</a></li>
        <?php $mid = $moduleid;?>
<?php $child = get_maincat(0, $mid, 1);?>
<?php if(is_array($child)) { foreach($child as $i => $c) { ?>
            <li><a <?php if($c['catid']==$catid) { ?> class="current"<?php } ?> href="<?php echo $MOD['linkurl'];?><?php echo $c['linkurl'];?>" target="_self"><?php echo $c['catname'];?><?php if(!$cityid) { ?> <span><?php echo $c['item'];?></span><?php } ?></a></li>
            <?php } } ?>
    </ul>
    <a class="more theca" href="javascript:void(0)">更多</a>
     </div>
    </div>
</div>
<div class="sf-content">
    <h3>区&nbsp;&nbsp;域：</h3>
    <div class="sf-link sf-unfold">
    <div class="zk close">
              <ul>
            <li class="li_1"><a href="<?php echo $MOD['linkurl'];?>" <?php if($areaid==99) { ?>class="current"<?php } else { ?><?php } ?>>全部</a></li>
            <?php $mainarea = get_mainarea(0)?>
            <?php if(is_array($mainarea)) { foreach($mainarea as $k => $v) { ?>
             <li><a href="<?php echo $MOD['linkurl'];?>search.php?areaid=<?php echo $v['areaid'];?>&catid=<?php echo $catid;?>" <?php if($v['areaid']==$areaid) { ?> class="current"<?php } ?>><?php echo $v['areaname'];?></a></li>
            <?php } } ?>
                  </ul>
                  <a class="more theca" href="javascript:void(0)">更多</a>
     </div>
    </div>
</div>
<div class="sf-content">
    <h3>类  别：</h3>
    <div class="sf-link">
<ul>
<li class="li_1"><a  href="<?php echo $MOD['linkurl'];?>" <?php if($typeid==99) { ?>class="current"<?php } else { ?><?php } ?>>全部</a></li>
      <?php if(is_array($TYPE)) { foreach($TYPE as $k => $v) { ?>
<li><a href="javascript:Go('<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?typeid='.$k.'&catid='.$catid);?>');" <?php if($typeid==$k) { ?>class="current"<?php } ?>><?php echo $v;?></a></li>
<?php } } ?>
    </ul>
    </div>
</div>
<?php if($CP) { ?><?php include template('property_search', 'chip');?><?php } ?>
<div class="sf-sequence">
    <div class="fl">
        <a href="javascript:void(0)" sort="default" onclick="Go(sh+'&order=0&kw=<?php echo $kw;?>');" title="默认排序" class="current left">默认排序</a>     
        <a href="javascript:void(0)" sort="price" onclick="Go(sh+'&order=3&kw=<?php echo $kw;?>');" title="价格从低到高" ><span>价格</span><i class="down"></i></a>
        <a href="javascript:void(0)" sort="price2" onclick="Go(sh+'&order=2&kw=<?php echo $kw;?>');" title="价格从高到低" ><span>价格</span><i class="up"></i></a>
    </div>&nbsp;
      <select onchange="Go(sh+'&day='+this.value)">
<option value="0">更新时间</option>
<option value="1">1天内</option>
<option value="3">3天内</option>
<option value="7">7天内</option>
<option value="15">15天内</option>
<option value="30">30天内</option>
</select> 
<select onchange="Go(sh+'&order='+this.value)">
<option value="0">显示顺序</option>
<option value="2">价格由高到低</option>
<option value="3">价格由低到高</option>
<option value="4"><?php echo VIP;?>级别由高到低</option>
<option value="5"><?php echo VIP;?>级别由低到高</option>
<option value="6">供货量由高到低</option>
<option value="7">供货量由低到高</option>
<option value="8">起订量由高到低</option>
<option value="9">起订量由低到高</option>
</select> 
    <label class="merger"><input type="checkbox" onclick="Go(sh+'&price=1');"/> 标价</label>    <label class="merger"><input type="checkbox" onclick="Go(sh+'&thumb=1');"/> 图片</label>    <label class="merger"><input type="checkbox" onclick="Go(sh+'&vip=1');"/> <?php echo VIP;?></label> 
    <div class="listtul fr">
    <form action="<?php echo $MOD['linkurl'];?>search.php" id="fsearch">
<?php if($list == 0) { ?>
<img src="<?php echo DT_SKIN;?>image/list_img_on.gif" width="16" height="16" alt="图片列表" align="absmiddle" class="c_p"/>大图 
<?php } else { ?>
<a class="style_1" href="javascript:;" onclick="Go(sh+'&list=0&kw=<?php echo $kw;?>');"><img src="<?php echo DT_SKIN;?>image/list_img.gif" width="16" height="16" alt="图片列表" align="absmiddle" class="c_p" />大图 </a>
<?php } ?>
<?php if($list == 1) { ?>
<img src="<?php echo DT_SKIN;?>image/list_mix_on.gif" width="16" height="16" alt="图文列表" align="absmiddle" class="c_p"/>列表 
<?php } else { ?>
<a class="style_0" href="javascript:;" onclick="Go(sh+'&list=1&kw=<?php echo $kw;?>');"><img src="<?php echo DT_SKIN;?>image/list_mix.gif" width="16" height="16" alt="图文列表" align="absmiddle" class="c_p"/>列表 </a>
<?php } ?>
              </form>  
            </div>
    </div>
</div>
 <div class="list-index clear">
<!--左边列表 开始-->  
<div class="list-content">
<div class="goods-list clear">
       
 <div class="goods-list-plus clear">
      <?php echo ad($moduleid,$catid,$kw,6);?>
      <?php echo load('m'.$moduleid.'_k'.urlencode($kw).'.htm');?>
      </div>
      <?php if($tags) { ?>
 <form method="post">
    <div class="sell_tip" id="sell_tip" style="display:none;" title="双击关闭" ondblclick="Dh(this.id);">
      <div>
        <p>您可以</p>
        <input type="submit" value="对比选中" onclick="this.form.action='<?php echo $MOD['linkurl'];?>compare.php';" class="tool-btn"/> 或 
        <input type="submit" value="批量询价" onclick="this.form.action='<?php echo $MOD['linkurl'];?>inquiry.php';" class="tool-btn"/>
      </div>
    </div>
<div class="img_tip" id="img_tip" style="display:none;"> </div>
<?php if($list==1) { ?>
<div class="goods-list-plus clear">
<?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
<ul class="list mt10" id="item_<?php echo $t['itemid'];?>">
    <li class="img"><a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>"><img src="<?php echo imgurl($t['thumb']);?>" original="<?php echo imgurl($t['thumb']);?>" alt="<?php echo $t['alt'];?>" title="<?php echo $t['alt'];?>" style="display: inline; "border="0" onerror="this.src='<?php echo DT_SKIN;?>image/nopic100.gif'"></a></li>
    <li class="inform">
        <h2><span class="f14 blue blist"><input type="checkbox" id="check_<?php echo $t['itemid'];?>" name="itemid[]" value="<?php echo $t['itemid'];?>" onclick="sell_tip(this, <?php echo $t['itemid'];?>);" style="vertical-align:middle"/> <a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a> </span></h2>
     <p class="text">介绍：<?php echo dsubstr($t['introduce'], 120, '..');?></p>
    </li>
    <?php if($t['unit'] && $t['price']>0) { ?>
    <li class="price">
    <p><?php echo $DT['money_sign'];?><span class="red f14"><?php echo $t['price'];?></span>/<?php echo $t['unit'];?></p>
    <p><?php echo $t['minamount'];?><?php echo $t['unit'];?>起订</p>
    <p class="f_gray">关注量： <?php echo $t['hits'];?></a></p>
    </li>
    <?php } else { ?>
    <li class="price">
    <p class="f_gray f14">面议</p>
    <p class="f_gray">关注量： <?php echo $t['hits'];?></a></p>
    </li>
    <?php } ?>
    <li class="sw-company">
        <p><a href="<?php echo userurl($t['username']);?>" class="gray orange" target="_blank"><?php echo $t['company'];?></a></p>
        <p class="f_gray"><span class="sw-mod-offerImg-company-place"><?php echo area_pos($t['areaid'], '/', 2);?></span></p>
        <p><?php if($t['vip']) { ?><img src="<?php echo DT_SKIN;?>image/sell/ico-vip.png" alt="<?php echo VIP;?>" title="<?php echo VIP;?>:<?php echo $t['vip'];?>级" align="absmiddle"/> <?php } ?>
   <?php if($t['validated']) { ?><img src="<?php echo DT_SKIN;?>image/sell/ico-cx.png" width="16" height="16" title="高级诚信企业" align="absmiddle"/><?php } else { ?><img src="<?php echo DT_SKIN;?>image/sell/ico-cx-no.png" width="16" height="16" title="普通诚信企业" align="absmiddle"/><?php } ?> 
    <?php if($t['validated']) { ?> <img src="<?php echo DT_SKIN;?>image/sell/ico-qyrz.png" width="24" height="16" title="企业已通过认证" align="absmiddle"/><?php } else { ?><img src="<?php echo DT_SKIN;?>image/sell/ico-qyrz-no.png" width="24" height="16" title="企业未通过认证" align="absmiddle"/><?php } ?> </p>
</li>
    <li class="btn black">
        
        <p class="btn-msg">
        <a onclick="Go('<?php echo $path;?><?php echo rewrite('inquiry.php?itemid='.$t['itemid']);?>');" href="javascript:;">在线议价</a></p>
        <p class="btn-tel">
        <a target="_blank" href="<?php echo userurl($t['username']);?>">联系我们</a></p>
        <?php if($t['qq'] && $DT['im_qq']) { ?><p class="btn-qq">
            <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $t['qq'];?>&site=qq&menu=yes" qq="<?php echo $t['qq'];?>" target="_blank">QQ在线</a>
        </p><?php } ?>
    </li>
</ul>
<?php } } ?>
</div>
<?php } else if($list==0) { ?>
        <?php include template('list-selllist', 'tag');?>
        <?php } ?>
</form>
        <?php } else { ?>
        <div class="goods-list-plus clear">
       <?php include template('empty', 'chip');?>
        </div>
        <?php } ?>           
               
</div>
</div>
 <!--左边列表 end-->                  
 <!--右边推荐开始-->
               <div class="list-sidebar">
               <div class="list-sidebarcen ">
              <div id="adword">
<div class="adword">
<?php echo tag("moduleid=$moduleid&length=20&condition=status=3 and thumb<>''&pagesize=3&order=edittime desc&width=220&height=220&template=xiaohei-list_tj");?> 
</div>
</div>
<div class="clear"> </div>
        <div class="guess mt15" id="guess" style="position: static; z-index: 999;">
       <h4>— 猜你喜欢 —</h4>
       
            <ul>
<?php echo tag("moduleid=$moduleid&length=30&condition=status=3 and title like'%".$kw."%' and thumb<>''&group=username&pagesize=1&order=vip desc,hits desc,editdate desc,edittime desc&template=xiaohei-show_tj");?> 
            </ul>
        </div>

</div></div>
 <!--右边推荐 END-->
  </div>
  
<?php if($showpage && $pages) { ?>
<div class="pages clear"><?php echo $pages;?></div>
<?php } ?>          
</div>
</div>
<!-- main end -->
<div class="clear"></div>
<!--底部版权-->
<?php include template('footer');?>