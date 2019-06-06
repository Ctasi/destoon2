<?php defined('IN_DESTOON') or exit('Access Denied');?>var _destoon_message = <?php echo $_message;?>;
var _destoon_chat = <?php echo $_chat;?>;
var _destoon_cart = get_cart();
if(typeof destoon_member == 'undefined') {
$('#destoon_message em').remove();
$('#message em').remove();
if(_destoon_message) {
$('#destoon_message').append('<em>'+_destoon_message+'</em>');
$('#message').append('<em>'+_destoon_message+'</em>');
}
if(_destoon_message > destoon_message && <?php echo $_sound;?>) {
$('#destoon_space').html(sound('message_<?php echo $_sound;?>'));
destoon_message = _destoon_message;
}
<?php if($DT['im_web']) { ?>
$('#destoon_chat em').remove();
$('#chats em').remove();
if(_destoon_chat) {
$('#destoon_chat').append('<em>'+_destoon_chat+'</em>');
$('#chats').append('<em>'+_destoon_chat+'</em>');
}
if(_destoon_chat > destoon_chat) {
$('#destoon_space').html(sound('chat_new'));
destoon_chat = _destoon_chat;
}
<?php } ?>
} else {
$('#destoon_message').html(_destoon_message ? '<strong>'+_destoon_message+'</strong>' : 0);
if(_destoon_message > destoon_message && <?php echo $_sound;?>) {
$('#destoon_space').html(sound('message_<?php echo $_sound;?>'));
destoon_message = _destoon_message;
}
<?php if($DT['im_web']) { ?>
$('#destoon_chat').html(_destoon_chat ? '<strong>'+_destoon_chat+'</strong>' : 0);
if(_destoon_chat > destoon_chat) {
$('#destoon_space').html(sound('chat_new'));
destoon_chat = _destoon_chat;
}
<?php } ?>
<?php if($DT['max_cart']) { ?>
$('#destoon_cart').html(_destoon_cart > 0 ? '<strong>'+_destoon_cart+'</strong>' : 0);
<?php } ?>
}