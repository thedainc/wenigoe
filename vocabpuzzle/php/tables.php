<?php

require("config.inc.php");

$pw = utf8_decode($_GET['pw']);

	if (empty($_GET['pw']) || $pw!=$custom_password) {
		echo "result=error";
		return;
	}

	$result = mysql_query("SELECT * FROM tablesOverview WHERE 1");
	
    $cant = 0;
    while($row=mysql_fetch_array($result)){
       echo "name$cant=$row[dbname]&desc$cant=$row[description]&";
       $cant++;
    }
	echo "cant=$cant&result=okay";


 ?>