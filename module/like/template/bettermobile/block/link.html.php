{if (isset($bNewLink) && $bNewLink) || isset($bDefault) && $bDefault}
<li>
    <a href="#" onclick="$(this).parents('div:first').find('.js_like_link_unlike:first').show(); $(this).hide(); $.ajaxCall('like.add', 'type_id={$aLike.like_type_id}&amp;item_id={$aLike.like_item_id}&amp;parent_id={if isset($aFeed.feed_id)}{$aFeed.feed_id}{else}{/if}{if $aLike.like_is_custom}&amp;custom_inline=1{/if}', 'GET'); return false;" class="js_like_link_like"{if $aLike.like_is_liked} style="display:none;"{/if}>{phrase var='feed.like'}</a>
    <a href="#" onclick="$(this).parents('div:first').find('.js_like_link_like:first').show(); $(this).hide(); $.ajaxCall('like.delete', 'type_id={$aLike.like_type_id}&amp;item_id={$aLike.like_item_id}&amp;parent_id={if isset($aFeed.feed_id)}{$aFeed.feed_id}{else}{/if}{if $aLike.like_is_custom}&amp;custom_inline=1{/if}', 'GET'); return false;" class="js_like_link_unlike"{if $aLike.like_is_liked}{else}style="display:none;"{/if}>{phrase var='feed.unlike'}</a>
</li>
{else}
<li>
    <a href="#" onclick="$(this).parents('div:first').find('.js_like_link_unlike:first').show(); oLikeCount.add('{$aFeed.feed_id}') ; $(this).hide(); $.ajaxCall('bettermobile.add', 'type_id={$aLike.like_type_id}&amp;item_id={$aLike.like_item_id}&amp;parent_id={if isset($aFeed.feed_id)}{$aFeed.feed_id}{else}{/if}{if $aLike.like_is_custom}&amp;custom_inline=1{/if}', 'GET'); return false;" class="js_like_link_like"{if $aLike.like_is_liked} style="display:none;"{/if}>{phrase var='feed.like'}</a>
    <a href="#" onclick="$(this).parents('div:first').find('.js_like_link_like:first').show(); oLikeCount.remove('{$aFeed.feed_id}'); $(this).hide(); $.ajaxCall('bettermobile.delete', 'type_id={$aLike.like_type_id}&amp;item_id={$aLike.like_item_id}&amp;parent_id={if isset($aFeed.feed_id)}{$aFeed.feed_id}{else}{/if}{if $aLike.like_is_custom}&amp;custom_inline=1{/if}', 'GET'); return false;" class="js_like_link_unlike"{if $aLike.like_is_liked}{else}style="display:none;"{/if}>{phrase var='feed.unlike'}</a>
</li>
{/if}