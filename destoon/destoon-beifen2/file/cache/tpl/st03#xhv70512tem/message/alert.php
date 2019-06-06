<?php defined('IN_DESTOON') or exit('Access Denied');?><!doctype html>
<html>
<head>
<meta charset="<?php echo DT_CHARSET;?>"/>
<title>提示信息<?php echo $DT['seo_delimiter'];?><?php echo $DT['sitename'];?></title>
<meta name="robots" content="noindex,nofollow"/>
<script type="text/javascript" src="<?php echo DT_STATIC;?>file/script/config.js"></script>
</head>
<body>
<script type="text/javascript">
<?php if($dmessage) { ?>alert('<?php echo $dmessage;?>');<?php } ?>
<?php if($dforward) { ?>
<?php if($dforward == 'goback') { ?>
window.history.back();
<?php } else { ?>
window.location='<?php echo $dforward;?>';
<?php } ?>
<?php } ?>
<?php echo $extend;?>
</script>
</body>
</html>