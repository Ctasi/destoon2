<?php defined('IN_DESTOON') or exit('Access Denied');?><div class="Top_float clearfix" id="J_Search" style="position: fixed;">
            <!--搜索漂浮-->
            <div class="screen-hd" style="display: none;">
                <div class="screen-hd-wrap">
                    <div class="s-logo">
                        <a href="<?php echo DT_PATH;?>" target="_self" title="<?php echo $DT['sitename'];?>">
                            <img src="<?php echo DT_SKIN;?>image/s_logo.jpg" width="185" height="40"></a>
                    </div>
                    <div class="searchcont">
                        <div class="search">
    <form action="<?php echo $MODULE[$searchid]['linkurl'];?>search.php">
    <input name="kw" type="text" class="txt" value="<?php echo $kw;?>" placeholder="请输入搜索产品信息的关键字!" x-webkit-speech speech/> 
    <input type="submit" value="网一下" class="btn"/>
  
                              </form>
                        </div>
                    </div>
                    <div class="T-publish">
                        <a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_login'];?>" rel="nofollow" target="_blank">免费发布优质产品信息</a>
                    </div>
                </div>
            </div>
            <!--搜索漂浮结束-->
        </div>