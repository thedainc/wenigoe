<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: September 16, 2013, 1:10 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Feed
 * @version 		$Id: display.html.php 4176 2012-05-16 10:49:38Z Raymond_Benc $
 * This fileis called from the form.html.php template in the feed module
 */
 
 

?>

<li>
	<a href="#" type="button" id="btn_display_check_in" class="activity_feed_share_this_one_link parent feed_share_map js_hover_title" onclick="return false;">
		<span class="js_hover_info">
			Check-in
		</span>
	</a>
	
	<script type="text/javascript">
		$Behavior.prepareInit = function()
		{
			$Core.Feed.sIPInfoDbKey = '<?php echo Phpfox::getParam('core.ip_infodb_api_key'); ?>';
			$Core.Feed.sGoogleKey = '<?php echo Phpfox::getParam('core.google_api_key'); ?>';
			
<?php if (isset ( $this->_aVars['aVisitorLocation'] )): ?>
				$Core.Feed.setVisitorLocation(<?php echo $this->_aVars['aVisitorLocation']['latitude']; ?>, <?php echo $this->_aVars['aVisitorLocation']['longitude']; ?> );
<?php else: ?>
				
<?php endif; ?>
			
			$Core.Feed.googleReady();
			$Core.Feed.init();
		}
	</script>
	<script type="text/javascript" src="<?php echo Phpfox::getParam('core.url_module'); ?>feed/static/jscript/places.js"></script>
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=<?php echo Phpfox::getParam('core.google_api_key'); ?>&sensor=true&libraries=places"></script>					
</li>
