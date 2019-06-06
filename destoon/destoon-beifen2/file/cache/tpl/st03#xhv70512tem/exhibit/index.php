<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header');?>
<div class="mt15 m">
  <div class="m_l f_l">
    <table cellpadding="10" cellspacing="1" width="100%" bgcolor="#DDDDDD">
      <tr bgcolor="#fff" align="center"> <?php for($i=1;$i<13;$i++){ $j = $i<10 ? '0'.$i : $i;?>
          <td<?php if($j==date('m')) { ?> bgcolor="#E0E0E0"<?php } ?>>
        <a href="<?php echo $MOD['linkurl'];?><?php echo rewrite('search.php?month='.$i);?>" rel="nofollow"><?php echo $j;?>月</a>
          </td>
        <?php } ?> </tr>
    </table>
    <div class="b10"> </div>
    <table cellpadding="0" cellspacing="0" width="100%">
      <tr>
        <td valign="top" width="230"><div class="box_head">
            <div><strong>今日头条</strong></div>
          </div>
          <div class="exh_rec"> 
            <?php $tags=tag("moduleid=$moduleid&condition=status=3 and level=1&areaid=$cityid&pagesize=4&order=".$MOD['order']."&template=null");?>
            <table width="100%">
              <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
              <tr>
                <td valign="top"><ul>
                    <li><a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a></li>
                    <li>&nbsp;<?php echo timetodate($t['fromtime'], 3);?> 至 <?php echo timetodate($t['totime'], 3);?> [<?php echo $t['city'];?>]</li>
                    <li title="<?php echo $t['city'];?><?php echo $t['hallname'];?>">&nbsp;主办：<?php echo $t['sponsor'];?></li>
                  </ul></td>
              </tr>
              <?php } } ?>
            </table>
          </div></td>
        <td valign="top" width="10"></td>
        <td valign="top" width="650"><?php echo tag("moduleid=$moduleid&condition=status=3 and level=2 and thumb!=''&areaid=$cityid&order=".$MOD['order']."&pagesize=".$MOD['page_islide']."&width=650&height=348&template=slide");?></td>
      </tr>
    </table>
    <!--推广1-->
    <div class="b10 c_b"> </div>
    <div><img src="<?php echo DT_SKIN;?>image/zh/exhibit_01.jpg" alt=""></div>
    <div class="b10 c_b"> </div>
    <div class="box_head"><span class="f_r"><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=8&amp;action=add">我要发布展会&raquo;</a></span><strong>展会预告</strong></div>
    <div class="box_body f_gray li_dot"> 
  <?php $tags=tag("moduleid=$moduleid&areaid=$cityid&condition=status=3 and fromtime>$DT_TIME&order=addtime desc&pagesize=10&template=null");?>
      <ul>
        <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
        <li title="<?php echo $t['alt'];?>&#13;主办：<?php echo $t['sponsor'];?>&#13;展馆：<?php echo $t['hallname'];?>">
<span class="f_r">[<?php echo $t['city'];?>]
          <?php $lasted_day =(strtotime(timetodate($t['fromtime'], 3))-strtotime(date('Y-m-d')))/3600/24;?>
          &nbsp;&nbsp; 还有 <font color="#FF0000"><?php echo $lasted_day;?> 天</font>开展
          &nbsp;&nbsp; <?php echo timetodate($t['fromtime'], 3);?> 至 <?php echo timetodate($t['totime'], 3);?>
         </span><a href="<?php echo $t['linkurl'];?>" target="_blank"><?php echo $t['title'];?></a></li>
        <?php } } ?>
      </ul>
    </div>
    <!--推广2-->
    <div class="b10 c_b"> </div>
    <div><img src="<?php echo DT_SKIN;?>image/zh/exhibit_02.jpg" alt=""></div>
    <?php if(is_array($maincat)) { foreach($maincat as $i => $c) { ?>
    <div class="b10 c_b"> </div>
    <div class="box_head"><span class="f_r"><a href="<?php echo $MOD['linkurl'];?><?php echo $c['linkurl'];?>">更多&raquo;</a></span><strong><?php echo $c['catname'];?></strong></div>
    <div class="box_body f_gray li_dot"> 
      <?php $tags=tag("moduleid=$moduleid&areaid=$cityid&catid=".$c['catid']."&condition=status=3&order=".$MOD['order']."&pagesize=".$MOD['page_icat']."&template=null");?>
      <ul>
        <?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
        <li title="<?php echo $t['alt'];?>&#13;主办：<?php echo $t['sponsor'];?>&#13;展馆：<?php echo $t['hallname'];?>"><span class="f_r">[<?php echo $t['city'];?>] &nbsp;&nbsp; <?php echo timetodate($t['fromtime'], 3);?> 至 <?php echo timetodate($t['totime'], 3);?></span><a href="<?php echo $t['linkurl'];?>" target="_blank"><?php echo $t['title'];?></a></li>
        <?php } } ?>
      </ul>
    </div>
    <?php } } ?> </div>
  <div class="m_n f_l">&nbsp;</div>
  <div class="m_r f_l">
    <div class="box_head">
      <div><strong>展会合作</strong></div>
    </div>
    <div class="box_body">
      <div class="exhibit_01">
        <ul>
          <li>合作热线：<?php echo $DT['telephone'];?></li>
          <li>合作Q Q： <?php echo $DT['qq1'];?></li>
        </ul>
      </div>
      <div class="exhibit_02">
        <ul>
          <li class="exhibit_03"><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=8&amp;action=add">发布展会信息</a></li>
          <li class="exhibit_04"><a href="<?php echo $MODULE['2']['linkurl'];?><?php echo $DT['file_my'];?>?mid=8&amp;action=add">发布参展服务</a></li>
        </ul>
      </div>
    </div>
    <div class="b10"></div>
    <div><img src="<?php echo DT_SKIN;?>image/zh/exhibit_001.jpg" alt=""></div>
    <div class="b10"></div>
    <?php if($news_id) { ?>
    <?php if($MOD['cat_news_num']) { ?>
    <div class="box_head">
      <div><span class="f_r"><a href="<?php if($MOD['cat_news']) { ?><?php echo cat_url($MOD['cat_news']);?><?php } else { ?><?php echo $MODULE[$news_id]['linkurl'];?><?php } ?>">更多&raquo;</a></span><strong>展会资讯</strong></div>
    </div>
    <div class="box_body">
      <div class="thumb"><?php echo tag("moduleid=$news_id&condition=status=3 and thumb!=''&areaid=$cityid&catid=".$MOD['cat_news']."&pagesize=2&length=20&order=addtime desc&width=120&height=90&cols=2&template=thumb-table&target=_blank");?></div>
      <div class="f_gray" style="border-top:#C0C0C0 1px dotted;padding:5px 5px 0 5px;"> 
        <?php echo tag("moduleid=$news_id&condition=status=3&areaid=$cityid&catid=".$MOD['cat_news']."&pagesize=".$MOD['cat_news_num']."&datetype=2&order=addtime desc&target=_blank");?></div>
    </div>
    <div class="b10"></div>
    <?php } ?>
    <div class="box_head">
      <div><strong>展会速搜</strong></div>
    </div>
    <div class="box_body">
      <div class="exhibit_5">
        <form action="<?php echo $MOD['linkurl'];?>search.php">
          <ul>
            <li>展会名称：</li>
            <li>
              <input type="text" size="20" name="kw" value="" class="exhibit_14">
            </li>
          </ul>
          <ul>
            <li>所属行业：</li>
            <li>
              <select name="catid" id="catid_1">
                <option value="0">请选择展会行业</option>
                <?php if(is_array($maincat)) { foreach($maincat as $v) { ?> 
                <option value="<?php echo $v['catid'];?>"><?php echo $v['catname'];?></option>
                <?php } } ?> 
              </select>
            </li>
          </ul>
          <ul>
            <script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/calendar.js"></script>
            <li>开始时间：</li>
            <li class="exhibit_5">
              <input type="text" name="fromdate" id="fromdate" value="" class="ex-input" size="20" onfocus="ca_show('fromdate', this, '');" readonly ondblclick="this.value='';" src="<?php echo DT_STATIC;?>file/image/calendar.gif" align="absmiddle" onclick="ca_show('fromdate', this, '');" style="cursor:pointer;">
            </li>
          </ul>
          <ul>
            <li>结束时间：</li>
            <li class="exhibit_5">
              <input type="text" name="todate" id="todate" value="" class="ex-input" size="20" onfocus="ca_show('todate', this, '');" readonly ondblclick="this.value='';" src="<?php echo DT_STATIC;?>file/image/calendar.gif" align="absmiddle" onclick="ca_show('todate', this, '');" style="cursor:pointer;">
            </li>
          </ul>
          <ul>
            <li>展会状态：</li>
            <li>
              <select name="process">
                <option value="0" selected="">全部</option>
                <option value="1">未开始</option>
                <option value="2">进行中</option>
                <option value="3">已过期</option>
              </select>
            </li>
          </ul>
          <div>
            <input type="submit" value=" 立 即 搜 索 " class="exhibit_6">
          </div>
        </form>
      </div>
    
    </div>
    <div class="b10"></div>
    <div class="z_w_01">
      <div><img src="<?php echo DT_SKIN;?>image/aa/zh/exhibit_1.jpg" alt=""></div>
      <div class="b10">&nbsp;</div>
      <div><img src="<?php echo DT_SKIN;?>image/aa/zh/exhibit_2.jpg" alt=""></div>
      <div class="b10">&nbsp;</div>
      <div><img src="<?php echo DT_SKIN;?>image/aa/zh/exhibit_3.jpg" alt=""></div>
      <div class="b10">&nbsp;</div>
      <div><img src="<?php echo DT_SKIN;?>image/aa/zh/exhibit_4.jpg" alt=""></div>
    </div>
    <div class="b10"></div>
    <?php if($MOD['cat_hall'] && $MOD['cat_hall_num']) { ?>
    <div class="box_head">
      <div><span class="f_r"><a href="<?php echo cat_url($MOD['cat_hall']);?>">更多&raquo;</a></span><strong>展馆介绍</strong></div>
    </div>
    <div class="box_body thumb"><?php echo tag("moduleid=$news_id&condition=status=3 and thumb!=''&areaid=$cityid&catid=".$MOD['cat_hall']."&pagesize=".$MOD['cat_hall_num']."&length=15&order=addtime desc&width=120&height=90&cols=2&template=thumb-table&target=_blank");?></div>
    <div class="b10"></div>
    <?php } ?>
    
    <?php if($MOD['cat_service'] && $MOD['cat_service_num']) { ?>
    <div class="box_head">
      <div><span class="f_r"><a href="<?php echo cat_url($MOD['cat_service']);?>">更多&raquo;</a></span><strong>展会服务</strong></div>
    </div>
    <div class="box_body f_gray li_dot"> <?php echo tag("moduleid=$news_id&condition=status=3&areaid=$cityid&catid=".$MOD['cat_service']."&pagesize=".$MOD['cat_service_num']."&order=addtime desc&target=_blank");?></div>
    <div class="b10"></div>
    <?php } ?>
    <?php } ?> </div>
</div>
<?php include template('footer');?>