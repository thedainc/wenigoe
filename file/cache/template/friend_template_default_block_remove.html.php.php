<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: September 16, 2013, 1:11 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Friend
 * @version 		$Id: top.html.php 1135 2009-10-05 12:59:10Z Miguel_Espinoza $
 */
 
 

?>
<div>
	<ul>		
		<li>
			<a href="#" onclick="if (confirm('<?php echo Phpfox::getPhrase('core.are_you_sure'); ?>'))$.ajaxCall('friend.delete', 'friend_user_id=<?php echo $this->_aVars['aUser']['user_id']; ?>&reload=1'); return false;" class="no_ajax_link">
<?php echo Phpfox::getPhrase('friend.remove_friend'); ?>
			</a>
		</li>		
	</ul>
</div>

