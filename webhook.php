<?php 
require(__DIR__.'/config/config.php');
require(__DIR__.'/function/change.php');
require(__DIR__.'/function/curl.php');
require(__DIR__.'/function/sendmessage.php');
date_default_timezone_set("Asia/Taipei");
$time = date("Y-m-d H:i:s");
$today = date("Y-m-d");
$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET' && $_GET['hub_mode'] == 'subscribe' &&  $_GET['hub_verify_token'] == $verify_token) {
	echo $_GET['hub_challenge'];
} else if ($method == 'POST') {
	$input = json_decode(file_get_contents('php://input'), true);
	$message = $input['entry'][0]['messaging'][0]['message']['text'];
	$sticker_id = $input['entry'][0]['messaging'][0]['message']['sticker_id'];
	$uid = '';
	$name = '';
	$mmid = $input['entry'][0]['messaging'][0]['message']['mid'];
	$tmid = tmid($mmid);

	if($message){
		sendmessage($tmid,$message);
	}else if(isset($sticker_id)){
		sendmessage($tmid,"本bot未支援貼圖回應功能\n抱歉");
	}else{
		sendmessage($tmid,"OPPS，發生未知的錯誤，已把錯誤回報，抱歉");
	}
}
?>