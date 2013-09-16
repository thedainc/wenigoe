<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = array (
  'module_poll' => 'Polls',
  'menu_poll' => 'Polls',
  'menu_add_new_poll' => 'Add New Poll',
  'menu_polls' => 'Polls',
  'setting_is_image_required' => '<title>Is Image Required</title><info>If set to true, users will have to upload an image with every poll they post.

By default is set to false, so they don\'t need to upload an image with their polls.</info>',
  'user_setting_poll_can_upload_image' => 'This setting defines if members of this usergroup can add images along with their polls.',
  'setting_poll_max_image_pic_size' => '<title>Size of the poll image</title><info>When users upload an image with their polls this will be the maximum size for that picture, anything bigger will be resized</info>',
  'user_setting_can_edit_own_poll' => 'Can members of this user group edit polls they have posted?',
  'user_setting_poll_can_change_own_vote' => 'Tells if a user group member can change its vote on a poll.

If set to false the first vote will be the definitive vote for that user and that poll.

If set to true users will be able to change their vote in the future.',
  'poll_vote_updated' => 'You have successfully changed your vote for this poll',
  'poll_new_vote_added_successfully' => 'Your vote has been added successfully',
  'setting_poll_view_time_stamp' => '<title>Poll Time Stamp</title><info>This is the format used to display dates, it complies with http://php.net/date</info>',
  'user_setting_poll_flood_control' => 'How often can members of this user group post new polls (in minutes).

0 => no restriction
1 => 1 minute
10 => 10 minutes',
  'poll_flood_control' => 'You can only post polls every {x} minutes.',
  'user_setting_poll_requires_admin_moderation' => 'This setting tells if polls posted by members of this group will need to be moderated (approved) before being shown on the site.',
  'user_setting_poll_can_moderate_polls' => 'Can members of this user group moderate polls? (delete, approve)',
  'user_setting_poll_require_captcha_challenge' => 'Do members of this user group need to complete a captcha challenge to submit a poll?',
  'user_setting_poll_can_edit_own_polls' => 'Can members of this user group edit their own polls after submitted?',
  'user_setting_poll_can_edit_others_polls' => 'Can members of this user group edit other member\'s polls?',
  'user_setting_poll_can_delete_own_polls' => 'can members of this user group delete their own polls?',
  'user_setting_poll_can_delete_others_polls' => 'Can members of this user group delete polls posted by other members?',
  'user_setting_can_post_comment_on_poll' => 'Can members of this user group post comments on polls?',
  'user_setting_view_poll_results_after_vote' => 'When set to yes members of this user group will see the poll results right after voting.',
  'user_setting_maximum_answers_count' => 'How many answers can members of this user group add to their polls?',
  'setting_polls_to_show' => '<title>How many to show</title><info>This setting tells how many polls should be shown per page.</info>',
  'user_setting_can_vote_in_own_poll' => 'Do you want to enable members of this user group to vote on their own polls?

This is different than changing their votes.',
  'user_setting_points_poll' => 'how many points does adding a poll award?',
  'user_setting_can_view_user_poll_results_own_poll' => 'Can view what users have voted on their own poll?',
  'user_setting_can_view_user_poll_results_other_poll' => 'Can view users poll results on other polls?',
  'user_setting_can_edit_title' => 'Can members of this user group edit the title, image, random setting, privacy setting and comment setting on a poll?

This may be overridden by the setting poll_can_edit_others_polls and the poll_can_edit_own_polls.

If this setting is disabled, users will not be able to change the colors in the poll.',
  'user_setting_can_edit_question' => 'Can members of this user group edit the question and answers of a poll?

This may be overridden by the setting poll_can_edit_others_polls and the poll_can_edit_own_polls',
  'setting_show_x_users_who_took_poll' => '<title>How many takers to show</title><info>This setting tells how many users who have taken the poll should be shown in the poll page. 

Changing this setting affects the Members Votes mini section.</info>',
  'user_setting_view_poll_results_before_vote' => 'Can members of this user group view poll results before voting on a poll?


Note that this setting may be overridden by the "poll.can_view_user_poll_results_own_poll" and the "poll.can_view_user_poll_results_other_poll" settings.
It can also be complemented with the setting "poll.view_poll_results_after_vote"',
  'user_setting_highlight_answer_voted_by_viewer' => 'If set to yes the answer chosen by the viewer will be highlighted with a background color.

This is useful if you have it set so the members of this usegroup cant view the results after taking the poll as they still will be able to view their own answer.',
  'stat_title_4' => 'Polls',
  'setting_poll_meta_description' => '<title>Poll Meta Description</title><info>Meta description used for the Poll module.</info>',
  'setting_poll_meta_keywords' => '<title>Poll Meta Keywords</title><info>Meta keywords for the Poll module.</info>',
  'an_error_occured_and_your_image_could_not_be_deleted_please_try_again' => 'An error occurred and your image could not be deleted. Please try again.',
  'this_poll_is_being_moderated_and_no_votes_can_be_added_yet' => 'This poll is being moderated and no votes can be added yet.',
  'your_vote_has_successfully_been_cast' => 'Your vote has successfully been cast.',
  'poll_successfully_approved' => 'Poll successfully approved.',
  'poll_successfully_deleted' => 'Poll successfully deleted.',
  'there_was_a_problem_moderating_this_poll' => 'There was a problem moderating this poll.',
  'provide_a_question_for_your_poll' => 'Provide a question for your poll.',
  'image_is_required' => 'Image is required.',
  'your_user_group_lacks_permissions_to_edit_that_poll' => 'Your user group lacks permissions to edit that poll.',
  'that_poll_does_not_exist' => 'That poll does not exist.',
  'each_poll_requires_an_image' => 'Each poll requires an image.',
  'your_poll_has_been_updated' => 'Your poll has been updated.',
  'your_poll_has_been_added' => 'Your poll has been added.',
  'your_poll_needs_to_be_approved_before_being_shown_on_the_site' => 'Your poll needs to be approved before being shown on the site.',
  'your_poll_has_been_added_feel_free_to_custom_design_it_the_way_you_want_here' => 'Your poll has been added, feel free to custom design it the way you want here.',
  'editing_a_new_poll' => 'Editing a New Poll',
  'adding_a_new_poll' => 'Adding a New Poll',
  'editing_poll' => 'Editing Poll',
  'adding_poll' => 'Adding Poll',
  'polls' => 'Polls',
  'that_poll_doesn_t_exist' => 'That poll doesn\'t exist.',
  'you_do_not_have_permission_to_change_the_design_of_this_poll' => 'You do not have permission to change the design of this poll.',
  'your_design_has_been_updated' => 'Your design has been updated.',
  'error' => 'Error',
  'there_are_no_answers_for_this_poll' => 'There are no answers for this poll.',
  'design_your_poll' => 'Design your poll',
  'full_name_s_polls' => '{full_name}\'s polls',
  'full_name_s_polls_on_site_title_full_name_has_total_poll_s' => '{full_name}\'s polls on {site_title}. {full_name} has {total} poll(s).',
  'full_name_s_polls_upper' => '{full_name}\'s Polls',
  'unable_to_view_this_poll' => 'Unable to view this poll.',
  'full_name_s_poll_from_time_stamp_question' => '{full_name}\'s poll from {time_stamp}: {question}.',
  'user_name_left_you_a_comment_on_site_title' => '{user_name} left you a comment on {site_title}.',
  'user_name_left_you_a_comment_on_site_title_to_view_this_comment_follow_the_link_below_a_href_link_link_a' => '{user_name} left you a comment on {site_title}.

To view this comment, follow the link below:
<a href="{link}">{link}</a>',
  'user_name_left_you_a_comment_on_site_title_however_before_it_can_be_displayed_it_needs_to_be_approved_by_you_you_can_approve_or_deny_this_comment_by_following_the_link_below_a_href_link_link_a' => '{user_name} left you a comment on {site_title}, however before it can be displayed it needs to be approved by you.

You can approve or deny this comment by following the link below:
<a href="{link}">{link}</a>',
  'on_name_s_poll' => 'On {name}\'s poll.',
  'full_name_approved_your_comment_on_site_title' => '{full_name} approved your comment on {site_title}.',
  'full_name_approved_your_comment_on_site_title_message' => '{full_name} approved your comment on {site_title}.

To view this comment, follow the link below:
<a href="{link}">{link}</a>',
  'a_href_user_link_full_name_a_added_a_new_comment_on_their_own_a_href_title_link_poll_a' => '<a href="{user_link}">{full_name}</a> added a new comment on their own <a href="{title_link}">poll</a>.',
  'a_href_user_link_full_name_a_added_a_new_comment_on_your_a_href_title_link_poll_a' => '<a href="{user_link}">{full_name}</a> added a new comment on your <a href="{title_link}">poll</a>.',
  'a_href_user_link_full_name_a_added_a_new_comment_on_a_href_item_user_link_item_user_name_s_a_a_href_title_link_poll_a' => '<a href="{user_link}">{full_name}</a> added a new comment on <a href="{item_user_link}">{item_user_name}\'s</a> <a href="{title_link}">poll</a>.',
  'a_href_user_link_full_name_a_added_a_new_poll_a_href_question_url_question_a' => '<a href="{user_link}">{full_name}</a> added a new poll "<a href="{question_url}">{question}</a>".',
  'create_a_poll' => 'Create a Poll',
  'manage_polls' => 'Manage Polls',
  'maximum_length_for_the_question_is_255_characters_and_it_cannot_be_empty' => 'Maximum length for the question is 255 characters and it cannot be empty.',
  'we_dont_allow_default_answers_answer' => 'We dont allow default answers ({answer}).',
  'maximum_length_for_the_answers_is_150_characters' => 'Maximum length for the answers is 150 characters.',
  'you_need_to_write_at_least_2_answers' => 'You need to write at least 2 answers.',
  'insufficient_permissions_to_vote_on_this_poll' => 'Insufficient permissions to vote on this poll.',
  'only_friends_can_vote_on_this_poll' => 'Only friends can vote on this poll.',
  'you_have_reached_your_limit' => 'You have reached your limit.',
  'answer' => 'Answer',
  'you_must_have_a_minimum_of_total_answers' => 'You must have a minimum of {total} answers.',
  'are_you_sure' => 'Are you sure?',
  'poll_created_on_time_stamp_by_user_info' => 'Poll created on {time_stamp} by {user_info}.',
  'this_poll_is_being_moderated_and_no_votes_can_be_added_until_it_has_been_approved' => 'This poll is being moderated and no votes can be added until it has been approved.',
  'submit_your_vote' => 'Submit your Vote',
  'cancel' => 'cancel',
  'approve' => 'Approve',
  'edit' => 'Edit',
  'delete' => 'Delete',
  'report_this_poll' => 'Report this Poll',
  'report' => 'Report',
  'votes_total_votes' => 'Votes ({total_votes})',
  'comments_total_comment' => 'Comments ({total_comment})',
  'members_votes_total_votes' => 'Members Votes ({total_votes})',
  'poll_designer' => 'Poll Designer',
  'background' => 'Background',
  'select_color' => 'Select Color',
  'percent' => 'Percent',
  'border' => 'Border',
  'save' => 'Save',
  'no_polls_have_been_added_yet' => 'No polls have been added yet.',
  'be_the_first_to_create_a_poll' => 'Be the First to Create a Poll.',
  'votes_0' => 'Votes (0)',
  'total_votes_votes' => '{total_votes} Votes',
  'no_answers_to_show' => 'No answers to show.',
  'user_info_voted_answer_on_time_stamp' => '{user_info} voted "{answer}" on {time_stamp}.',
  'default_answer' => 'Default Answer',
  'answers' => 'Answers',
  'image' => 'Image',
  'you_can_upload_a_jpg_gif_or_png_file' => 'You can upload a JPG, GIF or PNG file.',
  'click_here_to_delete_this_image_and_upload_a_new_one_in_its_place' => 'Click here to delete this image and upload a new one in its place.',
  'save_and_design_this_poll' => 'Save and Design this Poll',
  'update' => 'Update',
  'submit' => 'Submit',
  'skip_and_design_this_poll' => 'Skip and Design this Poll',
  'additional_options' => 'Additional Options',
  'randomize_answers' => 'Randomize Answers',
  'yes' => 'Yes',
  'no' => 'No',
  'comments' => 'Comments',
  'allow_comments' => 'Allow Comments',
  'moderate_comments_first' => 'Moderate Comments First',
  'no_comments' => 'No Comments',
  'privacy' => 'Privacy',
  'public_poll_will_be_added_to_our_public_poll_section' => 'Public (Poll will be added to our public poll section)',
  'personal_poll_will_only_be_displayed_on_your_profile' => 'Personal (Poll will only be displayed on your profile)',
  'friends_only_friends_can_view_this_poll' => 'Friends (Only friends can view this poll)',
  'preferred_list_only_the_people_you_select_will_be_able_to_see_the_poll' => 'Preferred list (only the people you select will be able to see the poll)',
  'you_have_not_added_any_polls' => 'You have not added any polls.',
  'add_a_new_poll' => 'Add a New Poll',
  'user_info_has_not_added_any_polls' => '{user_info} has not added any polls.',
  'browse_other_polls' => 'Browse Other Polls',
  'be_the_first_to_add_a_poll' => 'Be the first to add a poll.',
  'polls_activity' => 'Polls',
  'question' => 'Question',
  'user_setting_can_access_polls' => 'Can browse and view polls?',
  'user_setting_can_create_poll' => 'Can create a poll?',
  'a_href_user_link_full_name_a_likes_your_a_href_link_poll_a' => '<a href="{user_link}">{full_name}</a> likes your <a href="{link}">poll</a>.',
  'a_href_user_link_full_name_a_likes_their_own_a_href_link_poll_a' => '<a href="{user_link}">{full_name}</a> likes {gender} own <a href="{link}">poll</a>.',
  'a_href_user_link_full_name_a_likes_a_href_view_user_link_view_full_name_a_s_a_href_link_poll_a' => '<a href="{user_link}">{full_name}</a> likes <a href="{view_user_link}">{view_full_name}</a>\'s <a href="{link}">poll</a>.',
  'poll_results' => 'Poll Results',
  'public_votes' => 'Public Votes',
  'displays_all_users_who_voted_and_what_choice_they_voted_for' => 'Displays all users who voted, and what choice they voted for.',
  'user_setting_can_view_hidden_poll_votes' => 'Can view votes even if the poll is marked to hide votes? (Admin Option)',
  'votes_are_hidden_for_this_poll' => 'Votes are hidden for this poll.',
  'poll' => 'Poll',
  'say_something_about_this_poll' => 'Say something about this poll...',
  'add_another_answer' => 'Add another answer',
  'poll_has_been_approved' => 'Poll has been approved.',
  'poll_approved' => 'Poll Approved',
  'no_polls_found' => 'No polls found.',
  'search_polls' => 'Search Polls...',
  'latest' => 'Latest',
  'most_viewed' => 'Most Viewed',
  'most_liked' => 'Most Liked',
  'most_discussed' => 'Most Discussed',
  'all_polls' => 'All Polls',
  'my_polls' => 'My Polls',
  'friends_polls' => 'Friends\' Polls',
  'pending_polls' => 'Pending Polls',
  'by' => 'by',
  'actions' => 'Actions',
  'moderate' => 'Moderate',
  'view_results' => 'View Results',
  'cannot_cast_a_vote_when_a_poll_is_pending_approval' => 'Cannot cast a vote when a poll is pending approval.',
  'cancel_uppercase' => 'Cancel',
  'control_who_can_see_this_poll' => 'Control who can see this poll.',
  'comment_privacy' => 'Comment Privacy',
  'control_who_can_comment_on_this_poll' => 'Control who can comment on this poll.',
  'report_this_poll_lowercase' => 'Report this poll',
  'view_poll' => 'View Poll',
  'full_name_liked_your_poll_question' => '{full_name} liked your poll "{question}"',
  'full_name_liked_your_poll_question_message' => '{full_name} liked your poll "<a href="{link}">{question}</a>"
To view this poll follow the link below:
<a href="{link}">{link}</a>',
  'full_name_voted_on_your_poll_question' => '{full_name} voted on your poll "{question}"',
  'full_name_voted_answer_on_your_poll_question' => '{full_name} voted "{answer}" on your poll "{question}"
To view this poll follow the link below:
<a href="{link}">{link}</a>',
  'unable_to_post_a_comment_on_this_item_due_to_privacy_settings' => 'Unable to post a comment on this item due to privacy settings.',
  'posted_a_comment_on_gender_poll_a_href_link_title_a' => 'posted a comment on {gender} poll "<a href="{link}">{title}</a>".',
  'posted_a_comment_on_user_name_s_poll_a_href_link_title_a' => 'posted a comment on {user_name}\'s poll "<a href="{link}">{title}</a>".',
  'full_name_commented_on_one_of_your_polls_title' => '{full_name} commented on one of your polls "{title}"',
  'full_name_commented_on_your_poll_a_href_link_title_a_to_see_the_comment_thread_follow_the_link_below_a_href_link_link_a' => '{full_name} commented on your poll "<a href="{link}">{title}</a>".
To see the comment thread, follow the link below:
<a href="{link}">{link}</a>',
  'full_name_commented_on_gender_poll' => '{full_name} commented on {gender} poll.',
  'full_name_commented_on_other_full_name_s_poll' => '{full_name} commented on {other_full_name}\'s poll.',
  'full_name_commented_on_gender_poll_a_href_link_title_a_to_see_the_comment_thread_follow_the_link_below_a_href_link_link_a' => '{full_name} commented on {gender} poll "<a href="{link}">{title}</a>".
To see the comment thread, follow the link below:
<a href="{link}">{link}</a>',
  'full_name_commented_on_other_full_name_s_poll_a_href_link_title_a_to_see_the_comment_thread_follow_the_link_below_a_href_link_link_a' => '{full_name} commented on {other_full_name}\'s poll "<a href="{link}">{title}</a>".
To see the comment thread, follow the link below:
<a href="{link}">{link}</a>',
  'user_name_commented_on_gender_poll_title' => '{user_name} commented on {gender} poll "{title}"',
  'user_name_commented_on_your_poll_title' => '{user_name} commented on your poll "{title}"',
  'user_name_commented_on_span_class_drop_data_user_full_name_s_span_poll_title' => '{user_name} commented on <span class="drop_data_user">{full_name}\'s</span> poll "{title}"',
  'user_name_voted_on_gender_poll_title' => '{user_name} voted on {gender} poll "{title}"',
  'user_name_voted_on_your_poll_title' => '{user_name} voted on your poll "{title}"',
  'user_name_voted_on_span_class_drop_data_user_full_name_s_span_poll_title' => '{user_name} voted on <span class="drop_data_user">{full_name}\'s</span> poll "{title}"',
  'user_name_liked_gender_own_poll_title' => '{user_name} liked {gender} own poll "{title}"',
  'user_name_liked_your_poll_title' => '{user_name} liked your poll "{title}"',
  'user_name_liked_span_class_drop_data_user_full_name_span_poll_title' => '{user_name} liked <span class="drop_data_user">{full_name}</span> poll "{title}"',
  'your_poll_title_has_been_approved' => 'Your poll "{title}" has been approved.',
  'poll_s_successfully_approved' => 'Poll(s) successfully approved.',
  'poll_s_successfully_deleted' => 'Poll(s) successfully deleted.',
  'background_chooser' => 'Background Chooser',
  'percentage_chooser' => 'Percentage Chooser',
  'border_chooser' => 'Border Chooser',
  'your_poll_a_href_link_title_a_has_been_approved_to_view_this_poll_follow_the_link_below_a_href_link_link_a' => 'Your poll "<a href="{link}">{title}</a>" has been approved.
To view this poll follow the link below:
<a href="{link}">{link}</a>',
  'unable_to_find_this_poll' => 'Unable to find this poll.',
  'user_name_tagged_you_in_a_comment_in_a_poll' => '{user_name} tagged you in a comment in a poll',
  'menu_poll_polls_532c28d5412dd75bf975fb951c740a30' => 'Polls',
  'item_phrase' => 'poll',
); ?>