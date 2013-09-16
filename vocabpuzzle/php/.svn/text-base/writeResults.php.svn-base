<?php 
require_once('config.inc.php');
require_once('checker.inc.php');

if ( !empty($_POST['email']) && !Checker::ip_block($user_table,$timeDelay,$user_ip)) {

	$email = utf8_decode($_POST['email']);

	$time = utf8_decode($_POST['time']);

	$temp = Checker::get_presCode($code_table,$user_ip,$time);
	
	$code = $_POST['code'];
	$res = md5("$temp$email");
	$comp = "$temp"."MD$res";
	if (strcmp($code,$comp)!=0) return;

	$score = utf8_decode($_POST['score']);
	$timePlayed = utf8_decode($_POST['timePlayed']);
	$theID = utf8_decode($_POST['theID']);
	$word =  utf8_decode($_POST['word']);
	
	
	mysql_query("INSERT INTO $db_table (theID, score,time,word,email) VALUES ('$theID','$score','$timePlayed','$word','$email')");
	
	echo "res=true";
	
} else {

	echo "res=false";
}

?>