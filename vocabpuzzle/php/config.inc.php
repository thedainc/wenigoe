<?php

// DNS of the database server
$db_server = "godsson77.db.3061594.hostedresource.com";
// db user
$db_user = "godsson77";
// db password
$db_password = "theneWMe99!";
// my custom password used to allow someone to modifiy the custom databases
$custom_password = "beetlejuice";
// database name
$db_name = "godsson77";
// results table
$db_table = "results";
// user table
$user_table = "iptab";
// english dict
$english_table = "english";
// german table
$german_table = "german";
// code table
$code_table = "codetab";
// database handle
$db = mysql_connect($db_server,$db_user,$db_password);
// establish database connection
mysql_select_db($db_name,$db);
// IP blocking (40 seconds)
$timestamp = 5;
$timeDelay = time()-$timestamp;
// user IP
$user_ip = $_SERVER['REMOTE_ADDR'];

?>