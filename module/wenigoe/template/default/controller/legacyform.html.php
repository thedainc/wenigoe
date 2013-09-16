<form method="post" action="{url link='wenigoe.process'}">

    <div class="table">
        <div class="table_left">Build Legacy</div>
        <div class="table_right">
            <ul>
			{if $aItems != 'null'}
                {foreach from=$aLegacy key=iKey item=aItem}
                    <li>{$iKey}<input type="text" name="legacyVal[{$iKey}]" size="90" id="{$iKey}" {if $aItem} value="{$aItem}" {/if} /></li>
                {/foreach}
			{/if}
            </ul>
            <div class="clear"></div>
            <input type="hidden" name="legacyVal[user_id]" legacyValue="{$aUser_id}"/>
			<input type="hidden" name="legacyVal[username]" legacyValue="{$aUsername}"/>
            <input type="submit" legacyValue="update" class="button" name="legacyVal[update]" />
        </div>
</form>