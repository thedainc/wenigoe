<form method="post" action="{url link='wenigoe.process'}">

    <div class="table">
        <div class="table_left">Build Bucketlist</div>
        <div class="table_right">
            <ul>
			{if $aItems}
                {foreach from=$aItems key=iKey item=aItem}
                    <li>{$iKey}<input type="text" name="val[{$iKey}]" size="90" id="{$iKey}" {if $aItem} value="{$aItem}" {/if} /></li>
                {/foreach}
			{else}
				<li>Item1:<input type="text" name="val[item1]" size="90" id="item1" /></li>
				<li>Item2:<input type="text" name="val[item2]" size="90" id="item2" /></li>
				<li>Item3:<input type="text" name="val[item3]" size="90" id="item3" /></li>
				<li>Item4:<input type="text" name="val[item4]" size="90" id="item4" /></li>
				<li>Item5:<input type="text" name="val[item5]" size="90" id="item5" /></li>
				<li>Item6:<input type="text" name="val[item6]" size="90" id="item6" /></li>
				<li>Item7:<input type="text" name="val[item7]" size="90" id="item7" /></li>
				<li>Item8:<input type="text" name="val[item8]" size="90" id="item8" /></li>
				<li>Item9:<input type="text" name="val[item9]" size="90" id="item9" /></li>
			{/if}
            </ul>
            <div class="clear"></div>
            <input type="hidden" name="val[user_id]" value="{$aUser_id}"/>
            <input type="submit" value="update" class="button" name="val[update]" />
        </div>
</form>