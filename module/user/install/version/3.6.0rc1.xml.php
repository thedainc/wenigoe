<upgrade>
	<settings>
		<setting>
			<group>cache</group>
			<module_id>user</module_id>
			<is_hidden>0</is_hidden>
			<type>boolean</type>
			<var_name>cache_featured_users</var_name>
			<phrase_var_name>setting_cache_featured_users</phrase_var_name>
			<ordering>1</ordering>
			<version_id>3.6.0rc1</version_id>
			<value>0</value>
		</setting>
		<setting>
			<group>cache</group>
			<module_id>user</module_id>
			<is_hidden>0</is_hidden>
			<type>boolean</type>
			<var_name>cache_user_inner_joins</var_name>
			<phrase_var_name>setting_cache_user_inner_joins</phrase_var_name>
			<ordering>2</ordering>
			<version_id>3.6.0rc1</version_id>
			<value>0</value>
		</setting>
		<setting>
			<group>cache</group>
			<module_id>user</module_id>
			<is_hidden>0</is_hidden>
			<type>integer</type>
			<var_name>cache_recent_logged_in</var_name>
			<phrase_var_name>setting_cache_recent_logged_in</phrase_var_name>
			<ordering>3</ordering>
			<version_id>3.6.0rc1</version_id>
			<value>0</value>
		</setting>
		<setting>
			<group>cache</group>
			<module_id>user</module_id>
			<is_hidden>0</is_hidden>
			<type>boolean</type>
			<var_name>disable_store_last_user</var_name>
			<phrase_var_name>setting_disable_store_last_user</phrase_var_name>
			<ordering>4</ordering>
			<version_id>3.6.0rc1</version_id>
			<value>0</value>
		</setting>
	</settings>
	<phrases>
		<phrase>
			<module_id>user</module_id>
			<version_id>3.6.0rc1</version_id>
			<var_name>setting_cache_featured_users</var_name>
			<added>1371724982</added>
			<value><![CDATA[<title>Featured Users</title><info>This caches the list of featured users.</info>]]></value>
		</phrase>
		<phrase>
			<module_id>user</module_id>
			<version_id>3.6.0rc1</version_id>
			<var_name>setting_cache_user_inner_joins</var_name>
			<added>1371726974</added>
			<value><![CDATA[<title>Cache Users SQL INNER JOINS</title><info>Cache users INNER JOINS to stop querying the database for user details.</info>]]></value>
		</phrase>
		<phrase>
			<module_id>user</module_id>
			<version_id>3.6.0rc1</version_id>
			<var_name>setting_cache_recent_logged_in</var_name>
			<added>1371731813</added>
			<value><![CDATA[<title>Cache Recent Logins</title><info>Cache the users that have recently logged in. Setting is in minutes.</info>]]></value>
		</phrase>
		<phrase>
			<module_id>user</module_id>
			<version_id>3.6.0rc1</version_id>
			<var_name>setting_disable_store_last_user</var_name>
			<added>1371732187</added>
			<value><![CDATA[<title>Disable Last Time Stamp for Users</title><info>If enabled we don&#039;t store the last time a user visits the site.</info>]]></value>
		</phrase>
	</phrases>
</upgrade>