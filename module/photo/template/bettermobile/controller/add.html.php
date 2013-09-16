{if false && Phpfox::isMobile()}
<div class="extra_info">
	{phrase var='photo.photos_unfortunately_cannot_be_uploaded_via_mobile_devices_at_this_moment'}
</div>
{else}
<div id="js_upload_error_message"></div>

<div id="js_photo_form_holder">
	<form method="post" action="{url link='photo.frame'}" id="js_photo_form" enctype="multipart/form-data" target="js_upload_frame" onsubmit="return startProcess(true, true);" >
		
	{if $sModule}
		<div><input type="hidden" name="val[callback_module]" value="{$sModule}" /></div>
	{/if}
	{if $iItem}
		<div><input type="hidden" name="val[callback_item_id]" value="{$iItem}" /></div>
		<div><input type="hidden" name="val[group_id]" value="{$iItem}" /></div>
		<div><input type="hidden" name="val[parent_user_id]" value="{$iItem}" /></div>
	{/if}		
		
		{plugin call='photo.template_controller_upload_form'}
		{if Phpfox::getUserParam('photo.can_create_photo_album')}
			<div class="table" id="album_table">
				<div class="table_left">
					{phrase var='photo.photo_album'}
				</div>
				<div class="table_right_text">
					<span id="js_photo_albums"{if !count($aAlbums)} style="display:none;"{/if}>
						<select name="val[album_id]" id="js_photo_album_select" style="width:200px;" onchange="if (empty(this.value)) {l} $('#js_photo_privacy_holder').slideDown(); {r} else {l} $('#js_photo_privacy_holder').slideUp(); {r}">
							<option value="">{phrase var='photo.select_an_album'}:</option>
								{foreach from=$aAlbums item=aAlbum}
									<option value="{$aAlbum.album_id}"{if $iAlbumId == $aAlbum.album_id} selected="selected"{/if}>{$aAlbum.name|clean}</option>
								{/foreach}
						</select>
					</span>&nbsp;(<a href="#" onclick="$Core.box('photo.newAlbum', 500, 'module={$sModule}&amp;item={$iItem}'); return false;">{phrase var='photo.create_a_new_photo_album'}</a>)
				</div>
			</div>		
		{/if}		
		
		{if !$sModule && Phpfox::getParam('photo.allow_photo_category_selection') && Phpfox::getService('photo.category')->hasCategories()}
		<div class="table">
			<div class="table_left">
				<label for="category">{phrase var='photo.category'}:</label>
			</div>
			<div class="table_right">
				{module name='photo.drop-down'}
			</div>
		</div>		
		{/if}
		
		<div id="js_photo_privacy_holder" {if $iAlbumId} style="display:none;"{/if}>
			{if $sModule}
			<div><input type="hidden" id="privacy" name="val[privacy]" value="0" /></div>
			<div><input type="hidden" id="privacy_comment" name="val[privacy_comment]" value="0" /></div>
			{else}
				{if Phpfox::isModule('privacy')}
					<div class="table">
						<div class="table_left">
							{phrase var='photo.photo_s_privacy'}:
						</div>
						<div class="table_right">	
							{module name='privacy.form' privacy_name='privacy' privacy_info='photo.control_who_can_see_these_photo_s' default_privacy='photo.default_privacy_setting'}
						</div>			
					</div>
					<div class="table">
						<div class="table_left">
							{phrase var='photo.comment_privacy'}:
						</div>
						<div class="table_right">	
							{module name='privacy.form' privacy_name='privacy_comment' privacy_info='photo.control_who_can_comment_on_these_photo_s' privacy_no_custom=true}
						</div>			
					</div>		
				{/if}
			{/if}
		</div>
            <div class="table">
                <div class="table_left">
                    {phrase var='photo.select_photo_s'}:
                </div>
                <div class="table_right">
                    <div >
                        <div id="js_uploader_files_outer"><div class="js_uploader_files"><input type="file" onchange="addMoreToProgressBar();" size="30" class="js_uploader_files_input" name="image[]"></div>
                        </div><iframe width="500" height="500" frameborder="1" style="display:none;" name="js_upload_frame" id="js_upload_frame"></iframe>
                    </div>

                    <div class="extra_info">
                        {phrase var='photo.you_can_upload_a_jpg_gif_or_png_file'}
                        {if $iMaxFileSize !== null}
                        <br />
                        {phrase var='photo.the_file_size_limit_is_file_size_if_your_upload_does_not_work_try_uploading_a_smaller_picture' file_size=$iMaxFileSize|filesize}
                        {/if}
                    </div>
                </div>
            </div>


            <div class="table_clear">
                <input type="submit" value="{phrase var='photo.upload'}" class="button" />
            </div>


	</form>
</div>
{/if}