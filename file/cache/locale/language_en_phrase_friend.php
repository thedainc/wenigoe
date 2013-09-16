<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = array (
  'menu_core_friends' => 'Friends',
  'menu_top_friends' => 'Top Friends',
  'menu_online_friends' => 'Online Friends',
  'create_new_list' => 'Create New List...',
  'edit_lists' => 'Edit Lists',
  'view_list' => 'View List',
  'user_setting_can_add_friends' => 'Can add friends?',
  'user_setting_can_add_folders' => 'Can add custom folders?',
  'setting_total_requests_display' => '<title>Friend Requests Display Total</title><info>How many friend requests should be displayed when a user accepts requests?</info>',
  'menu_all_friends' => 'All Friends',
  'menu_pending_requests' => 'Pending Requests',
  'menu_friend_friends' => 'Friends',
  'setting_friend_display_limit' => '<title>Friends Display Limit</title><info>Define how many friends should be displayed on a users profile and dashboard.</info>',
  'setting_friend_user_feed_display_limit' => '<title>Total Friends Display (User Selection)</title><info>Define how many friends a user can select to be displayed on their dashboard or profile.</info>',
  'user_setting_can_remove_friends_from_profile' => 'Can remove friends block from their profile?',
  'user_setting_can_remove_friends_from_dashboard' => 'Can remove their friends block from their dashboard?',
  'setting_enable_birthday_notices' => '<title>Enable Birthday Notices</title><info>When enabled users will see a list of their friends upcoming birthdays.</info>',
  'setting_days_to_check_for_birthday' => '<title>How many days in advance to check for birthdays</title><info>This setting tells how many days in advance should the script check for.

Setting it to a number too high may beat the purpose of the feature.

The results from this feature cannot be cached, so it is prone to becoming a slow down for your site.

Keep in mind that you can disable this feature altogether in the setting friend.enable_birthday_notices</info>',
  'setting_birthdays_cache_time_out' => '<title>Birthdays Cache Time Out</title><info>Showing your friend\'s birthdays in the dashboard has a cost in database calls, therefore we cache it to save time and avoid extra calls.

This setting tells how often should the cache be refreshed, its set in hours so if you set it to 5 it means that every 5 hours the list of friends whose birthday is coming soon will be refreshed. This is helpful for new sign ups whose birthday is within 1 day.

This setting complements days_to_check_for_birthday and is useless if enable_birthday_notices is disabled.</info>',
  'setting_show_empty_birthdays' => '<title>Show Empty Birthdays</title><info>When enabled the site will show the block in the dashboard regardless if the user has friends whose birthday is coming or not. 

Disabling it does not mean a performance optimization since the contents are already cached.</info>',
  'menu_birthday_e_cards' => 'Birthday E-Cards',
  'setting_friend_meta_keywords' => '<title>Friends Meta Keywords</title><info>Meta keywords used when in relation to the Friend module.</info>',
  'your_message_has_been_sent' => 'Your message has been sent.',
  'friend_request_successfully_sent' => 'Friend request successfully sent.',
  'you_have_reached_your_limit' => 'You have reached your limit.',
  'done' => 'Done!',
  'top_friends' => 'Top Friends',
  'remove_from_your_top_friends_list' => 'Remove from your Top Friends List',
  'add_to_your_top_friends_list' => 'Add to your Top Friends List',
  'friends_successfully_moved' => 'Friends successfully moved.',
  'friend_successfully_removed' => 'Friend successfully removed.',
  'friend_lists' => 'Friend Lists',
  'view_all' => 'View All',
  'friends' => 'Friends',
  'birthdays' => 'Birthdays',
  'my_friends' => 'My Friends',
  'change_my_top_friends' => 'Change my "Top Friends"',
  'search_friends' => 'Search Friends',
  'invalid_friend_list' => 'Invalid friend list.',
  'successfully_deleted' => 'Successfully deleted.',
  'birthday_e_cards' => 'Birthday E-Cards',
  'friends_request_successfully_deleted' => 'Friends request successfully deleted.',
  'pending_friend_requests' => 'Pending Friend Requests',
  'user_link_has_closed_their_friends_section' => '{user_link} has closed their friends section.',
  'full_name_s_friends' => '{full_name}\'s friends',
  'full_name_is_on_site_title_and_has_total_friends' => '{full_name} is on {site_title} and has {total} friends.',
  'full_name_is_connected_with_friends' => '{full_name} is connected with {friends}.',
  'sign_up_on_site_title_and_connect_with_full_name_message_full_name_or_add_full_name_as_you' => 'Sign up on {site_title} and connect with {full_name}, message {full_name}, or add {full_name} as your friend.',
  'not_a_valid_user_to_be_friends_with' => 'Not a valid user to be friends with.',
  'you_are_already_friends_with_this_user' => 'You are already friends with this user.',
  'friends_request' => 'Friends Request',
  'full_name_added_you_as_a_friend_on_site_title' => '{full_name} added you as a friend on {site_title}.',
  'full_name_added_you_as_a_friend_on_site_title_to_confirm_this_friend_request' => '{full_name} added you as a friend on {site_title}.

To confirm this friend request, follow the link below:
<a href="{link}">{link}</a>',
  'no_friends_requests' => 'No friends requests.',
  'friend_requests_total' => 'Friend Requests (<span id="js_request_friend_count_total">{total}</span>)',
  'viewer_image_you_and_owner_image_a_href_user_link_full_name_a_are_now_friends' => '{viewer_image}You and {owner_image}<a href="{user_link}">{full_name}</a> are now friends.',
  'owner_image_you_and_viewer_image_a_href_friend_link_friend_a_are_now_friends' => '{owner_image}You and {viewer_image}<a href="{friend_link}">{friend}</a> are now friends.',
  'owner_image_a_href_user_link_full_name_a_and_viewer_image' => '{owner_image}<a href="{user_link}">{full_name}</a> and {viewer_image}<a href="{friend_link}">{friend}</a> are now friends.',
  'owner_image_a_href_user_link_full_name_a_and_viewer_image_friends' => '{owner_image}<a href="{user_link}">{full_name}</a> and {viewer_image}<a href="{friend_link}">{friend}</a> are now friends.',
  'new_friend' => 'New Friend',
  'friend_request' => 'Friend Request',
  'user_link_wished_you_a_happy_birthday' => '{user_link} wished you a happy birthday.',
  'view_friends' => 'View Friends',
  'user_link_asked_to_be_your_friend' => '{user_link} asked to be your friend.',
  'full_name_confirmed_you_as_a_friend_on_site_title' => '{full_name} confirmed you as a friend on {site_title}.',
  'full_name_confirmed_you_as_a_friend_on_site_title_to_view_their_profile' => '{full_name} confirmed you as a friend on {site_title}.

To view their profile, follow the link below:
<a href="{link}">{link}</a>',
  'full_name_wishes_you_a_happy_birthday_on_site_title' => '{full_name} wishes you a happy birthday on {site_title}.',
  'full_name_wrote_to_congratulate_you_on_your_birthday_on_site_title' => '{full_name} wrote to congratulate you on your birthday on {site_title}.

To view this message, follow the link below:
<a href="{link}">{link}</a>',
  'adding_new_list' => 'Adding New List',
  'updating' => 'Updating',
  'delete' => 'Delete',
  'update' => 'Update',
  'cancel' => 'Cancel',
  'add' => 'Add',
  'total_friend' => '{total} friend',
  'total_friends' => '{total} friends',
  'friend_requests' => 'Friend Requests',
  'you_are_now_friends_with_user_link' => 'You are now friends with {user_link}.',
  'add_to_a_friend_list' => 'Add to a friend list...',
  'lists' => 'Lists...',
  'create_a_new_list' => 'Create a New List...',
  'create' => 'Create',
  'show_all_lists' => 'Show all lists...',
  'user_link_wrote' => '{user_link} wrote',
  'accept' => 'Accept',
  'deny' => 'Deny',
  'no_birthdays_coming_up' => 'No birthdays coming up.',
  'birthday_e_card' => 'Birthday E-Card',
  'send_a_birthday_e_card_to_full_name' => 'Send a Birthday E-Card to {full_name}.',
  'send_full_name_a_message' => 'Send {full_name} a message.',
  '1_day' => '1 Day',
  'today' => 'Today!',
  'days_left_days' => '{days_left} days',
  'message_optional' => 'Message (Optional)',
  'send_e_card' => 'Send E-Card',
  'view_friends_online' => 'View Friends Online',
  'edit_top_friends' => 'Edit Top Friends',
  'find_friends_by_name_or_email' => 'Find friends by name or email.',
  'you_have_not_added_any_friends_yet' => 'You have not added any friends yet.',
  'search_for_friends' => 'Search For Friends',
  'browse_members' => 'Browse Members',
  'you_have_already_asked_full_name_to_be_your_friend' => 'You have already asked {full_name} to be your friend.',
  'full_name_has_already_asked_to_be_your_friend' => '{full_name} has already asked to be your friend.',
  'would_you_like_to_accept_their_request_to_be_friends' => 'Would you like to accept their request to be friends?',
  'yes' => 'Yes',
  'no' => 'No',
  'cannot_add_yourself_as_a_friend' => 'Cannot add yourself as a friend.',
  'you_are_already_friends_with_full_name' => 'You are already friends with {full_name}.',
  'user_link_will_have_to_confirm_that_you_are_friends' => '{user_link} will have to confirm that you are friends.',
  'add_a_personal_message' => 'Add a personal message...',
  'add_a_personal_message_form' => 'Add a personal message',
  'write_your_message_within_250_characters' => 'Write your message within 250 characters.',
  'add_friend' => 'Add Friend',
  'search_by_email_full_name_or_user_name' => 'Search by email, full name or user name.',
  'view' => 'View',
  'all_friends' => 'All Friends',
  'online_friends' => 'Online Friends',
  'friends_list' => 'Friends List',
  'find' => 'Find',
  'sorry_no_friends_were_found' => 'Sorry, no friends were found.',
  'use_selected' => 'Use Selected',
  'save' => 'Save',
  'use_this_image_to_add_friends_to_your_top_friends_list' => 'Use this image to add friends to your "Top Friends" list',
  'select' => 'Select',
  'none' => 'None',
  'all' => 'All',
  'move_to_list' => 'Move to List...',
  'message' => 'Message',
  'age' => 'Age',
  'gender' => 'Gender',
  'location' => 'Location',
  'remove_from_top' => 'Remove from Top',
  'add_to_top' => 'Add to Top',
  'toggle' => 'Toggle',
  'no_friends' => 'No friends.',
  'no_birthday_messages_found' => 'No birthday messages found.',
  'remove_this_friends_request' => 'Remove this friends request.',
  'user_link_has_not_added_any_friends' => '{user_link} has not added any friends.',
  'browse_other_members' => 'Browse Other Members',
  'in_order_to_view_this_item_posted_by_user_link_you_need_to_be_on_their_friends_list' => 'In order to view this item posted by {user_link} you need to be on their friends list.',
  'send_a_friends_request_to_full_name' => 'Send a Friends Request to {full_name}',
  'thank_you_for_your_request_to_join_our_group_your_membership_will_first_have_to_be_approved' => 'Thank you for your request to join our group. Your membership will first have to be approved.',
  'successfully_deleted_the_group' => 'Successfully deleted the group.',
  'group_invitation_successfully_sent' => 'Group invitation successfully sent!',
  'top' => 'Top',
  'online' => 'Online',
  'there_are_no_pending_friends_requests' => 'There are no pending friends requests.',
  'mutual_friends' => 'Mutual Friends',
  '1_friend_in_common' => '1 friend in common',
  'total_friends_in_common' => '{total} friends in common',
  'friends_online' => 'Friends Online',
  'suggestions' => 'Suggestions',
  'add_to_friends' => 'Add to Friends',
  'friend_suggestions' => 'Friend Suggestions',
  'mutual_friends_will_be_listed_here' => 'Mutual friends will be listed here.',
  'videos' => 'Videos',
  'that_s_you' => 'That\'s You!',
  'the_following_users_are_already_a_member_of_our_community' => 'The following users are already a member of our community',
  'requests' => 'Requests',
  'you_do_not_have_any_friends_requests_at_the_moment' => 'You do not have any friends requests at the moment.',
  'menu_friends_requests' => 'Friends Requests',
  'view_friend_request_id' => 'View Friend Request: #{id}',
  'viewing_friends_request_id' => 'Viewing Friends Request: #{id}',
  'you_have_denied_user_link_s_friends_request' => 'You have denied {user_link}&#039;s connection request.',
  'search_for_members' => 'Search for Members',
  'search_for_your_friends' => 'Search for Your Connection',
  'total_friends_block' => 'Total connections',
  'we_can_t_create_an_empty_list' => 'We can\'t create an empty list.',
  'provide_a_name_for_your_list' => 'Provide a name for your list.',
  'accepting_friends_request' => 'Accepting connection request',
  'no_friends_online' => 'No connections online.',
  'select_all' => 'Select All',
  'unselect_all' => 'Unselect All',
  'setting_friend_suggestion_search_total' => '<title>Connections Suggestion Friends Check Count</title><info>When performing the search to find friend suggestions for your members it will pull out X amount of users, where X is the numerical value of how many friends to search.</info>',
  'setting_enable_friend_suggestion' => '<title>Connection Suggestions</title><info>Enable this if you want to suggest connections to your members when they visit their dashboard.

You can control the search criteria on what defines a connection to suggest.

This feature requires a lot of extra server resources in order to perform such a search. 

Each search result is cached for X minutes (where you can control X).

<b>Notice:</b> This feature is experimental and is not stable.
</info>',
  'setting_friend_suggestion_timeout' => '<title>Refresh Connection Suggestions</title><info>Define how long to wait till we run the search to find friends to suggest to a member in minutes.</info>',
  'setting_friend_suggestion_user_based' => '<title>Check Location for Connection Suggestions</title><info>Enable this option in order for us to pick up connection suggestions for your members based on the Country, State/Province and City they live in.</info>',
  'we_are_unable_to_find_any_friends_to_suggest_at_this_time_once_we_do_you_will_be_notified_within_our_dashboard' => 'We are unable to find any connections to suggest at this time. Once we do you will be notified within our Dashboard.',
  'finding_another_suggestion' => 'Finding another suggestion...',
  'hide_this_suggestion' => 'Hide this suggestion',
  'friend' => 'Connection',
  'hide' => 'Hide',
  'unselect' => 'Unselect',
  'optional' => '(optional)',
  'user_setting_total_folders' => 'Allowed Total Connection Folders (Enter without quotes "0" for no limit.)',
  'no_search_results_found' => 'No search results found.',
  'no_friends_found' => 'No connections found.',
  'search' => 'Search',
  'loading' => 'Loading...',
  'setting_hide_denied_requests_from_pending_list' => '<title>Hide denied requests from pending list</title><info>If enabled, connection requests that were denied will be hidden from the Pending Connection Requests list.</info>',
  'cannot_select_this_user' => '(Based on privacy settings this user cannot be selected)',
  'setting_friend_cache_limit' => '<title>Friends Cache Limit</title><info>Certain features on the site pick up on the users connections list especially when running a search for a connection. In order to provide a "live" feel to search results we cache in advance X (where X is this settings value) number of connections in memory. Making it easier for users to find their connections instantly.</info>',
  'menu_friend_sent_ecards_a441eadc1389cdf0ffe6c4f8babdd66e' => 'Sent ECards',
  'invoices' => 'Invoices',
  'id' => 'Id',
  'status' => 'Status',
  'price' => 'Price',
  'date' => 'Date',
  'sent_to' => 'Sent To',
  'you_do_not_have_any_invoices' => 'You do not have any invoices',
  'sent_from' => 'From',
  'created' => 'Created',
  'paid' => 'Paid',
  'setting_allow_blocked_user_to_friend_request' => '<title>Allow Connection Requests from Blocked users</title><info>If userA blocks userB, should userB be able to send a friend request to userA?</info>',
  'no_new_requests' => 'No new requests.',
  'moderate' => 'Moderate',
  'relationship_request' => 'Relationship request',
  '1_mutual_friend' => '1 mutual connection',
  'total_mutual_friends' => '{total} mutual connections',
  'view_more' => 'View More',
  'send_a_message' => 'Send a Message',
  'view_profile' => 'View Profile',
  'see_all_friend_requests' => 'See All Connection Requests',
  'search_friends_dot_dot_dot' => 'Search Connections...',
  'newest_friends' => 'Newest Connections',
  'by_first_name' => 'By First Name',
  'custom_order' => 'Custom Order',
  'list_successfully_deleted' => 'List successfully deleted.',
  'incoming_requests' => 'Incoming Requests',
  'pending_requests' => 'Pending Requests',
  'you_have_1_new_friend_request' => 'You have 1 new connection request',
  'you_have_total_new_friend_requests' => 'You have {total} new connection requests',
  'delete_list' => 'Delete List',
  'edit_name' => 'Edit Name',
  'display_on_profile' => 'Display on Profile',
  'remove_from_profile' => 'Remove from Profile',
  'change_order' => 'Change Order',
  'remove_this_friend' => 'Remove This Connection',
  'enter_the_name_of_your_custom_friends_list' => 'Enter the name of your custom connections&#039; list.',
  'submit' => 'Submit',
  'remove_friend' => 'Remove Connection',
  'list_successfully_created' => 'List successfully created.',
  'successfully_added_this_list_to_your_profile' => 'Successfully added this list to your profile.',
  'profile_friend_lists' => 'Profile Connection Lists',
  'order_successfully_saved' => 'Order successfully saved',
  'list_order' => 'List Order',
  'you_must_enable_dnd_mode' => 'You must enable DND mode.',
  'block_was_deleted' => 'Block was deleted',
  'cant_delete_it' => 'Cant delete it',
  'tomorrow' => 'Tomorrow',
  'after_tomorrow' => 'After Tomorrow',
  'today_normal' => 'Today',
  'and' => 'and',
  'full_name_added_you_as_a_friend' => '{full_name} added you as a connection',
  'gets_a_full_list_of_friends_for_a_specific_user' => 'Gets a full list of connections for a specific user. If you do not pass the #{USER_ID} we will return information about the user that is currently logged in.',
  'checks_if_2_users_are_friends_or_not' => 'Checks if 2 users are connections or not. If you do not pass the #{USER_ID} we will return information about the user that is currently logged in.',
  'full_name_posted_a_href_link_a_link_a_on_a_href_parent_user_name' => '{full_name} posted <a href="{link}">a link</a> on <a href="{parent_user_name}">{parent_full_name}</a>\'s <a href="{link}">wall</a>.',
  'birthday_notification' => 'Birthday Notification',
  'happy_birthday' => 'Happy Birthday!',
  'confirm' => 'Confirm',
  'remove_this_request' => 'Remove This Request',
  'show_more_results_for_search_term' => 'Show more results for "{search_term}"',
  'save_changes' => 'Save Changes',
  'setting_friends_only_profile' => '<title>Connections Only Profile</title><info>With this setting enabled only connections can view each others profiles.<br />Note this will override your users privacy settings and force anything related to viewing their profile and have it set to "Connections Only".</info>',
  'menu_friend_friends_532c28d5412dd75bf975fb951c740a30' => 'Connections',
  'see_all' => 'See All',
  'confirmed' => 'Confirmed',
  'denied' => 'Denied',
  'user_setting_link_to_remove_friend_on_profile' => 'When enabled, members of this user group will see a link to "Remove Connection" from the profile page of their connections.',
  'unable_to_send_a_friend_request_to_this_user_at_this_moment' => 'Unable to send a connection request to this user at this moment.',
  'unfriend' => 'UnConnect',
  'setting_cache_mutual_friends' => '<title>Mutual Connections List</title><info>Minutes, 0 = no cache. Caches the list of mutual connections with specific users.</info>',
  'setting_cache_rand_list_of_friends' => '<title>Connections List</title><info>Minutes. 0 = no cache. Block is connection.small in the profiles, defaults to the left column. It is also called from the timeline block in the friend module.</info>',
  'setting_cache_is_friend' => '<title>Connections Check</title><info>Cache if a user is connections with another user. Cleared only when adding or removing a connection.</info>',
  'setting_cache_friend_list' => '<title>Connections List (FULL)</title><info>Cache the users connections list so we don&#039;t query the database all the time.</info>',
  'setting_load_friends_online_ajax' => '<title>Online Connections via AJAX</title><info>Load the Online Connections only after the site has loaded via AJAX.</info>',
); ?>