<?php
namespace Inc\Base;

use Inc\Members\MemberRoleManager;

class Activation {
	public static function activate() {
		MemberRoleManager::add_roles();
	}
}