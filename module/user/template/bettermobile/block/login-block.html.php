{literal}
<style type="text/css">
    input{
        width: 100%;
    }
    .bottom{
        display: none;
    }
    .menu{
        display: none;
    }
    #mobile_content {
        overflow:hidden;
    }
</style>
{/literal}

<div class="login_box">
    {plugin call='user.template_controller_login_block__start'}
    <form method="post" action="{url link="user.login"}">
    <div class="p_top_4" style="padding-top: 19px;">
        <div id="js_email">
            <input type="email" name="val[login]" id="email_login" value="" size="30" placeholder="{if Phpfox::getParam('user.login_type') == 'user_name'}{phrase var='user.user_name'}{elseif Phpfox::getParam('user.login_type') == 'email'}{phrase var='user.email'}{else}{phrase var='user.login'}{/if}" onfocus="oHidden.hiddenEmail()"  />
        </div>
    </div>

    <div class="p_top_4" style="padding-top: 0px; ">

        <div id="js_password">
            <input type="password" name="val[password]" id="password_login" value="" size="30" placeholder="{phrase var='user.password'}" onfocus="oHidden.hiddenPass()" />

        </div>
    </div>

    <div class="p_top_8">
        <input type="submit" value="{phrase var='user.login_button'}" class="button_login"  />
    </div>
        <a href="{url link='user.register'}"><div class="button_sign_up" >{phrase var='user.sign'}</div></a>

    <div class="clear"></div>
    </form>
</div>
{if (Phpfox::isModule('facebook') && Phpfox::getParam('facebook.enable_facebook_connect')) || (Phpfox::isModule('janrain') && Phpfox::getParam('janrain.enable_janrain_login'))}
<div class="p_top_8" style="width: 140px; margin: 0 auto;">
    {if Phpfox::isModule('facebook') && Phpfox::getParam('facebook.enable_facebook_connect')}
    <div class="header_login_block"><div class="fbconnect_button"><fb:login-button scope="publish_stream,email,user_birthday" v="2"></fb:login-button></div></div>
    {/if}
    {if Phpfox::isModule('janrain') && Phpfox::getParam('janrain.enable_janrain_login')}
    <div class="header_login_block">
        <a class="rpxnow" onclick="return false;" href="{$sJanrainUrl}">{img theme='layout/janrain-icons.png'}</a>
    </div>
    {/if}
</div>
{/if}