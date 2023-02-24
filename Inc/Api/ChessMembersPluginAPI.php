<?php

namespace Inc\API;

use WP_REST_Request;
use Inc\Members\MemberRegistration;

class ChessMembersPluginAPI {
	
	public function register() {
		add_action('rest_api_init', array($this, 'register_routes'));
	}
	public function register_routes() {
		register_rest_route('chess-members-plugin/v1', '/register', array(
			'methods' => 'POST',
			'callback' => array($this, 'register_member'),
			'permission_callback' => '__return_true'
		));
	}
	
	public function register_member(WP_REST_Request $request) {
		$member_registration = new MemberRegistration();
		$response = $member_registration->register_member($request->get_params());
		return rest_ensure_response($response);
	}
}