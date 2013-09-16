<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: September 16, 2013, 3:07 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author			Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: block.html.php 5476 2013-03-04 13:45:11Z Miguel_Espinoza $
 */
 
 

 if (( isset ( $this->_aVars['sHeader'] ) && ( ! PHPFOX_IS_AJAX || isset ( $this->_aVars['bPassOverAjaxCall'] ) || isset ( $this->_aVars['bIsAjaxLoader'] ) ) ) || ( defined ( "PHPFOX_IN_DESIGN_MODE" ) && PHPFOX_IN_DESIGN_MODE ) || ( Phpfox ::getService('theme')->isInDnDMode())): ?>

<div class="block<?php if (( defined ( 'PHPFOX_IN_DESIGN_MODE' ) || Phpfox ::getService('theme')->isInDnDMode()) && ( ! isset ( $this->_aVars['bCanMove'] ) || ( isset ( $this->_aVars['bCanMove'] ) && $this->_aVars['bCanMove'] == true ) )): ?> js_sortable<?php endif;  if (isset ( $this->_aVars['sCustomClassName'] )): ?> <?php echo $this->_aVars['sCustomClassName'];  endif; ?>"<?php if (isset ( $this->_aVars['sBlockBorderJsId'] )): ?> id="js_block_border_<?php echo $this->_aVars['sBlockBorderJsId']; ?>"<?php endif;  if (defined ( 'PHPFOX_IN_DESIGN_MODE' ) && Phpfox ::getLib('module')->blockIsHidden('js_block_border_' . $this->_aVars['sBlockBorderJsId'] . '' )): ?> style="display:none;"<?php endif; ?>>
<?php if (! empty ( $this->_aVars['sHeader'] ) || ( defined ( "PHPFOX_IN_DESIGN_MODE" ) && PHPFOX_IN_DESIGN_MODE ) || ( Phpfox ::getService('theme')->isInDnDMode())): ?>
		<div class="title <?php if (defined ( 'PHPFOX_IN_DESIGN_MODE' ) || Phpfox ::getService('theme')->isInDnDMode()): ?>js_sortable_header<?php endif; ?>">		
<?php if (isset ( $this->_aVars['sBlockTitleBar'] )): ?>
<?php echo $this->_aVars['sBlockTitleBar']; ?>
<?php endif; ?>
<?php if (( isset ( $this->_aVars['aEditBar'] ) && Phpfox ::isUser())): ?>
			<div class="js_edit_header_bar">
				<a href="#" title="<?php echo Phpfox::getPhrase('core.edit_this_block'); ?>" onclick="$.ajaxCall('<?php echo $this->_aVars['aEditBar']['ajax_call']; ?>', 'block_id=<?php echo $this->_aVars['sBlockBorderJsId'];  if (isset ( $this->_aVars['aEditBar']['params'] )):  echo $this->_aVars['aEditBar']['params'];  endif; ?>'); return false;"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/application_edit.png','alt' => '','class' => 'v_middle')); ?></a>				
			</div>
<?php endif; ?>
<?php if (true || isset ( $this->_aVars['sDeleteBlock'] )): ?>
			<div class="js_edit_header_bar js_edit_header_hover" style="display:none;">
<?php if (Phpfox ::getService('theme')->isInDnDMode() && ( ( isset ( $this->_aVars['bCanMove'] ) && $this->_aVars['bCanMove'] ) || ! isset ( $this->_aVars['bCanMove'] ) )): ?>
					<a href="#" onclick="if (confirm('<?php echo Phpfox::getPhrase('core.are_you_sure', array('phpfox_squote' => true)); ?>')){
					$(this).parents('.block:first').remove(); $.ajaxCall('core.removeBlockDnD', 'sController=' + oParams['sController'] 
					+ '&amp;block_id=<?php if (isset ( $this->_aVars['sDeleteBlock'] )):  echo $this->_aVars['sDeleteBlock'];  else: ?> <?php echo $this->_aVars['sBlockBorderJsId'];  endif; ?>');} return false;"title="<?php echo Phpfox::getPhrase('core.remove_this_block'); ?>">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/application_delete.png','alt' => '','class' => 'v_middle')); ?>
					</a>
<?php else: ?>
<?php if (( ( isset ( $this->_aVars['bCanMove'] ) && $this->_aVars['bCanMove'] ) || ! isset ( $this->_aVars['bCanMove'] ) )): ?>
						<a href="#" onclick="if (confirm('<?php echo Phpfox::getPhrase('core.are_you_sure', array('phpfox_squote' => true)); ?>')) { $(this).parents('.block:first').remove();
						$.ajaxCall('core.hideBlock', '<?php if (isset ( $this->_aVars['sCustomDesignId'] )): ?>custom_item_id=<?php echo $this->_aVars['sCustomDesignId']; ?>&amp;<?php endif; ?>sController=' + oParams['sController'] + '&amp;type_id=<?php if (isset ( $this->_aVars['sDeleteBlock'] )):  echo $this->_aVars['sDeleteBlock'];  else: ?> <?php echo $this->_aVars['sBlockBorderJsId'];  endif; ?>&amp;block_id=' + $(this).parents('.block:first').attr('id')); } return false;" title="<?php echo Phpfox::getPhrase('core.remove_this_block'); ?>">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/application_delete.png','alt' => '','class' => 'v_middle')); ?>
						</a>				
<?php endif; ?>
<?php endif; ?>
			</div>
			
<?php endif; ?>
<?php if (empty ( $this->_aVars['sHeader'] )): ?>
<?php echo $this->_aVars['sBlockShowName']; ?>
<?php else: ?>
<?php echo $this->_aVars['sHeader']; ?>
<?php endif; ?>
		</div>
<?php endif; ?>
<?php if (isset ( $this->_aVars['aEditBar'] )): ?>
	<div id="js_edit_block_<?php echo $this->_aVars['sBlockBorderJsId']; ?>" class="edit_bar" style="display:none;"></div>
<?php endif; ?>
<?php if (isset ( $this->_aVars['aMenu'] ) && count ( $this->_aVars['aMenu'] )): ?>
	<div class="menu">
	<ul>
<?php if (count((array)$this->_aVars['aMenu'])):  $this->_aPhpfoxVars['iteration']['content'] = 0;  foreach ((array) $this->_aVars['aMenu'] as $this->_aVars['sPhrase'] => $this->_aVars['sLink']):  $this->_aPhpfoxVars['iteration']['content']++; ?>
 
		<li class="<?php if (count ( $this->_aVars['aMenu'] ) == $this->_aPhpfoxVars['iteration']['content']): ?> last<?php endif;  if ($this->_aPhpfoxVars['iteration']['content'] == 1): ?> first active<?php endif; ?>"><a href="<?php echo $this->_aVars['sLink']; ?>"><?php echo $this->_aVars['sPhrase']; ?></a></li>
<?php endforeach; endif; ?>
	</ul>
	<div class="clear"></div>
	</div>
<?php unset($this->_aVars['aMenu']); ?>
<?php endif; ?>
	<div class="content"<?php if (isset ( $this->_aVars['sBlockJsId'] )): ?> id="js_block_content_<?php echo $this->_aVars['sBlockJsId']; ?>"<?php endif; ?>>
<?php endif; ?>
<?php if (isset ( $this->_aVars['sDelayedParam'] )): ?>
<script type="text/javascript">
	var bLoadDelayedComments = true;
	$Behavior.loadDelayedComments = function(){
        if (bLoadDelayedComments){
		    $.ajaxCall('feed.loadDelayedComments', 'feed=<?php echo $this->_aVars['sDelayedParam']; ?>', 'GET');
            bLoadDelayedComments = false;
    }
	}
</script>
<div id="js_load_delayed_comments">
	<div style="padding-top:10px;">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'ajax/add.gif')); ?>
	</div>
<?php else: ?>
<?php if (isset ( $this->_aVars['bIsViewingComments'] ) && $this->_aVars['bIsViewingComments']): ?>
		<div id="comment-view"><a name="#comment-view"></a></div>
		<div class="message js_feed_comment_border">
<?php echo Phpfox::getPhrase('comment.viewing_a_single_comment'); ?> <a href="<?php echo $this->_aVars['aFeed']['feed_link']; ?>"><?php echo Phpfox::getPhrase('comment.view_all_comments'); ?></a>
		</div>
<?php endif; ?>

<?php if (isset ( $this->_aVars['sFeedType'] )): ?>
		<div class="js_parent_feed_entry parent_item_feed">
<?php endif; ?>

<div class="js_feed_comment_border">
<?php (($sPlugin = Phpfox_Plugin::get('feed.template_block_comment_border')) ? eval($sPlugin) : false); ?>
<?php (($sPlugin = Phpfox_Plugin::get('core.template_block_comment_border_new')) ? eval($sPlugin) : false); ?>
<?php if (! isset ( $this->_aVars['aFeed']['feed_mini'] )): ?>
		<div class="comment_mini_link_like">
			<?php
						Phpfox::getLib('template')->getBuiltFile('feed.block.link');						
						?>
		</div>
<?php endif; ?>

<div id="js_feed_like_holder_<?php echo $this->_aVars['aFeed']['type_id']; ?>_<?php echo $this->_aVars['aFeed']['item_id']; ?>" class="comment_mini_content_holder" <?php if (isset ( $this->_aVars['aFeed']['bShowEnterCommentBlock'] ) && $this->_aVars['aFeed']['bShowEnterCommentBlock'] == false): ?>style="display:none"<?php endif; ?> >	
        <div class="comment_mini_content_holder_icon"<?php if (isset ( $this->_aVars['aFeed']['marks'] ) || ( isset ( $this->_aVars['aFeed']['likes'] ) && is_array ( $this->_aVars['aFeed']['likes'] ) ) || ( isset ( $this->_aVars['aFeed']['total_comment'] ) && $this->_aVars['aFeed']['total_comment'] > 0 )):  else:  endif; ?>></div>
			<div class="comment_mini_content_border">
			    <div class="js_comment_like_holder" id="js_feed_like_holder_<?php echo $this->_aVars['aFeed']['feed_id']; ?>">
				    <div id="js_like_body_<?php echo $this->_aVars['aFeed']['feed_id']; ?>">						
<?php if (isset ( $this->_aVars['aFeed']['marks'] ) || ( isset ( $this->_aVars['aFeed']['likes'] ) && is_array ( $this->_aVars['aFeed']['likes'] ) )): ?>
							<?php
						Phpfox::getLib('template')->getBuiltFile('like.block.display');						
						?>					
<?php endif; ?>
				    </div>
			    </div><!-- // #js_feed_like_holder_<?php echo $this->_aVars['aFeed']['feed_id']; ?> -->

<?php if (Phpfox ::isModule('comment') && Phpfox ::getParam('feed.allow_comments_on_feeds')): ?>
		    <div id="js_feed_comment_post_<?php echo $this->_aVars['aFeed']['feed_id']; ?>" class="js_feed_comment_view_more_holder">
<?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'view'): ?>
		
<?php else: ?>
<?php if (isset ( $this->_aVars['aFeed']['comment_type_id'] ) && isset ( $this->_aVars['aFeed']['total_comment'] ) && ( isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'mini' ? $this->_aVars['aFeed']['total_comment'] > 0 : $this->_aVars['aFeed']['total_comment'] > Phpfox ::getParam('comment.total_comments_in_activity_feed'))): ?>
			    <div class="comment_mini comment_mini_link_holder" id="js_feed_comment_view_more_link_<?php echo $this->_aVars['aFeed']['feed_id']; ?>">
				    <div class="comment_mini_link_image">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/comment.png','class' => 'v_middle')); ?>
				    </div>
				    <div class="comment_mini_link_loader" id="js_feed_comment_ajax_link_<?php echo $this->_aVars['aFeed']['feed_id']; ?>" style="display:none;"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'ajax/add.gif','class' => 'v_middle')); ?></div>
				    <div class="comment_mini_link">
					    <a href="#" class="comment_mini_link_block comment_mini_link_block_hidden" style="display:none;" onclick="return false;"><?php echo Phpfox::getPhrase('feed.loading'); ?></a>
					    <a href="<?php if (isset ( $this->_aVars['aFeed']['feed_link_comment'] )):  echo $this->_aVars['aFeed']['feed_link_comment'];  else:  echo $this->_aVars['aFeed']['feed_link'];  endif; ?>comment/"<?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'mini'):  else:  if (Phpfox ::getParam('comment.total_amount_of_comments_to_load') > $this->_aVars['aFeed']['total_comment']): ?>onclick="$('#js_feed_comment_ajax_link_<?php echo $this->_aVars['aFeed']['feed_id']; ?>').show(); $(this).parent().find('.comment_mini_link_block_hidden').show(); $(this).hide(); $.ajaxCall('comment.viewMoreFeed', 'comment_type_id=<?php echo $this->_aVars['aFeed']['comment_type_id']; ?>&amp;item_id=<?php echo $this->_aVars['aFeed']['item_id']; ?>&amp;feed_id=<?php echo $this->_aVars['aFeed']['feed_id']; ?>', 'GET'); return false;"<?php endif;  endif; ?> class="comment_mini_link_block no_ajax_link"><?php echo Phpfox::getPhrase('comment.view_all_total_left_comments', array('total_left' => $this->_aVars['aFeed']['total_comment'])); ?></a>					
				    </div>
			    </div><!-- // #js_feed_comment_view_more_link_<?php echo $this->_aVars['aFeed']['feed_id']; ?> -->
<?php endif; ?>
<?php if (isset ( $this->_aVars['aFeed']['total_comment'] ) && ! isset ( $this->_aVars['aFeed']['comment_type_id'] ) && $this->_aVars['aFeed']['total_comment'] > 0): ?>
			    <div class="comment_mini comment_mini_link_holder" id="js_feed_comment_view_more_link_<?php echo $this->_aVars['aFeed']['feed_id']; ?>">
				    <div class="comment_mini_link_image">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/comment.png','class' => 'v_middle')); ?>
				    </div>	
				    <div class="comment_mini_link">	
					    <a href="<?php if (isset ( $this->_aVars['aFeed']['feed_link_comment'] )):  echo $this->_aVars['aFeed']['feed_link_comment'];  else:  echo $this->_aVars['aFeed']['feed_link'];  endif; ?>comment/" class="comment_mini_link_block"><?php echo Phpfox::getPhrase('comment.view_all_total_left_comments', array('total_left' => $this->_aVars['aFeed']['total_comment'])); ?></a>					
				    </div>
			    </div>
<?php endif; ?>
<?php endif; ?>
<?php if (isset ( $this->_aVars['aFeed']['comments'] ) && count ( $this->_aVars['aFeed']['comments'] )): ?>
<?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'view' && $this->_aVars['aFeed']['total_comment'] > Phpfox ::getParam('comment.comment_page_limit')): ?>
			<div class="comment_mini" id="js_feed_comment_pager_<?php echo $this->_aVars['aFeed']['feed_id']; ?>">
<?php if (!isset($this->_aVars['aPager'])): Phpfox::getLib('pager')->set(array('page' => Phpfox::getLib('request')->getInt('page'), 'size' => Phpfox::getLib('search')->getDisplay(), 'count' => Phpfox::getLib('search')->getCount())); endif;  $this->getLayout('pager'); ?>
			</div>
<?php endif; ?>
			<div id="js_feed_comment_view_more_<?php echo $this->_aVars['aFeed']['feed_id']; ?>">
<?php Phpfox::getLib('parse.output')->setImageParser(array('width' => 200,'height' => 200)); ?>
<?php if (count((array)$this->_aVars['aFeed']['comments'])):  $this->_aPhpfoxVars['iteration']['comments'] = 0;  foreach ((array) $this->_aVars['aFeed']['comments'] as $this->_aVars['aComment']):  $this->_aPhpfoxVars['iteration']['comments']++; ?>

				<?php
						Phpfox::getLib('template')->getBuiltFile('comment.block.mini');						
						?>
<?php endforeach; endif; ?>
<?php Phpfox::getLib('parse.output')->setImageParser(array('clear' => true)); ?>
			</div><!-- // #js_feed_comment_view_more_<?php echo $this->_aVars['aFeed']['feed_id']; ?> -->		
<?php else: ?>
			<div id="js_feed_comment_view_more_<?php echo $this->_aVars['aFeed']['feed_id']; ?>"></div><!-- // #js_feed_comment_view_more_<?php echo $this->_aVars['aFeed']['feed_id']; ?> -->
<?php endif; ?>
		</div><!-- // #js_feed_comment_post_<?php echo $this->_aVars['aFeed']['feed_id']; ?> -->		
<?php endif; ?>
		
<?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'mini'): ?>
		
<?php else: ?>
<?php if (Phpfox ::isModule('comment') && isset ( $this->_aVars['aFeed']['comment_type_id'] ) && Phpfox ::getParam('feed.allow_comments_on_feeds') && Phpfox ::isUser() && $this->_aVars['aFeed']['can_post_comment'] && Phpfox ::getUserParam('feed.can_post_comment_on_feed')): ?>
		<div class="js_feed_comment_form" <?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'view'): ?> id="js_feed_comment_form_<?php echo $this->_aVars['aFeed']['feed_id']; ?>"<?php endif; ?>>
			<div class="js_comment_feed_textarea_browse"></div>
			<div class="<?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'view'): ?> feed_item_view<?php endif; ?> comment_mini comment_mini_end">
				<form method="post" action="#" class="js_comment_feed_form">
<?php echo '<div><input type="hidden" name="' . Phpfox::getTokenName() . '[security_token]" value="' . Phpfox::getService('log.session')->getToken() . '" /></div>'; ?>
					<div><input type="hidden" name="val[type]" value="<?php echo $this->_aVars['aFeed']['comment_type_id']; ?>" /></div>			
					<div><input type="hidden" name="val[item_id]" value="<?php echo $this->_aVars['aFeed']['item_id']; ?>" /></div>
					<div><input type="hidden" name="val[parent_id]" value="0" class="js_feed_comment_parent_id" /></div>
					<div><input type="hidden" name="val[is_via_feed]" value="<?php echo $this->_aVars['aFeed']['feed_id']; ?>" /></div>
<?php if (defined ( 'PHPFOX_IS_THEATER_MODE' )): ?>
					<div><input type="hidden" name="ajax_post_photo_theater" value="1" /></div>	
<?php endif; ?>
<?php if (Phpfox ::isUser()): ?>
					<div class="comment_mini_image"<?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'view'): ?> <?php else: ?>style="display:none;"<?php endif; ?>>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aGlobalUser'],'suffix' => '_50_square','max_width' => '32','max_height' => '32')); ?>
					</div>				
<?php endif; ?>
					<div class="<?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'view'): ?>comment_mini_content <?php endif; ?>comment_mini_textarea_holder">
						<div><input type="hidden" name="val[default_feed_value]" value="<?php echo Phpfox::getPhrase('feed.write_a_comment'); ?>" /></div>						
						<div class="js_comment_feed_value"><?php echo Phpfox::getPhrase('feed.write_a_comment'); ?></div>
						<textarea cols="60" rows="4" name="val[text]" class="js_comment_feed_textarea" id="js_feed_comment_form_textarea_<?php echo $this->_aVars['aFeed']['feed_id']; ?>"><?php if (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'view' && Phpfox ::getUserParam('comment.wysiwyg_on_comments') && Phpfox ::getParam('core.wysiwyg') == 'tiny_mce'):  else:  echo Phpfox::getPhrase('feed.write_a_comment');  endif; ?></textarea>
						<div class="js_feed_comment_process_form"><?php echo Phpfox::getPhrase('feed.adding_your_comment');  echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'ajax/add.gif')); ?></div>
					</div>
					<div class="feed_comment_buttons_wrap" style="display:block;">
						<div class="js_feed_add_comment_button t_right">
							<input type="submit" value="<?php echo Phpfox::getPhrase('feed.comment'); ?>" class="button button_set_off" />									
						</div>								
					</div>			
<?php if (! PHPFOX_IS_AJAX && ! Phpfox ::isMobile() && isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'view' && Phpfox ::getUserParam('comment.wysiwyg_on_comments') && Phpfox ::getParam('core.wysiwyg') == 'tiny_mce'): ?>
					<div><input type="hidden" name="val[is_in_view]" value="1" /></div>
					<script type="text/javascript">
						 $Behavior.commentPreLoadTinymce = function(){
							customTinyMCE_init('js_feed_comment_form_textarea_<?php echo $this->_aVars['aFeed']['feed_id']; ?>');
							$Behavior.commentPreLoadTinymce = function(){}
						 }			
					</script>
<?php endif; ?>
				
</form>

			</div>
		</div>
<?php endif; ?>
<?php endif; ?>
		
	</div><!-- // .comment_mini_content_border -->
</div><!-- // .comment_mini_content_holder -->

</div>
<?php if (Phpfox ::isModule('report') && isset ( $this->_aVars['aFeed']['report_module'] ) && ( isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] != 'mini' )): ?>
<div class="report_this_item">
	<a href="#?call=report.add&amp;height=100&amp;width=400&amp;type=<?php echo $this->_aVars['aFeed']['report_module']; ?>&amp;id=<?php echo $this->_aVars['aFeed']['item_id']; ?>" class="item_bar_flag inlinePopup" title="<?php echo $this->_aVars['aFeed']['report_phrase']; ?>"><?php echo $this->_aVars['aFeed']['report_phrase']; ?></a>
</div>
<?php if (Phpfox ::isModule('captcha') && Phpfox ::getUserParam('captcha.captcha_on_comment')):  Phpfox::getBlock('captcha.form', array('sType' => 'comment','captcha_popup' => true));  endif;  endif;  if (isset ( $this->_aVars['sFeedType'] )): ?>
</div>
<?php endif;  endif;  if (isset ( $this->_aVars['sDelayedParam'] )): ?>
</div>
<?php endif; ?>

		
		
<?php if (( isset ( $this->_aVars['sHeader'] ) && ( ! PHPFOX_IS_AJAX || isset ( $this->_aVars['bPassOverAjaxCall'] ) || isset ( $this->_aVars['bIsAjaxLoader'] ) ) ) || ( defined ( "PHPFOX_IN_DESIGN_MODE" ) && PHPFOX_IN_DESIGN_MODE ) || ( Phpfox ::getService('theme')->isInDnDMode())): ?>
	</div>
<?php if (isset ( $this->_aVars['aFooter'] ) && count ( $this->_aVars['aFooter'] )): ?>
	<div class="bottom">
		<ul>
<?php if (count((array)$this->_aVars['aFooter'])):  $this->_aPhpfoxVars['iteration']['block'] = 0;  foreach ((array) $this->_aVars['aFooter'] as $this->_aVars['sPhrase'] => $this->_aVars['sLink']):  $this->_aPhpfoxVars['iteration']['block']++; ?>

				<li id="js_block_bottom_<?php echo $this->_aPhpfoxVars['iteration']['block']; ?>"<?php if ($this->_aPhpfoxVars['iteration']['block'] == 1): ?> class="first"<?php endif; ?>>
<?php if ($this->_aVars['sLink'] == '#'): ?>
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'ajax/add.gif','class' => 'ajax_image')); ?>
<?php endif; ?>
					<a href="<?php echo $this->_aVars['sLink']; ?>" id="js_block_bottom_link_<?php echo $this->_aPhpfoxVars['iteration']['block']; ?>"><?php echo $this->_aVars['sPhrase']; ?></a>
				</li>
<?php endforeach; endif; ?>
		</ul>
	</div>
<?php endif; ?>
</div>
<?php endif;  unset($this->_aVars['sHeader'], $this->_aVars['sModule'], $this->_aVars['sComponent'], $this->_aVars['aFooter'], $this->_aVars['sBlockBorderJsId'], $this->_aVars['bBlockDisableSort'], $this->_aVars['bBlockCanMove'], $this->_aVars['aEditBar'], $this->_aVars['sDeleteBlock'], $this->_aVars['sBlockTitleBar'], $this->_aVars['sBlockJsId'], $this->_aVars['sCustomClassName'], $this->_aVars['aMenu']); ?>

<?php if (isset ( $this->_aVars['sClass'] )): ?>
<?php Phpfox::getBlock('ad.inner', array('sClass' => $this->_aVars['sClass']));  endif; ?>
