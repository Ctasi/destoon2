<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<script type="text/javascript">var module_id= <?php echo $moduleid;?>,item_id=<?php echo $itemid;?>,content_id='content',img_max_width=<?php echo $MOD['max_width'];?>;</script>
<div class="m">
<div class="nav"><div><img src="<?php echo DT_SKIN;?>image/ico-share.png" class="share" title="分享好友" onclick="Dshare(<?php echo $moduleid;?>, <?php echo $itemid;?>);"/></div><a href="<?php echo $MODULE['1']['linkurl'];?>">首页</a> <i>&gt;</i> <a href="<?php echo $MOD['linkurl'];?>"><?php echo $MOD['name'];?></a> <i>&gt;</i> <?php echo cat_pos($CAT, ' <i>&gt;</i> ');?></div>
</div>
<div class="m m3">
<div class="m3l nobg bxh">
<h1 class="title" id="title"><?php echo $title;?></h1>
<div class="info"><span class="f_r"><img src="<?php echo DT_SKIN;?>image/ico-zoomin.png" width="16" height="16" title="放大字体" class="c_p" onclick="fontZoom('+', 'article');"/>&nbsp;&nbsp;<img src="<?php echo DT_SKIN;?>image/ico-zoomout.png" width="16" height="16" title="缩小字体" class="c_p" onclick="fontZoom('-', 'article');"/></span>
日期：<?php echo $adddate;?>&nbsp;&nbsp;&nbsp;&nbsp;
<?php if($copyfrom) { ?>来源：<?php if($fromurl) { ?><a href="<?php echo $fromurl;?>" target="_blank"><?php } ?><?php echo $copyfrom;?><?php if($fromurl) { ?></a><?php } ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
<?php if($author) { ?>作者：<?php echo $author;?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
<?php if($MOD['hits']) { ?>浏览：<span id="hits"><?php echo $hits;?></span>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
<?php if($could_comment) { ?><a href="<?php echo $EXT['comment_url'];?><?php echo rewrite('index.php?mid='.$moduleid.'&itemid='.$itemid);?>">评论：<?php echo $comments;?></a>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
</div>
<?php if($introduce && $user_status == 3 && $page == 1) { ?><div class="introduce">核心提示：<?php echo $introduce;?></div><?php } ?>
<?php if($CP) { ?><?php include template('property_show', 'chip');?><?php } ?>
<div id="content"><?php include template('content', 'chip');?></div>
<?php if($voteid) { ?><div class="pd20"><?php if(is_array($voteid)) { foreach($voteid as $v) { ?>
<?php echo load('vote_'.$v.'.htm');?><?php } } ?></div>
<?php } ?>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
<div class="b20 c_b">&nbsp;</div>
<?php if($subtitles) { ?>
<div class="subtitle">
<strong>本文导航：</strong>
<ul>
<?php if(is_array($titles)) { foreach($titles as $i => $t) { ?>
<?php if($subtitles > $i) { ?>
<li>
(<?php echo $i+1;?>)
<?php if($page == $i+1) { ?>
<strong><?php echo $t;?></strong>
<?php } else { ?>
<a href="<?php echo $MOD['linkurl'];?><?php if($i) { ?><?php echo itemurl($item, $i+1);?><?php } else { ?><?php echo $item['linkurl'];?><?php } ?>" title="<?php echo $t;?>"><?php echo $t;?></a>
<?php } ?>
</li>
<?php } ?>
<?php } } ?>
</ul>
<div class="c_b"></div>
</div>
<?php } ?>
<?php if($keytags) { ?>
<div class="keytags">
<strong>标签：</strong>
<?php if(is_array($keytags)) { foreach($keytags as $t) { ?>
<a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?kw='.urlencode($t));?>" target="_blank" class="b"><?php echo $t;?></a>
<?php } } ?>
</div>
<?php } ?>
<?php if($MOD['fee_award']) { ?><div class="award"><div onclick="Go('<?php echo $MODULE['2']['linkurl'];?>award.php?mid=<?php echo $moduleid;?>&itemid=<?php echo $itemid;?>');">打赏</div></div><?php } ?>
<?php if($MOD['page_srelate']) { ?>
<div class="b20">&nbsp;</div>
<?php if($keytags) { ?>
<div class="head-txt"><span><a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?kw='.urlencode($keytags[0]));?>">更多<i>&gt;</i></a></span><strong>同类<?php echo $MOD['name'];?></strong></div>
<div class="related"><?php echo tag("moduleid=$moduleid&length=44&condition=status=3 and itemid<>$itemid and keyword like '%".$keytags['0']."%'&areaid=$cityid&pagesize=".$MOD['page_srelate']."&order=".$MOD['order']."&cols=2&template=list-table", -2);?></div>
<?php } else { ?>
<div class="head-txt"><span><a href="<?php echo $MOD['linkurl'];?><?php echo $CAT['linkurl'];?>">更多<i>&gt;</i></a></span><strong>同类<?php echo $MOD['name'];?></strong></div>
<div class="related"><?php echo tag("moduleid=$moduleid&length=44&catid=$catid&condition=status=3 and itemid!=$itemid&areaid=$cityid&pagesize=".$MOD['page_srelate']."&order=".$MOD['order']."&cols=2&template=list-table", -2);?></div>
<?php } ?>
<?php } ?>
<?php include template('comment', 'chip');?>
<br/>
</div>
<div class="m3r">
<?php if($MOD['page_srecimg']) { ?>
<div class="head-sub"><strong>推荐图文</strong></div>
<div class="list-thumb"><?php echo tag("moduleid=$moduleid&length=20&condition=status=3 and level=3 and thumb!=''&catid=$catid&areaid=$cityid&pagesize=".$MOD['page_srecimg']."&order=".$MOD['order']."&width=124&height=93&cols=2&template=thumb-table");?></div>
<?php } ?>
<?php if($MOD['page_srec']) { ?>
<div class="head-sub mt20"><strong>推荐<?php echo $MOD['name'];?></strong></div>
<div class="list-txt"><?php echo tag("moduleid=$moduleid&condition=status=3 and level=1&catid=$catid&areaid=$cityid&order=".$MOD['order']."&pagesize=".$MOD['page_srec']);?></div>
<?php } ?>
<?php if($MOD['page_shits']) { ?>
<div class="head-sub mt20"><strong>点击排行</strong></div>
<div class="list-rank"><?php echo tag("moduleid=$moduleid&condition=status=3 and addtime>$today_endtime-30*86400&catid=$catid&areaid=$cityid&order=hits desc&key=hits&pagesize=9&template=list-rank");?></div>
<?php } ?>
</div>
<div class="c_b"></div>
</div>
<?php if($content) { ?><script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/content.js"></script><?php } ?>
<?php include template('footer');?>