<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: September 16, 2013, 1:10 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Feed
 * @version 		$Id: mini.html.php 4545 2012-07-20 10:40:35Z Raymond_Benc $
 */
 
 

?>
<div class="feed_share_holder">
<?php if (! isset ( $this->_aVars['aParentFeed']['no_user_show'] )): ?>
<?php echo '<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aParentFeed']['user_name'] . '"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aParentFeed']['user_name'], ((empty($this->_aVars['aParentFeed']['user_name']) && isset($this->_aVars['aParentFeed']['profile_page_id'])) ? $this->_aVars['aParentFeed']['profile_page_id'] : null))) . '">' . Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getService('user')->getCurrentName($this->_aVars['aParentFeed']['user_id'], $this->_aVars['aParentFeed']['full_name']), 50, '...') . '</a></span>'; ?>
<?php endif; ?>
<?php if (isset ( $this->_aVars['aParentFeed']['parent_user'] )): ?> <?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'layout/arrow.png','class' => 'v_middle')); ?> <?php echo '<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aParentFeed']['parent_user']['parent_user_name'] . '"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aParentFeed']['parent_user']['parent_user_name'], ((empty($this->_aVars['aParentFeed']['parent_user']['parent_user_name']) && isset($this->_aVars['aParentFeed']['parent_user']['parent_profile_page_id'])) ? $this->_aVars['aParentFeed']['parent_user']['parent_profile_page_id'] : null))) . '">' . Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getService('user')->getCurrentName($this->_aVars['aParentFeed']['parent_user']['parent_user_id'], $this->_aVars['aParentFeed']['parent_user']['parent_full_name']), 50, '...') . '</a></span>'; ?> <?php endif;  if (! empty ( $this->_aVars['aParentFeed']['feed_info'] )): ?> <?php echo $this->_aVars['aParentFeed']['feed_info'];  endif; ?>
	
	
<?php if (! empty ( $this->_aVars['aParentFeed']['feed_mini_content'] )): ?>
			<div class="activity_feed_content_status">
				<div class="activity_feed_content_status_left">
					<img src="<?php echo $this->_aVars['aParentFeed']['feed_icon']; ?>" alt="" class="v_middle" /> <?php echo $this->_aVars['aParentFeed']['feed_mini_content']; ?> 
				</div>
				<div class="activity_feed_content_status_right">
					<?php
						Phpfox::getLib('template')->getBuiltFile('feed.block.link');						
						?>
				</div>
				<div class="clear"></div>
			</div>
<?php endif; ?>

<?php if (isset ( $this->_aVars['aParentFeed']['feed_status'] ) && ( ! empty ( $this->_aVars['aParentFeed']['feed_status'] ) || $this->_aVars['aParentFeed']['feed_status'] == '0' )): ?>
			<div class="activity_feed_content_status">
<?php echo Phpfox::getLib('phpfox.parse.output')->split(Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getLib('parse.output')->feedStrip($this->_aVars['aParentFeed']['feed_status']), 200, 'feed.view_more', true), 55); ?>
			</div>
<?php endif; ?>
	
			<div class="activity_feed_content_link"<?php if (isset ( $this->_aVars['aParentFeed']['no_user_show'] )): ?> style="margin-top:0px;"<?php endif; ?>>
				
<?php if ($this->_aVars['aParentFeed']['type_id'] == 'friend' && isset ( $this->_aVars['aParentFeed']['more_feed_rows'] ) && is_array ( $this->_aVars['aParentFeed']['more_feed_rows'] ) && count ( $this->_aVars['aParentFeed']['more_feed_rows'] )): ?>
<?php if (count((array)$this->_aVars['aParentFeed']['more_feed_rows'])):  foreach ((array) $this->_aVars['aParentFeed']['more_feed_rows'] as $this->_aVars['aFriends']): ?>
<?php echo $this->_aVars['aFriends']['feed_image']; ?>
<?php endforeach; endif; ?>
<?php echo $this->_aVars['aParentFeed']['feed_image']; ?>
<?php else: ?>
<?php if (! empty ( $this->_aVars['aParentFeed']['feed_image'] )): ?>
				<div class="activity_feed_content_image"<?php if (isset ( $this->_aVars['aParentFeed']['feed_custom_width'] )): ?> style="width:<?php echo $this->_aVars['aParentFeed']['feed_custom_width']; ?>;"<?php endif; ?>>
<?php if (is_array ( $this->_aVars['aParentFeed']['feed_image'] )): ?>
						<ul class="activity_feed_multiple_image">
<?php if (count((array)$this->_aVars['aParentFeed']['feed_image'])):  foreach ((array) $this->_aVars['aParentFeed']['feed_image'] as $this->_aVars['sFeedImage']): ?>
								<li><?php echo $this->_aVars['sFeedImage']; ?></li>
<?php endforeach; endif; ?>
						</ul>
						<div class="clear"></div>
<?php else: ?>
						<a href="<?php echo $this->_aVars['aParentFeed']['feed_link']; ?>" target="_blank" class="<?php if (isset ( $this->_aVars['aParentFeed']['custom_css'] )): ?> <?php echo $this->_aVars['aParentFeed']['custom_css']; ?> <?php endif;  if (! empty ( $this->_aVars['aParentFeed']['feed_image_onclick'] )):  if (! isset ( $this->_aVars['aParentFeed']['feed_image_onclick_no_image'] )): ?>play_link <?php endif; ?> no_ajax_link<?php endif; ?>"<?php if (! empty ( $this->_aVars['aParentFeed']['feed_image_onclick'] )): ?> onclick="<?php echo $this->_aVars['aParentFeed']['feed_image_onclick']; ?>"<?php endif;  if (! empty ( $this->_aVars['aParentFeed']['custom_rel'] )): ?> rel="<?php echo $this->_aVars['aParentFeed']['custom_rel']; ?>"<?php endif;  if (isset ( $this->_aVars['aParentFeed']['custom_js'] )): ?> <?php echo $this->_aVars['aParentFeed']['custom_js']; ?> <?php endif; ?>><?php if (! empty ( $this->_aVars['aParentFeed']['feed_image_onclick'] )):  if (! isset ( $this->_aVars['aParentFeed']['feed_image_onclick_no_image'] )): ?><span class="play_link_img"><?php echo Phpfox::getPhrase('feed.play'); ?></span><?php endif;  endif;  echo $this->_aVars['aParentFeed']['feed_image']; ?></a>
<?php endif; ?>
				</div>
<?php endif; ?>
				<div class="<?php if (( ! empty ( $this->_aVars['aParentFeed']['feed_content'] ) || ! empty ( $this->_aVars['aParentFeed']['feed_custom_html'] ) ) && empty ( $this->_aVars['aParentFeed']['feed_image'] )): ?> activity_feed_content_no_image<?php endif;  if (! empty ( $this->_aVars['aParentFeed']['feed_image'] )): ?> activity_feed_content_float<?php endif; ?>"<?php if (isset ( $this->_aVars['aParentFeed']['feed_custom_width'] )): ?> style="margin-left:<?php echo $this->_aVars['aParentFeed']['feed_custom_width']; ?>;"<?php endif; ?>>
<?php if (! empty ( $this->_aVars['aParentFeed']['feed_title'] )): ?>
					<a href="<?php echo $this->_aVars['aParentFeed']['feed_link']; ?>" class="activity_feed_content_link_title"<?php if (isset ( $this->_aVars['aParentFeed']['feed_title_extra_link'] )): ?> target="_blank"<?php endif; ?>><?php echo Phpfox::getLib('phpfox.parse.output')->split(Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aParentFeed']['feed_title']), 30); ?></a>
<?php if (! empty ( $this->_aVars['aParentFeed']['feed_title_extra'] )): ?>
					<div class="activity_feed_content_link_title_link">
						<a href="<?php echo $this->_aVars['aParentFeed']['feed_title_extra_link']; ?>" target="_blank"><?php echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aParentFeed']['feed_title_extra']); ?></a>
					</div>
<?php endif; ?>
<?php endif; ?>
<?php if (! empty ( $this->_aVars['aParentFeed']['feed_content'] )): ?>
					<div class="activity_feed_content_display">
<?php echo Phpfox::getLib('phpfox.parse.output')->split(Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getLib('parse.output')->feedStrip($this->_aVars['aParentFeed']['feed_content']), 200, '...'), 55); ?>
					</div>
<?php endif; ?>
<?php if (! empty ( $this->_aVars['aParentFeed']['feed_custom_html'] )): ?>
					<div class="activity_feed_content_display_custom">
<?php echo $this->_aVars['aParentFeed']['feed_custom_html']; ?>
					</div>
<?php endif; ?>
					
				</div>	
<?php if (! empty ( $this->_aVars['aParentFeed']['feed_image'] )): ?>
				<div class="clear"></div>
<?php endif; ?>
<?php endif; ?>
			</div>			
			
</div>
			
