<?php

$thisPath =  dirname(__FILE__) . '/';
$clsPath = dirname(__FILE__).'/classes/';

Register_class_autoloader('PC_plugin_site_users_registration_widget', $thisPath . 'widgets/PC_plugin_site_users_registration_widget.php');
Register_class_autoloader('PC_plugin_site_users_registration_register_widget', $thisPath . 'widgets/PC_plugin_site_users_registration_register_widget.php');
