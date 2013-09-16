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

mysql_query("DELETE FROM tablesOverview WHERE dbname='$dbname'");
mysql_query("DROP TABLE $dbname");


echo "result=doneDel";

?>