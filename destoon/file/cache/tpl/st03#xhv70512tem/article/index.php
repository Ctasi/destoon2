<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div class="selectdiv">
<div class="select">
<div class="sort2">
新闻资讯
</div>
<div style="clear:both;"></div>
</div>
</div>
<div class="listcenter">
<div class="list_left">
<div class="titlehead" style="background:#0e69c5">
<div class="titleheadin">
您的位置：<a href="<?php echo $MODULE['1']['linkurl'];?>" target="_self">首页</a> » <a href="<?php echo $MOD['linkurl'];?>"><?php echo $MOD['name'];?></a>
</div>
</div>
<?php $tags = tag("moduleid=21&template=null")?>
<div style="min-height:500px;background:#fff;border-radius:5px;">
<?php if(is_array($news)) { foreach($news as $m) { ?>
<div class="title_c">
<div class="title_in">
<a href="<?php echo $m['linkurl'];?>" class="f14 fbluef" target="_blank"><?php echo $m['title'];?></a>
<br>
<span class="content"><?php echo $m['introduce'];?></span>
</div>
<div class="time_c"><?php echo date("Y-m-d h:i:sa",$m['addtime'])?></div>
</div>
<?php } } ?>
</div>
<div id="_fedcc87c7219d4d0_fengyen" class="pagelistblue" style="margin-top: 20px;">
<a href="index.php?page=2">首页</a>
<?php if($page <= 1) { ?>
<a href="index.php?page=<?php echo 1?>"> < </a>
<?php } ?>
<?php if($page > 1) { ?>
<a href="index.php?page=<?php echo $page - 1?>"> < </a>
<?php } ?>
<?php if(is_array($arrs)) { foreach($arrs as $key => $p) { ?>
<a <?php if($p == '....') { ?> href=""<?php } else { ?>href="index.php?page=<?php echo $p;?>"<?php } ?> class="" <?php if($page == $p) { ?>style="color:#0e69c5"<?php } ?>> <?php echo $p;?> </a>
<?php } } ?>
<?php if($page >= $num) { ?>
<a href="index.php?page=<?php echo $num?>"> > </a>
<?php } ?>
<?php if($page < $num) { ?>
<a href="index.php?page=<?php echo $page + 1?>"> > </a>
<?php } ?>
<a href="index.php?page=<?php echo $num;?>">尾页</a></div>
<div style="clear:both;"></div>
<div class="tishi_b">
对找到的信息不满意？赶快<a href="http://bozhou.dm67.com/user/post_article.html">免费发布一条</a>吧！
</div>
<div style="clear:both;"></div>
</div>
<div class="list_right">
<!--------------------------------------------------广告开始-------------------------------------------------->
<div class="googlead">
<div style="line-height:50px;">
<span>新闻资讯分类</span> <br><a href="http://bozhou.dm67.com/newlist/554_"></a>
</div>
</div>
<div class="googlead" id="xuanfu" style="position: static;">
<div id="_0p2bhzp1aqc">
<p>全部分类</p>
<ul>
<?php if(is_array($maincat)) { foreach($maincat as $k => $v) { ?>
<li class="<?php if($v['catid']==$catid) { ?>side_on<?php } else { ?>side_li<?php } ?>"><a href="<?php echo $MOD['linkurl'];?><?php echo $v['linkurl'];?>"><?php echo set_style($v['catname'],$v['style']);?><?php if(!$cityid) { ?> <em>(<?php echo $v['item'];?>)</em><?php } ?></a></li>
<?php } } ?>
</ul>
<div style="clear:both;"></div>
</div>
</div>
<!--------------------------------------------------广告结束----------------------------------------------->
</div>
<div style="clear:both;"></div>
</div>
<?php include template('footer');?>