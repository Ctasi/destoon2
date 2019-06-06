<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<script type="text/javascript">var sh = '<?php echo $MOD['linkurl'];?>search.php?catid=<?php echo $catid;?>';</script>
<script type="text/javascript" src="<?php echo DT_SKIN;?>js/category_list.js"></script>
<div class="wrapper mt20 clear">
<div class="main-content clear">
<div class="sort-filter ">
<div class="sf-hot">
<h3>你现在的位置：</h3>
    <ul>
  <li><a href="<?php echo $MODULE['1']['linkurl'];?>" target="_self">首页</a> » <a href="<?php echo $MOD['linkurl'];?>"><?php echo $MOD['name'];?></a> » <?php echo cat_pos($CAT, ' » ');?></li>
   <li class="fr mr-10">共找到 <b class="red"><?php echo $items;?></b> 条<strong class="red"> <?php echo $CAT['catname'];?> </strong> 产品信息</li> 
    </ul>
</div>
<div class="sf-content">
    <h3>分&nbsp;&nbsp;类：</h3>
    <div class="sf-link">
    <div class="zk close">
<ul>
        <li><a  href="<?php echo $MOD['linkurl'];?>" class="current">全部</a></li>
 <?php if(is_array($maincat)) { foreach($maincat as $k => $v) { ?>
            <li <?php if($k > $MOD['page_subcat']) { ?> class="hide"<?php } ?>><a <?php if($v['catid']==$catid) { ?> class="current"<?php } ?> href="<?php echo $MOD['linkurl'];?><?php echo $v['linkurl'];?>" target="_self"><?php echo $v['catname'];?><?php if(!$cityid) { ?> <span><?php echo $v['item'];?></span><?php } ?></a></li>
            <?php } } ?>
    </ul>
    <?php if($k > $MOD['page_subcat']) { ?><a class="more theca" href="javascript:void(0)">更多</a><?php } ?> 
     </div>
    </div>
</div>
<div class="sf-content">
    <h3>区&nbsp;&nbsp;域：</h3>
    <div class="sf-link sf-unfold">
    <div class="zk close">
              <ul>
            <li><a href="<?php echo $MOD['linkurl'];?>" class="current">全部</a></li>
            <?php $mainarea = get_mainarea(0)?>
            <?php if(is_array($mainarea)) { foreach($mainarea as $k => $v) { ?>
             <li><a href="<?php echo $MOD['linkurl'];?>search.php?areaid=<?php echo $v['areaid'];?>&catid=<?php echo $catid;?>"><?php echo $v['areaname'];?></a></li>
            <?php } } ?>
                  </ul>
                  <a class="more theca" href="javascript:void(0)">更多</a>
     </div>
    </div>
</div>
<div class="sf-sequence">
<script type="text/javascript">var sh = '<?php echo $MOD['linkurl'];?>search.php?catid=<?php echo $catid;?><?php if($typeid>-1) { ?>&typeid=<?php echo $typeid;?><?php } ?>';</script>
    <div class="fl">
        <a href="javascript:void(0)" sort="default" onclick="Go(sh+'&order=0');" title="默认排序" class="current left">默认排序</a>     
        <a href="javascript:void(0)" sort="rate" onclick="resetIndex('rate');" title="销量从高到低" ><span>销量</span><i class="up"></i></a>
        <a href="javascript:void(0)" sort="price" onclick="Go(sh+'&order=3');" title="价格从低到高" ><span>价格</span><i class="down"></i></a>
        <a href="javascript:void(0)" sort="price2" onclick="Go(sh+'&order=2');" title="价格从高到低" ><span>价格</span><i class="up"></i></a>
    </div>
    &nbsp;
          <select onchange="Go(sh+'&day='+this.value)">
<option value="0">更新时间</option>
<option value="1">1天内</option>
<option value="3">3天内</option>
<option value="7">7天内</option>
<option value="15">15天内</option>
<option value="30">30天内</option>
</select>&nbsp;
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
</select>&nbsp;
    <label class="merger"><input type="checkbox" onclick="Go(sh+'&price=1');"/>&nbsp;标价</label>    <label class="merger"><input type="checkbox" onclick="Go(sh+'&thumb=1');"/>&nbsp;图片</label>    <label class="merger"><input type="checkbox" onclick="Go(sh+'&vip=1');"/>&nbsp;<?php echo VIP;?></label>&nbsp;
    <div class="listtul fr">
    <a class="style_1" href="javascript:;" onclick="Go(sh+'&amp;list=0');"><img src="<?php echo DT_SKIN;?>image/list_img_on.gif" width="16" height="16" alt="图片列表" align="absmiddle" class="c_p" />大图&nbsp;</a>
<a class="style_1" href="javascript:;" onclick="Go(sh+'&amp;list=1');">
<img src="<?php echo DT_SKIN;?>image/list_mix.gif" width="16" height="16" alt="图文列表" align="absmiddle" class="c_p" onclick="Go(sh+'&list=0');"/>列表&nbsp;</a></div>
    </div>
</div>
 <div class="list-index clear">
<!--左边列表 开始-->  
<div class="list-content">
<div class="goods-list clear ">
 <?php if($page == 1) { ?><?php echo ad($moduleid,$catid,$kw,6);?><?php } ?>  
  <?php if($tags) { ?>
 <form method="post">
    <div class="sell_tip" id="sell_tip" style="display:none;" title="双击关闭" ondblclick="Dh(this.id);">
<div>
<p>您可以</p>
<input type="submit" value="对比选中" onclick="this.form.action='<?php echo $MOD['linkurl'];?>compare.php';" class="btn_1" onmouseover="this.className='btn_2'" onmouseout="this.className='btn_1'"/> 或 
<input type="submit" value="批量询价" onclick="this.form.action='<?php echo $MOD['linkurl'];?>inquiry.php';" class="btn_1" onmouseover="this.className='btn_2'" onmouseout="this.className='btn_1'"/>
</div>
</div>
<div class="img_tip" id="img_tip" style="display:none;"> </div>
<?php include template('xiaohei-malllist', 'tag');?>
 </form>
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
 
<div class="clear"> </div>
        <div class="guess mt15" id="guess"  style="position: static;">
       <h4>— 猜你喜欢 —</h4>
       
            <ul>
<?php echo tag("moduleid=$moduleid&catid=$catid&child=1&length=30&condition=status=3 and thumb<>''&group=username&pagesize=1&order=vip desc,hits desc&template=xiaohei-show_tj");?> 
            </ul>
        </div>
        
</div></div>
 <!--右边推荐 END-->
  </div>
  </div>
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