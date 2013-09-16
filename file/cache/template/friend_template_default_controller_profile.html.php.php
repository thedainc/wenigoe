<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: September 16, 2013, 2:45 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Friend
 * @version 		$Id: profile.html.php 6041 2013-06-10 18:50:19Z Raymond_Benc $
 */
 
 

 if (count ( $this->_aVars['aFriends'] )):  if (count((array)$this->_aVars['aFriends'])):  $this->_aPhpfoxVars['iteration']['friend'] = 0;  foreach ((array) $this->_aVars['aFriends'] as $this->_aVars['aFriend']):  $this->_aPhpfoxVars['iteration']['friend']++; ?>

<div id="js_friend_<?php echo $this->_aVars['aFriend']['friend_id']; ?>" class="go_left row_friend_browse" style="width:32%; padding-bottom:10px; position:relative;">
	<div class="t_center" style="width:80px; float:left;">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aFriend'],'suffix' => '_50_square','max_width' => 75,'max_height' => 75)); ?>
	</div>
	<div style="margin-left:85px; position:relative;">
		<span class="row_title_link"><?php echo '<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aFriend']['user_name'] . '"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aFriend']['user_name'], ((empty($this->_aVars['aFriend']['user_name']) && isset($this->_aVars['aFriend']['profile_page_id'])) ? $this->_aVars['aFriend']['profile_page_id'] : null))) . '">' . Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getService('user')->getCurrentName($this->_aVars['aFriend']['user_id'], $this->_aVars['aFriend']['full_name']), 50, '...') . '</a></span>'; ?></span>
<?php if (defined ( 'PHPFOX_IS_USER_PROFILE' ) && isset ( $this->_aVars['aUser']['user_id'] ) && $this->_aVars['aUser']['user_id'] == Phpfox ::getUserId()): ?>
		<div class="row_unfriend">
			<a href="#" onclick="$.ajaxCall('friend.delete', 'id=<?php echo $this->_aVars['aFriend']['friend_id']; ?>'); return false;"><?php echo Phpfox::getPhrase('friend.unfriend'); ?></a>
		</div>
<?php endif; ?>
	</div>
	<div class="clear"></div>
</div>

<?php endforeach; endif; ?>
<div class="clear"></div>
<?php if (!isset($this->_aVars['aPager'])): Phpfox::getLib('pager')->set(array('page' => Phpfox::getLib('request')->getInt('page'), 'size' => Phpfox::getLib('search')->getDisplay(), 'count' => Phpfox::getLib('search')->getCount())); endif;  $this->getLayout('pager');  else: ?>

<?php if ($this->_aVars['sFriendView'] == 'online'): ?>
<div class="extra_info">
<?php echo Phpfox::getPhrase('friend.no_friends_online'); ?>
</div>
<?php else: ?>

<?php if ($this->_aVars['aUser']['user_id'] == Phpfox ::getUserId()): ?>
<div class="extra_info"><?php echo Phpfox::getPhrase('friend.you_have_not_added_any_friends_yet'); ?></div>
<ul class="action">
	<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('friend.find'); ?>"><?php echo Phpfox::getPhrase('friend.search_for_friends'); ?></a></li>
	<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('user.browse'); ?>"><?php echo Phpfox::getPhrase('friend.browse_members'); ?></a></li>
</ul>
<?php else: ?>
<div class="extra_info"><?php echo Phpfox::getPhrase('friend.user_link_has_not_added_any_friends', array('user' => $this->_aVars['aUser'])); ?></div>
<ul class="action">	
	<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('user.browse'); ?>"><?php echo Phpfox::getPhrase('friend.browse_other_members'); ?></a></li>
</ul>
<?php endif; ?>

<?php endif; ?>

<?php endif; ?>
