<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: September 16, 2013, 3:07 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Blog
 * @version 		$Id: view.html.php 5844 2013-05-09 08:00:59Z Raymond_Benc $
 */
 
 

?>
<div class="item_view">
	<div class="item_info">
<?php echo Phpfox::getPhrase('blog.by_user', array('full_name' => '<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aItem']['user_name'] . '" itemprop="author"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aItem']['user_name'], ((empty($this->_aVars['aItem']['user_name']) && isset($this->_aVars['aItem']['profile_page_id'])) ? $this->_aVars['aItem']['profile_page_id'] : null))) . '" rel="author" >' . Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getService('user')->getCurrentName($this->_aVars['aItem']['user_id'], $this->_aVars['aItem']['full_name']), 50, '...') . '</a></span>')); ?>
	</div>
	
<?php if ($this->_aVars['aItem']['is_approved'] != 1): ?>
	<div class="message js_moderation_off" id="js_approve_message">
<?php echo Phpfox::getPhrase('blog.this_blog_is_pending_an_admins_approval'); ?>
	</div>
<?php endif; ?>
	
<?php if (Phpfox ::getUserParam('blog.can_approve_blogs') || ( Phpfox ::getUserParam('blog.edit_own_blog') && Phpfox ::getUserId() == $this->_aVars['aItem']['user_id'] ) || Phpfox ::getUserParam('blog.edit_user_blog') || ( Phpfox ::getUserParam('blog.delete_own_blog') && Phpfox ::getUserId() == $this->_aVars['aItem']['user_id'] ) || Phpfox ::getUserParam('blog.delete_user_blog')): ?>
	<div class="item_bar">
		<div class="item_bar_action_holder">
<?php if ($this->_aVars['aItem']['is_approved'] != 1 && Phpfox ::getUserParam('blog.can_approve_blogs')): ?>
				<a href="#" class="item_bar_approve item_bar_approve_image" onclick="return false;" style="display:none;" id="js_item_bar_approve_image"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'ajax/add.gif')); ?></a>			
				<a href="#" class="item_bar_approve" onclick="$(this).hide(); $('#js_item_bar_approve_image').show(); $.ajaxCall('blog.approve', 'inline=true&amp;id=<?php echo $this->_aVars['aItem']['blog_id']; ?>'); return false;"><?php echo Phpfox::getPhrase('blog.approve'); ?></a>
<?php endif; ?>
			<a href="#" class="item_bar_action"><span><?php echo Phpfox::getPhrase('blog.actions'); ?></span></a>		
			<ul>
				<?php
						Phpfox::getLib('template')->getBuiltFile('blog.block.link');						
						?>
			</ul>			
		</div>		
	</div>
<?php endif; ?>
	
	<?php
						Phpfox::getLib('template')->getBuiltFile('blog.block.entry');						
						?>
	
<?php (($sPlugin = Phpfox_Plugin::get('blog.template_controller_view_end')) ? eval($sPlugin) : false); ?>
	<div <?php if ($this->_aVars['aItem']['is_approved'] != 1): ?>style="display:none;" class="js_moderation_on"<?php endif; ?>>
<?php Phpfox::getBlock('feed.comment', array()); ?>
	</div>
</div>
