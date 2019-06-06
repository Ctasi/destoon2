<?php defined('IN_DESTOON') or exit('Access Denied');?><?php include template('header', $template);?>
<div class="dsn" id="pos_show"><a href="<?php echo $COM['linkurl'];?>">首页</a> <i>&gt;</i> <a href="<?php echo $MENU[$menuid]['linkurl'];?>"><?php echo $MENU[$menuid]['name'];?></a></div>
<div class="main_head"><div><strong>公司档案</strong></div></div>
<div class="main_body">
<div class="px14 lh18">
<table width="100%" cellpadding="10" cellspacing="1">
<tr>
<td width="100" class="f_b">公司名称：</td>
<td width="340"><?php echo $COM['company'];?></td>
<td width="100" class="f_b">公司类型：</td>
<td><?php echo $COM['type'];?> (<?php echo $COM['mode'];?>)</td>
</tr>
<tr>
<td class="f_b">所在地区：</td>
<td><?php echo area_pos($COM['areaid'], '/');?></td>
<td class="f_b">公司规模：</td>
<td><?php echo $COM['size'];?></td>
</tr>
<tr>
<td class="f_b">注册资本：</td>
<td><?php if($COM['capital']) { ?><?php echo $COM['capital'];?>万<?php echo $COM['regunit'];?><?php } else { ?>未填写<?php } ?></td>
<td class="f_b">注册年份：</td>
<td><?php echo $COM['regyear'];?></td>
</tr>
</table>
<table width="100%" cellpadding="10" cellspacing="1">
<tr>
<td width="100" class="f_b">资料认证：</td>
<td>
<?php if($COM['vcompany']) { ?>&nbsp;<img src="<?php echo $MODULE['2']['linkurl'];?>image/v_company.gif" width="16" height="16" align="absmiddle" title="资料通过工商认证"/><?php } ?>
<?php if($COM['vtruename']) { ?>&nbsp;<img src="<?php echo $MODULE['2']['linkurl'];?>image/v_truename.gif" width="16" height="16" align="absmiddle" title="资料通过实名认证"/><?php } ?>
<?php if($COM['vbank']) { ?>&nbsp;<img src="<?php echo $MODULE['2']['linkurl'];?>image/v_bank.gif" width="16" height="16" align="absmiddle" title="资料通过银行帐号认证"/><?php } ?>
<?php if($COM['vmobile']) { ?>&nbsp;<img src="<?php echo $MODULE['2']['linkurl'];?>image/v_mobile.gif" width="16" height="16" align="absmiddle" title="资料通过手机认证"/><?php } ?>
<?php if($COM['vemail']) { ?>&nbsp;<img src="<?php echo $MODULE['2']['linkurl'];?>image/v_email.gif" width="16" height="16" align="absmiddle" title="资料通过邮件认证"/><?php } ?>
<?php if($COM['validated']) { ?>&nbsp;<img src="<?php echo DT_STATIC;?>file/image/check-ok.png" align="absmiddle"/> 企业资料通过<?php echo $COM['validator'];?>认证<?php } ?>
</td>
</tr>
<?php if($COM['deposit']) { ?>
<tr>
<td class="f_b">保&nbsp;&nbsp;证&nbsp;&nbsp;金：</td>
<td>已缴纳 <strong class="f_green"><?php echo $DT['money_sign'];?><?php echo $COM['deposit'];?></strong> <?php echo $DT['money_unit'];?></td>
</tr>
<?php } ?>
<?php if($COM['mode']) { ?>
<tr>
<td class="f_b">经营模式：</td>
<td><?php echo $COM['mode'];?></td>
</tr>
<?php } ?>
<?php if($COM['business']) { ?>
<tr>
<td class="f_b">经营范围：</td>
<td><?php echo $COM['business'];?></td>
</tr>
<?php } ?>
<?php if($COM['sell']) { ?>
<tr>
<td class="f_b">销售产品：</td>
<td><?php echo $COM['sell'];?></td>
</tr>
<?php } ?>
<?php if($COM['buy']) { ?>
<tr>
<td class="f_b">采购产品：</td>
<td><?php echo $COM['buy'];?></td>
</tr>
<?php } ?>
<?php if($COM['catid']) { ?>
<tr>
<td class="f_b">主营行业：</td>
<td>
<?php $catids = explode(',', substr($COM['catid'], 1, -1));?>
<table cellpadding="2" cellspacing="2" width="100%">
<?php if(is_array($catids)) { foreach($catids as $i => $c) { ?>
<?php if($i%3==0) { ?><tr><?php } ?>
<td width="33%"><?php echo cat_pos(get_cat($c), ' / ', '_blank');?></td>
<?php if($i%3==2) { ?></tr><?php } ?>
<?php } } ?>
</table>
</td>
</tr>
<?php } ?>
</table>
</div>
</div>
<?php if($comment) { ?>
<div class="main_head">
<div>
<span class="f_n px14">
<?php if($view) { ?>
<a href="<?php echo userurl($username, 'file=credit', $domain);?>#comment">收到的评价(作为卖家)</a> | <strong>发出的评价(作为买家)</strong>
<?php } else { ?>
<strong>收到的评价(作为卖家)</strong> | <a href="<?php echo userurl($username, 'file=credit&view=1', $domain);?>#comment">发出的评价(作为买家)</a>
<?php } ?>
<a name="comment"></a>
</span>
</div>
</div>
<div class="main_body">
<?php if($view) { ?>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<div class="comment<?php if($k%2==0) { ?> comment_sp<?php } ?>">
<div class="comment_title">
<span class="f_r"><?php echo $STARS[$v['buyer_star']];?> <img src="<?php echo DT_STATIC;?>file/image/star<?php echo $v['buyer_star'];?>.gif" width="36" height="12" alt="" align="absmiddle"/></span>
买家 <span id="i_<?php echo $v['itemid'];?>"><?php echo hide_name($v['buyer']);?> 于 <span class="comment_time"><?php echo timetodate($v['buyer_ctime']);?></span> 评论道：</span>
</div>
<div class="comment_content" id="c_<?php echo $v['itemid'];?>"><?php echo nl2br($v['buyer_comment']);?></div>
<?php if($v['seller_reply']) { ?>
<div class="comment_reply">
<span style="color:blue;">卖家</span> <span style="font-size:11px;"><?php echo timetodate($v['seller_rtime']);?></span> 回复： <?php echo nl2br($v['seller_reply']);?>
</div>
<?php } ?>
</div>
<?php } } ?>
<?php } else { ?>
<?php if(is_array($lists)) { foreach($lists as $k => $v) { ?>
<div class="comment<?php if($k%2==0) { ?> comment_sp<?php } ?>">
<div class="comment_title">
<span class="f_r"><?php echo $STARS[$v['seller_star']];?> <img src="<?php echo DT_STATIC;?>file/image/star<?php echo $v['seller_star'];?>.gif" width="36" height="12" alt="" align="absmiddle"/></span>
买家 <span id="i_<?php echo $v['itemid'];?>"><?php echo hide_name($v['buyer']);?> 于 <span class="comment_time"><?php echo timetodate($v['seller_ctime']);?></span> 评论道：</span>
</div>
<div class="comment_content" id="c_<?php echo $v['itemid'];?>"><?php echo nl2br($v['seller_comment']);?></div>
<?php if($v['buyer_reply']) { ?>
<div class="comment_reply">
<span style="color:blue;">卖家</span> <span style="font-size:11px;"><?php echo timetodate($v['buyer_rtime']);?></span> 回复： <?php echo nl2br($v['buyer_reply']);?>
</div>
<?php } ?>
</div>
<?php } } ?>
<?php } ?>
<?php if($pages) { ?><div class="pages"><?php echo $pages;?></div><?php } ?>
</div>
<?php } ?>
<?php include template('footer', $template);?>