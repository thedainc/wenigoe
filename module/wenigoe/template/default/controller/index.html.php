<div class="h3">{$message}</div>
<div class="block" style="border:1px solid black;width:200px;">
    <div class="title" style="background-color: #DFE4EE"><center>My Bucketlist</center></div>
    <div class="content" style="margin-left:20px">

        {if $aBucketlist.item1}
            <li>{$aBucketlist.item1}</li>
        {/if}
        {if $aBucketlist.item2}
        <li>{$aBucketlist.item2}</li>
        {/if}
        {if $aBucketlist.item3}
            <li>{$aBucketlist.item3}</li>
        {/if}
        {if $aBucketlist.item4}
            <li>{$aBucketlist.item4}</li>
        {/if}
        {if $aBucketlist.item5}
            <li>{$aBucketlist.item5}</li>
        {/if}
        {if $aBucketlist.item6}
            <li>{$aBucketlist.item6}</li>
        {/if}
        {if $aBucketlist.item7}
            <li>{$aBucketlist.item7}</li>
        {/if}
        {if $aBucketlist.item8}
            <li>{$aBucketlist.item8}</li>
        {/if}
        {if $aBucketlist.item9}
             <li>{$aBucketlist.item9}</li>
        {/if}
        {if $aUserId}
            <a href="{url link='wenigoe.form'}"><strong>Update Bucketlist</strong></a>
        {/if}
    </div>
</div>
<div class="block" style="border:1px solid black;width:200px;float:left;">
    <div class="title" style="background-color: #DFE4EE"><center>My Legacy</center></div>
    <div class="content" style="margin-left:20px">
		<li>{$aLegacy.legacy_mem_mom}</li>
		<li>{$aLegacy.legacy_mom_forg}</li>
		<li>{$aLegacy.legacy_mem_pers}</li>
		<li>{$aLegacy.legacy_grat_achiev}</li>
		<li>{$aLegacy.legacy_things_learn}</li>
		<li>{$aLegacy.legacy_imp_shar_fam}</li>
	{if $aUserId}
		
	{/if}
	</div>
</div>