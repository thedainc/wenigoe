<?php

class Checker
{
	static function format($searchChar, $replaceChar, $data)
	{
		return str_replace($searchChar, $replaceChar, $data);
	}
	static function quote($value)
	{
		if (get_magic_quotes_gpc()) {
			$value = stripslashes($value); 
		}
		if (!is_int($value)) {
			$value = "'".mysql_real_escape_string($value)."'";
		}
		return $wert;
	}
	static function ip_block($ip_table, $delay, $ip) {
		mysql_query("DELETE FROM $ip_table WHERE time < $delay");
		$sqlQuery = "SELECT COUNT(*) FROM $ip_table WHERE ip = '{$ip}'";
		
		list($inIt) = mysql_fetch_row(mysql_query($sqlQuery));
		
		if ($inIt) {
			// IP in db
			mysql_query("UPDATE $ip_table SET time='".time()."' WHERE ip='{$ip}'");
			return true;
		} else {
			mysql_query("INSERT INTO $ip_table SET time='".time()."', ip='{$ip}'");
			return false;		
		
		}
	}
	
	static function get_presCode($code_table,$ip, $time) {
		$sqlQuery = "SELECT * FROM $code_table WHERE time = '$time'";
		
				
		$row=mysql_fetch_array(mysql_query($sqlQuery));
		
		return "$row[time]"."-"."$row[ip]";
	
	}
	
	static function get_code($code_table,$ip) {
		
		$sqlQuery = "SELECT COUNT(*) FROM $code_table WHERE ip = '{$ip}'";
		
		list($inIt) = mysql_fetch_row(mysql_query($sqlQuery));
		
		$tim = time();
		
		if ($inIt) {
			// IP in db
			
			$delay = time()-1200;
			
			mysql_query("DELETE FROM $code_table WHERE time < $delay");
			
			
		} 
		
		mysql_query("INSERT INTO $code_table SET time='".$tim."', ip='{$ip}'");
		
		return "".$tim."-".$ip;
	}
}
?>