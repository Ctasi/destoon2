<?php defined('IN_DESTOON') or exit('Access Denied');?></td>
<?php if($side_pos==1) { ?>
<td width="20" id="split"></td>
<td width="<?php echo $side_width;?>" valign="top" id="side"><?php include template('side', $template);?></td>
<?php } ?>
</tr>
</table>
</div>
<div class="m">
<div class="foot" id="foot">
<span class="f_r">
<a href="<?php echo $MODULE['2']['linkurl'];?>">管理入口</a><i>|</i>
<a href="javascript:;" onclick="$('html, body').animate({scrollTop:0}, 200);">返回顶部</a>
</span>
&copy;<?php echo timetodate($DT_TIME, 'Y');?> <?php echo $COM['company'];?> 版权所有&nbsp;&nbsp;
技术支持：<a href="<?php echo DT_PATH;?>" target="_blank"><?php echo $DT['sitename'];?></a>&nbsp;&nbsp;
<?php if($show_stats) { ?>访问量:<?php echo $COM['hits'];?>&nbsp;&nbsp;<?php } ?>
<?php if($COM['icp']) { ?> | <a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $COM['icp'];?></a><?php } ?>
<?php if($api_stats && $stats) { ?>
<?php include DT_ROOT.'/api/stats/'.$HOME['stats_type'].'/show.inc.php';?>
<?php } ?>
</div>
</div>
<script type="text/javascript">Dd('position').innerHTML = Dd('pos_show').innerHTML;</script>
<?php if($album_js) { ?><script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/album.js"></script><?php } ?>
<?php if($api_kf && $kf) { ?>
<?php include DT_ROOT.'/api/kf/'.$HOME['kf_type'].'/show.inc.php';?>
<?php } ?>
</body>
</html>