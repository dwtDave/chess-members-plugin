<?php

namespace Inc\Members;

class MemberRegistration {
	public function register_member($data) {
		// Extract relevant data from request body
		$username = sanitize_user($data['username']);
		$email = sanitize_email($data['email']);
		$password = wp_generate_password(12);
		
		// Create new user account with role 'subscriber'
		$user_id = wp_create_user($username, $password, $email);
		
		if (is_wp_error($user_id)) {
			// Handle error
			return $user_id;
		}
		
		// Disable the account by default
		update_user_meta($user_id, 'account_status', 'disabled');
		
		return ['message' => 'Member account created successfully.'];
	}
}