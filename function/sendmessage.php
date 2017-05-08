<?php
function SendMessage($tmid, $message) {
	global $FBAPI,$access_token;
	$post = array(
		"message" => $message,
		"access_token" => $access_token
	);
	$res = cURL($FBAPI.$tmid."/messages", $post);
	$res = json_decode($res, true);
	return true;
}