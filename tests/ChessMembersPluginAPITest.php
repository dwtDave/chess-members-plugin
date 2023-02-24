<?php

use Inc\API\ChessMembersPluginAPI;


class ChessMembersPluginAPIRoutesTest extends WP_UnitTestCase {
	
	
	public function setUp(): void {
		parent::setUp();
		
		global $wp_rest_server;
		$this->server = $wp_rest_server = new WP_REST_Server;
		do_action( 'rest_api_init' );
		
		$this->api = new ChessMembersPluginAPI();
		$this->api_route = '/chess-members-plugin/v1/register';
	}
	
	public function test_route_exists() {
		$request = new WP_REST_Request( 'OPTIONS', $this->api_route );
		$response = $this->server->dispatch( $request );
		
		$this->assertEquals( 200, $response->get_status() );
	}
	
	
	
	public function test_route_is_registered() {
		$routes = $this->server->get_routes();
		$this->assertArrayHasKey( '/chess-members-plugin/v1/register', $routes );
		$this->assertArrayHasKey('methods', $routes['chess-members-plugin/v1/register']);
		$this->assertContains('POST', $routes['chess-members-plugin/v1/register']['methods']);
	}


}

