<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Profile
 * @version 		$Id: pic.html.php 6083 2013-06-17 15:48:53Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{if Phpfox::getService('profile')->timeline()}
    {if !empty($sProfileImage)}
	    <div class="profile_timeline_profile_photo" style="border:1px solid red;">
		    <div class="profile_image">
			{if Phpfox::isModule('photo')}
				{if isset($aUser.user_name)}
				    <a href="{permalink module='photo.album.profile' id=$aUser.user_id title=$aUser.user_name}">{$sProfileImage}</a>
				{else}
				    <a href="{permalink module='photo.album.profile' id=$aUser.user_id}">{$sProfileImage}</a>
				{/if}
			{else}
				{$sProfileImage}
			{/if}
			{if Phpfox::getUserId() == $aUser.user_id}
			    <div class="p_4">
				    <a href="{if isset($aPage) && isset($aPage.page_id)}{url link='pages.add' id=$aPage.page_id}#photo{else}{url link='user.photo'}{/if}">{phrase var='profile.change_picture'}</a>
			    </div>
			{/if}

		    </div>

			<div style="position:absolute; bottom:0px; z-index:100; width:100%;">
				{if isset($aUser.user_name)}
				{if isset($aPage.title)}

				{template file='pages.block.joinpage'}

				{/if}
				{/if}
			</div>

	    </div>
    {/if}

{else}
{if !empty($sProfileImage)}
    <div class="profile_image" style="border:0px solid blue;">
	<div class="profile_image_holder">
	    {if Phpfox::isModule('photo')}
		{if isset($aUser.user_name)}
		    <a href="{permalink module='photo.album.profile' id=$aUser.user_id title=$aUser.user_name}">{$sProfileImage}</a>
		{else}
		    <a href="{permalink module='photo.album.profile' id=$aUser.user_id}">{$sProfileImage}</a>
		{/if}
	    {else}
		    {$sProfileImage}
	    {/if}
	</div>
	    {if Phpfox::getUserId() == $aUser.user_id}
	    <div class="p_4">
		    <a href="{url link='user.photo'}">{phrase var='profile.change_picture'}</a>
	    </div>
	    {/if}
	    <div><button class="btn btn-mini" type="button"> 61 Connections</button></div>


    </div>

{/if}
<div class="sub_section_menu" style="border:1px solid green;">
	<ul>		
		{foreach from=$aProfileLinks item=aProfileLink}
			<li class="{if isset($aProfileLink.is_selected)} active{/if}">
				<a href="{url link=$aProfileLink.url}" class="ajax_link"{if isset($aProfileLink.icon)} style="background-image:url('{img theme=$aProfileLink.icon' return_url=true}');"{/if}>{$aProfileLink.phrase}{if isset($aProfileLink.total)}<span>({$aProfileLink.total|number_format})</span>{/if}</a>
				{if isset($aProfileLink.sub_menu) && is_array($aProfileLink.sub_menu) && count($aProfileLink.sub_menu)}
				<ul>
				{foreach from=$aProfileLink.sub_menu item=aProfileLinkSub}
					<li class="{if isset($aProfileLinkSub.is_selected)} active{/if}"><a href="{$aProfileLinkSub.url}">{$aProfileLinkSub.phrase}{if isset($aProfileLinkSub.total) && $aProfileLinkSub.total > 0}<span class="pending">{$aProfileLinkSub.total|number_format}</span>{/if}</a></li>
				{/foreach}
				</ul>
				{/if}
			</li>
		{/foreach}
	</ul>
</div>
{/if}

    <div class="clear"></div>
    <div class="js_cache_check_on_content_block" style="display:none;"></div>
    <div class="js_cache_profile_id" style="display:none;">{$aUser.user_id}</div>
    <div class="js_cache_profile_user_name" style="display:none;">{if isset($aUser.user_name)}{$aUser.user_name}{/if}</div>