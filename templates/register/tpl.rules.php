<?php 
/**
 * @var PC_plugin_site_users_registration_register_widget $this
 * @var string $tpl_group
 * @var bool $edit
 * @var PC_site_user_model $site_user_model
 */

$site_user_model->add_filter(array (
	'field' => 'email',
	'filter' => 'trim',
));

$site_user_model->add_rule(array (
	'field' => 'retyped_password',
	'rule' => 'same_as',
	'extra' => 'password',
	'message' => 'input_error_retyped_password'
));

if (!$this->_config['edit']) {
	$site_user_model->add_rule(array (
		'field' => 'terms_and_conditions',
		'rule' => 'required'
	));
}
