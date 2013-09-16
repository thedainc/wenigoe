<?php

require("config.inc.php");


if (empty($_GET['pw'])) {
	echo "result=error";
	return;
}

$pw = utf8_decode($_GET['pw']);

if (empty($_GET['db']) || $pw!=$custom_password) {
	echo "result=error";
	return;
}

$dbname = utf8_decode($_GET['db']);

$result = mysql_query("SELECT * FROM tablesOverview WHERE dbname='$dbname'");

if (empty($_GET['desc'])) {

	$description = "No description";

} else {
	
	$description = utf8_decode($_GET['desc']);
}

if (!$result || !mysql_fetch_array($result)) {
	
	mysql_query("INSERT INTO tablesOverview (dbname,description) VALUES ('$dbname','$description')");
	
	$install_tab = "CREATE TABLE $dbname (
	`id` int(10) unsigned NOT NULL auto_increment,
	`word` varchar(40) NOT NULL default '',
	PRIMARY KEY (`id`)
	) AUTO_INCREMENT=1;";
	
	$dic = mysql_query($install_tab);

	if (!$dic) {
		echo "result=error";
		return;
	} else {
	    if (empty($_GET['word'])) {
			echo "result=newTable";
			return;
		}
	}	
}


if (empty($_GET['word'])) {
	echo "result=nothing";
	return;
}

$word = utf8_decode($_GET['word']);


$result = mysql_query("SELECT * FROM $dbname WHERE word='$word'");

if (!$result || !mysql_fetch_array($result)) {

	// Word is not in the table yet, so insert
	
	$result = mysql_query("INSERT INTO $dbname (word) VALUES ('$word')");
	
	echo "result=newInsert";
	return;

}

echo "result=already";

 ?>