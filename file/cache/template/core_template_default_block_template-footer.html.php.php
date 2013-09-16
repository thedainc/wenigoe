<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: September 16, 2013, 1:10 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: template-footer.html.php 5543 2013-03-25 13:49:51Z Miguel_Espinoza $
 */
 
 

?>
<?php if (! defined ( 'PHPFOX_SKIP_IM' )): ?>
<?php Phpfox::getBlock('im.footer', array()); ?>
<?php echo $this->_aVars['sDebugInfo']; ?>
<?php endif; ?>
<?php echo $this->_sFooter; ?>
<?php (($sPlugin = Phpfox_Plugin::get('theme_template_body__end')) ? eval($sPlugin) : false); ?>
        
