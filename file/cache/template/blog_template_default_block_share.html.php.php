<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: September 16, 2013, 1:10 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Feed
 * @version 		$Id: display.html.php 2284 2011-02-01 15:58:18Z Raymond_Benc $
 */
 
 

?>				
				<div class="global_attachment_holder_section" id="global_attachment_blog">	
					<div class="table">
						<div class="table_left">
<?php echo Phpfox::getPhrase('blog.title'); ?>:
						</div>
						<div class="table_right">
							<input type="text" name="val[blog_title]" value="" style="width:90%;" onchange="if (empty(this.value)) { $bButtonSubmitActive = false; $('.activity_feed_form_button .button').addClass('button_not_active'); } else { $bButtonSubmitActive = true; $('.activity_feed_form_button .button').removeClass('button_not_active'); }" />
						</div>
					</div>
				</div>
