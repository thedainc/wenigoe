<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: September 16, 2013, 3:07 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: display.html.php 6099 2013-06-20 16:59:27Z Raymond_Benc $
 */
 
 

 (($sPlugin = Phpfox_Plugin::get('ad.template_block_display__start')) ? eval($sPlugin) : false); ?>

<?php if (( ! PHPFOX_IS_AJAX && ! defined ( 'PHPFOX_IS_AD_IFRAME' ) ) || $this->_aVars['bBlockIdForAds']): ?>
	<div class="js_ad_space_parent">
		<div id="js_ad_space_<?php echo $this->_aVars['iBlockId']; ?>" class="t_center ad_space" style="padding:4px 0px 4px 0px;">
<?php endif; ?>

<?php if (count((array)$this->_aVars['aBlockAds'])):  $this->_aPhpfoxVars['iteration']['iAds'] = 0;  foreach ((array) $this->_aVars['aBlockAds'] as $this->_aVars['aAd']):  $this->_aPhpfoxVars['iteration']['iAds']++; ?>

	<div>
<?php if ($this->_aVars['aAd']['type_id'] == 1): ?>
			<a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('ad', array('id' => $this->_aVars['aAd']['ad_id'])); ?>" target="_blank" class="no_ajax_link"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('file' => $this->_aVars['aAd']['image_path'],'path' => 'ad.url_image','server_id' => $this->_aVars['aAd']['server_id'])); ?></a>
<?php else: ?>
<?php if (! defined ( 'PHPFOX_IS_AD_IFRAME' ) && ( ( defined ( 'PHPFOX_IS_AJAX_PAGE' ) && PHPFOX_IS_AJAX_PAGE ) || $this->_aVars['bBlockIdForAds'] || Phpfox ::getParam('ad.ad_ajax_refresh'))): ?>
			<iframe src="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('ad.iframe', array('id' => $this->_aVars['aAd']['location'],'resize' => true)); ?>adId_<?php echo $this->_aVars['aAd']['ad_id']; ?>" allowtransparency="true" id="js_ad_space_<?php echo $this->_aVars['aAd']['location']; ?>_frame_<?php echo $this->_aVars['aAd']['ad_id']; ?>" frameborder="0" style="width:100%; "></iframe>
<?php else: ?>
<?php echo $this->_aVars['aAd']['html_code']; ?>
<?php endif; ?>
<?php endif; ?>
	</div>
	
	
<?php if (Phpfox ::getParam('ad.ad_ajax_refresh') && defined ( 'PHPFOX_IS_AD_IFRAME' )): ?>
	<script type="text/javascript">	
<?php if ($this->_aVars['aAd']['type_id'] == 2): ?>
<?php if (( Phpfox ::isModule('video') && Phpfox ::getParam('video.convert_servers_enable'))): ?>
		var parentDomain = "<?php echo Phpfox::getParam('video.convert_js_parent'); ?>";
		<?php echo '
		try	{
			sameOrigin = window.parent.location.host == window.location.host;
		}
		catch (e) {
			sameOrigin = false;
		}

		if (!sameOrigin){
			document.domain = parentDomain;
		}
		'; ?>

<?php endif; ?>
			window.parent.$(function()
			{
				if (window.parent.$('#js_ad_space_<?php echo $this->_aVars['aAd']['location']; ?>_frame').length > 0)
				{
					setTimeout("window.parent.$('#js_ad_space_<?php echo $this->_aVars['aAd']['location']; ?>_frame').attr('src', '<?php echo Phpfox::getLib('phpfox.url')->makeUrl('ad.iframe', array('id' => $this->_aVars['aAd']['location'])); ?>');", (<?php echo Phpfox::getParam('ad.ad_ajax_refresh_time'); ?> * 60000));
				}
				else
				{
					setTimeout("window.parent.$('#js_ad_space_<?php echo $this->_aVars['aAd']['location']; ?>').html('<iframe class=\"js_ad_space_iframe\" allowtransparency=\"true\" id=\"js_ad_space_<?php echo $this->_aVars['aAd']['location']; ?>_frame_<?php echo $this->_aVars['aAd']['ad_id']; ?>\" frameborder=\"0\" style=\"width:' + window.parent.$('#js_ad_space_<?php echo $this->_aVars['aAd']['location']; ?>').width() + 'px; height:' + window.parent.$('#js_ad_space_<?php echo $this->_aVars['aAd']['location']; ?>').height() + 'px;\"></iframe>'); window.parent.$('#js_ad_space_<?php echo $this->_aVars['aAd']['location']; ?>_frame').attr('src', '<?php echo Phpfox::getLib('phpfox.url')->makeUrl('ad.iframe', array('id' => $this->_aVars['aAd']['location'])); ?>');", (<?php echo Phpfox::getParam('ad.ad_ajax_refresh_time'); ?> * 60000));
				}		

		});
<?php endif; ?>
	
	</script>
<?php endif; ?>
	
<?php endforeach; endif; ?>


<?php if (( ! PHPFOX_IS_AJAX && ! defined ( 'PHPFOX_IS_AD_IFRAME' ) ) || $this->_aVars['bBlockIdForAds']): ?>
		</div>
	</div>
<?php endif; ?>
	
<?php if (Phpfox ::getParam('ad.ad_ajax_refresh')): ?>
	<script type="text/javascript">	
		setTimeout('$.ajaxCall(\'ad.update\', \'block_id=<?php echo $this->_aVars['iBlockId']; ?>\', \'GET\');', (<?php echo Phpfox::getParam('ad.ad_ajax_refresh_time'); ?> * 60000));
		function fixHeight(iId, iHeight)
		{
			$('#' + iId).height(iHeight + '');
		}
	</script>
<?php endif; ?>
	
<?php (($sPlugin = Phpfox_Plugin::get('ad.template_block_display__end')) ? eval($sPlugin) : false); ?>
