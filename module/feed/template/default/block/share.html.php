<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: share.html.php 4712 2012-09-21 10:42:01Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<div>
	<form method="post" action="#" onsubmit="$(this).ajaxCall('feed.share'); return false;">
		<div><input type="hidden" name="val[parent_feed_id]" value="{$iFeedId}" /></div>
		<div><input type="hidden" name="val[parent_module_id]" value="{$sShareModule|clean}" /></div>
		{phrase var='share.share'}: 
		<select name="val[post_type]" onchange="if (this.value == '1') {l} $('#js_feed_share_friend_holder').hide(); {r} else {l} $('#js_feed_share_friend_holder').show(); {r}">
			<option value="1">{phrase var='share.on_your_wall'}</option>
			<option value="2">{phrase var='share.on_a_friend_s_wall'}</option>
		</select>

		<div class="p_top_8" id="js_feed_share_friend_holder" style="display:none;">
			<div id="js_feed_share_friend_placement" style="width:410px;"></div>
			<div id="js_feed_share_friend"></div>
			<script type="text/javascript">
			var bRun = true;
			$Behavior.loadSearchFriendsCompose = function()
			{l}
				bRun = false;					
				$Core.searchFriends({l}
					'id': '#js_feed_share_friend',
					'placement': '#js_feed_share_friend_placement',
					'width': '{if Phpfox::isMobile()}90%{else}400px{/if}',
					'max_search': 10,
					'input_name': 'val[friends]',
					'default_value': '{phrase var='mail.search_friends_by_their_name'}',
					'inline_bubble': true
				{r});							
			{r}
			</script>
		</div>

		<div class="p_top_8">
			<textarea cols="50" rows="4" name="val[post_content]"></textarea>
		</div>
		<div class="p_top_8">
			<input type="submit" value="{phrase var='share.post'}" class="button" />
		</div>
	</form>
</div>