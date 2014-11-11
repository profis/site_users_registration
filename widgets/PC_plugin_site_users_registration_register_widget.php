<?php

class PC_plugin_site_users_registration_register_widget extends PC_plugin_site_users_registration_widget {
	
	protected $_template_group = 'register';
	
	protected function _get_default_config() {
		return array(
			'edit' => false
		);
	}
	
	public function get_data() {
		$data = array(
		
		);
		return $data;
	}
}