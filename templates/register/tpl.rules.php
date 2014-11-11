<?php 


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


$this->debug('Filters:', 3);
$this->debug($site_user_model->get_filters(), 4);

$this->debug('Rules:', 3);
$this->debug($site_user_model->get_rules(), 4);

?>

