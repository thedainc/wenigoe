<div id="mobile_search"{if isset($bIsMobileIndex)} style="display:block;"{/if}>
                    <div id="header_search">
                        <div id="header_menu_space">
                            <div id="header_sub_menu_search">
                                <form method="post" id='header_search_form' action="{url link='search'}">
                                    <a href="#" onclick='$("#header_search_form").submit(); return false;' id="header_search_button">{phrase var='core.search'}</a>
                                    <input type="text" name="q" onkeyup="oSearch.clickClear()" tabindex="-1" placeholder="{phrase var='core.mobile_search'}"  id="header_sub_menu_search_input" autocomplete="off" class="js_temp_friend_search_input" />
                                    <div id="div_header_sub_menu_search_input"></div>
                                    <a href="#" onclick='oSearch.clear()' id="header_clear_button" style="display: none;"></a>
                                </form>
                            </div>
                        </div><!-- // header_menu_space -->
                    </div>
</div>
{if Phpfox::isUser()}
<div id="mobile_header_better">
    <div class="sidebar_header_username_image">{img user=$aUserSidebar suffix='_50_square' max_width=45 max_height=45}</div>
    <div class="sidebar_header_username"><a href="{url link=''$aUserSidebar.user_name'}">{$aUserSidebar.full_name|shorten:15:'...'}</a></div>
</div>
{/if}
<div class="clear"></div>
<div id="mobile_main_menu" style="padding: 0px;">
    <div class="sidebar_header_up"></div>
    {if Phpfox::isUser()}
    <a href="{url link=''}" class="mobile_sidebar"> <div class="mobile_list">
        <div class="sidebar_dashboard"></div>
        <div class="sidebar_title">{phrase var='core.dashboard'}</div>
    </div>
    </a>
    <div class="clear"></div>
     <a href="{url link='mail'}" class="mobile_sidebar"> <div class="mobile_list">
        <div class="sidebar_messages"></div>
        <div class="sidebar_title">{phrase var='mail.mobile_messages'}</div>
    </div>
     </a>
    <div class="clear"></div>
    <a href="{url link='friend.accept'}" class="mobile_sidebar"> <div class="mobile_list">
        <div class="sidebar_friends"></div>
        <div class="sidebar_title">{phrase var='profile.friends'}</div>
    </div>
    </a>
    {else}
    <div class="clear"></div>
    <a href="{url link=''}" class="mobile_sidebar"> <div class="mobile_list">
        <div class="sidebar_login"></div>
        <div class="sidebar_title">{phrase var='user.login_button'}</div>
    </div>
    </a>
    <div class="clear"></div>
    <a href="{url link='user.register'}" class="mobile_sidebar"> <div class="mobile_list">
        <div class="sidebar_sign"></div>
        <div class="sidebar_title">{phrase var='user.sign'}</div>
    </div>
    </a>
    {/if}
    <div class="clear"></div>
    <div class="sidebar_header_app"><div class="sidebar_header_app_font">{phrase var='core.explore'}</div></div>
    {foreach from=$aMobileMenus key=iKey item=aMenu name=menu}
    <a href="{$aMenu.link}" class="mobile_sidebar">
    <div class="mobile_list">

            {if isset($aMenu.total) && $aMenu.total > 0}
            <span class="new">{$aMenu.total}</span>
            {/if}
            {module name='bettermobile.icon' sIcon=$aMenu.icon}


        <div class="sidebar_title" style="margin-left: 0px;">{$aMenu.phrase}</div>
    </div>
    </a>

    <div class="clear"></div>


    {/foreach}
    <div class="clear"></div>
    {if Phpfox::isUser()}
    <div class="sidebar_header_app"></div>

    <div class="clear"></div>
    <a href="{url link='user.logout'}" class="mobile_sidebar"> <div class="mobile_list">
        <div class="sidebar_logout"></div>
        <div class="sidebar_title">{phrase var='mobile.logout'}</div>
    </div>
    </a>
    {/if}
    <div class="clear"></div>
    <div class="sidebar_header_app"></div>

    <div class="clear"></div>
     <a href="{url link='go-to-full-site'}" class="mobile_sidebar"> <div class="mobile_list">
            <div class="sidebar_fullsite" ></div>
            <div class="sidebar_title" style="margin-left: 2px;">{phrase var='mobile.full_site'}</div>
        </div>
     </a>
    <a href="{url link='user.setting'}" class="mobile_sidebar"> <div class="mobile_list">
        <div class="sidebar_lang"></div>
        <div class="sidebar_title" >{$sLocaleName}</div>
    </div>
    </a>

    <div class="clear"></div>
     <div class="sidebar_end"></div>
</div>

<div class="clear"></div>
