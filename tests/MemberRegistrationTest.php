<?php


use PHPUnit\Framework\TestCase;
use Inc\Members\MemberRegistration;

class MemberRegistrationTest extends TestCase {
	
	public function test_register_member() {
		// Create a new instance of the MemberRegistration class
		$member_registration = new MemberRegistration();
		
		// Define the test data
		$data = [
			'username' => 'testuser',
			'email' => 'testuser@example.com',
		];
		
		// Call the register_member method with the test data
		$result = $member_registration->register_member($data);
		
		// Check that the returned message is correct
		$this->assertArrayHasKey('message', $result);
		$this->assertEquals('Member account created successfully.', $result['message']);
	}
}
