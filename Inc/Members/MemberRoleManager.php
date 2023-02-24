<?php

namespace Inc\Members;

class MemberRoleManager {
	
	public static function add_roles() {
		$roles = array(
			'member_admin' => __('Member Administrator'),
			'member' => __('Member'),
			'member_junior' => __('Junior Member'),
			'member_discount' => __('Discount Member')
		);
		
		foreach ($roles as $role_name => $role_label) {
			$result = add_role(
				$role_name,
				$role_label,
				array(
					'read' => true,
					'edit_posts' => true,
					'delete_posts' => true,
					'publish_posts' => true,
					'upload_files' => true
				)
			);
			
			if (null !== $result) {
				error_log('Role ' . $role_name . ' created successfully');
			}
			else {
				error_log('Role ' . $role_name . ' failed to create');
			}
		}
	}
}
