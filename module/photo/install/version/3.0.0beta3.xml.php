<upgrade>
	<settings>
		<setting>
			<group />
			<module_id>photo</module_id>
			<is_hidden>0</is_hidden>
			<type>boolean</type>
			<var_name>view_photos_in_theater_mode</var_name>
			<phrase_var_name>setting_view_photos_in_theater_mode</phrase_var_name>
			<ordering>1</ordering>
			<version_id>3.0.0beta3</version_id>
			<value>1</value>
		</setting>
	</settings>
	<phrases>
		<phrase>
			<module_id>photo</module_id>
			<version_id>3.0.0beta3</version_id>
			<var_name>setting_view_photos_in_theater_mode</var_name>
			<added>1316011101</added>
			<value><![CDATA[<title>View Photos in Theater Mode</title><info>In several areas where we display photos, when a user clicks on the photo they will be able to view the photo on the spot in what we call "Theater Mode" if this option is enabled.</info>]]></value>
		</phrase>
	</phrases>
	<phpfox_update_user_group_settings>
		<setting>
			<is_admin_setting>0</is_admin_setting>
			<module_id>photo</module_id>
			<type>array</type>
			<admin><![CDATA[s:33:"array('18','21','24','60','100');";]]></admin>
			<user><![CDATA[s:33:"array('18','21','24','60','100');";]]></user>
			<guest><![CDATA[s:33:"array('18','21','24','60','100');";]]></guest>
			<staff><![CDATA[s:33:"array('18','21','24','60','100');";]]></staff>
			<module>photo</module>
			<ordering>0</ordering>
			<value>total_photos_displays</value>
		</setting>
	</phpfox_update_user_group_settings>
	<sql><![CDATA[a:1:{s:7:"ADD_KEY";a:1:{s:18:"phpfox_photo_album";a:1:{s:9:"view_id_4";a:2:{i:0;s:5:"INDEX";i:1;a:3:{i:0;s:7:"view_id";i:1;s:7:"privacy";i:2;s:11:"total_photo";}}}}}]]></sql>
</upgrade>