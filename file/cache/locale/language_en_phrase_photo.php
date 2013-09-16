<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = array (
  'setting_how_many_categories_to_show_in_title' => '<title>How many categories to show in title</title><info>When viewing a photo with categories assigned you can show these categories in the title of the page.
This setting tells how many categories to show. Set to 0 if you dont want to show categories in the title of the page when viewing a photo.</info>',
  'module_photo' => 'Photos',
  'menu_photo' => 'Photos',
  'menu_photos' => 'Photos',
  'user_setting_can_create_photo_album' => 'Can create a new photo album?',
  'user_setting_max_number_of_albums' => 'Define the total number of photo albums a user within this user group can create.

<b>Notice:</b> If you set this value to <b>null</b> it will allow them to create an unlimited amount of photo albums. Setting this value to <b>0</b> will not allow them the ability to create photo albums.',
  'setting_photo_pic_sizes' => '<title>Photo Image Sizes</title><info>Photo Image Sizes</info>',
  'user_setting_points_photo' => 'Points received when uploading a new image.',
  'user_setting_can_upload_photos' => 'Can upload photos?',
  'user_setting_can_password_protect_albums' => 'Can password protect photo albums?',
  'user_setting_can_use_privacy_settings' => 'Can use privacy settings when creating an album?',
  'setting_total_photo_input_bars' => '<title>Upload Inputs</title><info>Define how many upload inputs should be displayed when a user is uploading photos.</info>',
  'user_setting_max_images_per_upload' => 'Define the maximum number of images a user can upload each time they use the upload form.

<b>Notice:</b> This setting does not control how many images a user can upload in total, just how many they can upload each time they use the upload form to upload new images.',
  'user_setting_can_add_to_rating_module' => 'Can add photos to the public rating sections?',
  'user_setting_can_add_tags_on_photos' => 'Can add tags on photos?',
  'user_setting_can_control_comments_on_photos' => 'Can control how comments behave on their photos?',
  'user_setting_can_add_mature_images' => 'Can add mature images with warnings?',
  'user_setting_can_search_for_photos' => 'Can search for photos?',
  'user_setting_total_photos_displays' => 'Define how many images a user can view at once when browsing the public photo section?',
  'user_setting_default_photo_display_limit' => 'Define how many photos should be displayed by default.

<b>Notice:</b> This value must be part of the setting <setting>photo.total_photos_displays</setting> array in order to be valid.',
  'user_setting_max_photo_display_limit' => 'Define the max number of photos a user can view on each page. 

<b>Notice:</b> This value should work together with the setting <setting>photo.total_photos_displays</setting> and in most cases should either be the same value as the highest number in the array or lower. The reason to set this value lower is to show users that the gallery can at max view 100 per page but maybe you only want this specific user group to display 24 images out of that max total (100).',
  'user_setting_refresh_featured_photo' => 'Define how many minutes or seconds the script should wait until it refreshes the feature photo.

<b>Notice:</b> To add X minutes here are some examples:
[code]
1 min
2 min
30 min
[/code]
If you would like to define it in seconds here are some examples:
[code]
20 sec
30 sec
90 sec
[/code]',
  'admin_menu_categories' => 'Categories',
  'setting_photo_image_details_time_stamp' => '<title>Image Details</title><info>Image Details</info>',
  'user_setting_can_download_user_photos' => 'Can download a users photo?',
  'user_setting_can_view_all_photo_sizes' => 'Can view all available photo sizes?',
  'user_setting_can_edit_own_photo_album' => 'Can edit own photo album?',
  'user_setting_can_edit_other_photo_albums' => 'Can edit photo albums that belong to other users?',
  'user_setting_can_photo_album' => 'Can add a new photo album?',
  'user_setting_can_view_hidden_photos' => 'Can view hidden photos?

<b>Notice:</b> This is intended for a user group with Admin rights as this will allow them full access to all photos uploaded on the site, which in return can give them control to moderate images.',
  'setting_protect_photos_from_public' => '<title>Protect Photos</title><info>If you would like to protect the privacy of your members photos set this option to <b>True</b>. By enabling this feature users will not be allowed to view images via their direct path if they do not have permission to view that specific image. This will however add extra queries to the database and can add an extra strain to the server.

<b>Notice:</b> Apache "mod_rewrite" will have to be enabled to use this feature. Once you have enabled this feature you must edit the file ".htaccess" find in your sites root directory.

Look for the following in that file:
[code]
# RewriteRule ^file/pic/photo/(.*).(.*)$ static/image.php?file=$1&ext=$2
[/code]

Replace it with:
[code]
RewriteRule ^file/pic/photo/(.*).(.*)$ static/image.php?file=$1&ext=$2
[/code]
</info>',
  'user_setting_can_delete_own_photo' => 'Can delete own photo?',
  'user_setting_can_delete_other_photos' => 'Can delete photos uploaded by other users?',
  'user_setting_can_edit_own_photo' => 'Can edit own photo?',
  'user_setting_can_edit_other_photo' => 'Can edit photos added by other users?',
  'user_setting_photo_mature_age_limit' => 'For a photo that is marked as "Mature (Strict)" define the age limit?

<b>Note:</b>The age you define will allow users with that age or older the ability to view mature photos.',
  'feed_user_add_photos' => '<a href="{owner_link}">{owner_full_name}</a> added photos to their album "<a href="{link}">{album_name}</a>".',
  'setting_can_rate_on_photos' => '<title>Photo Rating</title><info>Set to <b>True</b> if you would like to enable the ability for users to rate on photos uploaded by other users.</info>',
  'user_setting_can_rate_on_photos' => 'Can rate photos?',
  'setting_rating_total_photos_cache' => '<title>Total Photos to Cache for Rating Section</title><info>Define how many images to cache when rating images. This will load X photos when visiting the rating section and will allow users the ability to rate images at a very fast rate. Once X images have been rated the script will use AJAX to load the next round of X images.

<b>Notice:</b> "X" is the value of this specific setting.</info>',
  'setting_rating_randomize_photos' => '<title>Randomize Photos in the Rating Section</title><info>Set to <b>True</b> if photos within the rating section should be randomized. If set to <b>False</b> we will display images based on the date they were uploaded in descending order.

<b>Notice:</b> Either setting will allow the users the ability to only rate an image once. Images are not recycled.</info>',
  'user_setting_can_edit_photo_categories' => 'Can edit public photo categories?',
  'user_setting_can_add_public_categories' => 'Can add public photo categories?',
  'setting_photo_battle_image_cache' => '<title>Photo Cache for Photo Battle</title><info>Define how many images to cache when display the photo battle.</info>',
  'user_setting_photo_must_be_approved' => 'Set this to <b>True</b> if photos uploaded must be approved before they are visible to the public.',
  'user_setting_can_approve_photos' => 'Can approve photos that require moderation?',
  'user_setting_can_feature_photo' => 'Can feature a photo?',
  'setting_rename_uploaded_photo_names' => '<title>Rename Photo Names</title><info>Set to <b>True</b> if you would like to rename a photo based on what the title of the photo or the title provided by the user when processing their recently uploaded photos. By default we use a 32 character unique hash to protect images, however enabling this feature will still create a unique ID for each image and help with image SEO.

<b>Notice:</b> Apache "mod_rewrite" will have to be enabled to use this feature. Once you have enabled this feature you must edit the file ".htaccess" find in your sites root directory.

Look for the following in that file:
[code]
# Rename Photo Names
[/code]
Under that line you will find 2 lines that have been commented out. Simply uncomment those 2 lines by removing the hash "#" symbol.
</info>',
  'user_setting_can_delete_own_photo_album' => 'Can delete own photo album?',
  'user_setting_can_delete_other_photo_albums' => 'Can delete photo albums created by other users?',
  'user_setting_can_tag_own_photo' => 'Can tag own photo?',
  'user_setting_can_tag_other_photos' => 'Can tag photos added by other users?',
  'user_setting_how_many_tags_on_own_photo' => 'How many times can a user tag their own photo?',
  'user_setting_how_many_tags_on_other_photo' => 'How many times can this user tag photos added by other users?',
  'setting_total_tags_on_photos' => '<title>Total Tags on Photos</title><info>Define how many tags a photo can have.</info>',
  'stat_title_3' => 'Photos',
  'user_setting_photo_max_upload_size' => 'Max file size for photos upload in kilobits (kb).
(1000 kb = 1 mb)
For unlimited add "0" without quotes.',
  'setting_enabled_watermark_on_photos' => '<title>Watermark Photos</title><info>Enable this option to watermark photos.

<b>Notice:</b> The setting <setting>core.watermark_option</setting> must be enabled.</info>',
  'setting_photo_meta_description' => '<title>Photo Meta Description</title><info>Meta description for the photo sections.</info>',
  'setting_photo_meta_keywords' => '<title>Photo Meta Keywords</title><info>Keywords for the photo sections.</info>',
  'you_have_reached_your_limit_you_are_currently_unable_to_create_new_photo_albums' => 'You have reached your limit. You are currently unable to create new photo albums.',
  'you_have_rated_all_the_available_images' => 'No more available images to rate.',
  'editing_category' => 'Editing category',
  'cancel' => 'Cancel',
  'are_you_sure' => 'Are you sure?',
  'un_feature_this_photo' => 'Un-Feature this photo.',
  'feature_this_photo' => 'Feature this photo.',
  'photo_successfully_featured' => 'Photo successfully featured.',
  'photo_successfully_un_featured' => 'Photo successfully un-featured.',
  'photo_successfully_uploaded' => 'Photo successfully uploaded.',
  'photos_successfully_uploaded' => 'Photos successfully uploaded.',
  'processing_image_current_total' => 'Processing image {current}/{total}',
  'provide_a_name_for_your_album' => 'Provide a name for your album.',
  'select_a_privacy_setting_for_your_album' => 'Select a privacy setting for your album.',
  'categories' => 'Categories',
  'image_details' => 'Image Details',
  'featured_photo' => 'Featured Photo',
  'browse_filter' => 'Browse Filter',
  'photos' => 'Photos',
  'view_more_photos' => 'View More Photos',
  'average_rating' => 'Average Rating',
  'provide_a_name_for_your_photo_category' => 'Provide a name for your photo category.',
  'photo_category_order_successfully_updated' => 'Photo category order successfully updated.',
  'invalid_section' => 'Invalid section.',
  'photo_category_successfully_deleted' => 'Photo category successfully deleted.',
  'photo_category_successfully_updated' => 'Photo category successfully updated.',
  'photo_category_successfully_added' => 'Photo category successfully added.',
  'manage_photo_categories' => 'Manage Photo Categories',
  'photo_album_successfully_deleted' => 'Photo album successfully deleted.',
  'invalid_photo_album' => 'Invalid photo album.',
  'password_is_not_correct_please_try_again' => 'Password is not correct. Please try again.',
  'full_name_s_photos' => '{full_name}\'s Photos',
  'full_name_s_photo_album_from_time_stamp' => '{full_name}\'s Photo Album from {time_stamp}',
  'photo_battle' => 'Photo Battle',
  'battle' => 'Battle',
  'not_allowed_to_download_this_image' => 'Not allowed to download this image.',
  'photo_section_is_closed' => 'Photo section is closed.',
  'site_title_has_a_total_of_total_photo_s' => '{site_title} has a total of {total} photo(s).',
  'section_is_private' => 'Section is private.',
  'full_name_s_photos_on_site_title_full_name_has_total_photo_photo_s_and_total_album_photo' => '{full_name}\'s photos on {site_title}. {full_name} has {total_photo} photo(s) and {total_album} photo album(s).',
  'photo_rating_is_disabled' => 'Photo rating is disabled.',
  'rate_photos' => 'Rate Photos',
  'rate' => 'Rate',
  'photo_tags' => 'Photo Tags',
  'photo' => 'Photo',
  'tags' => 'Tags',
  'upload_photos' => 'Upload Photos',
  'photos_successfully_updated' => 'Photos successfully updated.',
  'photo_s_successfully_updated' => 'Photo(s) successfully updated.',
  'process_photos' => 'Process Photos',
  'upload' => 'Upload',
  'invalid_photo' => 'Invalid photo.',
  'sorry_this_photo_can_only_be_viewed_by_those_older_then_the_age_of_limit' => 'Sorry, this photo can only be viewed by those older then the age of {limit}.',
  'not_a_valid_photo_album_to_delete' => 'Not a valid photo album to delete.',
  'you_do_not_have_sufficient_permission_to_delete_this_photo_album' => 'You do not have sufficient permission to delete this photo album.',
  'unable_to_find_the_photo' => 'Unable to find the photo.',
  'this_photo_is_already_tagged_in_the_same_position' => 'This photo is already tagged in the same position.',
  'no_more_tags_for_this_photo_can_be_added' => 'No more tags for this photo can be added.',
  'full_name_has_already_been_tagged_in_this_photo' => '{full_name} has already been tagged in this photo.',
  'provide_a_photo_tag' => 'Provide a photo tag.',
  'not_allowed_to_tag_this_photo' => 'Not allowed to tag this photo.',
  'unable_to_find_photo' => 'Unable to find photo.',
  'unable_to_delete_this_tag' => 'Unable to delete this tag.',
  'a_href_profile_link_owner_full_name_a_uploaded_a_new_photo' => '<a href="{profile_link}">{owner_full_name}</a> uploaded a new photo.',
  'a_href_profile_link_owner_full_name_a_uploaded_new_photos' => '<a href="{profile_link}">{owner_full_name}</a> uploaded new photos.',
  'a_href_user_link_full_name_a_added_a_new_comment_on_their_own_a_href_title_link_photo' => '<a href="{user_link}">{full_name}</a> added a new comment on their own <a href="{title_link}">photo</a>.',
  'a_href_user_link_full_name_a_added_a_new_comment_on_your_a_href_title_link_photo_a' => '<a href="{user_link}">{full_name}</a> added a new comment on your <a href="{title_link}">photo</a>.',
  'a_href_user_link_full_name_a_added_a_new_comment_on' => '<a href="{user_link}">{full_name}</a> added a new comment on <a href="{item_user_link}">{item_user_name}\'s</a> <a href="{title_link}">photo</a>.',
  'user_name_left_you_a_comment_on_site_title' => '{user_name} left you a comment on {site_title}.',
  'user_name_left_you_a_comment_on_site_title_message' => '{user_name} left you a comment on {site_title}.

To view this comment, follow the link below:
<a href="{link}">{link}</a>',
  'user_name_left_you_a_comment_on_site_title_however_before_it_can_be_displayed_it_needs_to_be' => '{user_name} left you a comment on {site_title}, however before it can be displayed it needs to be approved by you.

You can approve or deny this comment by following the link below:
<a href="{link}">{link}</a>',
  'a_href_user_link_full_name_a_wrote_a_comment_on_your_photo_a_href_photo_link_title' => '<a href="{user_link}">{full_name}</a> wrote a comment on your photo "<a href="{photo_link}">{title}</a>".',
  'on_name_s_photo' => 'On {name}\'s photo.',
  'full_name_approved_your_comment_on_site_title' => '{full_name} approved your comment on {site_title}.',
  'full_name_approved_your_comment_on_site_title_message' => '{full_name} approved your comment on {site_title}.

To view this comment, follow the link below:
<a href="{link}">{link}</a>',
  'a_href_photo_section_link_photo_a_uploaded_on_time_stamp_by_a_href_user_link' => '<a href="{photo_section_link}">Photo</a> uploaded on {time_stamp} by <a href="{user_link}">{full_name}</a>.',
  'photo_albums' => 'Photo Albums',
  'upload_a_photo' => 'Upload a Photo',
  'manage_photos' => 'Manage Photos',
  'view_photos' => 'View Photos',
  'unable_to_find_the_photo_you_plan_to_edit' => 'Unable to find the photo you plan to edit.',
  'updating_album' => 'Updating Album',
  'loading' => 'Loading',
  'none_of_your_files_were_uploaded_please_make_sure_you_upload_either_a_jpg_gif_or_png_file' => 'None of your files were uploaded. Please make sure you upload either a JPG, GIF or PNG file.',
  'updating_photo' => 'Updating photo',
  'password_protected_album' => 'PASSWORD PROTECTED ALBUM',
  'private_album' => 'PRIVATE ALBUM',
  'name_by_full_name' => '{name} by {full_name}',
  'view_more_albums_total' => 'View More Albums ({total})',
  'submit' => 'Submit',
  'all_categories' => 'All Categories',
  'url' => 'URL',
  'search_for_keyword' => 'Search for Keyword',
  'display' => 'Display',
  'sort' => 'Sort',
  'time' => 'Time',
  'most_viewed' => 'Most Viewed',
  'most_talked_about' => 'Most Talked About',
  'top_rated' => 'Top Rated',
  'top_battle' => 'Top Battle',
  'by' => 'By',
  'descending' => 'Descending',
  'ascending' => 'Ascending',
  'name' => 'Name',
  'description' => 'Description',
  'privacy' => 'Privacy',
  'public_photos_will_be_added_to_our_public_photo_section' => 'Public (Photos will be added to our public photo section.)',
  'personal_photos_will_only_be_displayed_on_your_profile' => 'Personal (Photos will only be displayed on your profile.)',
  'friends_only_you_and_your_friends_can_view_this_album' => 'Friends (Only you and your friends can view this album.)',
  'preferred_list_only_you_and_the_members_you_select_can_view_this_album' => 'Preferred List (Only you and the members you select can view this album.)',
  'password_protect' => 'Password-Protect',
  'image_is_pending_approval' => 'Image is pending approval.',
  'title' => 'Title',
  'category' => 'Category',
  'mature_content' => 'Mature Content',
  'yes_strict' => 'Yes [strict]',
  'yes_warning' => 'Yes [warning]',
  'no' => 'No',
  'discussion' => 'Discussion',
  'allow_comments_default' => 'Allow comments (default)',
  'encourage_advanced_critique' => 'Encourage advanced critique',
  'discourage_criticism' => 'Discourage criticism',
  'moderate_comments_first' => 'Moderate comments first',
  'disable_comments' => 'Disable comments',
  'public_rating' => 'Public Rating',
  'yes' => 'Yes',
  'download_enabled' => 'Download Enabled',
  'enabling_this_option_will_allow_others_the_rights_to_download_this_photo' => 'Enabling this option will allow others the rights to download this photo.',
  'enabling_this_option_will_allow_others_the_rights_to_download_these_photos' => 'Enabling this option will allow others the rights to download these photos.',
  'report_a_photo_album' => 'Report a Photo Album',
  'report' => 'Report',
  'add_to_your_favorites' => 'Add to your Favorites',
  'add_to_favorites' => 'Add to Favorites',
  'edit_this_album' => 'Edit This Album',
  'upload_photos_to_album' => 'Upload Photos to Album',
  'delete' => 'Delete',
  'view_all_sizes' => 'View All Sizes',
  'report_a_photo' => 'Report a Photo',
  'download' => 'Download',
  'edit_this_photo' => 'Edit this Photo',
  'upload_a_new_image' => 'Upload a New Image',
  'delete_this_photo' => 'Delete this Photo',
  'rotate_right' => 'Rotate Right',
  'rotate_left' => 'Rotate Left',
  'tag_this_photo' => 'Tag this Photo',
  'no_photos_have_been_added_yet' => 'No photos have been added yet.',
  'be_the_first_to_upload_a_photo' => 'Be the First to Upload a Photo.',
  'title_by_full_name' => '{title} by {full_name}',
  'by_user_info' => 'by {user_info}',
  'no_photos_added_yet' => 'No photos added yet.',
  'click_here_to_upload_a_photo' => 'Click here to upload a photo.',
  'approve_this_photo' => 'Approve this photo.',
  'set_as_album_cover' => 'Set as album cover.',
  'no_photos_uploaded_yet' => 'No photos uploaded yet.',
  'click_here_to_upload_photos' => 'Click here to upload photos.',
  'warning' => 'Warning!',
  'the_photo_you_are_about_to_view_may_contain_nudity_sexual_themes_violence_gore_strong_language_or_ideologically_sensitive_subject_matter' => 'The photo you are about to view may contain nudity, sexual themes, violence/gore, strong language or ideologically sensitive subject matter.',
  'would_you_like_to_view_this_image' => 'Would you like to view this image?',
  'no_thanks' => 'No, Thanks.',
  'add_a_photo_category' => 'Add a Photo Category',
  'parent' => 'Parent',
  'update' => 'Update',
  'are_you_sure_you_want_to_delete_this_album_and_all_the_pictures_that_belong_to_it' => 'Are you sure you want to delete this album and all the pictures that belong to it?',
  'note_that_this_cannot_be_undone' => 'Note that this cannot be undone.',
  'update_photo' => 'Update Photo',
  'update_album' => 'Update Album',
  'this_photo_album_is_password_protected' => 'This photo album is password protected.',
  'enter_password' => 'Enter Password',
  'no_images_found' => 'No images found.',
  'v_br_e_br_r_br_s_br_u_br_s' => 'V<br />e<br />r<br />s<br />u<br />s',
  'there_is_one_image_that_requires_your_approval' => 'There is one image that requires your approval.',
  'there_are_total_images_that_require_your_approval' => 'There are {total} images that require your approval.',
  'no_public_photos_have_been_uploaded_yet' => 'No public photos have been uploaded yet.',
  'click_here_to_approve_photos' => 'Click here to approve photos.',
  'photos_total' => 'Photos ({total})',
  'albums_total' => 'Albums ({total})',
  'you_have_not_uploaded_any_photos_yet' => 'You have not uploaded any photos yet.',
  'user_info_has_not_uploaded_any_photos_yet' => '{user_info} has not uploaded any photos yet.',
  'upload_your_photos' => 'Upload Your Photos',
  'browse_other_photos' => 'Browse Other Photos',
  'skip' => 'Skip',
  'b_back_b_to_full_name_s_photo_section' => '<b>Back</b> to {full_name}\'s photo section.',
  'b_back_b_to_title_s_photo_section' => '<b>Back</b> to {title}\'s photo section.',
  'upload_by_user_info_on_time_stamp' => 'Upload by {user_info} on {time_stamp}.',
  'available_sizes' => 'Available sizes',
  'download_this_image' => 'Download This Image.',
  'photo_links' => 'Photo Links',
  'html_embed' => 'HTML Embed',
  'photo_path' => 'Photo Path',
  'skip_this_step' => 'Skip This Step',
  'global_photo_settings' => 'Global Photo Settings',
  'note_that_global_photo_settings_will_override_any_settings_saved_individually_below' => 'Note that "Global Photo Settings" will override any settings saved individually below.',
  'save_global_settings' => 'Save Global Settings',
  'uploaded_photos' => 'Uploaded Photos',
  'save' => 'Save',
  'and_then' => 'and then',
  'process_next_batch_total_left' => 'process next batch ({total} left).',
  'view_this_album' => 'view this album.',
  'view_your_photos' => 'view your photos.',
  'upload_new_images' => 'upload new images.',
  'album' => 'Album',
  'select_an_album' => 'Select an album',
  'or' => 'or',
  'create_a_new_one' => 'Create a New One',
  'select_photo_s' => 'Select Photo(s)',
  'process_your_photos' => 'process your photos.',
  'upload_more_photos' => 'upload more photos.',
  'you_can_upload_a_jpg_gif_or_png_file' => 'You can upload a JPG, GIF or PNG file.',
  'the_file_size_limit_is_file_size_if_your_upload_does_not_work_try_uploading_a_smaller_picture' => 'The file size limit is {file_size}. If your upload does not work, try uploading a smaller picture.',
  'recently_uploaded' => 'Recently Uploaded',
  'process_your_photo_s' => 'Process Your Photo(s)',
  'in' => 'in',
  'by_lower' => 'by',
  'in_this_photo' => 'In this photo',
  'full_name_s_photo_from_time_stamp' => '{full_name}\'s Photo from {time_stamp}',
  'click_here_to_tag_as_yourself' => 'Click here to tag as yourself.',
  'groups' => 'Groups',
  'select_an_area_on_your_photo_to_crop' => 'Select an area on your photo to crop.',
  'all_photos' => 'All Photos',
  'submitted' => 'Submitted',
  'file_size' => 'File Size',
  'resolution' => 'Resolution',
  'comments' => 'Comments',
  'views' => 'Views',
  'rating' => 'Rating',
  'battle_wins' => 'Battle Wins',
  'downloads' => 'Downloads',
  'not_enough_photos_to_have_a_battle' => 'Not enough photos to have a battle.',
  'get_the_battle_started_and_upload_some_photos' => 'Get the battle started and upload some photos.',
  'photo_successfully_deleted' => 'Photo successfully deleted.',
  'remove_tag' => 'remove tag',
  'added_on_time_stamp_by_full_name' => 'Added on {time_stamp} by {full_name}.',
  'with_a_total_of_total_vote_votes' => 'with a total of {total_vote} votes.',
  'photo_count_for_photo_albums' => 'Photo Count for Photo Albums',
  'by_full_name' => 'By: {full_name}',
  'no_photos_have_been_featured' => 'No photos have been featured.',
  'no_photos_pending_approval' => 'No photos pending approval.',
  'recent_photos' => 'Recent Photos',
  'featured' => 'Featured',
  'pending' => 'Pending',
  'unfeature' => 'Unfeature',
  'photo_successfully_unfeatured' => 'Photo successfully unfeatured.',
  'albums' => 'Albums',
  'no_public_photo_albums_found' => 'No public photo albums found.',
  'advanced_critique_is_encouraged_when_commenting_on_this_photo' => 'Advanced critique is encouraged when commenting on this photo.',
  'criticism_is_discouraged_when_commenting_on_this_photo' => 'Criticism is discouraged when commenting on this photo.',
  'create_a_new_album' => 'Create a New Album',
  'user_setting_can_view_photos' => 'Can browse and view the photo module?',
  'a_href_user_link_full_name_a_liked_their_own_a_href_link_photo_album_a' => '<a href="{user_link}">{full_name}</a> liked their own <a href="{link}">photo album</a>.',
  'a_href_user_link_full_name_a_liked_a_href_view_user_link_view_full_name_a_s_a_href_link_photo_album_a' => '<a href="{user_link}">{full_name}</a> liked <a href="{view_user_link}">{view_full_name}</a>\'s <a href="{link}">photo album</a>.',
  'a_href_user_link_full_name_a_liked_a_href_view_user_link_view_full_name_a_s_a_href_link_photo_a' => '<a href="{user_link}">{full_name}</a> liked <a href="{view_user_link}">{view_full_name}</a>\'s <a href="{link}">photo</a>.',
  'a_href_user_link_full_name_a_liked_their_own_a_href_link_photo_a' => '<a href="{user_link}">{full_name}</a> liked their own <a href="{link}">photo</a>.',
  'a_href_user_link_full_name_a_liked_your_a_href_link_photo_album_a' => '<a href="{user_link}">{full_name}</a> liked your <a href="{link}">photo album</a>.',
  'a_href_user_link_full_name_a_liked_your_a_href_link_photo_a' => '<a href="{user_link}">{full_name}</a> liked your <a href="{link}">photo</a>.',
  'part_of_the_photo_album' => 'Part of the photo album',
  'full_name_s_albums' => '{full_name}\'s Albums',
  'update_tags_photo' => 'Update Tags (Photo)',
  'user_setting_can_view_private_photos' => 'Can view private and password protected photos?',
  'rate_this_image' => 'Rate This Image',
  'total_rating_out_of_5' => '{total_rating} out of 10',
  'no_photos_found' => 'No photos found.',
  'no_photos_have_been_rated' => 'No photos have been rated.',
  'no_photo_battles_have_taken_place' => 'No photo battles have taken place.',
  'total_battle_win_s' => '{total_battle} win(s)',
  'setting_ajax_refresh_on_featured_photos' => '<title>AJAX Refresh Featured Photos</title><info>With this option enabled photos within the "Featured Photo" block will refresh.</info>',
  'no_popular_photos_found' => 'No popular photos found.',
  'no_featured_photos_found' => 'No featured photos found.',
  'comments_total_comment' => 'Comments ({total_comment})',
  'total_score_out_of_10' => '{total_score} out of 10',
  'sorry_the_photo_you_are_looking_for_no_longer_exists' => 'Sorry, the photo you are looking for no longer exists. Please <a href="{link}">click here</a> to browse more photos.',
  'cancel_lowercase' => 'cancel',
  'personal_this_album_will_only_be_displayed_on_your_profile' => 'Personal (This album will only be displayed on your profile.)',
  'public_this_album_will_be_added_to_our_public_photo_album_section' => 'Public (This album will be added to our public photo album section.)',
  'delete_this_image' => 'Delete this image.',
  'update_photo_thumbnails' => 'Update Photo Thumbnails',
  'user_setting_can_post_on_photos' => 'Can post comments on photos?',
  'user_setting_can_sponsor_photo' => 'Can members of this user group explicitly set a photo as Sponsor?',
  'unsponsor_this_photo' => 'Unsponsor this photo',
  'sponsor_this_photo' => 'Sponsor this Photo',
  'photo_successfully_sponsored' => 'Photo successfully sponsored.',
  'photo_successfully_un_sponsored' => 'Photo successfully unsponsored.',
  'sponsored_photo' => 'Sponsored Photo',
  'user_setting_can_purchase_sponsor' => 'Can members of this user group purchase a sponsored ad space?',
  'sponsor_help' => 'In order to sponsor a photo click on the photo you wish to sponsor below and then look for the link "Sponsor this Photo".',
  'encourage_sponsor' => 'Sponsor your Photos',
  'user_setting_photo_sponsor_price' => 'How much is the sponsor space worth?
This works in a CPM basis.',
  'user_setting_auto_publish_sponsored_item' => 'After the user has purchased a sponsored space, should the item be published right away?
If set to false, the admin will have to approve each new purchased sponsored photo space before it is shown in the site.',
  'sponsor_paypal_message' => 'Payment for the sponsor space of photo: {sPhotoTitle}',
  'sponsor_title' => 'Photo: {sPhotoTitle}',
  'update_friend_count' => 'Update Friend Count',
  'user_setting_can_view_photo_albums' => 'Can view photo albums?',
  'user_setting_flood_control_photos' => 'How many minutes should a user wait before they can upload another batch of photos?

Note: Setting it to "0" (without quotes) is default and users will not have to wait.',
  'uploading_photos_a_little_too_soon' => 'Uploading photos a little too soon.',
  'say_something_about_this_photo' => 'Say something about this photo...',
  'the_following_files_were_not_uploaded_because_their_size_exceeds_the_limit_of_ilimit_sfiles' => 'The following files were not uploaded because their size exceeds the limit of {iLimit}: {sFiles}',
  'setting_enable_mass_uploader' => '<title>Enable Mass Uploader</title><info>When enabled users will be allowed to use a mass photo uploader to select multiple files from a single file select dialog.

This uses an integration of SWFUpload (http://code.google.com/p/swfupload/) and thus it uses a Flash object.</info>',
  'use_simple_uploader' => 'Use simple uploader',
  'use_mass_uploader' => 'Use mass uploader',
  'user_setting_total_photo_display_profile' => 'Define how many photos to display within an album on a users profile.',
  'album_successfully_created' => 'Album successfully created.',
  'setting_auto_crop_photo' => '<title>Auto Crop Photos</title><info>If this option is enabled images within the photo section will crop images so each image has the same width/height giving the photo section a cleaner look. This works similar to how the photo section on Facebook works.</info>',
  'setting_view_photos_in_theater_mode' => '<title>View Photos in Theater Mode</title><info>In several areas where we display photos, when a user clicks on the photo they will be able to view the photo on the spot in what we call "Theater Mode" if this option is enabled.</info>',
  'create_a_new_photo_album' => 'Create a New Photo Album',
  'editing_photo' => 'Editing Photo',
  'select_a_photo_to_attach' => 'Select a photo to attach.',
  'add_a_title' => 'Add a title.',
  'photo_has_been_approved' => 'Photo has been approved.',
  'photo_approved' => 'Photo Approved',
  'successfully_updated_photo_s' => 'Successfully updated photo(s)',
  'notice' => 'Notice',
  'unable_to_find_the_photo_you_are_looking_for' => 'Unable to find the photo you are looking for.',
  'unable_to_import_this_photo' => 'Unable to import this photo.',
  'note_when_selecting_a_photo_to_import' => 'Note when selecting a photo to import below it will not import its privacy settings as you can control the privacy settings with the item you are attaching this photo to.',
  'no_photos_to_select_from' => 'No photos to select from.',
  'search_photos' => 'Search Photos...',
  'latest' => 'Latest',
  'most_discussed' => 'Most Discussed',
  'approve' => 'Approve',
  'my_photos' => 'My Photos',
  'friends_photos' => 'Friends\' Photos',
  'featured_photos' => 'Featured Photos',
  'pending_photos' => 'Pending Photos',
  'all_albums' => 'All Albums',
  'my_albums' => 'My Albums',
  'photo_battles' => 'Photo Battles',
  'link' => 'Link',
  'delete_photo' => 'Delete Photo',
  'edit_photo' => 'Edit Photo',
  'make_profile_picture' => 'Make Profile Picture',
  'setting_this_photo_as_your_profile_picture_please_hold' => 'Setting this photo as your profile picture. Please hold...',
  'un_feature' => 'Un-Feature',
  'feature' => 'Feature',
  'sponsored' => 'Sponsored',
  'moderate' => 'Moderate',
  'actions' => 'Actions',
  'photo_current_of_total' => 'Photo {current} of {total}',
  'previous' => 'Previous',
  'next' => 'Next',
  'by_full_name_lowercase' => 'by {full_name}',
  'report_this_photo' => 'Report this photo',
  'time_stamp_by_full_name' => '{time_stamp} by {full_name}',
  'please_hold_while_your_images_are_being_processed_processing_image' => 'Please hold while your images are being processed. Processing image',
  'out_of' => 'out of',
  'unable_to_view_this_item_due_to_privacy_settings' => 'Unable to view this item due to privacy settings.',
  'photo_s_privacy' => 'Photo(s) Privacy',
  'comment_privacy' => 'Comment Privacy',
  'control_who_can_see_these_photo_s' => 'Control who can see these photo(s).',
  'control_who_can_comment_on_these_photo_s' => 'Control who can comment on these photo(s).',
  'upload_problems_try_the_basic_uploader' => 'Upload problems? Try the <a href="{link}">basic uploader</a> (works on older computers and web browsers).',
  'profile_pictures' => 'Profile Pictures',
  'album_s_privacy' => 'Album(s) Privacy',
  'control_who_can_see_this_photo_album_and_any_photos_associated_with_it' => 'Control who can see this photo album and any photos associated with it.',
  'control_who_can_comment_on_this_photo_album_and_any_photos_associated_with_it' => 'Control who can comment on this photo album and any photos associated with it.',
  'mass_edit_photos' => 'Mass Edit Photos',
  'update_photo_s' => 'Update Photo(s)',
  'photo_album_not_found' => 'Photo album not found.',
  'album_successfully_updated' => 'Album successfully updated.',
  'album_info' => 'Album Info',
  'view_this_album_uppercase' => 'View This Album',
  'editing_album' => 'Editing Album',
  'report_this_photo_album' => 'Report this photo album',
  'upload_photo_s' => 'Upload Photo(s)',
  'edit' => 'Edit',
  'by_lowercase' => 'by',
  'close_full_mode' => 'Close Full Mode',
  'open_full_mode' => 'Open Full Mode',
  'added_by_full_name_br_on_time_stamp' => 'Added by {full_name}<br /> on {time_stamp}',
  'vs' => 'VS',
  'no_available_images_to_rate' => 'No available images to rate.',
  'no_albums_found_here' => 'No albums found here.',
  'search_photo_albums' => 'Search Photo Albums...',
  'delete_this_photo_lowercase' => 'Delete this photo.',
  'who_can_share_a_photo' => 'Who can share a photo?',
  'who_can_view_browse_photos' => 'Who can view/browse photos?',
  'in_the_album' => 'In the album',
  'set_as_the_album_cover' => 'Set as the album cover.',
  'move_to' => 'Move to',
  'select' => 'Select',
  'control_who_can_see_this_photo' => 'Control who can see this photo.',
  'control_who_can_comment_on_this_photo' => 'Control who can comment on this photo.',
  'update_user_photo_count' => 'Update User Photo Count',
  'full_name_commented_on_your_photo_album_name' => '{full_name} commented on your photo album "{name}".',
  'full_name_commented_on_your_photo_title' => '{full_name} commented on your photo "{title}".',
  'added' => 'Added',
  'plays_lowercase' => 'plays',
  'get_all_the_photos_for_a_user_if_you_do_not_pass_the_user_id_we_will_return_information_about_the_user_that_is_currently_logged_in' => 'Get all the photos for a user. If you do not pass the #{USER_ID} we will return information about the user that is currently logged in.',
  'unable_to_post_a_comment_on_this_item_due_to_privacy_settings' => 'Unable to post a comment on this item due to privacy settings.',
  'posted_a_comment_on_gender_photo' => 'posted a comment on {gender} photo',
  'posted_a_comment_on_user_name_s_photo' => 'posted a comment on {user_name}\'s photo',
  'full_name_commented_on_your_photo_a_href_link_title_a_to_see_the_comment_thread_follow_the_link_below_a_href_link_link_a' => '{full_name} commented on your photo "<a href="{link}">{title}</a>".
To see the comment thread, follow the link below:
<a href="{link}">{link}</a>',
  'full_name_commented_on_gender_photo' => '{full_name} commented on {gender} photo.',
  'full_name_commented_on_other_full_name_s_photo' => '{full_name} commented on {other_full_name}\'s photo.',
  'full_name_commented_on_gender_photo_a_href_link_title_a_to_see_the_comment_thread_follow_the_link_below_a_href_link_link_a' => '{full_name} commented on {gender} photo "<a href="{link}">{title}</a>".
To see the comment thread, follow the link below:
<a href="{link}">{link}</a>',
  'full_name_commented_on_other_full_name_s_photo_a_href_link_title_a_to_see_the_comment_thread_follow_the_link_below_a_href_link_link_a' => '{full_name} commented on {other_full_name}\'s photo "<a href="{link}">{title}</a>".
To see the comment thread, follow the link below:
<a href="{link}">{link}</a>',
  'user_name_liked_gender_own_photo_title' => '{user_name} liked {gender} own photo "{title}"',
  'user_name_liked_your_photo_title' => '{user_name} liked your photo "{title}"',
  'user_name_liked_span_class_drop_data_user_full_name_s_span_photo_title' => '{user_name} liked <span class="drop_data_user">{full_name}\'s</span> photo "{title}"',
  'user_name_commented_on_gender_photo_title' => '{user_name} commented on {gender} photo "{title}"',
  'user_name_commented_on_your_photo_title' => '{user_name} commented on your photo "{title}"',
  'user_name_commented_on_span_class_drop_data_user_full_name_s_span_photo_title' => '{user_name} commented on <span class="drop_data_user">{full_name}\'s</span> photo "{title}"',
  'full_name_posted_a_href_link_photo_a_photo_a_on_a_href_link_user_parent_full_name_a_s_a_href_link_wall_wall_a' => '{full_name} posted <a href="{link_photo}"> a photo</a> on <a href="{link_user}">{parent_full_name}</a>\'s <a href="{link_wall}">wall</a>',
  'user_name_liked_gender_own_photo_album_title' => '{user_name} liked {gender} own photo album "{title}"',
  'user_name_liked_your_photo_album_title' => '{user_name} liked your photo album "{title}"',
  'user_name_liked_span_class_drop_data_user_full_name_s_span_photo_album_title' => '{user_name} liked <span class="drop_data_user">{full_name}\'s</span> photo album "{title}"',
  'full_name_commented_on_your_photo_album_a_href_link_title_a_to_see_the_comment_thread_follow_the_link_below_a_href_link_link_a' => '{full_name} commented on your photo album "<a href="{link}">{title}</a>".
To see the comment thread, follow the link below:
<a href="{link}">{link}</a>',
  'full_name_commented_on_gender_photo_album' => '{full_name} commented on {gender} photo album.',
  'full_name_commented_on_other_full_name_s_photo_album' => '{full_name} commented on {other_full_name}\'s photo album.',
  'full_name_commented_on_gender_photo_album_a_href_link_title_a_to_see_the_comment_thread_follow_the_link_below_a_href_link_link_a' => '{full_name} commented on {gender} photo album "<a href="{link}">{title}</a>.
To see the comment thread, follow the link below:
<a href="{link}">{link}</a>',
  'full_name_commented_on_other_full_name_s_photo_album_a_href_link_title_a_to_see_the_comment_thread_follow_the_link_below_a_href_link_link_a' => '{full_name} commented on {other_full_name}\'s photo album "<a href="{link}">{title}</a>".
To see the comment thread, follow the link below:
<a href="{link}">{link}</a>',
  'user_name_commented_on_gender_photo_album_title' => '{user_name} commented on {gender} photo album "{title}"',
  'user_name_commented_on_your_photo_album_title' => '{user_name} commented on your photo album "{title}"',
  'user_name_commented_on_span_class_drop_data_user_full_name_s_span_photo_album_title' => '{user_name} commented on <span class="drop_data_user">{full_name}\'s</span> photo album "{title}"',
  'you_tagged_yourself_in_your_photo_title' => 'You tagged yourself in your photo "{title}"',
  'user_name_tagged_you_in_span_class_drop_data_user_full_name_s_span_photo_title' => '{user_name} tagged you in <span class="drop_data_user">{full_name}\'s</span> photo "{title}"',
  'setting_enable_photo_battle' => '<title>Photo Battle</title><info>Set to <b>True</b> if you would like to enable the ability for users to battle on photos uploaded by other users.</info>',
  'photos_unfortunately_cannot_be_uploaded_via_mobile_devices_at_this_moment' => 'Photos unfortunately cannot be uploaded via mobile devices at this moment.',
  'photo_album' => 'Photo Album:',
  'profile_photo_successfully_updated' => 'Profile photo successfully updated.',
  'photo_s_successfully_approved' => 'Photo(s) successfully approved.',
  'photo_s_successfully_deleted' => 'Photo(s) successfully deleted.',
  'save_changes' => 'Save Changes',
  'subcategories' => 'Subcategories',
  'your_photo_title_has_been_approved' => 'Your photo "{title}" has been approved.',
  'setting_display_profile_photo_within_gallery' => '<title>Display Profile Photo within Gallery</title><info>Disable this feature if you do not want to display profile photos within the photo gallery.</info>',
  'update_profile_photos' => 'Update Profile Photos',
  'user_name_tagged_you_in_a_comment_in_a_photo' => '{user_name} tagged you in a comment in a photo',
  'user_name_tagged_you_in_a_comment_in_a_photo_album' => '{user_name} tagged you in a comment in a photo album',
  'tagged_gender_on_a_href_link_photo_full_name_s_photo' => 'tagged {gender} on <a href="{link}">{photo_full_name}</a>&#039;s photo.',
  'setting_allow_photo_category_selection' => '<title>Allow Selection of Categories</title><info>Enable this feature to give users the option to select a category when they upload photos.</info>',
  'menu_photo_photos_532c28d5412dd75bf975fb951c740a30' => 'Photos',
  'read_more' => 'Read More',
  'your_photo_has_been_approved_message' => 'Your photo "<a href=&#039;{sLink}&#039;>{title}</a>" has been approved.
To view this photo follow the link below:
<a href="{sLink}">{sLink}</a>',
  'setting_photo_upload_process' => '<title>Edit Photos After Upload</title><info>Enable this option if you want users to edit the batch of photos they had just recently updated.</info>',
  'in_this_album' => 'In This Album',
  'please_upload_an_image_for_your_profile' => 'Please upload an image for your profile.',
  'full_name_tagged_you_on_gender_photo' => '{full_name} tagged you on {gender} photo "<a href="{link}">{title}</a>".',
  'full_name_tagged_you_on_user_photo' => '{full_name} tagged you on {other_full_name}&#039;s photo "<a href="{link}">{title}</a>
To view this photo follow the link below:
<a href="{link}">{link}</a>',
  'full_name_tagged_you_in_a_photo' => '{full_name} tagged you in a photo.',
  'menu_photo_upload_a_new_image_714586c73197300f65ba08f7dee8cb4a' => 'Upload a New Image',
  'photo_details' => 'Photo Details',
  'setting_delete_original_after_resize' => '<title>Delete Original Photo After Resize</title><info>When a user uploads an image the site will create thumbnails of this image, and uses the thumbnails around the site. 
If you enable this setting the original file (that the user uploaded) will be deleted after the thumbnails have been created.</info>',
  'item_phrase' => 'photo',
  'item_phrase_album' => 'photo album',
  'setting_in_main_photo_section_show' => '<title>In Main Photo Section Show</title><info>This setting lets you choose what should be displayed when going to the main photo section. The default is to display photos</info>',
  'setting_show_info_on_mouseover' => '<title>Dynamic View</title><info>
This setting changes a few aspects related to the photo section:<br/>
- It hides the user and album name of a photo until you place the cursor over that photo
- The thumbnails for the photos are bigger
- When placing the mouse over a thumbnail you can like the photo with one click.
- The Pager in the photo section is a bigger button allowing the visitor to simply load more photos.</info>',
  'menu_photo_upload_a_new_image_0df7df42d810e7978c535292f273fc91' => 'Upload a New Image',
  'set_as_page_s_cover_photo' => 'Set as Page&#039;s Cover Photo',
  'set_as_your_page_s_cover_photo' => 'Set as your page&#039;s cover photo',
  'set_this_as_your_page_s_cover_photo' => 'Set this as your Page&#039;s cover photo',
  'set_this_photo_as_your_profile_image' => 'Set this photo as your profile image.',
  'setting_pre_load_header_view' => '<title>Pre-load JavaScript for Photo Theater Mode</title><info>Enable to pre-load all the needed JS/CSS files for viewing a photo. Makes it faster to get the popup.</info>',
); ?>