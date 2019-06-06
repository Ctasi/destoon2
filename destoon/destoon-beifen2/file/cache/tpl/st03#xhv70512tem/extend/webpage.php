<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header-mini');?>
<link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?>webpage.css"/>
<!-- header -->
<div class="header-wrap">
    <div class="header">
        <div class="top">
            <div class="logo fl">
                <a href="<?php echo DT_PATH;?>" class="fl" target="_blank" title="<?php echo $DT['sitename'];?>">
                    <img src="<?php echo DT_SKIN;?>image/logo.gif" height="68" width="200" alt="<?php echo $DT['sitename'];?>">
                </a>
            </div>
            <h1 class="title-about fl"><a href="<?php echo DT_PATH;?>"><?php echo $title;?></a></h1>
            <div class="h-nav fr">
                <ul>
                 <li class="nav-itm"><a href="<?php echo DT_PATH;?>">网站首页</a></li>
                  <?php $tags=tag("table=webpage&condition=item='$_item'&areaid=$cityid&pagesize=99&order=listorder desc,itemid desc&template=null");?> 
          <?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
<li class="nav-itm" id="webpage_<?php echo $t['itemid'];?>"><a href="<?php if($t['domain']) { ?><?php echo $t['domain'];?><?php } else { ?><?php echo DT_PATH;?><?php echo $t['linkurl'];?><?php } ?>"><?php echo $t['title'];?></a></li>
          <?php } } ?>
           </ul>
            </div>
        </div>
    </div>
</div>
<!-- path -->
    <div class="layout">
        <div class="path">
当前位置: <a href="<?php echo $MODULE['1']['linkurl'];?>">首页</a> &raquo; <a href="<?php echo DT_PATH;?><?php echo $linkurl;?>"><?php echo $title;?></a><span>&gt;</span>
                    </div>
    </div>
    <!-- main -->
    <div class="layout">
        <div class="main clf">
            <div class="unit content-about">
                <h2 class="content-hd"><?php echo $title;?></h2>
                <div class="detail">
                    <div class="article">
                    <span style="font-size:32px;" id="content"><?php echo $content;?></span></div>
                </div>
            </div>
        </div>
    </div>
  
<script type="text/javascript">try{Dd('webpage_<?php echo $itemid;?>').className='current';}catch(e){}</script>
<?php include template('footer-mini');?>