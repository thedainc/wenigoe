<?php 

require_once('config.inc.php');
require_once('checker.inc.php');


if ( !empty($_GET['word'])) {

	$word = utf8_decode($_GET['word']);
	
	$wordNo = $_GET['word'];
	
	if ($word == "xyz") {
		$temp = Checker::get_code($code_table,$user_ip);
    	echo "code=$temp";
    	return;
	} else {
	
		$time = utf8_decode($_GET['time']);
	
		$temp = Checker::get_presCode($code_table,$user_ip, $time);
		
		$code = utf8_decode($_GET['code']);
		$res = md5("$temp$wordNo");
		$comp = "$temp"."MD$res";
		
		$ret = "";
		
		$ret = "received code:".$code."\n"."my code:".$comp;
		
		if (strcmp($code,$comp)!=0) {
			echo "judge=error".$ret;
			return;
		}
		
	}
	
	$table = $english_table;
	
	if (!empty($_GET['lang'])) {
	
		$theLang = utf8_decode($_GET['lang']);
	
		if ($theLang=="german" || $theLang=="German") {
		$table = $german_table;
		} else if ($theLang == "english" || $theLang == "English") {
		} else {
		
			$table = $theLang;
		}
		
	}
	
	$result = mysql_query("SELECT * FROM $table WHERE word='$word'");
	
	$okay = 'false';
	
	if ($result) {	
		while(($row=mysql_fetch_array($result))){
	 
		if ($row['word'] == $word || $row['word'] == $word.' ') $okay = 'true';
      
		}
	} else {
		echo "judge=false";
		return; 	
	}
	
	echo "judge=$okay&word=$word";
	
} else {

	echo "judge=false";


}

?>