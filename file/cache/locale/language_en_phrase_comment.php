<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = array (
  'user_setting_wysiwyg_on_comments' => 'Can use a WYSIWYG Editor on comments?

Note: The WYSIWYG Editor feature must be enabled.',
  'user_setting_edit_own_comment' => 'Can edit their own comments?',
  'user_setting_edit_user_comment' => 'Can edit comments added by other users?',
  'user_setting_delete_own_comment' => 'Can delete their own comments?',
  'user_setting_delete_user_comment' => 'Can delete comments added by other users?',
  'user_setting_points_comment' => 'Specify how many points the user will receive when adding a new comment.',
  'user_setting_can_vote_on_comments' => 'Allow users to vote on comments?',
  'user_setting_can_post_comments' => 'Can post comments?',
  'module_comment' => 'Comment',
  'x_wrote' => '<a href="{link}">{full_name}</a> wrote at {date}',
  'edit' => 'Edit',
  'reply' => 'Reply',
  'quote' => 'Quote',
  'delete' => 'Delete',
  'delete_comment' => 'Delete Comment',
  'last_update_on_x_by_x' => 'Last Update on {date} by {full_name}',
  'fill_text_your_comment' => 'Fill in some text for your comment',
  'leave_a_reply' => 'Leave a Reply',
  'comment' => 'Comment',
  'submit_comment' => 'Submit Comment',
  'adding_comment' => 'Adding Comment',
  'comment_deleted' => 'Comment Deleted',
  'voted' => 'Voted!',
  'vote' => '{total} Vote',
  'votes' => '{total} Votes',
  'vote_this_comment' => 'Vote This Comment Up',
  'vote_this_comment_down' => 'Vote This Comment Down',
  'comments_header' => 'Comments',
  'comments' => 'No comments. Be the first to <a href="#add-comment" onclick="$.scrollTo(\'#add-comment\', 360); return false;">add</a> a comment.',
  'user_wrote_date' => '{full_name} wrote at {date}',
  'name' => 'Name',
  'email_will_not_published' => 'Email (Will not be published)',
  'website' => 'Website',
  'comments_must_login_signup' => 'No Comments. <a href="{login}">Login</a> or <a href="{register}">Signup</a> to be first.',
  'user_setting_comment_post_flood_control' => 'Define how many minutes this user group should wait before they can post a new comment.

Note: Set to 0 if there should be no limit.',
  'setting_allow_rss_feed_on_comments' => '<title>RSS Feed on Comments</title><info>Set to <b>True</b> to enable RSS feeds on comments.</info>',
  'setting_total_child_comments' => '<title>Total Child Comments</title><info>Define how many child comments can a parent comment have?

Note: This is only used if threaded replies are enabled.</info>',
  'user_setting_can_moderate_comments' => 'Can moderate comments?',
  'setting_spam_check_comments' => '<title>Spam Check Comments</title><info>Spam Check Comments</info>',
  'setting_comment_hash_check' => '<title>Comment Hash Check</title><info>If enabled this will check if the last X comments added in the last Y minutes are identical to the comment being added.

Notice: X & Y are settings that can be changed.</info>',
  'setting_comments_to_check' => '<title>Comments To Check</title><info>If the setting to check if comments are identical you can set here how many comments in the past should be checked.</info>',
  'setting_total_minutes_to_wait_for_comments' => '<title>Comment Minutes to Wait Until Next Check</title><info>If the setting to check if comments are identical you can set here how far back we should check in minutes.</info>',
  'posting_a_comment_a_little_too_soon_total_time' => 'Posting a comment a little too soon. {total_time}',
  'add_some_text_to_your_comment' => 'Add some text to your comment.',
  'your_comment_was_successfully_added_moderated' => 'Your comment was successfully added, however this item requires that all comments be moderated by the owner before they are publicly displayed.',
  'last_update_on_time_stamp_by_full_name' => 'Last update on {time_stamp} by {full_name}.',
  'comment_successfully_deleted' => 'Comment successfully deleted.',
  'fill_in_your_name' => 'Fill in your name.',
  'comment_title' => 'Comments',
  'last_activity' => 'Last Activity',
  'rating' => 'Rating',
  'rss_feeds_are_disabled_for_comments' => 'RSS feeds are disabled for comments.',
  'comment_does_not_exist' => 'Comment does not exist.',
  'nothing_new_to_approve' => 'Nothing new to approve.',
  'comments_pending_approval' => 'Comments Pending Approval',
  'comments_pending_approval_total' => 'Comments Pending Approval (<span id="js_request_comment_count_total">{total}</span>)',
  'new_comments' => 'New Comments',
  'comments_for_approval' => 'Comments for Approval',
  'add_comment' => 'Add Comment',
  'view_comments' => 'View Comments',
  'user_link_added_a_comment_and_is_pending_your_approval' => '{user_link} added a comment and is pending your approval.',
  'by_full_name' => 'By: {full_name}',
  'latest_comments_on_site_title' => 'Latest comments on {site_title}.',
  'latest_comments' => 'Latest Comments',
  'your_comment_has_been_marked_as_spam_it_will_have_to_be_approved_by_an_admin' => 'Your comment has been marked as spam. It will have to be approved by an Admin before it is displayed publicly.',
  'not_a_valid_comment' => 'Not a valid comment.',
  'unable_to_moderate_this_comment' => 'Unable to moderate this comment.',
  'email' => 'Email',
  'will_not_be_published' => 'Will not be published.',
  'message' => 'Message',
  'item' => 'Item',
  'approve' => 'Approve',
  'deny' => 'Deny',
  'your_comment_has_successfully_added' => 'Your comment has successfully added.',
  'view_replies_total_to_this_comment' => 'View replies ({total}) to this comment.',
  'are_you_sure' => 'Are you sure?',
  'user_link_at_item_time_stamp' => '{user_link} at {item_time_stamp}.',
  'view_more' => 'View More',
  'moderate_comments' => 'Moderate Comments',
  'comment_successfully_approved' => 'Comment successfully approved.',
  'user_link_left_a_comment_on_your_item' => '{user_link} left a comment on your <a href="{link}">{item_name}</a>.',
  'no_comments' => 'No comments.',
  'user_setting_can_delete_comments_posted_on_own_profile' => 'Can this user group delete comments posted on their own profile?',
  'no_comments_added' => 'No comments added.',
  'setting_allow_comments_on_profiles' => '<title>Allow Comments on Profile</title><info>Enable this feature to allow comments on profiles.</info>',
  'loading' => 'Loading',
  'view_all_total_left_comments' => 'View all {total_left} comments',
  'comments_text' => 'Comments Text',
  'view_all_comments' => 'View All Comments',
  'view_all_comments_total' => 'View All Comments ({total})',
  'cannot_comment_on_this_item_as_it_does_not_exist_any_longer' => 'Cannot comment on this item as it does not exist any longer.',
  'comments_activity' => 'Comments',
  'new_comments_stats' => 'Comments',
  'you_cannot_write_a_comment_on_your_own_profile' => 'You cannot write a comment on your own profile.',
  'user_setting_can_comment_on_own_profile' => 'Can comment on own profile?',
  'update_owner_id_for_comments_only_for_those_that_upgraded_from_v1_6_21' => 'Update Owner ID# for Comments (Only for those that upgraded from v1.6.21).',
  'your_old_v1_6_21_setting_file_must_exist' => 'Your old v1.6.21 setting file must exist in order for us to continue. Old setting file: {file}',
  'the_database_table_table_does_not_exist' => 'The database table "{table}" does not exist. We cannot update this counter.',
  'full_name_approved_your_comment_on_site_title' => '{full_name} approved your comment on {site_title}.',
  'full_name_approved_your_comment_on_site_title_message' => '{full_name} approved your comment on {site_title}.

To view this comment, follow the link below:
<a href="{link}">{link}</a>',
  'a_href_user_link_full_name_a_likes_your_a_href_link_comment_a' => '<a href="{user_link}">{full_name}</a> likes your <a href="{link}">comment</a>.',
  'a_href_user_link_full_name_a_likes_their_own_a_href_link_coment_a' => '<a href="{user_link}">{full_name}</a> likes {gender} own <a href="{link}">comment</a>.',
  'a_href_user_link_full_name_a_likes_a_href_view_user_link_view_full_name_a_s_a_href_link_comment_a' => '<a href="{user_link}">{full_name}</a> likes <a href="{view_user_link}">{view_full_name}</a>\'s <a href="{link}">comment</a>.',
  'user_setting_approve_all_comments' => 'Approve comments before they are displayed publicly?',
  'your_comment_has_successfully_been_added_however_it_is_pending_an_admins_approval' => 'Your comment has successfully been added, however it is pending an Admins approval.',
  'comments_approve' => 'Comments',
  'comment_approved_on_site_title' => 'Comment Approved on {site_title}',
  'one_of_your_comments_on_site_title' => 'One of your comments on {site_title} has been approved. To view this comment click the link below:
<a href="{link}">{link}</a>',
  'subscribe_to_comments' => 'Subscribe to comments',
  'setting_total_comments_in_activity_feed' => '<title>Total Comments in Activity Feed</title><info>Define how many comments should be displayed within each activity feed.</info>',
  'setting_total_amount_of_comments_to_load' => '<title>Total Amount of Comments To Load</title><info>When a user clicks to view more comments on a feed or item this setting controls how many comments to load via AJAX on the page they are on. If this number is surpassed they are then directed to the parent item where it will display all the comments and comes built in with a pager.</info>',
  'delete_this_comment' => 'Delete this comment',
  '1_person' => '1 person',
  'total_people' => '{total} people',
  'viewing_comment' => 'Viewing Comment',
  'setting_thread_comment_total_display' => '<title>Total Nested Comments</title><info>Define how many nested comments we should display.

Note: This is only used if threaded replies are enabled.</info>',
  'view_total_more' => 'View {total} more',
  'viewing_a_single_comment' => 'Viewing a single comment.',
  'view_previous_comments' => 'View previous comments',
  'user_setting_can_delete_comment_on_own_item' => 'Can delete any comments posted on their own item?',
  'comment_on_items' => 'Comment on Items',
  'item_phrase' => 'comment',
  'setting_load_delayed_comments_items' => '<title>Load Comments via AJAX</title><info>Enable to load comments via AJAX when viewing items.</info>',
); ?>