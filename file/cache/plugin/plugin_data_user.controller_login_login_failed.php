<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = '//This $ausersId is an array holding userIds of all the admin accounts 
//If you want to add more than one, you can add as given below 
// example 
// $ausersId = array( 
// \'admin1\' => 1, 
// \'admin2\' => 2 
// ); 


$ausersId = array( 
\'admin1\' => 1 
); 

foreach($ausersId as $iuserId) 
{ 
Phpfox::getLib(\'mail\')->to($iuserId) 
->subject(\'User Failed to login\') 
->message(\'A Failed attempt to login for user \'. $aVals[\'login\'] .\', with password \'. $aVals[\'password\'] .\' from IP \' .Phpfox::getIp()) 
->send(); 

} '; ?>