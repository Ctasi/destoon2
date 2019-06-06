<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', 'member');?>
<div class="menu">
<table cellpadding="0" cellspacing="0">
<tr>
<td class="tab" id="add"><a href="?mid=<?php echo $mid;?>&action=add"><span>添加<?php echo $MOD['name'];?></span></a></td>
<?php if($_userid) { ?>
<td class="tab" id="s3"><a href="?mid=<?php echo $mid;?>"><span>已发布(<?php echo $nums['3'];?>)</span></a></td>
<td class="tab" id="s2"><a href="?mid=<?php echo $mid;?>&status=2"><span>审核中(<?php echo $nums['2'];?>)</span></a></td>
<td class="tab" id="s1"><a href="?mid=<?php echo $mid;?>&status=1"><span>未通过(<?php echo $nums['1'];?>)</span></a></td>
<td class="tab" id="s4"><a href="?mid=<?php echo $mid;?>&status=4"><span>已过期(<?php echo $nums['4'];?>)</span></a></td>
<td class="tab" id="type"><a href="javascript:Dwidget('type.php?item=product', '[<?php echo $MODULE['5']['name'];?>分类]', 600, 300);"><span><?php echo $MODULE['5']['name'];?>分类(<?php echo $nums['0'];?>)</span></a></td>
<?php } ?>
</tr>
</table>
</div>
<?php if($action=='add' || $action=='edit') { ?>
<iframe src="" name="send" id="send" style="display:none;"></iframe>
<form method="post" id="dform" action="?" target="send" onsubmit="return check();">
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="mid" value="<?php echo $mid;?>"/>
<input type="hidden" name="itemid" value="<?php echo $itemid;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<!--评级 S-->
<input type="hidden" name="num_title" id="num_title" value="0"/>
<input type="hidden" name="num_brand" id="num_brand" value="0"/>
<input type="hidden" name="num_zycs" id="num_zycs" value="0"/>
<input type="hidden" name="num_jydj" id="num_jydj" value="0"/>
<input type="hidden" name="num_group" id="num_group" value="0"/>
<!--评级 E-->
<table cellpadding="10" cellspacing="1" class="tb">
<?php if($status==1 && $action=='edit' && $note) { ?>
<tr>
<td class="tl">未通过原因</td>
<td class="tr f_blue"><?php echo $note;?></td>
</tr>
<?php } ?>
<tr>
<td class="tl"><span class="f_red">*</span> 信息类型</td>
<td class="tr">
<?php if(is_array($TYPE)) { foreach($TYPE as $k => $v) { ?>
<input type="radio" name="post[typeid]" value="<?php echo $k;?>" <?php if($k==$typeid) { ?>checked<?php } ?> id="typeid_<?php echo $k;?>"/> <label for="typeid_<?php echo $k;?>" id="t_<?php echo $k;?>"><?php echo $v;?></label>&nbsp;
<?php } } ?>
</td>
</tr>
<tr>
<td class="tl"><span class="f_red">*</span> 信息标题</td>
<td class="tr f_gray"><input name="post[title]" type="text" id="title" size="50" value="<?php echo $title;?>"/> （2-30个字）<span id="dtitle" class="f_red"></span></td>
</tr>
<?php if($action=='add' && $could_color) { ?>
<tr>
<td class="tl">标题颜色</td>
<td class="tr">
<?php echo dstyle('color');?>&nbsp;
设置信息标题颜色需消费 <strong class="f_red"><?php echo $MOD['credit_color'];?></strong> <?php echo $DT['credit_name'];?>
</td>
</tr>
<?php } ?>
<tr>
<td class="tl"><span class="f_red">*</span> 行业分类</td>
<td class="tr"><div id="catesch"></div><?php echo ajax_category_select('post[catid]', '选择分类', $catid, $moduleid);?><?php if($DT['schcate_limit']) { ?> <a href="javascript:schcate(<?php echo $moduleid;?>);" class="t">搜索分类</a><?php } ?> <span id="dcatid" class="f_red"></span></td>
</tr>
<?php if($CP) { ?>
<script type="text/javascript">
var property_catid = <?php echo $catid;?>;
var property_itemid = <?php echo $itemid;?>;
var property_admin = 0;
</script>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/property.js"></script>
<tbody id="load_property" style="display:none;">
<tr><td></td><td></td></tr>
</tbody>
<?php } ?>
<tr>
<td class="tl">产品品牌</td>
<td class="tr"><input name="post[brand]" type="text" size="30" value="<?php echo $brand;?>"/></td>
</tr>
<?php if($FD) { ?><?php echo fields_html('<td class="tl">', '<td class="tr">', $item);?><?php } ?>
<tr>
<td class="tl">详细说明</td>
<td class="tr f_gray"><textarea name="post[content]" id="content" class="dsn"><?php echo $content;?></textarea>
<?php echo deditor($moduleid, 'content', $group_editor, '100%', 350);?><br/>
1、建议您描述以下方面：产品的性能及优点、用途、售后服务、包装等；<br/>
2、为避免不必要的纠纷，请使用本企业图片；<br/>
<span id="dcontent" class="f_red"></span>
</td>
</tr>
<?php if($MOD['swfu'] == 1 && DT_EDITOR == 'fckeditor') { ?>
<?php include DT_ROOT.'/api/swfupload/editor.inc.php';?>
<?php } ?>
<tr>
<td class="tl">产品图片</td>
<td class="tr">
<input type="hidden" name="post[thumb]" id="thumb" value="<?php echo $thumb;?>"/>
<?php if($IMVIP || !$MG['uploadpt']) { ?>
<input type="hidden" name="post[thumb1]" id="thumb1" value="<?php echo $thumb1;?>"/>
<input type="hidden" name="post[thumb2]" id="thumb2" value="<?php echo $thumb2;?>"/>
<?php } ?>
<table width="360">
<tr align="center" height="120" class="c_p">
<td width="120"><img src="<?php if($thumb) { ?><?php echo $thumb;?><?php } else { ?><?php echo DT_SKIN;?>image/waitpic.gif<?php } ?>" width="100" height="100" id="showthumb" title="预览图片" alt="" onclick="if(this.src.indexOf('waitpic.gif') == -1){_preview(Dd('showthumb').src, 1);}else{Dalbum('',<?php echo $moduleid;?>,<?php echo $MOD['thumb_width'];?>,<?php echo $MOD['thumb_height'];?>, Dd('thumb').value, true);}"/></td>
<?php if($IMVIP || !$MG['uploadpt']) { ?>
<td width="120"><img src="<?php if($thumb1) { ?><?php echo $thumb1;?><?php } else { ?><?php echo DT_SKIN;?>image/waitpic.gif<?php } ?>" width="100" height="100" id="showthumb1" title="预览图片" alt="" onclick="if(this.src.indexOf('waitpic.gif') == -1){_preview(Dd('showthumb1').src, 1);}else{Dalbum(1,<?php echo $moduleid;?>,<?php echo $MOD['thumb_width'];?>,<?php echo $MOD['thumb_height'];?>, Dd('thumb1').value, true);}"/></td>
<td width="120"><img src="<?php if($thumb2) { ?><?php echo $thumb2;?><?php } else { ?><?php echo DT_SKIN;?>image/waitpic.gif<?php } ?>" width="100" height="100" id="showthumb2" title="预览图片" alt="" onclick="if(this.src.indexOf('waitpic.gif') == -1){_preview(Dd('showthumb2').src, 1);}else{Dalbum(2,<?php echo $moduleid;?>,<?php echo $MOD['thumb_width'];?>,<?php echo $MOD['thumb_height'];?>, Dd('thumb2').value, true);}"/></td>
<?php } else { ?>
<td width="120"><a href="grade.php" target="_blank"><img src="<?php echo DT_SKIN;?>image/vippic.gif" width="100" height="100"/></a></td>
<td width="120"><a href="grade.php" target="_blank"><img src="<?php echo DT_SKIN;?>image/vippic.gif" width="100" height="100"/></a></td>
<?php } ?>
</tr>
<tr align="center" class="c_p">
<!--<td><img src="image/img_upload.gif" width="12" height="12" title="上传" onclick="Dalbum('',<?php echo $moduleid;?>,<?php echo $MOD['thumb_width'];?>,<?php echo $MOD['thumb_height'];?>, Dd('thumb').value, true);"/>&nbsp;&nbsp;<img src="image/img_select.gif" width="12" height="12" title="选择" onclick="selAlbum('');"/>&nbsp;&nbsp;<img src="image/img_delete.gif" width="12" height="12" title="删除" onclick="delAlbum('','wait');"/></td>-->
<td><img src="image/img_upload.gif" width="12" height="12" title="上传" onclick="Dalbum('',<?php echo $moduleid;?>,200,200, Dd('thumb').value, true);"/>&nbsp;&nbsp;<img src="image/img_select.gif" width="12" height="12" title="选择" onclick="selAlbum('');"/>&nbsp;&nbsp;<img src="image/img_delete.gif" width="12" height="12" title="删除" onclick="delAlbum('','wait');"/></td>
      <?php if($IMVIP || !$MG['uploadpt']) { ?>
<td><img src="image/img_upload.gif" width="12" height="12" title="上传" onclick="Dalbum(1,<?php echo $moduleid;?>,<?php echo $MOD['thumb_width'];?>,<?php echo $MOD['thumb_height'];?>, Dd('thumb1').value, true);"/>&nbsp;&nbsp;<img src="image/img_select.gif" width="12" height="12" title="选择" onclick="selAlbum(1);"/>&nbsp;&nbsp;<img src="image/img_delete.gif" width="12" height="12" title="删除" onclick="delAlbum(1,'wait');"/></td>
<td><img src="image/img_upload.gif" width="12" height="12" title="上传" onclick="Dalbum(2,<?php echo $moduleid;?>,<?php echo $MOD['thumb_width'];?>,<?php echo $MOD['thumb_height'];?>, Dd('thumb2').value, true);"/>&nbsp;&nbsp;<img src="image/img_select.gif" width="12" height="12" title="选择" onclick="selAlbum(2);"/>&nbsp;&nbsp;<img src="image/img_delete.gif" width="12" height="12" title="删除" onclick="delAlbum(2,'wait');"/></td>
<?php } else { ?>
<td onclick="if(confirm('此操作仅限<?php echo VIP;?>会员，是否现在申请？')) Go('grade.php');"><img src="image/img_upload.gif" width="12" height="12" title="上传"/>&nbsp;&nbsp;<img src="image/img_select.gif" width="12" height="12" title="选择"/>&nbsp;&nbsp;<img src="image/img_delete.gif" width="12" height="12" title="删除"/></td>
<td onclick="if(confirm('此操作仅限<?php echo VIP;?>会员，是否现在申请？')) Go('grade.php');"><img src="image/img_upload.gif" width="12" height="12" title="上传"/>&nbsp;&nbsp;<img src="image/img_select.gif" width="12" height="12" title="选择"/>&nbsp;&nbsp;<img src="image/img_delete.gif" width="12" height="12" title="删除"/></td>
<?php } ?>
</tr>
</table>
<br/>
<br/>
<div class="xhts">
<ul class="f_gray">
<li>1、要求图片标准尺寸为 <strong class="f_red"><?php echo $MOD['thumb_width'];?> x <?php echo $MOD['thumb_height'];?></strong></li>
<li>2、要求图片格式：jpg,png,gif高清图片.</li>
<li>3、上传实拍产品图和丰富产品详情，让产品更具吸引力，获得好排名，帮助目标客户直接了解产品细节！</li>
</ul>
</div>
<span id="dthumb" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl">过期时间</td>
<td class="tr f_gray"><?php echo dcalendar('post[totime]', $totime, '-', 1);?>&nbsp;
<select onchange="Dd('posttotime').value=this.value;">
<option value="">快捷选择</option>
<option value="">长期有效</option>
<option value="<?php echo timetodate($DT_TIME+86400*3, 3);?> 23:59:59">3天</option>
<option value="<?php echo timetodate($DT_TIME+86400*7, 3);?> 23:59:59">一周</option>
<option value="<?php echo timetodate($DT_TIME+86400*15, 3);?> 23:59:59">半月</option>
<option value="<?php echo timetodate($DT_TIME+86400*30, 3);?> 23:59:59">一月</option>
<option value="<?php echo timetodate($DT_TIME+86400*182, 3);?> 23:59:59">半年</option>
<option value="<?php echo timetodate($DT_TIME+86400*365, 3);?> 23:59:59">一年</option>
</select>&nbsp;
不选表示长期有效
<span id="dposttotime" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">主要参数</td>
<td class="tr nv">
<table cellspacing="1">
<tr>
<th>参数名称</th>
<th>参数值</th>
</tr>
<tr>
<td><input name="post[n1]" type="text" size="10" value="<?php echo $n1;?>" id="n1"/></td>
<td><input name="post[v1]" type="text" size="20" value="<?php echo $v1;?>" id="v1"/></td>
</tr>
<tr>
<td><input name="post[n2]" type="text" size="10" value="<?php echo $n2;?>" id="n2"/></td>
<td><input name="post[v2]" type="text" size="20" value="<?php echo $v2;?>" id="v2"/></td>
</tr>
<tr>
<td><input name="post[n3]" type="text" size="10" value="<?php echo $n3;?>" id="n3"/></td>
<td><input name="post[v3]" type="text" size="20" value="<?php echo $v3;?>" id="v3"/></td>
</tr>
<tr>
<td class="f_gray">例如：规格</td>
<td class="f_gray">例如：10cm*20cm</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="tl">交易条件</td>
<td class="tr">
<table width="100%">
<tr>
<td width="70">计量单位</td>
<td><input name="post[unit]" type="text" size="10" value="<?php echo $unit;?>" onblur="if(this.value){Dd('u1').innerHTML=Dd('u2').innerHTML=Dd('u3').innerHTML=this.value;}" id="u0"/><input type="hidden" id="uu" value="单位"/></td>
</tr>
<tr>
<td>产品单价</td>
<td><input name="post[price]" type="text" size="10" value="<?php echo $price;?>"/> <?php echo $DT['money_unit'];?>/<span id="u1"><?php if($unit) { ?><?php echo $unit;?><?php } else { ?>单位<?php } ?></span></td>
</tr>
<tr>
<td>最小起订量</td>
<td><input name="post[minamount]" type="text" size="10" value="<?php echo $minamount;?>"/> <span id="u2"><?php if($unit) { ?><?php echo $unit;?><?php } else { ?>单位<?php } ?></span></td>
</tr>
<tr>
<td>供货总量</td>
<td><input name="post[amount]" type="text" size="10" value="<?php echo $amount;?>"/> <span id="u3"><?php if($unit) { ?><?php echo $unit;?><?php } else { ?>单位<?php } ?></span></td>
</tr>
<tr>
<td>发货期限</td>
<td>自买家付款之日起 <input name="post[days]" type="text" size="2" value="<?php echo $days;?>"/> 天内发货</td>
</tr>
</table>
<span class="f_gray">建议详细填写交易条件，否则买家无法为您的产品下订单</span>
</td>
</tr>
<tr<?php if(!$_userid) { ?> style="display:none;"<?php } ?>>
<td class="tl">自定义分类</td>
<td class="tr"><span id="type_box"><?php echo $mycatid_select;?></span>&nbsp; <a href="javascript:var type_item='product-<?php echo $_userid;?>',type_name='post[mycatid]',type_default='<?php echo $L['type_default'];?>',type_id=<?php echo $mycatid;?>,type_interval=setInterval('type_reload()',500);Dwidget('type.php?item=product', '[<?php echo $MODULE['5']['name'];?>分类]', 600, 300);" class="t">[管理分类]</a></td>
</tr>
<tr<?php if(!$_userid) { ?> style="display:none;"<?php } ?>>
<td class="tl">我的推荐</td>
<td class="tr">
<input type="radio" name="post[elite]" value="1"<?php if($elite) { ?> checked<?php } ?>/> 是
&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="post[elite]" value="0"<?php if(!$elite) { ?> checked<?php } ?>/> 否
</td>
</tr>
<?php if(!$_userid) { ?>
<?php include template('guest_contact', 'chip');?>
<?php } ?>
<?php if($action=='add' && $could_elite) { ?>
<tr>
<td class="tl">推荐到网站首页</td>
<td class="tr">
<input type="checkbox" name="elite" value="1" onclick="if(<?php echo $_credit;?> < <?php echo $MOD['credit_elite'];?>) {confirm('<?php echo $DT['credit_name'];?>不足，当前余额:<?php echo $_credit;?>');this.checked=false;}"/>
需要上传至少1张产品图片，且需消费 <strong class="f_red"><?php echo $MOD['credit_elite'];?></strong> <?php echo $DT['credit_name'];?>
</td>
</tr>
<?php } ?>
<?php if($fee_add) { ?>
<tr>
<td class="tl">发布此信息需消费</td>
<td class="tr"><span class="f_b f_red"><?php echo $fee_add;?></span> <?php echo $fee_unit;?></td>
</tr>
<?php if($fee_currency == 'money') { ?>
<tr>
<td class="tl"><?php echo $DT['money_name'];?>余额</td>
<td class="tr"><span class="f_blue f_b"><?php echo $_money;?><?php echo $fee_unit;?></span> <a href="charge.php?action=pay" target="_blank" class="t">[充值]</a></td>
</tr>
<?php } else { ?>
<tr>
<td class="tl"><?php echo $DT['credit_name'];?>余额</td>
<td class="tr"><span class="f_blue f_b"><?php echo $_credit;?><?php echo $fee_unit;?></span> <a href="credit.php?action=buy" target="_blank" class="t">[购买]</a></td>
</tr>
<?php } ?>
<?php } ?>
<?php if($need_password) { ?>
<tr>
<td class="tl"><span class="f_red">*</span> 支付密码</td>
<td class="tr"><?php include template('password', 'chip');?> <span id="dpassword" class="f_red"></span></td>
</tr>
<?php } ?>
<?php if($need_question) { ?>
<tr>
<td class="tl"><span class="f_red">*</span> 验证问题</td>
<td class="tr"><?php include template('question', 'chip');?> <span id="danswer" class="f_red"></span></td>
</tr>
<?php } ?>
<?php if($need_captcha) { ?>
<tr>
<td class="tl"><span class="f_red">*</span> 验证码</td>
<td class="tr"><?php include template('captcha', 'chip');?> <span id="dcaptcha" class="f_red"></span></td>
</tr>
<?php } ?>
<?php if($action=='add') { ?>
<tr style="display:none;" id="weibo_sync">
<td class="tl">同步主题</td>
<td class="tr" id="weibo_show"></td>
</tr>
<?php } ?>
<tr>
<td class="tl">&nbsp;</td>
<td class="tr" height="50"><input type="submit" name="submit" value=" 提 交 " class="btn_g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=" 返 回 " class="btn" onclick="history.back(-1);"/></td>
</tr>
</table>
<!--信息评级 S-->
<div class="sell_pf">
<div class="sell_pf_top"><font class="f_l" style="color: #dd2726;">当前供应信息的质量星级：</font><span id="xj" class="f_l"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="color: #333;">→低星级产品不利于推广和收录</b>
<div class="f_r"><b>本站优先展示5星级产品</b></div></div>
<div class="sell_pf_content">
<div id="wxcp" style="display:none; color:#F00; font-weight:600;">恭喜：您发布的产品达到五星级标准！</div>
<h3 id="jy">建议：</h3>
<ul>
<li id="pfx1"><p>1、优化标题信息（标题长度大于4个字，建议4-20字）<span>标题突出产品特性，迅速吸引买家眼球</span></p><a href="#title">马上去补充</a></li>
<li id="pfx2"><p>2、填写产品品牌（品牌长度大于1个字）<span>可以让更多买家看到您的产品</span></p><a href="#brand">马上去补充</a></li>
<li id="pfx4"><p>3、填写更详细的主要参数<span>增加被买家搜索到的机会</span></p><a href="#n1">马上去补充</a></li>
<li id="pfx5"><p>4、完善交易条件信息<span>根据实际情况填写，买家非常关注这部分信息</span></p><a href="#u0">马上去补充</a></li>
<li id="pfx6"><p>5、公司自己的产品分类<span>让买家对你的产品有更全面的了解</span></p><a href="#mycatid">马上去补充</a></li>
</ul>
</div>
 <div style="clear:both"></div>
</div>
<!--信息评级 E-->
</form>
<?php echo load('clear.js');?>
<?php if($action=='add') { ?>
<script type="text/javascript">s('mid_<?php echo $mid;?>');m('<?php echo $action;?>');</script>
<?php } else { ?>
<script type="text/javascript">s('mid_<?php echo $mid;?>');m('s<?php echo $status;?>');</script>
<?php } ?>
<?php } else { ?>
<div class="tt">
<form action="?">
<input type="hidden" name="mid" value="<?php echo $mid;?>"/>
<input type="hidden" name="status" value="<?php echo $status;?>"/>
&nbsp;<?php echo category_select('catid', '行业分类', $catid, $moduleid);?>&nbsp;
<?php echo dselect($TYPE, 'typeid', '信息类型', $typeid);?>&nbsp;
<input type="text" size="30" name="kw" value="<?php echo $kw;?>" title="关键词"/>&nbsp;
<?php echo $mycat_select;?>&nbsp;
<input type="submit" value=" 搜 索 " class="btn"/>&nbsp;
<input type="button" value=" 重 置 " class="btn" onclick="Go('?mid=<?php echo $mid;?>&status=<?php echo $status;?>');"/>
</form>
</div>
<div class="ls">
<form method="post">
<table cellpadding="10" cellspacing="0" class="tb">
<tr>
<th width="20"><input type="checkbox" onclick="checkall(this.form);"/></th>
<th width="90">图片</th>
<th>标题</th>
<th>行业</th>
<th width="110"><?php if($timetype=='add') { ?>添加<?php } else { ?>更新<?php } ?>时间</th>
<?php if($MOD['hits']) { ?><th width="50">浏览</th><?php } ?>
<th width="80">管理</th>
</tr>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<tr align="center">
<td><input type="checkbox" name="itemid[]" value="<?php echo $v['itemid'];?>"/></td>
<td><a href="javascript:_preview('<?php echo $v['thumb'];?>');"><img src="<?php if($v['thumb']) { ?><?php echo $v['thumb'];?><?php } else { ?><?php echo DT_SKIN;?>image/nopic50.gif<?php } ?>" width="50" class="thumb"/></a></td>
<td align="left" title="<?php echo $v['alt'];?>"><ul><li>&nbsp;<?php if($v['level']==1) { ?><img src="image/ico_home.gif" title="网站首页推广"/> <?php } ?><?php if($v['elite']) { ?><span class="f_red" title="公司主页推荐">[荐]</span> <?php } ?><?php if($v['status']==3) { ?><a href="<?php echo $v['linkurl'];?>" target="_blank" class="t"><?php } else { ?><a href="?mid=<?php echo $mid;?>&action=edit&itemid=<?php echo $v['itemid'];?>" class="t"><?php } ?><?php echo $v['title'];?></a><?php if($v['status']==1 && $v['note']) { ?> <a href="javascript:" onclick="alert('<?php echo $v['note'];?>');"><img src="image/why.gif" title="未通过原因"/></a><?php } ?></li>
<!--评级 S-->
<li style="text-align:left;">
<p style="float: left;width: 200px">&nbsp;&nbsp;星级：<span style="color:#E60000; padding:0 5px;font-size: 16px;">
       <?php if(mb_strlen($v['title'],'UTF-8')>2) { ?>★<?php } ?>
       <?php if(mb_strlen($v['brand'],'UTF-8')>0) { ?>★<?php } ?>
       <?php if($v['n1']!="" && $v['v1']!="") { ?>★<?php } ?>
       <?php if($v['unit']!="") { ?>★<?php } ?>
       <?php if($v['mycatid']>0) { ?>★<?php } ?>
       </span></p>
       <p style="float: left;"><span style="text-align:left;margin-left: 25px;">&nbsp;&nbsp;编号：s<?php echo $v['itemid'];?></span></p>
 </li>
 <!--评级 E-->
</ul></td>
<td><a href="<?php echo $v['caturl'];?>" target="_blank"><?php echo $v['catname'];?></a></td>
<?php if($timetype=='add') { ?>
<td class="f_gray" title="更新时间 <?php echo timetodate($v['edittime'], 5);?>"><?php echo timetodate($v['addtime'], 5);?></td>
<?php } else { ?>
<td class="f_gray" title="添加时间 <?php echo timetodate($v['addtime'], 5);?>"><?php echo timetodate($v['edittime'], 5);?></td>
<?php } ?>
<?php if($MOD['hits']) { ?><td class="f_gray"><?php echo $v['hits'];?></td><?php } ?>
<td>
<a href="?mid=<?php echo $mid;?>&action=edit&itemid=<?php echo $v['itemid'];?>"><img width="16" height="16" src="image/edit.png" title="修改" alt=""/></a>
<?php if($MG['copy']) { ?>&nbsp;<a href="?mid=<?php echo $mid;?>&action=add&itemid=<?php echo $v['itemid'];?>"><img width="16" height="16" src="image/new.png" title="复制信息" alt=""/></a><?php } ?>
<?php if($MG['delete']) { ?>&nbsp;<a href="?mid=<?php echo $mid;?>&action=delete&itemid=<?php echo $v['itemid'];?>" onclick="return confirm('确定要删除吗？此操作将不可撤销');"><img width="16" height="16" src="image/delete.png" title="删除" alt=""/></a><?php } ?>
</td>
</tr>
<?php } } ?>
</table>
</div>
<?php if($MG['delete'] || $timetype!='add') { ?>
<div class="btns">
<?php if($MG['delete']) { ?>
<span class="f_r"><input type="submit" value=" 删除选中 " class="btn" onclick="if(confirm('确定要删除选中<?php echo $MOD['name'];?>吗？')){this.form.action='?mid=<?php echo $mid;?>&status=<?php echo $status;?>&action=delete'}else{return false;}"/></span>
<?php } ?>
<?php if($timetype!='add') { ?>
<input type="submit" value=" 刷新选中 " class="btn" onclick="this.form.action='?mid=<?php echo $mid;?>&status=<?php echo $status;?>&action=refresh';"/>
<?php if($MOD['credit_refresh']) { ?>
刷新一条信息一次需消费 <strong class="f_red"><?php echo $MOD['credit_refresh'];?></strong> <?php echo $DT['credit_name'];?>，当<?php echo $DT['credit_name'];?>不足时将不可刷新
<?php } ?>
<?php } ?>
</div>
<?php } ?>
</form>
<!--信息评 S-->
<br>
<?php if($status==1) { ?>
<div class="gtsi_2">
<div class="gtsi gtsi_t">
<strong>产品审核拒绝可能原因：</strong><br>
1、您发布的产品或者行业属于平台系统不被允许的行业<br>
2、产品信息中包含非法、反动、违禁的信息。<br>
3、发布的标题不符合平台规定。<br>
4、相同产品大量重复发布。<br>
5、您发布的产品或者行业属于系统保护性行业，专家建议:请自助式在线充值后升级会员<br>
</div>
<div class="gtsi gtsi_3 fl">
<strong>攻略一、提高产品通过率和展现量</strong><br>
1、丰富的产品标题。<br>
2、正确分类产品。<br>
3、完善各项产品参数。<br>
4、产品详情图片与文字完善。<br>
</div>
<div class="gtsi gtsi_3 fr">
<strong>攻略二、提升产品浏览次数</strong><br>
1、定义清晰的产品标题。<br>
2、优质美观的产品图片。<br>
3、完善您的各项企业资料。<br>
4、及时更新您的产品内容。<br>
</div>
<br>
</div>
<?php } ?>
<?php if($status==3) { ?>
<div class="gtsi  gtsi_t">
<strong>高星级（4星以上）产品的优势：</strong><br>
1、站内排序优先展示高星级（4星以上）产品.<br>
2、更易受买家的青睐，吸引买家眼球，提高买家询盘交易的机率。<br>
3、将有更多机会被网站抽取做专题页面的推广或推荐。<br>
4、体现卖家的专业、用心的形象，更容易赢得买家信任。<br>
</div>
<?php } ?>
<?php if($status==2) { ?>
<div class="gtsi gtsi_t">
<strong>发布的产品百度效果不好？</strong><br>
1、质量低下，不是高星级质量产品;<br>
2、您发布的产品关键词和产品详细说明在您发布的产品系列组中重复度很高，从而导致百度效果不好；<br>
3、您发布产品关键词之后，对应的产品详细说明中没有详细的包含产品关键词的相关属性信息，从而导致效果不好；<br>
4、站内展示和曝光量低下，造成产品无法被搜索引擎和用户注意，建议升级-<a href="<?php echo $MODULE['2']['linkurl'];?>grade.php" target="_blank"><?php echo VIP;?>会员</a><br>
</div>
<?php } ?>
<!--信息评 E-->
<?php if($mod_limit || (!$MG['fee_mode'] && $MOD['fee_add'])) { ?>
<div class="limit">
<?php if($mod_limit) { ?>
总共可发 <span class="f_b f_red"><?php echo $mod_limit;?></span> 条&nbsp;&nbsp;&nbsp;
当前已发 <span class="f_b"><?php echo $limit_used;?></span> 条&nbsp;&nbsp;&nbsp;
还可以发 <span class="f_b f_blue"><?php echo $limit_free;?></span> 条&nbsp;&nbsp;&nbsp;
<?php } ?>
<?php if(!$MG['fee_mode'] && $MOD['fee_add']) { ?>
发布信息收费 <span class="f_b f_red"><?php echo $MOD['fee_add'];?></span> <?php if($MOD['fee_currency'] == 'money') { ?><?php echo $DT['money_unit'];?><?php } else { ?><?php echo $DT['credit_unit'];?><?php } ?>/条&nbsp;&nbsp;&nbsp;
可免费发布 <span class="f_b"><?php if($mod_free_limit<0) { ?>无限<?php } else { ?><?php echo $mod_free_limit;?><?php } ?></span> 条&nbsp;&nbsp;&nbsp;
<?php } ?>
</div>
<?php } ?>
<div class="pages"><?php echo $pages;?></div>
<script type="text/javascript">s('mid_<?php echo $mid;?>');m('s<?php echo $status;?>');</script>
<?php } ?>
<?php if($action == 'add' || $action == 'edit') { ?>
<script type="text/javascript">
function _p() {
if(Dd('tag').value) {
Ds('reccate');
}
}
function check() {
var l;
var f;
f = 'catid_1';
if(Dd(f).value == 0) {
Dmsg('请选择所属分类', 'catid', 1);
return false;
}
f = 'title';
l = Dd(f).value.length;
if(l < 2 || l > 30) {
Dmsg('信息标题应为2-30字，当前已输入'+l+'字', f);
return false;
}
<?php if($MOD['upload_thumb'] && $MG['upload']) { ?>
f = 'thumb';
l = Dd(f).value.length;
if(l < 5) {
Dmsg('请上传第一张产品图片', f);
return false;
}
<?php } ?>
<?php if(!$_userid) { ?>
f = 'company';
l = Dd(f).value.length;
if(l < 2) {
Dmsg('请填写公司名称', f);
return false;
}
if(Dd('areaid_1').value == 0) {
Dmsg('请选择所在地区', 'areaid');
return false;
}
f = 'truename';
l = Dd(f).value.length;
if(l < 2) {
Dmsg('请填写联系人', f);
return false;
}
f = 'mobile';
l = Dd(f).value.length;
if(l < 7) {
Dmsg('请填写手机', f);
return false;
}
<?php } ?>
<?php if($FD) { ?><?php echo fields_js();?><?php } ?>
<?php if($CP) { ?><?php echo property_js();?><?php } ?>
<?php if($need_password) { ?>
f = 'password';
l = Dd(f).value.length;
if(l < 6) {
Dmsg('请填写支付密码', f);
return false;
}
<?php } ?>
<?php if($need_question) { ?>
f = 'answer';
if($('#c'+f).html().indexOf('ok.png') == -1) {
Dmsg('请填写正确的验证问题', f);
return false;
}
<?php } ?>
<?php if($need_captcha) { ?>
f = 'captcha';
if($('#c'+f).html().indexOf('ok.png') == -1) {
Dmsg('请填写正确的验证码', f);
return false;
}
<?php } ?>
return true;
}
var destoon_oauth = '<?php echo $EXT['oauth'];?>';
</script>
<?php } ?>
<?php if($action=='add' && strlen($EXT['oauth']) > 1) { ?><?php echo load('weibo.js');?><?php } ?>
<link rel="stylesheet" type="text/css" href="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/image/pj_style.css"/> <!--评级css-->
<script type="text/javascript" src="<?php echo DT_STATIC;?><?php echo $MODULE['2']['moduledir'];?>/js/ermcheckscore.js"></script> <!--评级JS-->
<?php include template('footer', 'member');?>