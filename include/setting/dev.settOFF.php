<?php
 /**
 While you are developing there are certain constants to make things a lot easier for all of us. Many aspects of the script is cached into flat files. This can be from data we pull out from the database, templates files that are converted into PHP code or JavaScript files that are gzipped. While we are developing we always enable debug mode to make sure we don't have any errors in our code. The constants we are about to show you is a list of constants that do not all have to be set. You can choose which constants you want. If you do not want a certain constant simply remove it from the file. Note then when certain constants are enabled your site will run much slower. You have to consider that the site is not caching any data and this is very risky on a live community. Remember never have any of these settings on a live community. 

http://www.phpfox.com/kb/article/144/creating-your-first-add-on/development-environment/

 */

/**
Additionally you can wrap the defines (all in one block if you want) into an if statement so debug mode is enabled only for your IP. You can check what your IP is by going here and the code would look like: 
*/


if ($_SERVER['REMOTE_ADDR'] == '71.95.20.242')
{
// Enable debug
define('PHPFOX_DEBUG', true);
 
// Debug level
define('PHPFOX_DEBUG_LEVEL', 1);
//...
}


// Enable debug
define('PHPFOX_DEBUG', true);
 
// Debug level
define('PHPFOX_DEBUG_LEVEL', 1);
 
// Force templates re-cache on each page refresh
define('PHPFOX_NO_TEMPLATE_CACHE', true);
 
// Force browsers to re-cache static files on each page refresh
define('PHPFOX_NO_CSS_CACHE', true);
 
// Override default email
define('PHPFOX_DEFAULT_OUT_EMAIL', 'your_email@email.com');
 
// Skip sending out of emails
define('PHPFOX_SKIP_MAIL', true);
 
// Use live templates and not those from the database
define('PHPFOX_LIVE_TEMPLATES', true);
 
// Add user_name in the title of each page. Great for when working with many browsers open
define('PHPFOX_ADD_USER_TITLE', true);
 
// Cache emails to flat files
define('PHPFOX_CACHE_MAIL', true);
 
// Log error messages to XML flat file within the cache folder
define('PHPFOX_LOG_ERROR', true);
 
// Skip the storing of cache files in the DB
define('PHPFOX_CACHE_SKIP_DB_STORE', true); 
?> 