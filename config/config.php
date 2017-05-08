<?php
$access_token = "";
$verify_token = "";
$hub_verify_token = null;

$FBAPI = "https://graph.facebook.com/v2.8/";

$C["DBhost"] = 'localhost';
$C['DBname'] = '';
$C['DBuser'] = '';
$C['DBpass'] = '';
$C['DBTBprefix'] = '';
$G["db"] = new PDO ('mysql:host='.$C["DBhost"].';dbname='.$C["DBname"].';charset=utf8mb4', $C["DBuser"], $C["DBpass"]);
?>