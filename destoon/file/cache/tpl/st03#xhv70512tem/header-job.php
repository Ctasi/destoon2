<?php defined('IN_DESTOON') or exit('Access Denied');?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo DT_CHARSET;?>"/>
<title><?php if($seo_title) { ?><?php echo $seo_title;?><?php } else { ?><?php if($head_title) { ?><?php echo $head_title;?><?php echo $DT['seo_delimiter'];?><?php } ?><?php if($city_sitename) { ?><?php echo $city_sitename;?><?php } else { ?><?php echo $DT['sitename'];?><?php } ?><?php } ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="generator" content="template - www.dtmuban.com - ST03"/>
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
<link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?>job-common.css"/>
<link href="<?php echo DT_SKIN;?>job-common.css" rel="stylesheet" type="text/css" />
<link href="<?php echo DT_SKIN;?>job-2.css" rel="stylesheet" type="text/css" />
<link href="<?php echo DT_SKIN;?>ui-dialog.css" rel="stylesheet" type="text/css" />
<?php if($moduleid>4) { ?>
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
<script type="text/javascript" src="<?php echo DT_SKIN;?>js/index_foucs.js"></script>
<?php if($lazy) { ?><script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/jquery.lazyload.js"></script><?php } ?>
<script type="text/javascript">
jQuery(document).ready(function($) {
//选项卡切换
$(".n-tab-control>a").each(function(){
$(this).click(function(){
$(this).addClass("select"); 
$(this).siblings("a").removeClass("select");
var bull_index = $(".n-tab-control>a").index(this);
$(".news-tab-box>ul").eq(bull_index).show().siblings().hide();
})
});

</script>
</head>
<body >
<!-- 头部 -->
<div id="header">
  <div class="top-nav-wrap">
    <div class="top-nav clearfix">
      <ul class="f-left">
        <li><a href="<?php echo DT_PATH;?>" target="_self" class="nav-li active">平台首页</a></li>
<?php if(isset($MODULE['5'])) { ?><li><a href="<?php echo $MODULE['5']['linkurl'];?>" target="_blank" class="nav-li"><?php echo $MODULE['5']['name'];?></a></li><?php } ?>
<?php if(isset($MODULE['6'])) { ?><li><a href="<?php echo $MODULE['6']['linkurl'];?>" target="_blank" class="nav-li"><?php echo $MODULE['6']['name'];?></a></li><?php } ?>
<?php if(isset($MODULE['4'])) { ?><li><a href="<?php echo $MODULE['5']['linkurl'];?>" target="_blank" class="nav-li"><?php echo $MODULE['4']['name'];?></a></li><?php } ?>
      </ul>
      <div class="nav-right f-right" id="destoon_member"></div>
    </div>
  </div>
  <div class="container-index header-main clearfix">
    <div class="logo-box f-left"><a href="/"><img src="<?php echo DT_SKIN;?>image/job/logo.gif" alt="人才系统" border="0" align="absmiddle" width="260" height="70"/></a></div>
    <!-- 分站 -->
    <div class="station-choose f-left">
      <p class="station-name"><?php echo $DT['jdhttp'];?></p>
      <p class="station-name">人才系统</p>
     </div>
    <div class="mobile-block f-right">
      <div class="mob-btn-box f-left"> <a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=9&action=add" target="_blank" class="mob-btn phone webApp">发布职位</a></div>
      <div class="mob-btn-box f-left"> <a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=9&action=add&resume=1" target="_blank" class="mob-btn wechat weChat">发布简历</a></div>
    </div>
  </div>
</div>
<!-- 头部结束 -->