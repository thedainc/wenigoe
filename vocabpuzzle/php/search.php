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
	
	echo "result=errorTable";
	return;
	
}


if (empty($_GET['word'])) {
	echo "result=nowordGiven";
	return;
}

$word = utf8_decode($_GET['word']);


$result = mysql_query("SELECT * FROM $dbname WHERE word='$word'");

if (!$result || !mysql_fetch_array($result)) {

	echo "result=notFound";
	return;

}

echo "result=wordFound";

 ?>