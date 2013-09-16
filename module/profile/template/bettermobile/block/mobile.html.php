{module name='bettermobile.cover'}
<div id="mobile_profile_header">
	<div id="mobile_profile_photo">
		<div id="mobile_profile_photo_image">
			{$sProfileImage}
        </div>
		<div class="mobile_profile_name">
            <div class="mobile_profile_name_content">
                <a href="{url link=''$aUser.user_name'}">{$aUser.full_name|clean|shorten:50:'...'}</a>
            </div>
		</div>
        {module name='bettermobile.profile'}
        <div class="clear"></div>
        <div id="mobile_profile_photo_name">
        <ul>
            {if Phpfox::getUserId() != $aUser.user_id && Phpfox::isUser()}
                {if Phpfox::isModule('friend') && !$aUser.is_friend}
                <li id="js_add_friend_on_profile"><a href="#" onclick="return $Core.addAsFriend('{$aUser.user_id}');" title="{phrase var='profile.add_to_friends'}">{phrase var='profile.add_to_friends'}</a></li>
                {/if}
                {if Phpfox::isModule('mail') && Phpfox::getService('user.privacy')->hasAccess('' . $aUser.user_id . '', 'mail.send_message')}
                <li id="message_friend"><a href="{url link='mail.compose' id=$aUser.user_id}" >{phrase var='profile.message'}</a></li>
                {/if}
                {if $bCanPoke && Phpfox::getService('user.privacy')->hasAccess('' . $aUser.user_id . '', 'poke.can_send_poke')}
                <li id="liPoke">
                    <a href="#" id="section_poke" onclick="$Core.box('poke.poke', 400, 'user_id={$aUser.user_id}'); return false;">{phrase var='poke.poke' full_name=''}</a>
                </li>
                {/if}
            {/if}
        </ul>
        </div>
	<div class="clear"></div>
</div>
</div>