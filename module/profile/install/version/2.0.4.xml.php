<upgrade>
	<phrases>
		<phrase>
			<module_id>profile</module_id>
			<version_id>2.0.4</version_id>
			<var_name>wall</var_name>
			<added>1267545418</added>
			<value>Wall</value>
		</phrase>
		<phrase>
			<module_id>profile</module_id>
			<version_id>2.0.4</version_id>
			<var_name>info</var_name>
			<added>1267545427</added>
			<value>Info</value>
		</phrase>
	</phrases>
	<hooks>
		<hook>
			<module_id>profile</module_id>
			<hook_type>controller</hook_type>
			<module>profile</module>
			<call_name>profile.component_controller_index_mobile_clean</call_name>
			<added>1267629983</added>
			<version_id>2.0.4</version_id>
			<value />
		</hook>
		<hook>
			<module_id>profile</module_id>
			<hook_type>controller</hook_type>
			<module>profile</module>
			<call_name>profile.component_controller_info_mobile_clean</call_name>
			<added>1267629983</added>
			<version_id>2.0.4</version_id>
			<value />
		</hook>
	</hooks>
	<update_templates>
		<file type="block">info.html.php</file>
	</update_templates>
</upgrade>