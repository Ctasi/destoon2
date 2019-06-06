<?php defined('IN_DESTOON') or exit('Access Denied');?><ul class="purposes-trade-detail">
 <?php if(is_array($tags)) { foreach($tags as $k => $t) { ?>
<li class="row show-trade-info-all" alt="<?php echo $t['alt'];?>" title="<?php echo $t['alt'];?>"> <span class=" inline-block contentbuy ellipsis"><a href="<?php echo $t['linkurl'];?>" target="_blank"><?php echo $t['title'];?></a></span> <span class=" inline-block status ellipsis"> <span class="so">大量</span> </span> <span class=" inline-block time ellipsis">
<?php
$ti = DT_TIME - $t['edittime'];
$di = floor($ti/60/60/24);
$hi = floor($ti/60/60);
$ii = floor($ti/60);
$si = floor($ti/1);
if(1<$di){
echo "$di 天前";
}
elseif(1<$hi)
{
echo "$hi 时前";
}
elseif(1<$ii)
{
echo "$ii 分前";
}
elseif(1<$si)
{
echo "$si 秒前";
}
?>
</span> 
</li>
<?php } } ?>
</ul>