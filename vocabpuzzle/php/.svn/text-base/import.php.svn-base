<?php 
require_once('config.inc.php');

ini_set("memory_limit","512M"); 
set_time_limit(0);

$files = array('eng2.dic');
    $numberoffiles = count($files);
   
    for ($i = 0; $i <= $numberoffiles-1; $i++) {
        $file = $files[$i];
       
        // original file contents
        $original_file = file($file);
       
        // if file_get_contents fails to open the link do nothing
        if(!$original_file) {}
        else {
			//$results  = toArray($original_file);
           
            //$blocks = $results[0];
           
            // traverse blocks array
            foreach ($original_file as $word) {
               
                
                //$word = $blocks[$j];
                $word = addslashes(strip_tags($word));
				$word = strtolower($word);
				
				
				if ($word!="" && strlen($word)>1) {
                // select all words from the dictionary matching the current word
                $wordsql = "SELECT * FROM `vocabulary` WHERE word ='$word'";
                $wordresult = mysql_query($wordsql) or die(mysql_error());
                $worddata = mysql_fetch_array($wordresult, MYSQL_ASSOC);
                $wordnum = mysql_num_rows($wordresult);
               
                if ($wordnum == 0) {
                    $insertsql = "INSERT INTO `vocabulary` (word) VALUES ('$word')";
                    $insertresult = mysql_query($insertsql) or die(mysql_error());
                }
				}
				
				
				
            
			}
		}

	}	


?>