<?php
use PHPUnit\Framework\TestCase;


class PluginTest extends TestCase {
	public function test_activation_hook_registered() {
		$hooks = $GLOBALS['wp_filter']['activate_' . plugin_basename(dirname(dirname(__FILE__))) . '/chess-members-plugin.php'];
		$this->assertNotEmpty($hooks);
		$this->assertTrue(isset($hooks[10]['activate_chess_members_plugin']));
	}

}
