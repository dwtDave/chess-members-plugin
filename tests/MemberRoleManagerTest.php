<?php


use Inc\Members\MemberRoleManager;

class UserRoleManagerTest extends WP_UnitTestCase {
	public function test_add_roles() {
		$roles = array(
			'member_admin' => __('Member Administrator'),
			'member' => __('Member'),
			'member_junior' => __('Junior Member'),
			'member_discount' => __('Discount Member')
		);
		
		// Ensure that each role is added successfully
		foreach ($roles as $role_name => $role_label) {
			add_role($role_name, $role_label);
			$this->assertTrue(get_role($role_name) instanceof \WP_Role);
		}
		
		// Remove the roles so they can be added again in the test
		remove_role('member_admin');
		remove_role('member');
		remove_role('member_junior');
		remove_role('member_discount');
		
		// Call the add_roles method and ensure that each role is added successfully
		MemberRoleManager::add_roles();
		foreach ($roles as $role_name => $role_label) {
			$this->assertTrue(get_role($role_name) instanceof \WP_Role);
		}
	}
}