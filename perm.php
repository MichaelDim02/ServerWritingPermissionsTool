<?php
 
//IP Grabber
 
//Variables


$fp = fopen('lidn.txt', 'w');
fwrite($fp, 'Cats chase mice');
fclose($fp);


$protocol = $_SERVER['SERVER_PROTOCOL'];
$ipaddress = '';
if ($_SERVER['HTTP_CLIENT_IP'] != '127.0.0.1')
	$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
else if ($_SERVER['HTTP_X_FORWARDED_FOR'] != '127.0.0.1')
	$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
else if ($_SERVER['HTTP_X_FORWARDED'] != '127.0.0.1')
	$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
else if ($_SERVER['HTTP_FORWARDED_FOR'] != '127.0.0.1')
	$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
else if ($_SERVER['HTTP_FORWARDED'] != '127.0.0.1')
	$ipaddress = $_SERVER['HTTP_FORWARDED'];
else if ($_SERVER['REMOTE_ADDR'] != '127.0.0.1')
	$ipaddress = $_SERVER['REMOTE_ADDR'];
else
	$ipaddress = 'UNKNOWN';

$port = $_SERVER['REMOTE_PORT'];
$agent = $_SERVER['HTTP_USER_AGENT'];
$ref = $_SERVER['HTTP_REFERER'];
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
 
//Print IP, Hostname, Port Number, User Agent and Referer To Log.TXT

$fh = fopen('/log.txt', 'a');
fwrite($fh, 'IP Address: '."".$ipaddress ."\n");
fwrite($fh, 'Hostname: '."".$hostname ."\n");
fwrite($fh, 'Port Number: '."".$port ."\n");
fwrite($fh, 'User Agent: '."".$agent ."\n");
fwrite($fh, 'HTTP Referer: '."".$ref ."\n\n");
fclose($fh);
?>
hi
