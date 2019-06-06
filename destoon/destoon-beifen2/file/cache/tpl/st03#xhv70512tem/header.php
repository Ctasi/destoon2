<?php defined('IN_DESTOON') or exit('Access Denied');?><!doctype html>
<html>
<head>
<meta charset="<?php echo DT_CHARSET;?>"/>
<title><?php if($seo_title) { ?><?php echo $seo_title;?><?php } else { ?><?php if($head_title) { ?><?php echo $head_title;?><?php echo $DT['seo_delimiter'];?><?php } ?><?php if($city_sitename) { ?><?php echo $city_sitename;?><?php } else { ?><?php echo $DT['sitename'];?><?php } ?><?php } ?></title>
<meta name="generator" content="template - www.dtmuban.com - ST03"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<?php if($head_keywords) { ?>
<meta name="keywords" content="<?php echo $head_keywords;?>"/>
<?php } ?>
<?php if($head_description) { ?>
<meta name="description" content="<?php echo $head_description;?>"/>
<?php } ?>
<?php if($head_mobile) { ?>
<meta http-equiv="mobile-agent" content="format=html5;url=<?php echo $head_mobile;?>">
<?php } ?>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DT_STATIC;?>favicon.ico"/>
<link rel="bookmark" type="image/x-icon" href="<?php echo DT_STATIC;?>favicon.ico"/>
<?php if($head_canonical) { ?>
<link rel="canonical" href="<?php echo $head_canonical;?>"/>
<?php } ?>
<?php if($EXT['archiver_enable']) { ?>
<link rel="archives" title="<?php echo $DT['sitename'];?>" href="<?php echo $EXT['archiver_url'];?>"/>
<?php } ?>
<link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?>style.css"/>
<?php if($moduleid>1) { ?>
<link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?><?php echo $module;?>.css"/>
<?php } ?>
<?php if($CSS) { ?>
<?php if(is_array($CSS)) { foreach($CSS as $css) { ?>
<link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?><?php echo $css;?>.css"/>
<?php } } ?>
<?php } ?>
<!--[if lte IE 6]>
<link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?>ie6.css"/>
<![endif]-->
<?php if(!DT_DEBUG) { ?><script type="text/javascript">window.onerror=function(){return true;}</script><?php } ?>
<script type="text/javascript" src="<?php echo DT_STATIC;?>lang/<?php echo DT_LANG;?>/lang.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/config.js"></script>
<!--[if lte IE 9]><!-->
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/jquery-1.5.2.min.js"></script>
<!--<![endif]-->
<!--[if (gte IE 10)|!(IE)]><!-->
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/jquery-2.1.1.min.js"></script>
<!--<![endif]-->
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/common.js"></script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/page.js"></script>
<script type="text/javascript" src="<?php echo DT_SKIN;?>js/jquery.superslide.2.1.1.js"></script>
<?php if($lazy) { ?><script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/jquery.lazyload.js"></script><?php } ?>
<?php if($JS) { ?>
<?php if(is_array($JS)) { foreach($JS as $js) { ?>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/<?php echo $js;?>.js"></script>
<?php } } ?>
<?php } ?>
<?php $searchid = ($moduleid > 3 && $MODULE[$moduleid]['ismenu'] && !$MODULE[$moduleid]['islink']) ? $moduleid : 5;?>
<script type="text/javascript">
<?php if($head_mobile && $EXT['mobile_goto']) { ?>
GoMobile('<?php echo $head_mobile;?>');
<?php } ?>
var searchid = <?php echo $searchid;?>;
<?php if($itemid && $DT['anticopy']) { ?>
document.oncontextmenu=function(e){return false;};
document.onselectstart=function(e){return false;};
<?php } ?>
window.onerror=function(){return true;} 
</script>
</head>
<body>
<?php if(!$DT['close_topgg']) { ?><?php if($moduleid==1) { ?><?php include template('mini-gonggao');?><?php } ?><!--公告--><?php } ?>
<?php include template('top-mini');?>
<?php include template('top-so');?>
<div class="navbg">
  <div class="logotab">
    <div class="wrapper">
<!--logo-->
      <div class="logo"><h1><a href="<?php echo $MODULE['1']['linkurl'];?>" alt="<?php echo $DT['sitename'];?>"><img src="<?php if($MODULE[$moduleid]['logo']) { ?><?php echo DT_SKIN;?>image/logo_<?php echo $moduleid;?>.png<?php } else if($DT['logo']) { ?><?php echo $DT['logo'];?><?php } else { ?><?php echo DT_SKIN;?>image/logo.png<?php } ?>" alt="<?php echo $DT['sitename'];?>"/></a></h1></div>
  <!--teng-->
      <div class="logofont"><a href="<?php echo $MODULE['1']['linkurl'];?>"><img src="<?php if($MODULE[$moduleid]['logo']) { ?><?php echo DT_SKIN;?>image/logofont_<?php echo $moduleid;?>.png<?php } else { ?><?php echo DT_SKIN;?>image/logofont.png<?php } ?>" alt="<?php echo $DT['sitename'];?>"/></a></div>
      <div id="destoon_space" style="display:none;"></div>
    <?php if($head_mobile) { ?><div id="destoon_qrcode" style="display:none;"></div><?php } ?>
    <?php $searchids = array(5,6,4,21);?>
    <?php if(!in_array($searchid, $searchids)) { ?>
    <?php $searchids[] = $searchid;?>
    <?php } ?> 
    <script type="text/javascript">var searchid = <?php echo $searchid;?>;</script>
      <div class="searchtab"> 
        <script type="text/javascript">var searchid = 5;</script>
        <form id="destoon_search" action="<?php echo $MODULE[$searchid]['linkurl'];?>search.php" onsubmit="return Dsearch(1);">
          <input type="hidden" name="moduleid" value="<?php echo $searchid;?>" id="destoon_moduleid"/>
          <input type="hidden" name="spread" value="0" id="destoon_spread"/>
          <div class="stit">
          <ul id="search_module">
          <?php if(is_array($searchids)) { foreach($searchids as $s) { ?>
          <?php if(isset($MODULE[$s])) { ?>
          <li<?php if($searchid == $s) { ?> class="orange"<?php } ?> onclick="dtmubanModule(<?php echo $s;?>, this);"><?php echo $MODULE[$s]['name'];?><span class="ml5">|</span></li>
          <?php } ?>
          <?php } } ?>
          </ul>
          <ul class="fr red">购买模板请联系QQ：290948585（小黑）</ul>
          </div>
          <div class="searstyle">
          <span class="searmiddle"><input name="kw" id="destoon_kw" type="text" class="input" value="请输入关键词" onfocus="if(this.value=='请输入关键词') this.value='';" onkeyup="STip(this.value);" autocomplete="off" x-webkit-speech speech/></span>
          <span class="searright"><input type="submit" value="搜&nbsp;索" class="search_s f16 white"/></span>
          </div>
        </form>
        <ul class="sfont gray">
          热搜词： <?php echo tag("moduleid=$searchid&table=keyword&condition=moduleid=$searchid and status=3&pagesize=6&order=total_search desc&template=list-search_kw");?>
        </ul>
       <div id="search_tips" style="display:none;"></div>
      </div>
      <div class="toprs fr">
        <div class="ask-price f14">
          <p>让卖家找上门</p>
          <p><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=6&action=add" title="发布询价单" target="_blank">发布询价单>></a></p>
        </div>
        <div class="code">
          <p>微信扫一扫</p>
          <p class="codeimg"><img src="<?php if($DT['erwei']) { ?><?php echo $DT['erwei'];?><?php } else { ?><?php echo DT_SKIN;?>image/erwei.jpg<?php } ?>" alt="<?php echo $DT['sitename'];?>二维码" height="80" width="80"/></p>
        </div>
      </div>
    </div>
  </div>
  <div class="nav-new">
    <div class="wrapper">
      <div class="cate"> <i class="ico"></i>热门分类 </div>
      <ul class="nav-mid white">
        <li<?php if($moduleid<4) { ?> class="active"<?php } ?>><a href="<?php echo $MODULE['1']['linkurl'];?>">首页</a>
        </li>
        <?php if(is_array($MODULE)) { foreach($MODULE as $m) { ?><?php if($m['ismenu']) { ?>
        <li <?php if($m['moduleid']==$moduleid) { ?>class="active"<?php } ?>><a href="<?php echo $m['linkurl'];?>"<?php if($m['isblank']) { ?> target="_blank"<?php } ?>><?php echo $m['name'];?></a></li>
        <?php } ?><?php } } ?>
      </ul>
      <ul class="nav-right white">
        <i></i>
        <li><a href="<?php echo $MODULE['18']['linkurl'];?>" target="_blank">以商会友</a></li>
        <li><a href="<?php echo $EXT['spread_url'];?>" target="_blank">推广排名</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="clear"> </div>