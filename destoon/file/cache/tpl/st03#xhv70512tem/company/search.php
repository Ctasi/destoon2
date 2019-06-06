<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<script type="text/javascript" src="<?php echo DT_SKIN;?>js/category_list.js"></script> 
<script type="text/javascript">var sh = '<?php echo $MOD['linkurl'];?>search.php?catid=<?php echo $catid;?>';</script>
<div class="wrapper mt20 clear">
  <div class="main-content clear">
    <div class="sort-filter ">
      <div class="sf-hot">
        <h3>你现在的位置：</h3>
        <ul>
          <li><a href="<?php echo $MODULE['1']['linkurl'];?>" target="_self">首页</a> » <a href="<?php echo $MOD['linkurl'];?>"><?php echo $MOD['name'];?></a> » <?php echo cat_pos($CAT, ' » ');?></li>
          <li class="fr mr-10">共找到 <b class="red"><?php echo $items;?></b> 条企业信息</li>
        </ul>
      </div>
      <!-- 面包屑开始 -->
      <div class="sf-content">
        <h3>分&nbsp;&nbsp;类：</h3>
        <div class="sf-link">
          <div class="zk close">
            <ul>
              <li><a  href="<?php echo $MOD['linkurl'];?>" class="current">全部</a></li>
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
              <li><a href="<?php echo $MOD['linkurl'];?>" class="current">全部</a></li>
              <?php $mainarea = get_mainarea(0)?>
              <?php if(is_array($mainarea)) { foreach($mainarea as $k => $v) { ?>
              <li><a href="<?php echo $MOD['linkurl'];?>search.php?areaid=<?php echo $v['areaid'];?>&catid=<?php echo $catid;?>"><?php echo $v['areaname'];?></a></li>
              <?php } } ?>
            </ul>
            <a class="more theca" href="javascript:void(0)">更多</a> </div>
        </div>
      </div>
      <div class="hot_search"> <span class="fl">热门搜索：</span>
        <div class="fl">
          <ul>
            <?php echo tag("moduleid=$searchid&table=keyword&condition=moduleid=$searchid and status=3&pagesize=18&order=total_search desc&template=list-search_kw");?>
          </ul>
        </div>
        <div class="fr">
          <select  onchange="Go(sh+'&mode='+this.value)">
            <option value="0" selected="selected">经营模式</option>
            <option value="1">制造商</option>
            <option value="2">贸易商</option>
            <option value="3">服务商</option>
            <option value="4">其他机构</option>
          </select>
          <select onchange="Go(sh+'&vip='+this.value)">
            <option value="0" selected="selected">VIP指数</option>
            <option value="1">VIP</option>
            <option value="2">1</option>
            <option value="3">2</option>
            <option value="4">3</option>
            <option value="5">4</option>
            <option value="6">5</option>
            <option value="7">6</option>
            <option value="8">7</option>
            <option value="9">8</option>
            <option value="10">9</option>
            <option value="11">10</option>
          </select>
          <select onchange="Go(sh+'&day='+this.value)">
            <option value="0">更新时间</option>
            <option value="1">1天内</option>
            <option value="3">3天内</option>
            <option value="7">7天内</option>
            <option value="15">15天内</option>
            <option value="30">30天内</option>
          </select>
        </div>
      </div>
    </div>
    <!--公司列表开始-->
    <div class="list-index mt20 clear"> 
      <!--左侧-->
      <div class="list-content"> 
<?php if($page==1 && $kw) { ?>
<?php echo ad($moduleid,$catid,$kw,6);?>
<?php echo load('m'.$moduleid.'_k'.urlencode($kw).'.htm');?>
<?php } ?>
<?php if($tags) { ?>
<?php include template('xiaohei-comlist', 'tag');?>
<?php } else { ?>
<?php include template('empty', 'chip');?>
<?php } ?>
      </div>
      <!--右侧-->
      <div class="list-sidebar">
        <div class="list-sidebarcen ">
          <h3> <span>名企推荐</span> <a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?vip=1');?>" rel="nofollow">更多&raquo;</a> </h3>
          <ul>
            <?php echo tag("moduleid=$moduleid&condition=groupid>5 and catids<>'' and level=1&areaid=$cityid&pagesize=10&order=userid desc&template=xiaohei-listcom");?>
          </ul>
        </div>
        <div class="list-sidebarcen ">
          <h3><span>最新<?php echo VIP;?>会员</span> <a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?vip=1');?>" rel="nofollow">更多&raquo;</a> </h3>
          <ul>
            <?php echo tag("moduleid=$moduleid&condition=vip>0 and catids<>''&areaid=$cityid&pagesize=10&order=fromtime desc&template=xiaohei-listcom");?>
          </ul>
        </div>
        <div class="list-sidebarcen ">
          <h3><span>企业新闻</span> <a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('news.php?page=1');?>">更多&raquo;</a> </h3>
          <ul>
            <?php echo tag("table=news&condition=status=3&pagesize=10&datetype=2&order=addtime desc&target=_blank");?>
          </ul>
        </div>
        <div class="list-sidebarcen ">
          <h3><span>最新会员</span> <a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?page=1');?>" rel="nofollow">更多&raquo;</a> </h3>
          <ul>
            <?php echo tag("moduleid=$moduleid&condition=groupid>5 and catids<>''&areaid=$cityid&pagesize=10&order=userid desc&template=xiaohei-listcom");?>
          </ul>
        </div>
      </div>
    </div>
    <?php if($showpage && $pages) { ?>
    <div class="pages"><?php echo $pages;?></div>
    <?php } ?> </div>
</div>
<!-- main end -->
<div class="clear"> </div>
<!--底部版权--> 
<?php include template('footer');?>