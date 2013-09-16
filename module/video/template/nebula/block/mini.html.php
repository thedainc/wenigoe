<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: mini.html.php 5451 2013-02-28 09:43:16Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<div class="{if isset($phpfox.iteration.minivideos)}{if is_int($phpfox.iteration.minivideos/2)}row1{else}row2{/if}{if $phpfox.iteration.minivideos == 1 && !isset($bIsLoadingMore)} row_first{/if}{else}row1 row_first row_no_border{/if}">
	<div style="width:120px;" class="t_center">
		<a href="{permalink module='video' id=$aMiniVideo.video_id title=$aMiniVideo.title}">{img server_id=$aMiniVideo.image_server_id path='video.url_image' file=$aMiniVideo.image_path suffix='_120' max_width=120 max_height=90 class='js_mp_fix_width' title=$aMiniVideo.title}</a>
	</div>
	<div style="width:120px;">
		<a href="{permalink module='video' id=$aMiniVideo.video_id title=$aMiniVideo.title}" class="row_sub_link">{$aMiniVideo.title|clean}</a>		
	</div>
	<div class="clear"></div>
</div>