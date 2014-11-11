<?php

abstract class PC_plugin_site_users_registration_widget extends PC_widget {
	
	public $plugin_name = 'site_users_registration';
	
	public function Init($config = array()) {
		parent::Init($config);
		if (strpos($this->_template_group, ':_plugin/') === false) {
			$this->_template_group = ':_plugin/' . $this->plugin_name . '/' . $this->_template_group;
		}
	}
	
}