<?php defined('IN_DESTOON') or exit('Access Denied');?><!doctype html>
<html>
<head>
  <meta charset="<?php echo DT_CHARSET;?>"/>
  <title><?php echo $header_title;?></title>
  <meta name="referrer" content="never">
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
  <link rel="stylesheet" type="text/css" href="<?php echo DT_SKIN;?>style2.css"/>
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
  <!--<div class="logotab">-->
  <!--<div class="wrapper">-->
  <!--&lt;!&ndash;logo&ndash;&gt;-->
  <!--<div class="logo"><h1><a href="<?php echo $MODULE['1']['linkurl'];?>" alt="<?php echo $DT['sitename'];?>"><img src="<?php if($MODULE[$moduleid]['logo']) { ?><?php echo DT_SKIN;?>image/logo_<?php echo $moduleid;?>.png<?php } else if($DT['logo']) { ?><?php echo $DT['logo'];?><?php } else { ?><?php echo DT_SKIN;?>image/logo.png<?php } ?>" alt="<?php echo $DT['sitename'];?>"/></a></h1></div>-->
  <!--&lt;!&ndash;teng&ndash;&gt;-->
  <!--<div id="destoon_space" style="display:none;"></div>-->
  <?php if($head_mobile) { ?><div id="destoon_qrcode" style="display:none;"></div><?php } ?>
  <?php $searchids = array(5,6,4,21);?>
  <?php if(!in_array($searchid, $searchids)) { ?>
  <?php $searchids[] = $searchid;?>
  <?php } ?>
  <!--<script type="text/javascript">var searchid = <?php echo $searchid;?>;</script>-->
  <!--<div class="searchtab" style="margin-left: 54px;">-->
  <!--<script type="text/javascript">var searchid = 5;</script>-->
  <!--<form id="destoon_search" action="<?php echo $MODULE[$searchid]['linkurl'];?>search.php" onsubmit="return Dsearch(1);">-->
  <!--<input type="hidden" name="moduleid" value="<?php echo $searchid;?>" id="destoon_moduleid"/>-->
  <!--<input type="hidden" name="spread" value="0" id="destoon_spread"/>-->
  <!--<div class="stit">-->
  <!--<ul id="search_module">-->
  <?php if(is_array($searchids)) { foreach($searchids as $s) { ?>
  <?php if(isset($MODULE[$s])) { ?>
  <!--<li<?php if($searchid == $s) { ?> class="orange"<?php } ?> onclick="dtmubanModule(<?php echo $s;?>, this);"><?php echo $MODULE[$s]['name'];?><span class="ml5">|</span></li>-->
  <?php } ?>
  <?php } } ?>
  <!--</ul>-->
  <!--</div>-->
  <!--<div class="searstyle">-->
  <!--<span class="searmiddle"><input name="kw" id="destoon_kw" type="text" class="input" value="请输入关键词" onfocus="if(this.value=='请输入关键词') this.value='';" onkeyup="STip(this.value);" autocomplete="off" x-webkit-speech speech/></span>-->
  <!--<span class="searright"><input type="submit" value="搜&nbsp;索" class="search_s f16 white"/></span>-->
  <!--</div>-->
  <!--</form>-->
  <!--<ul class="sfont gray">-->
  <!--热搜词： &lt;!&ndash;<?php echo tag("moduleid=$searchid&table=keyword&condition=moduleid=$searchid and status=3&pagesize=6&order=total_search desc&template=list-search_kw");?>&ndash;&gt;-->
  <!--</ul>-->
  <!--<div id="search_tips" style="display:none;"></div>-->
  <!--</div>-->
  <!--</div>-->
  <!--</div>-->
  <div class="logoandimgout" style="height:107px">
    <div class="logoandimgdiv" style="width: 1294px;">
      <div class="logo"><a href="http://www.dm67.com/"><a href="<?php echo $MODULE['1']['linkurl'];?>" alt="<?php echo $DT['sitename'];?>"><img src="<?php if($MODULE[$moduleid]['logo']) { ?><?php echo DT_SKIN;?>image/logo_<?php echo $moduleid;?>.png<?php } else if($DT['logo']) { ?><?php echo $DT['logo'];?><?php } else { ?><?php echo DT_SKIN;?>image/logo.png<?php } ?>" alt="<?php echo $DT['sitename'];?>"/></a></div>
      <div class="cityname"></div>
      <div class="top_search">
        <div id="q-input">
          <input class="span6 search-query" id="input_keywords" name="input_keywords" maxlength="40">
          <input class="btn" type="button" onclick="gosearch();" value="搜索">
          <script>
            function gosearch() {
              return;
              var t = $('#input_keywords').val();
              if (t == "") {
                alert("请输入关键字");
                return;
              }
              if (t.length < 2) {
                alert("请输入最少2个关键字");
                return;
              }
              fafasearch(t);
            }
          </script>
        </div>
      </div>
      <div class="postout">
        <div class="post"><a href="http://bozhou.dm67.com/user/post_article.html" target="_blank" class="post_button" style="color:white">免费发布信息</a></div>
        <div class="delete">
          <a href="http://bozhou.dm67.com/user/article_list.html" target="_blank" class="delete_button">修改/删除信息</a>
        </div>
      </div>
    </div>
  </div>
  <!--SEARCH !!-->
  <div class="bar">
    <div class="barin">
      <div class="barin_l">
          <span class="bar_hover"><a href="http://bozhou.dm67.com/">首页</a></span>
          <?php $arr = array_slice($MODULE,0,5)?>
          <?php if(is_array($arr)) { foreach($arr as $m) { ?><?php if($m['ismenu']) { ?>
          <span <?php if($m['moduleid']==$moduleid) { ?>class="active"<?php } ?> style="width:131px;text-align: center"  class="bar_link"><a href="<?php echo $m['linkurl'];?>"<?php if($m['isblank']) { ?> target="_blank"<?php } ?>><?php echo $m['name'];?></a>
</span>
          <?php } ?><?php } } ?>
      </div>
    </div>
  </div>
</div>
<div class="clear"> </div>