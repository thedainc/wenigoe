<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: template-footer.html.php 5543 2013-03-25 13:49:51Z Miguel_Espinoza $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
		{if !defined('PHPFOX_SKIP_IM')}
		{module name='im.footer'}
		{$sDebugInfo}
		{/if}
		{loadjs}
        {plugin call='theme_template_body__end'}
        