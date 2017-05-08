<?php
function tmid($mmid){
	global $FBAPI,$access_token,$uid,$name;
	$res = curl($FBAPI."m_".$mmid."?fields=from&access_token=".$access_token);
	$res = json_decode($res, true);
	$uid = $res['from']['id'];
    $name = $res['from']['name'];
	$res = curl($FBAPI."me/conversations?fields=participants,updated_time&access_token=".$access_token);
	$res = json_decode($res, true);
	foreach($res['data'] as $data){
		if($uid==$data['participants']['data'][0]['id']){
			return $data['id'];
		}
	}
	return 0;
};
?>