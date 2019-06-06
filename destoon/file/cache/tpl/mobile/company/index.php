<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div id="head-bar">
<div class="head-bar">
<div class="head-bar-back">
<a href="<?php echo $back_link;?>" data-direction="reverse"><img src="<?php echo DT_MOB;?>static/img/icon-back.png" width="24" height="24"/><span>频道</span></a>
</div>
<div class="head-bar-title"><?php echo $head_name;?></div>
<div class="head-bar-right">
<a href="javascript:Dsheet('<a href=&#34;<?php echo DT_MOB;?>api/search.php?mid=<?php echo $moduleid;?>&#34;><span><?php echo $MOD['name'];?>搜索</span></a>|<a href=&#34;<?php echo DT_MOB;?>api/category.php?moduleid=<?php echo $moduleid;?>&#34;><span>按分类浏览</span></a>|<a href=&#34;<?php echo DT_MOB;?>api/area.php?moduleid=<?php echo $moduleid;?>&#34;><span>按地区浏览</span></a>|<a href=&#34;<?php echo $MOD['mobile'];?><?php echo rewrite('news.php?page=1');?>&#34;><span>企业新闻</span></a>', '取消');"><img src="<?php echo DT_MOB;?>static/img/icon-action.png" width="24" height="24"/></a>
</div>
</div>
<div class="head-bar-fix"></div>
</div>
<?php if($lists) { ?>
<?php if(is_array($lists)) { foreach($lists as $v) { ?>
<div class="list-img">
<a href="<?php echo $v['linkurl'];?>" rel="external"><img src="<?php if($v['thumb']) { ?><?php echo $v['thumb'];?><?php } else { ?><?php echo DT_MOB;?>static/img/60x60.png<?php } ?>" width="60" height="60" alt="" onerror="this.src='<?php echo DT_MOB;?>static/img/60x60.png';"/></a>
<ul>
<li<?php if($v['vip']) { ?> class="vip" title="<?php echo VIP;?>:<?php echo $v['vip'];?>"<?php } ?>><a href="<?php echo $v['linkurl'];?>" rel="external"><strong><?php echo $v['company'];?></strong></a></li>
<li><span class="f_r"><?php echo area_pos($v['areaid'], '', 2);?></span><span>主营:<?php echo $v['business'];?></span></li>
</ul>
</div>
<?php } } ?>
<?php } else { ?>
<?php include template('empty', 'chip');?>
<?php } ?>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<?php include template('footer');?>