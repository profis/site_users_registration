<?php

function site_users_registration_install($controller) {
	global $core;
	
	$plugin_name = 'site_users_registration';
	
	$core->Set_variable_if('lt', 'registration_activation', 'Aktyvacija', $plugin_name);
	$core->Set_variable_if('en', 'registration_activation', 'Activation', $plugin_name);
	$core->Set_variable_if('ru', 'registration_activation', 'Активация', $plugin_name);
	
	$core->Set_variable_if('lt', 'activation_successful', 'Aktyvacija sėkminga', $plugin_name);
	$core->Set_variable_if('en', 'activation_successful', 'Activation successful', $plugin_name);
	$core->Set_variable_if('ru', 'activation_successful', 'Поздравляем!<br />Счет подтвердил успешно.', $plugin_name);
	
	$core->Set_variable_if('lt', 'activation_unsuccessful', 'Aktyvacija nesėkminga', $plugin_name);
	$core->Set_variable_if('en', 'activation_unsuccessful', 'Activation unsuccessful', $plugin_name);
	$core->Set_variable_if('ru', 'activation_unsuccessful', 'Счет подтверждение не удалось.', $plugin_name);
	
	return true;
}