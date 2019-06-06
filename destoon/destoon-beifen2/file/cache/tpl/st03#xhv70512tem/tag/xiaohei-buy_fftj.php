<?php defined('IN_DESTOON') or exit('Access Denied');?><?php if(is_array($tags)) { foreach($tags as $i => $t) { ?>
 <dl class="<?php if($i==0) { ?>first<?php } ?>">
              <dt>
                <div class="vertical-img"> <a class="box-img" href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>" alt="<?php echo $t['alt'];?>"> <img width="80" height="80" alt="<?php echo $t['alt'];?>" src="<?php if($t['thumb']) { ?><?php echo str_replace('thumb', 'middle', $t['thumb']);?><?php } else { ?><?php echo DT_SKIN;?>image/nopic100.gif<?php } ?>" onerror="this.src='<?php echo DT_SKIN;?>image/nopic200.gif'"> </a> </div>
              </dt>
              <dd class="company"><a href="<?php echo $t['linkurl'];?>" target="_blank" title="<?php echo $t['alt'];?>" alt="<?php echo $t['alt'];?>"><?php echo $t['title'];?></a></dd>
              <dd class="intro">&nbsp; <?php echo dsubstr($t['introduce'], 40, '…');?></dd>
              <dd class="name"><a target="_blank" href="<?php echo userurl($t['username']);?>" class="mr10"> <?php echo $t['truename'];?> </a></dd>
            </dl>
<?php } } ?>