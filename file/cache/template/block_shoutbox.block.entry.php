<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: September 16, 2013, 1:10 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Shoutbox
 * @version 		$Id: entry.html.php 5616 2013-04-10 07:54:55Z Miguel_Espinoza $
 */
 
 

?>
	<div class="js_shoutbox_messages <?php if (isset ( $this->_aVars['bShoutboxAjax'] )): ?>row2 row_first<?php else:  if (is_int ( $this->_aVars['iShoutCount'] / 2 )): ?>row1<?php else: ?>row2<?php endif;  if (( $this->_aVars['iShoutCount'] + 1 ) == 1): ?> row_first<?php endif;  endif; ?>" style="position:relative;">
<?php if (Phpfox ::getUserParam('shoutbox.can_delete_all_shoutbox_messages')): ?>
	<div style="position:absolute; right:1px">
		<a href="#" onclick="if (confirm('<?php echo Phpfox::getPhrase('shoutbox.are_you_sure', array('phpfox_squote' => true)); ?>')) { $(this).parents('.js_shoutbox_messages:first').remove(); $.ajaxCall('shoutbox.delete', 'id=<?php echo $this->_aVars['aShoutout']['shout_id']; ?>&amp;module=<?php echo $this->_aVars['aShoutout']['module']; ?>'); } return false;" title="<?php echo Phpfox::getPhrase('shoutbox.delete_this_shoutout'); ?>"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/delete.gif')); ?></a>
	</div>
<?php endif; ?>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aShoutout'],'suffix' => '_50_square','max_width' => 20,'max_height' => 20,'style' => 'vertical-align:middle;')); ?> <?php echo '<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aShoutout']['user_name'] . '"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aShoutout']['user_name'], ((empty($this->_aVars['aShoutout']['user_name']) && isset($this->_aVars['aShoutout']['profile_page_id'])) ? $this->_aVars['aShoutout']['profile_page_id'] : null))) . '">' . Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getService('user')->getCurrentName($this->_aVars['aShoutout']['user_id'], $this->_aVars['aShoutout']['full_name']), 30, '...') . '</a></span>'; ?>
		<div class="extra_info">
<?php echo Phpfox::getTime(Phpfox::getParam('shoutbox.shoutbox_time_stamp'), $this->_aVars['aShoutout']['time_stamp']); ?>
		</div>
		<div class="p_4">
<?php echo $this->_aVars['aShoutout']['text']; ?>
		</div>
	</div>
