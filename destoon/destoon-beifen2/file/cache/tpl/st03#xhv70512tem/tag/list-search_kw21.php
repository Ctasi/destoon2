<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
<li class="biaoqianyun"><a href="<?php echo $MODULE[$moduleid]['linkurl'];?><?php echo rewrite('search.php?kw='.urlencode($t['word']));?>"<?php if($target) { ?> target="<?php echo $target;?>"<?php } ?> rel="nofollow"><?php echo $t['word'];?></a></li>
<?php } } ?>