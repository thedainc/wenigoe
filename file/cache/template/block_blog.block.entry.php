<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: September 16, 2013, 3:07 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Blog
 * @version 		$Id: entry.html.php 5844 2013-05-09 08:00:59Z Raymond_Benc $
 */
 
 

?>
<div style="word-wrap:break-word;" id="js_blog_entry<?php echo $this->_aVars['aItem']['blog_id']; ?>"<?php if (! isset ( $this->_aVars['bBlogView'] )): ?> class="moderation_row js_blog_parent <?php if (is_int ( $this->_aPhpfoxVars['iteration']['blog'] / 2 )): ?>row1<?php else: ?>row2<?php endif;  if ($this->_aPhpfoxVars['iteration']['blog'] == 1 && ! PHPFOX_IS_AJAX): ?> row_first<?php endif;  if ($this->_aVars['aItem']['is_approved'] != 1): ?> <?php endif; ?>"<?php endif; ?>>	
<?php if (! isset ( $this->_aVars['bBlogView'] )): ?>
	<div class="row_title">	
		<div class="row_title_image">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aItem'],'suffix' => '_50_square','max_width' => 50,'max_height' => 50)); ?>
<?php if (Phpfox ::getUserParam('blog.can_approve_blogs') || ( Phpfox ::getUserParam('blog.edit_own_blog') && Phpfox ::getUserId() == $this->_aVars['aItem']['user_id'] ) || Phpfox ::getUserParam('blog.edit_user_blog') || ( Phpfox ::getUserParam('blog.delete_own_blog') && Phpfox ::getUserId() == $this->_aVars['aItem']['user_id'] ) || Phpfox ::getUserParam('blog.delete_user_blog')): ?>
			<div class="row_edit_bar_parent">
				<div class="row_edit_bar_holder">
					<ul>
						<?php
						Phpfox::getLib('template')->getBuiltFile('blog.block.link');						
						?>
					</ul>			
				</div>
				<div class="row_edit_bar">				
						<a href="#" class="row_edit_bar_action"><span><?php echo Phpfox::getPhrase('blog.actions'); ?></span></a>							
				</div>
			</div>
<?php endif; ?>
<?php if (Phpfox ::getUserParam('blog.can_approve_blogs') || Phpfox ::getUserParam('blog.delete_user_blog')): ?><a href="#<?php echo $this->_aVars['aItem']['blog_id']; ?>" class="moderate_link" rel="blog">Moderate</a><?php endif; ?>
		</div>
		<div class="row_title_info">
<?php if ($this->_aVars['aItem']['post_status'] == 2): ?>
<?php echo Phpfox::getPhrase('blog.draft_info'); ?>
<?php endif; ?>
			<header>			
				<h1 id="js_blog_edit_title<?php echo $this->_aVars['aItem']['blog_id']; ?>" itemprop="name">
					<a href="<?php echo Phpfox::permalink('blog', $this->_aVars['aItem']['blog_id'], $this->_aVars['aItem']['title'], false, null, (array) array (
)); ?>" id="js_blog_edit_inner_title<?php echo $this->_aVars['aItem']['blog_id']; ?>" class="link ajax_link" itemprop="url"><?php echo Phpfox::getLib('phpfox.parse.output')->split(Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aItem']['title']), 55, '...'), 20); ?></a>
				</h1>
			</header>
			
			<div class="extra_info">
<?php echo Phpfox::getPhrase('blog.by_full_name', array('full_name' => '<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aItem']['user_name'] . '" itemprop="author"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aItem']['user_name'], ((empty($this->_aVars['aItem']['user_name']) && isset($this->_aVars['aItem']['profile_page_id'])) ? $this->_aVars['aItem']['profile_page_id'] : null))) . '" rel="author" >' . Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getService('user')->getCurrentName($this->_aVars['aItem']['user_id'], $this->_aVars['aItem']['full_name']), 50, '...') . '</a></span>')); ?>
<?php (($sPlugin = Phpfox_Plugin::get('blog.template_block_entry_date_end')) ? eval($sPlugin) : false); ?>
			</div>
		
<?php endif; ?>
		<div class="blog_content">
			<div id="js_blog_edit_text<?php echo $this->_aVars['aItem']['blog_id']; ?>">	
				<div class="item_content item_view_content" itemprop="articleBody">
<?php if (isset ( $this->_aVars['bBlogView'] )): ?>
<?php echo Phpfox::getLib('phpfox.parse.output')->split(Phpfox::getLib('phpfox.search')->highlight('search', Phpfox::getLib('phpfox.parse.output')->parse($this->_aVars['aItem']['text'])), 55); ?>
<?php else: ?>
					<div class="extra_info">
<?php echo Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getLib('phpfox.parse.output')->split(Phpfox::getLib('phpfox.search')->highlight('search', strip_tags($this->_aVars['aItem']['text'])), 55), $this->_aVars['iShorten']).'...'; ?>
					</div>
<?php endif; ?>
				</div>			
			</div>	
			
<?php if (isset ( $this->_aVars['bBlogView'] ) && $this->_aVars['aItem']['total_attachment']): ?>
<?php Phpfox::getBlock('attachment.list', array('sType' => 'blog','iItemId' => $this->_aVars['aItem']['blog_id'])); ?>
<?php endif; ?>
<?php if (isset ( $this->_aVars['aItem']['tag_list'] )): ?>
<?php Phpfox::getBlock('tag.item', array('sType' => $this->_aVars['sTagType'],'sTags' => $this->_aVars['aItem']['tag_list'],'iItemId' => $this->_aVars['aItem']['blog_id'],'iUserId' => $this->_aVars['aItem']['user_id'],'sMicroKeywords' => 'keywords')); ?>
<?php endif; ?>
			
<?php if (! isset ( $this->_aVars['bBlogView'] )): ?>
<?php Phpfox::getBlock('feed.comment', array('aFeed' => $this->_aVars['aItem']['aFeed'])); ?>
<?php endif; ?>
			
<?php (($sPlugin = Phpfox_Plugin::get('blog.template_block_entry_text_end')) ? eval($sPlugin) : false); ?>
		</div>
	
<?php (($sPlugin = Phpfox_Plugin::get('blog.template_block_entry_end')) ? eval($sPlugin) : false); ?>
<?php if (! isset ( $this->_aVars['bBlogView'] )): ?>
		</div>					
	</div>
<?php endif; ?>
</div>
