<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = array (
  'module_admincp' => 'Admincp',
  'logged_in_as' => 'Logged in as {full_name}',
  'view_site' => 'View Site',
  'logout' => 'Logout',
  'admin_cp' => 'Admin CP',
  'dashboard' => 'Dashboard',
  'setting_add_group' => 'Select the group your new setting will belong to. 

Regardless of the group it belongs to it can be accessed globally. 

Settings are split up into 3 groups, which are <b>Global Setting</b>, <b>Module Setting</b> or <b>Product Setting</b>.

<b>Global Setting</b> are settings that are not part of any specific module or 3rd party product so it falls into a global variable. 

<b>Module Setting</b> are settings that belong to the specific module it is used in. The setting can still be accessed across other modules, however these settings are intended to be used only in the specific module it was created for.

<b>Product Setting</b> are settings that belong to 3rd party products.',
  'setting_details' => 'Setting Details',
  'group' => 'Groups',
  'global_settings' => 'Global Settings',
  'module_settings' => 'Module Settings',
  'product_settings' => 'Product Settings',
  'variable' => 'Variable',
  'type' => 'Type',
  'string' => 'String',
  'boolean' => 'Boolean',
  'integer' => 'Integer',
  'array' => 'Array',
  'defined_drop_down' => 'Defined Drop-Down',
  'value' => 'Value',
  'language_package_details' => 'Language Package Details',
  'title' => 'Title',
  'info' => 'Info',
  'submit' => 'Submit',
  'true' => 'True',
  'false' => 'False',
  'setting_array_example' => 'Example: array("val1", "val2", "val3");',
  'setting_drop_down_example' => 'Separate drop downs with commas. The first drop down will be the default drop down. (Example: drop1, drop2, drop3)',
  'setting_add_var' => 'The <b>Variable</b> of your new setting is how you will identify and call this specific setting and return the given value.

If you create a <b>Variable</b> with <b>foo</b> it can be used later within the PHP script as:
[php]
echo App::getParam(\'foo\');
[/php]
The above code will print out the value of foo.

Note that if you add spacing or unsupported characters (alphanumeric support only) to your <b>Variable</b> it will automatically be renamed to fit the standards, which we will replace all unsupported characters or spaces with an underscore.',
  'admincp_help' => 'AdminCP Help',
  'setting_add_type' => 'Settings can be stored as a String, Boolean, Integer, Array or a Defined Drop-Down value.

<b><u>String</u></b>
Store string values that could contain alphanumeric characters or long text.

<b><u>Boolean</u></b>
Store a TRUE or FALSE value.

<b><u>Integer</u></b>
Store a numeric value.

<b><u>Array</u></b>
Store values within an Array.

<b><u>Defined Drop-Down</u></b>
Store values within an Array, however unlike the Array storage method you can only return one value which will be used when calling the parameter.',
  'setting_add_value' => 'Settings can be stored as a String, Boolean, Integer, Array or a Defined Drop-Down value.

<b><u>String</u></b>
Store string values that could contain alphanumeric characters or long text.

<b><u>Boolean</u></b>
Store a TRUE or FALSE value. Simply select TRUE if the value for the setting you are adding should be TRUE by default.

<b><u>Integer</u></b>
Store a numeric value.

<b><u>Array</u></b>
Store values within an Array. Adding an Array is similar to how Arrays are adding in PHP. 

Example:
[php]
array("val1", "val2", "val3");
[/php]

<b><u>Defined Drop-Down</u></b>
Store values within an Array, however unlike the Array storage method you can only return one value which will be used when calling the parameter.

When adding a drop-down separate drop downs with commas. The first drop down will be the default drop down. 

Example: 
[quote]
drop1, drop2, drop3
[/quote]',
  'setting_add_title' => 'Each setting must have a phrase added to the default language package to identify what we are editing when it comes time to edit this setting in the future. 

Keep the setting title short and to the point as you will also be adding a more informative phrase right after which is used to explain how a setting reacts on the site.',
  'setting_add_info' => 'Add as much information as you can regarding the new setting you are adding as others may need to edit this setting in the future. 

Instructions on how the setting effects the site when it for example is enabled or disabled is very useful.',
  'add_variable_name' => 'Add a Variable name that identifies your new setting',
  'setting_must_have_value' => 'Your setting must have a Value',
  'add_title_for_setting' => 'Add a Title for your setting',
  'add_information_regarding_setting' => 'Add some information regarding the setting',
  'already_in_use' => 'Already in use',
  'added' => 'Added',
  'add_setting' => 'Add Setting',
  'updated' => 'Updated!',
  'manage_settings' => 'Manage Settings',
  'quick_jump' => 'Quick Jump',
  'remove' => 'Remove',
  'add_a_new_value' => 'Add a New Value...',
  'add' => 'Add',
  'setting_group_avaliable_settings' => 'This setting group has no available settings.',
  'add_a_title_for_the_group' => 'Add a title for the group',
  'add_information_regarding_group' => 'Add information regarding the group',
  'group_information' => 'Group Information',
  'product' => 'Product',
  'name' => 'Name',
  'add_setting_group' => 'Add Setting Group',
  'export' => 'Export',
  'not_valid_array' => 'Not a valid array',
  'value_must_be_numeric' => 'Value must be numeric',
  'import' => 'Import',
  'download' => 'Download',
  'upload' => 'Upload',
  'select_file' => 'Select File',
  'valid_file_extensions' => 'Valid File Extensions',
  'import_export_settings' => 'Import/Export Settings',
  'product_does_not_have_any_settings' => 'Product does not have any settings.',
  'unable_load_cached_config_file' => 'Unable to load cached config file. Please be sure you are uploading the correct file.',
  'setting_imported' => '{total} setting(s) imported. Database is now up-to-date.',
  'nothing_new_import' => 'Nothing new to import. Your database is up-to-date.',
  'invalid_file_extension' => 'Invalid file extension.',
  'module_folder_already_exists' => 'Unable to use this module name. Module folder already exists.',
  'select_name_for_your_module' => 'Select a name for your module.',
  'provide_information_regarding_module' => 'Provide some information regarding the module',
  'module_name_already_used' => 'Module name is already being used. Select another name.',
  'create_module' => 'Create Module',
  'module_successfully_created' => 'Module successfully created. Create the following file structure for your module',
  'module_details' => 'Module Details',
  'add_menu' => 'Add to Menu',
  'yes' => 'Yes',
  'no' => 'No',
  'menu' => 'Menu',
  'phrase' => 'Phrase',
  'link' => 'Link',
  'add_more' => 'Add More',
  'unable_import_settings' => 'Unable to import settings. No product has been specified within the XML file.',
  'untouchables' => 'Untouchables',
  'phpfox_hidden_settings' => 'Hidden settings.',
  'or' => 'or',
  'file_unsupported' => 'Server does not support the file extension you are uploading.',
  'download_file_format' => 'Download File Format',
  'cached_cleared' => 'Cached cleared.',
  'clear_cache' => 'Clear Cache',
  'user_setting_can_clear_site_cache' => 'Can clear the sites cache.

By allowing a user to clear the sites cache they will be able to remove either SQL data or HTML templates. 

Note that once the page is refreshed these items will be re-cached, however it might be best to only allow Admins or developers to have access to this feature.',
  'data_size' => 'Data Size',
  'cached' => 'Cached On',
  'clear_selected' => 'Clear Selected',
  'clear_all' => 'Clear All',
  'cache_source' => 'Cache Source',
  'add_new_menu' => 'Add New Menu',
  'menu_successfully_added' => 'Menu successfully added.',
  'menu_details' => 'Menu Details',
  'module' => 'Module',
  'connection' => 'Connection',
  'menus' => 'Menus',
  'modules' => 'Modules',
  'url' => 'URL',
  'user_group_access' => 'User Group Access',
  'allow_access' => 'Allow Access',
  'menu_add_product' => 'Product this menu will belong to.',
  'core_module' => 'Is a Core Module',
  'sub_menu' => 'Sub Menu',
  'cms' => 'CMS',
  'user_group_manager' => 'User Group Manager',
  'add_user_group_setting' => 'Add User Group Setting',
  'manage_user_settings' => 'Manage User Settings',
  'users' => 'Users',
  'extensions' => 'Extensions',
  'create_new_module' => 'Create New Module',
  'language' => 'Language',
  'manage_language_packs' => 'Manage Language Packs',
  'phrase_manager' => 'Phrase Manager',
  'add_phrase' => 'Add Phrase',
  'language_import_export' => 'Import/Export',
  'settings' => 'Settings',
  'manage_setting_groups' => 'Manage Setting Groups',
  'add_new_setting' => 'Add New Setting',
  'add_new_setting_group' => 'Add New Setting Group',
  'maintenance' => 'Maintenance',
  'tools' => 'Tools',
  'update' => 'Update',
  'manage_user_groups' => 'Manage User Groups',
  'user_setting_has_admin_access' => 'Has general access to the Admin Control Panel.

Best to allow on Admins and Staff for security.',
  'install_dir_exists' => 'Install directory "install/" exists. Please delete this directory for security purposes.',
  'user_setting_can_add_new_block' => 'Can add/modify blocks being added from the AdminCP?',
  'blocks' => 'Blocks',
  'add_new_block' => 'Add New Block',
  'developer' => 'Developer',
  'log_query' => 'Log Query',
  'block_successfully_added' => 'Block successfully added.',
  'select_product' => 'Select a product.',
  'select_controller' => 'Select a controller.',
  'select_component' => 'Select a component.',
  'select_block_placement' => 'Select block placement.',
  'specify_block_active' => 'Specify if the block is active or not.',
  'user_setting_can_view_product_options' => 'Can view product drop downs in the AdminCP?

Within certain sections of the AdminCP there are areas where an entry into the database requires a product ID#. If you disable this feature users will not be able to view the products name and will automatically enter the default product ID#. 

Only enable this feature when creating a plug-in or 3rd party module.',
  'block_details' => 'Block Details',
  'controller' => 'Controller',
  'component' => 'Component',
  'placement' => 'Placement',
  'active' => 'Active',
  'view_sample_layout' => 'View Sample Layout',
  'sample_layout' => 'Sample Layout',
  'block' => 'Block {x}',
  'select' => 'Select',
  'manage_menus' => 'Manage Menus',
  'menu_successfully_deleted' => 'Menu successfully deleted.',
  'order' => 'Order',
  'location' => 'Location',
  'actions' => 'Actions',
  'edit' => 'Edit',
  'delete' => 'Delete',
  'menu_successfully_updated' => 'Menu successfully updated.',
  'menu_manager' => 'Menu Manager',
  'manage_blocks' => 'Manage Blocks',
  'successfully_deleted' => 'Successfully deleted.',
  'successfully_updated' => 'Successfully updated.',
  'block_manager' => 'Block Manager',
  'pages' => 'Pages',
  'add_new_page' => 'Add New Page',
  'page_menu_successfully_added' => 'Page and Menu successfully added.',
  'manage_pages' => 'Manage Pages',
  'add_component' => 'Add Component',
  'component_successfully_added' => 'Component successfully added!',
  'component_details' => 'Component Details',
  'url_connection' => 'URL Connection',
  'block_actual' => 'Block',
  'specify_component' => 'Specify a component.',
  'select_component_active' => 'Select if component is active.',
  'select_component_type' => 'Select a component type.',
  'menu_order_successfully_updated' => 'Menu order successfully updated.',
  'manage_modules' => 'Manage Modules',
  'core_modules' => 'Core Modules',
  'module_s_updated' => 'Module(s) updated.',
  'overwrite_default_data' => 'Overwrite default data',
  'user_setting_can_manage_modules' => 'Can manage product modules?

Note: This includes updating the status, editing or deleting modules.',
  'user_setting_can_add_new_modules' => 'Can add new product modules?',
  'module_successfully_deleted' => 'Module successfully deleted.',
  'admin_menu_manage_categories' => 'Manage Categories',
  'admin_menu_add_category' => 'Add New Category',
  'not_allowed_for_guests' => 'Not all options will work with this specific user group since it is marked as a "Guest" group and many features found within the site requires a user to be a member.',
  'admin_menu_add_article' => 'Add Article',
  'user_setting_bcaneditarticles' => 'Can edit articles?',
  'admin_menu_import_export' => 'Import Export',
  'products' => 'Product',
  'manage_products' => 'Manage Products',
  'create_new_product' => 'Create New Product',
  'import_export' => 'Import Products',
  'theme' => 'Theme',
  'manage_themes' => 'Manage Themes',
  'plugin' => 'Plugin',
  'manage_plugins' => 'Manage Plugins',
  'create_new_plugin' => 'Create New Plugin',
  'new_sample_test_phrase' => 'You have {total} comments.',
  'create_user_group' => 'Create User Group',
  'browse_members' => 'Browse Users',
  'country_management' => 'Country Management',
  'payment_gateways_menu' => 'Payment Gateways',
  'system_settings_menu' => 'System Settings',
  'menu_site_stats' => 'Site Stats',
  'menu_manage_stats' => 'Manage Stats',
  'menu_create_new_stat' => 'Add New Stat',
  'user_cancellation_options' => 'User Cancellation',
  'user_cancellation_options_add' => 'Add Options',
  'user_cancellation_options_manage' => 'Manage Options',
  'user_cancellations_feedback' => 'View Feedback',
  'mail_messages' => 'Messages',
  'view_messages' => 'View Private Messages',
  'menu_tools_emoticon_add' => 'Add Emoticon',
  'menu_tools_emoticon_package_add' => 'Add Package',
  'menu_tools_emoticon_package' => 'Manage Packages',
  'setting_cache_time_stamp' => '<title>Cache Time Stamp</title><info>Cache Time Stamp</info>',
  'menu_cache_manager' => 'Cache Manager',
  'cache_system_unlocked' => 'Cache system unlocked.',
  'timestamp' => 'Timestamp',
  'cache_name' => 'Cache Name',
  'module_successfully_updated' => 'Module successfully updated.',
  'module_successfully_created_redirect' => 'Module successfully created.',
  'select_what_type_of_a_hook_this_is' => 'Select what type of a hook this is.',
  'hook_successfully_added' => 'Hook successfully added.',
  'add_hook' => 'Add Hook',
  'provide_a_title_for_your_plugin' => 'Provide a title for your plugin.',
  'select_a_hook' => 'Select a hook.',
  'provide_php_code_for_your_plugin' => 'Provide PHP code for your plugin.',
  'plugin_successfully_updated' => 'Plugin successfully updated.',
  'plugin_successfully_added' => 'Plugin successfully added.',
  'create_plugin' => 'Create Plugin',
  'plugin_s_updated' => 'Plugin(s) updated.',
  'plugin_successfully_deleted' => 'Plugin successfully deleted.',
  'add_a_product_id' => 'Add a product ID.',
  'add_a_product_title' => 'Add a product title.',
  'product_dependency_updated' => 'Product dependency updated.',
  'product_install_uninstall_updated' => 'Product install/uninstall updated.',
  'product_successfully_updated' => 'Product successfully updated.',
  'product_successfully_created' => 'Product successfully created.',
  'editing_product' => 'Editing Product',
  'product_successfully_installed' => 'Product successfully installed.',
  'import_products' => 'Import Products',
  'product_s_updated' => 'Product(s) updated.',
  'product_successfully_deleted' => 'Product successfully deleted.',
  'your_search_did_not_return_any_results' => 'Your search did not return any results.',
  'stat_successfully_updated' => 'Stat successfully updated.',
  'stat_successfully_added' => 'Stat successfully added.',
  'add_new_stat' => 'Add New Stat',
  'manage_stats' => 'Manage Stats',
  'stat_successfully_deleted' => 'Stat successfully deleted.',
  'successfully_logged_out' => 'Successfully logged out.',
  'module_id_can_only_contain_the_following_characters' => 'Module ID can only contain the following characters: a-z, A-Z, 0-9.',
  'hook_already_exists' => 'Hook already exists.',
  'product_name_is_not_valid' => 'Product name is not valid.',
  'not_a_valid_product_to_import' => 'Not a valid product to import.',
  'not_a_valid_xml_file' => 'Not a valid XML file.',
  'product_already_exists' => 'Product already exists.',
  'product_requires_php_version' => 'Product requires PHP version {dependency_start}.',
  'product_requires_php_version_up_until' => 'Product requires PHP version {dependency_start} up until {dependency_end}.',
  'product_requires_phpfox_version' => 'Product requires version {dependency_start}.',
  'product_requires_phpfox_version_up_until' => 'Product requires version {dependency_start} up until {dependency_end}.',
  'product_requires_check_id_version_dependency_start' => 'Product requires {check_id} version {dependency_start}.',
  'product_requires_check_id_version_dependency_start_up_until_dependency_end' => 'Product requires {check_id} version {dependency_start} up until {dependency_end}.',
  'main_configuration_file_file_path_is_writable' => 'Main configuration file ({file_path}) is writable. This is a security risk and this file should not have any "write" permission.',
  'main_file_folder_is_writable_file_path' => 'Main file folder is writable ({file_path}). This is a security risk and this folder should not have any "write" permission.',
  'none_site_wide' => 'None (Site Wide)',
  'can_drag_drop' => 'Can Drag/Drop',
  'site_wide' => 'Site Wide',
  'block_block_number' => 'Block {block_number}',
  'cache_system_is_locked' => 'Cache system is locked.',
  'the_cache_system_is_locked_during_an_operation_that_requires_all_cache_files_to_be_kept_in_place' => 'The cache system is locked during an operation that requires all cache files to be kept in place. If you would like to unlock the system click <a href="{link}" onclick="return confirm(\'Are you sure?\');">here</a>.',
  'cache_stats' => 'Cache Stats',
  'total_files' => 'Total Files',
  'cache_size' => 'Cache Size',
  'last_cached_file' => 'Last Cached File',
  'search_filter' => 'Search Filter',
  'search' => 'Search',
  'display' => 'Display',
  'sort' => 'Sort',
  'files' => 'Files',
  'no_cache_date_found' => 'No cache date found.',
  'or_select_a_page' => 'or select a page',
  'module_id' => 'Module ID',
  'hook_details' => 'Hook Details',
  'call' => 'Call',
  'save' => 'Save',
  'plugin_details' => 'Plugin Details',
  'hook' => 'Hook',
  'php_code' => 'PHP Code',
  'create_a_new_plugin' => 'Create a New Plugin',
  'product_details' => 'Product Details',
  'product_id' => 'Product ID',
  'description' => 'Description',
  'version' => 'Version',
  'product_url' => 'Product URL',
  'version_check_url' => 'Version Check URL',
  'existing_product_dependencies' => 'Existing Product Dependencies',
  'dependencies' => 'Dependencies',
  'dependency_type' => 'Dependency Type',
  'compatibility_starts' => 'Compatibility Starts',
  'incompatible_with' => 'Incompatible With',
  'add_new_product_dependency' => 'Add New Product Dependency',
  'php' => 'PHP',
  'phpfox_version' => 'Core Version',
  'compatibility_starts_with_version' => 'Compatibility Starts with Version',
  'compatibility_end_with_version' => 'Compatibility End with Version',
  'install_uninstall' => 'Install/Uninstall',
  'existing_install_uninstall_code' => 'Existing Install/Uninstall Code',
  'install_code' => 'Install Code',
  'uninstall_code' => 'Uninstall Code',
  'add_new_install_uninstall_code' => 'Add New Install/Uninstall Code',
  'install' => 'Install',
  'uninstall' => 'Uninstall',
  'overwrite' => 'Overwrite',
  'ftp_support_must_be_enabled_in_order_to_import_products' => 'FTP support must be enabled in order to import products.',
  'click_a_href_url_link_admincp_setting_edit_group_id_ftp_here_a_to_enable_ftp_support' => 'Click <a href="{link}">here</a> to enable FTP support.',
  'create_a_new_product' => 'Create a New Product',
  'import_a_product' => 'Import a Product',
  'no_products_have_been_added' => 'No products have been added.',
  'image' => 'Image',
  'your_current_watermark_image' => 'Your current watermark image',
  'b_notice_b_advised_image_is_a_transparent_png_with_a_max_width_height_of_52_pixels' => '<b>Notice:</b> Advised image is a transparent PNG with a max width/height of 52 pixels.',
  'you_can_upload_a_jpg_gif_or_png_file' => 'You can upload a JPG, GIF or PNG file.',
  'stat_details' => 'Stat Details',
  'stats' => 'Stats',
  'are_you_sure' => 'Are you sure?',
  'activate' => 'Activate',
  'deactivate' => 'Deactivate',
  'admincp_login' => 'AdminCP Login',
  'email' => 'Email',
  'password' => 'Password',
  'back_to_site' => 'Back to site',
  'login' => 'Login',
  'active_admins' => 'Active Admins',
  'latest_admin_logins' => 'Latest Admin Logins',
  'view_more' => 'View More',
  'phpfox_news_and_updates' => 'Corporate News &amp; Updates',
  'admincp_notes' => 'AdminCP Notes',
  'quick_links' => 'Quick Links',
  'members' => 'Members',
  'guests' => 'Guests',
  'online' => 'Online',
  'pending_approval' => 'Pending Approval',
  'reported_items_users' => 'Reported Items/Users',
  'spam' => 'Spam',
  'site_statistics' => 'Site Statistics',
  'phpfox_tweets' => 'Corporate Tweets',
  'not_a_valid_country' => 'Not a valid country.',
  'state_province_successfully_updated' => 'State/Province successfully updated.',
  'state_province_successfully_added' => 'State/Province successfully added.',
  'country_manager' => 'Country Manager',
  'adding_state_province' => 'Adding State/Province',
  'editing_state_province' => 'Editing State/Province',
  'state_province_successfully_deleted' => 'State/Province successfully deleted.',
  'states_provinces' => 'States/Provinces',
  'country_successfully_updated' => 'Country successfully updated.',
  'country_successfully_added' => 'Country successfully added.',
  'add_a_country' => 'Add a Country',
  'editing_country' => 'Editing Country',
  'text_import_successfully_completed' => 'Text import successfully completed. Success: {completed} - Failed: {failed}.',
  'import_successfully_completed' => 'Import successfully completed.',
  'import_countries_states_provinces' => 'Import Countries, States & Provinces',
  'country_successfully_deleted' => 'Country successfully deleted.',
  'phpfox_branding_removal_successfully_installed' => 'Branding removal successfully installed.',
  'phpfox_branding_removal' => 'Branding Removal',
  'login_time_stamp' => 'Login Time Stamp',
  'ip_address' => 'IP Address',
  'online_guests' => 'Online Guests',
  'admincp_logins' => 'AdminCP Logins',
  'last_activity' => 'Last Activity',
  'guests_bots' => 'Guests/Bots',
  'php_info' => 'PHP Info',
  'system' => 'System',
  'system_overview' => 'System Overview',
  'customize_dashboard' => 'Customize Dashboard',
  'not_a_valid_login_log' => 'Not a valid login log.',
  'not_a_valid_account' => 'Not a valid account.',
  'email_failure' => 'Email failure.',
  'password_failure' => 'Password failure.',
  'success' => 'Success',
  'provide_a_category_name' => 'Provide a category name.',
  'provide_a_name' => 'Provide a name.',
  'select_a_country' => 'Select a country.',
  'the_state_province_name_already_exists' => 'The state/province "{name}" already exists.',
  'all_fields_are_required' => 'All fields are required.',
  'iso_can_only_contain_2_characters' => 'ISO can only contain 2 characters.',
  'the_iso_is_already_in_use' => 'The ISO is already in use.',
  'not_a_valid_country_package' => 'Not a valid country package.',
  'select_a_product' => 'Select a product.',
  'select_a_module' => 'Select a module.',
  'at_least_one_title_for_the_stat_is_required' => 'At least one title for the stat is required.',
  'link_for_the_stat_is_required' => 'Link for the stat is required.',
  'image_for_the_stat_is_required' => 'Image for the stat is required.',
  'php_code_for_the_stat_is_required' => 'PHP code for the stat is required.',
  'select_if_the_stat_is_active_or_not' => 'Select if the stat is active or not.',
  'not_a_valid_request' => 'Not a valid request.',
  'the_stat_you_are_looking_for_cannot_be_found' => 'The stat you are looking for cannot be found.',
  'unable_to_find_the_stat_you_want_to_edit' => 'Unable to find the stat you want to edit.',
  'php_version' => 'PHP Version',
  'php_sapi' => 'PHP Sapi',
  'php_safe_mode' => 'PHP safe_mode',
  'php_open_basedir' => 'PHP open_basedir',
  'php_disabled_functions' => 'PHP Disabled Functions',
  'php_loaded_extensions' => 'PHP Loaded Extensions',
  'operating_system' => 'Operating System',
  'server_time_stamp' => 'Server Time Stamp',
  'gzip' => 'GZIP',
  'sql_driver_version' => 'SQL Driver Version',
  'sql_slave_enabled' => 'SQL Slave Enabled',
  'sql_total_slaves' => 'SQL Total Slaves',
  'sql_slave_server' => 'SQL Slave Server',
  'memory_limit' => 'Memory Limit',
  'load_balancing_enabled' => 'Load Balancing Enabled',
  'none' => 'None',
  'enabled' => 'Enabled',
  'disabled' => 'Disabled',
  'n_a' => 'N/A',
  'total_server_memory' => 'Total Server Memory',
  'available_server_memory' => 'Available Server Memory',
  'current_server_load' => 'Current Server Load',
  'your_ftp_path_is_empty_and_does_not_need_to_have_any_value' => 'Your FTP path is "empty" and does not need to have any value.',
  'ftp_details' => 'FTP Details',
  'ftp_host' => 'FTP Host',
  'ftp_username' => 'FTP Username',
  'ftp_password' => 'FTP Password',
  'admincp_login_log' => 'AdminCP Login Log',
  'view_attempt' => 'View Attempt',
  'cancel' => 'Cancel',
  'posted_on_time_stamp_by_creator' => 'Posted on {time_stamp} by {creator}.',
  'find_users' => 'Find Users',
  'go' => 'Go',
  'manage_user_group_settings' => 'Manage User Group Settings',
  'edit_user_groups' => 'Edit User Groups',
  'edit_system_settings' => 'Edit System Settings',
  'send_newsletter' => 'Send Newsletter',
  'write_an_announcement' => 'Write an Announcement',
  'posted_on_time_stamp' => 'Posted on {time_stamp}.',
  'log_details' => 'Log Details',
  'attempt' => 'Attempt',
  'user' => 'User',
  'time_stamp' => 'Time Stamp',
  'referrer' => 'Referrer',
  'user_agent' => 'User Agent',
  'security_token' => 'Security Token',
  'close' => 'Close',
  'state_province_details' => 'State/Province Details',
  'country' => 'Country',
  'manage' => 'Manage',
  'country_details' => 'Country Details',
  'iso' => 'ISO',
  'import_country_package' => 'Import Country Package',
  'file' => 'File',
  'import_text_file' => 'Import Text File',
  'you_can_upload_a_text_file_with_a_list' => 'You can upload a text file with a list of states/provinces that you would like to import and each state/province should be on a new line.',
  'countries' => 'Countries',
  'add_state_province' => 'Add State/Province',
  'manage_states_provinces' => 'Manage States/Provinces',
  'login_with_your_phpfox_client_details' => 'Login with your phpFox client details in order to install the <i>branding removal</i>.',
  'phpfox_client_login_details' => 'phpFox Client Login Details',
  'client_email' => 'Client Email',
  'client_password' => 'Client Password',
  'admins' => 'Admins',
  'banned' => 'Banned',
  'unban' => 'Unban',
  'ban' => 'Ban',
  'no_guests_online' => 'No guests online.',
  'server_overview' => 'Server Overview',
  'you_are_about_to_leave_our_site_to_visit' => 'You are about to leave our site to visit: <a href="{link}">{link}</a>',
  'click_here_to_continue' => 'Click here to continue.',
  'note_we_are_in_no_way_affiliated' => '<strong>Note:</strong> We are in no way affiliated to "{link}".',
  'controllers' => 'Controllers',
  'php_block_file' => 'PHP Block File',
  'html_code' => 'HTML Code',
  'not_a_valid_ip_address' => 'Not a valid IP address.',
  'ip_information' => 'IP Information',
  'host_address' => 'Host Address',
  'view_all_the_activity_from_this_ip' => 'View all the activity from this IP.',
  'search_ip_address' => 'Search IP Address',
  'admincp_menu_reparser' => 'Reparser',
  'edit_this_block' => 'Edit this Block',
  'remove_this_block' => 'Remove this Block',
  'remove_duplicates' => 'Remove Duplicates',
  'parsing_completed' => 'Parsing completed.',
  'text_reparser' => 'Text Reparser',
  'reparser' => 'Reparser',
  'parsing_page_current_total_please_hold' => 'Parsing page {current}/{total}. Please hold...',
  'text_data' => 'Text Data',
  'records' => 'Records',
  'there_is_no_data_to_parse' => 'There is no data to parse.',
  'successfully_removed_duplicate_entries' => 'Successfully removed duplicate entries.',
  'user_group_settings' => 'User Group Settings',
  'check' => 'Check',
  'custom_field' => 'Custom Field',
  'admincp_name_not_allowed' => 'AdminCP name not allowed',
  'large_string' => 'Large String',
  'enable_utf_encoding' => 'Enable UTF Encoding',
  'sql' => 'SQL',
  'sql_maintenance' => 'Maintenance',
  'table_s_successfully_optimized' => 'Table(s) successfully optimized.',
  'table_s_successfully_repaired' => 'Table(s) successfully repaired.',
  'sql_maintenance_title' => 'SQL Maintenance',
  'database_size' => 'Database Size',
  'overhead' => 'Overhead',
  'total_tables' => 'Total Tables',
  'sql_tables' => 'SQL Tables',
  'table' => 'Table',
  'size' => 'Size',
  'optimize_table_s' => 'Optimize Table(s)',
  'repair_table_s' => 'Repair Table(s)',
  'sql_backup' => 'Backup',
  'sql_backup_successfully_created_and_can_be_downloaded_here_path' => 'SQL backup successfully created and can be downloaded here: {path}',
  'the_path_you_provided_is_not_a_valid_directory' => 'The path you provided is not a valid directory.',
  'backup' => 'Backup',
  'sql_backup_header' => 'SQL Backup',
  'path' => 'Path',
  'provide_the_full_path_to_where_we_should_save_the_sql_backup' => 'Provide the full path to where we should save the SQL backup.',
  'your_operating_system_does_not_support_the_method_of_backup_we_provide' => 'Your operating system does not support the method of backup we provide. We advice you contact your host and ask the best method to backup your database as most hosting companies provide these options from a hosting control panel (eg. cPanel, Plesk etc...).',
  'today_s_site_stats' => 'Today\'s Site Stats',
  'counters' => 'Counters',
  'update_of_counter_successfully_completed' => 'Update of counter successfully completed.',
  'update_counters' => 'Update Counters',
  'updating_counters_processing_page_current_out_of_page' => 'Updating counters. Processing page {current} out of {page}.',
  'unable_to_find_xml_file_to_import_for_this_product' => 'Unable to find XML file to import for this product.',
  'the_module_name_is_required' => 'The module "{name}" is required.',
  'product_successfully_upgraded' => 'Product successfully upgraded.',
  'upgrade' => 'Upgrade',
  'upgrade_upgrade_version' => 'Upgrade ({upgrade_version})',
  'not_a_valid_product_to_upgrade' => 'Not a valid product to upgrade. It does not exist in our database.',
  'latest' => 'Latest',
  'module_successfully_installed' => 'Module successfully installed.',
  'install_this_module' => 'Install this Module',
  'menu_block' => 'Menu Block',
  'parent_menu' => 'Parent Menu',
  'manage_children_total_children' => 'Manage Children ({total_children})',
  'editing' => 'Editing',
  'country_child_entries_successfully_deleted' => 'Country child entries successfully deleted.',
  'show_price' => 'Show Price',
  'manage_components' => 'Manage Components',
  'component_successfully_updated' => 'Component successfully updated.',
  'editing_component' => 'Editing Component',
  'component_successfully_deleted' => 'Component successfully deleted.',
  'components' => 'Components',
  'checking_the_following_modules_for_missing_settings' => 'Checking the following modules for missing settings',
  'missing_settings_successfully_imported' => 'Missing settings successfully imported.',
  'missing_settings' => 'Missing Settings',
  'find_missing_settings' => 'Find Missing Settings',
  'provide_a_3_character_currency_id' => 'Provide a 3 character currency ID.',
  'provide_a_symbol' => 'Provide a symbol.',
  'provide_a_phrase_for_your_currency' => 'Provide a phrase for your currency.',
  'select_if_this_currency_is_active_or_not' => 'Select if this currency is active or not.',
  'this_currency_is_already_in_use' => 'This currency is already in use.',
  'currency_successfully_deleted' => 'Currency successfully deleted.',
  'id' => 'ID',
  'symbol' => 'Symbol',
  'currency' => 'Currency',
  'default' => 'Default',
  'set_as_default' => 'Set as Default',
  'currency_successfully_updated' => 'Currency successfully updated.',
  'currency_successfully_added' => 'Currency successfully added.',
  'add_currency' => 'Add Currency',
  'currency_details' => 'Currency Details',
  'currency_id' => 'Currency ID',
  'is_active' => 'Is Active',
  'foxporter' => 'Foxporter',
  'action' => 'Action',
  'importing_data' => 'Importing Data',
  'refresh' => 'Refresh',
  'continue_to_the_next_step' => 'Continue to the next step...',
  'start_importing' => 'Start Importing',
  'not_a_valid_country_package_must_be_an_xml_file' => 'Not a valid country package. Must be an XML file.',
  'alter_title_fields' => 'Alter Title Fields',
  'database_tables_updated' => 'Database tables updated.',
  'b_notice_b_this_routine_is_highly_experimental' => '<b>Notice:</b> This routine is highly experimental.',
  'all_items_on_the_site_store_certain_information_in_the_database' => 'All items on the site store certain information in the database. Some of this information are the titles of items. By default these fields that store the items title have a limit of 255 characters, which with alphanumeric characters is a lot. However, if using non-latin characters this might not be enough and titles are cut short. This reason for this is we convert non-latin characters before they are added into the database so when they are outputted everyone can view these characters irregardless of what character-set they have. Using the tool found on this page you can enlarge these fields to store a maximum of 65,535 characters.',
  'update_database_tables' => 'Update Database Tables',
  'you_have_logged_out_of_the_site' => 'You have logged out of the site. Redirecting you to the login page...',
  'missing_api_key' => 'Missing API Key',
  'enter_your_api_key' => 'Enter your API key <a href="{link}">here</a> for additional IP information.',
  'city' => 'City',
  'zip_postal_code' => 'ZIP / Postal Code',
  'latitude' => 'Latitude',
  'longitude' => 'Longitude',
  'inactive_member_reminder' => 'Inactive Member Reminder',
  'inactive_members' => 'Inactive Members',
  'update_privacy_for_v3_upgrade' => 'Update Privacy for v3 Upgrade<b> (Only run this if you have just upgraded to v3 and make sure to only run this once.)</b>',
  'import_groups_from_v2_to_v3_pages' => 'Import Groups from v2 to v3 Pages<b> (Only run this if you have just upgraded to v3 and make sure to only run this once.)</b>',
  'nofollow_urls' => 'NoFollow URLs',
  'add_new_url' => 'Add New URL',
  'provide_the_full_url_to_the_page' => 'Provide the full URL to the page you wish to add a <a href="http://support.google.com/webmasters/bin/answer.py?hl=en&amp;answer=96569" target="_blank">rel="nofollow"</a>.',
  'urls' => 'URLs',
  'successfully_added_a_new_url' => 'Successfully added a new URL.',
  'provide_a_url' => 'Provide a URL.',
  'successfully_added_a_new_meta_tag' => 'Successfully added a new meta tag.',
  'keyword' => 'Keyword',
  'custom_meta_tags' => 'Custom Meta Tags',
  'add_new_meta' => 'Add New Meta',
  'separate_keywords_with_commas' => 'Separate keywords with commas.',
  'meta_keyword_descriptions' => 'Meta Keyword/Descriptions',
  'provide_the_full_url_to_add_your_custom_meta_keywords_or_descriptions' => 'Provide the full URL to add your custom meta keywords or descriptions.',
  'seo' => 'SEO',
  'to_your_left_you_will_find_all_the_available' => 'To your left you will find all the available controllers that have blocks associated with them. Once you click on a controller it will list all the blocks and from there you can drag/drop	to order the positioning of each block. You can also "Enable DnD Mode", which will allow you to visually browse the site and drag/drop blocks as well as add new blocks on the spot.',
  'enable_dnd_mode' => 'Enable DnD Mode',
  'admincp_priacy_control' => 'AdminCP Privacy Control',
  'add_new_privacy_rule' => 'Add New Privacy Rule',
  'provide_full_path' => 'Provide the full path to the URL you wish to add this rule to. We will then convert it to work with our internal URL system.',
  'user_groups' => 'User Groups',
  'select_a_user_group_this_rule_should_apply_to' => 'Select a user group this rule should apply to.',
  'wildcard' => 'Wildcard',
  'option_sub_section' => 'Enable this option if you wish to apply this rule to all sub-sections.',
  'rules' => 'Rules',
  'there_are_no_privacy_rules_at_the_moment' => 'There are no privacy rules at the moment.',
  'provide_atleast_one_user_group_for_this_rule' => 'Provide atleast one user group for this rule.',
  'general' => 'General',
  'admincp_privacy' => 'AdminCP Privacy',
  'save_your_notes_here' => 'Save your notes here...',
  'fix_birthdays' => 'Fix Birthdays',
  'custom_elements' => 'Custom Elements',
  'custom_group_support' => 'Support',
); ?>