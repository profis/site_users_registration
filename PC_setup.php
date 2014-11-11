<?php

function site_users_registration_install($controller) {
	global $core;
	
	$plugin_name = 'site_users_registration';
	
	$core->Set_config_if('allowed_meta', '', $plugin_name);
	$core->Set_config_if('login_from_email', '', $plugin_name);
	
	$core->Set_variable_if('lt', 'registration_activation', 'Aktyvacija', $plugin_name);
	$core->Set_variable_if('en', 'registration_activation', 'Activation', $plugin_name);
	$core->Set_variable_if('ru', 'registration_activation', 'Активация', $plugin_name);
	
	$core->Set_variable_if('lt', 'activation_successful', 'Aktyvacija sėkminga', $plugin_name);
	$core->Set_variable_if('en', 'activation_successful', 'Activation successful', $plugin_name);
	$core->Set_variable_if('ru', 'activation_successful', 'Поздравляем!<br />Счет подтвердил успешно.', $plugin_name);
	
	$core->Set_variable_if('lt', 'activation_unsuccessful', 'Aktyvacija nesėkminga', $plugin_name);
	$core->Set_variable_if('en', 'activation_unsuccessful', 'Activation unsuccessful', $plugin_name);
	$core->Set_variable_if('ru', 'activation_unsuccessful', 'Счет подтверждение не удалось.', $plugin_name);
	
	$core->Set_variable_if('lt', 'email_tpl_activation', '', $plugin_name);
	$core->Set_variable_if('en', 'email_tpl_activation', '', $plugin_name);
	$core->Set_variable_if('ru', 'email_tpl_activation', '', $plugin_name);
	
	
	$core->Set_variable_if('lt', 'register_success', 'Registracija sėkminga. Pasitikrinkite savo e. paštą.', $plugin_name);
	$core->Set_variable_if('en', 'register_success', 'Registration successful. Check your email for activation.', $plugin_name);
	$core->Set_variable_if('ru', 'register_success', 'Регистрация прошло успешно. Проверьте свою электронную почту для активации.', $plugin_name);

	$core->Set_variable_if('lt', 'update_success', 'Duomenys pakeisti sėkminga', $plugin_name);
	$core->Set_variable_if('en', 'update_success', 'Data were changed successfuly', $plugin_name);
	$core->Set_variable_if('ru', 'update_success', 'Данные были изменены успешно', $plugin_name);

	
	$core->Set_variable_if('lt', 'btn_register', 'Registruotis', $plugin_name);
	$core->Set_variable_if('en', 'btn_register', 'Register', $plugin_name);
	$core->Set_variable_if('ru', 'btn_register', 'Регистрироваться', $plugin_name);
	
	$core->Set_variable_if('lt', 'btn_update', 'Redaguoti', $plugin_name);
	$core->Set_variable_if('en', 'btn_update', 'Update', $plugin_name);
	$core->Set_variable_if('ru', 'btn_update', 'Обновить', $plugin_name);
	
	$core->Set_variable_if('lt', 'label_login', 'Vartotojas', $plugin_name);
	$core->Set_variable_if('en', 'label_login', 'Username', $plugin_name);
	$core->Set_variable_if('ru', 'label_login', 'Имя пользователя', $plugin_name);
	
	$core->Set_variable_if('lt', 'label_password', 'Slaptažodis', $plugin_name);
	$core->Set_variable_if('en', 'label_password', 'Password', $plugin_name);
	$core->Set_variable_if('ru', 'label_password', 'Пароль', $plugin_name);
	
	$core->Set_variable_if('lt', 'label_retyped_password', 'Pakartokite slaptažodį', $plugin_name);
	$core->Set_variable_if('en', 'label_retyped_password', 'Repeat password', $plugin_name);
	$core->Set_variable_if('ru', 'label_retyped_password', 'Повторите пароль', $plugin_name);
	
	$core->Set_variable_if('lt', 'label_name', 'Vardas, Pavardė', $plugin_name);
	$core->Set_variable_if('en', 'label_name', 'Name and Surname', $plugin_name);
	$core->Set_variable_if('ru', 'label_name', 'Имя и фамилия', $plugin_name);
	
	$core->Set_variable_if('lt', 'label_email', 'E. paštas', $plugin_name);
	$core->Set_variable_if('en', 'label_email', 'Email', $plugin_name);
	$core->Set_variable_if('ru', 'label_email', 'E-mail', $plugin_name);
	
	$core->Set_variable_if('lt', 'label_accept_terms', 'Sutinku su {link}:', $plugin_name);
	$core->Set_variable_if('en', 'label_accept_terms', 'I agree with {link}', $plugin_name);
	$core->Set_variable_if('ru', 'label_accept_terms', 'Я согласен с {link}', $plugin_name);
	
	$core->Set_variable_if('lt', 'label_accept_terms_link', 'sąlygomis', $plugin_name);
	$core->Set_variable_if('en', 'label_accept_terms_link', 'the terms', $plugin_name);
	$core->Set_variable_if('ru', 'label_accept_terms_link', 'условиями', $plugin_name);
	
	$core->Set_variable_if('lt', 'input_error_user_exists', 'Toks vartotojas jau egzistuoja');
	$core->Set_variable_if('en', 'input_error_user_exists', 'User already exists');
	$core->Set_variable_if('ru', 'input_error_user_exists', 'Пользователь уже существует');
	
	$core->Set_variable_if('lt', 'input_error_email_exists', 'Toks e-paštas jau egzistuoja');
	$core->Set_variable_if('en', 'input_error_email_exists', 'E-mail already exists');
	$core->Set_variable_if('ru', 'input_error_email_exists', 'Электронная почта уже существует');
	
	$core->Set_variable_if('lt', 'input_error_required', 'Šis laukas privalomas');
	$core->Set_variable_if('en', 'input_error_required', 'This field is required');
	$core->Set_variable_if('ru', 'input_error_required', 'Это поле обязательно');
	
	$core->Set_variable_if('lt', 'input_error_name', 'Vardas turi prasidėti raide. Negalima naudoti specialių simbolių.');
	$core->Set_variable_if('en', 'input_error_name', 'The name must start with a letter. Do not use special characters.');
	$core->Set_variable_if('ru', 'input_error_name', 'Имя должно начинаться с буквы. Не используйте специальные символы.');
	
	$core->Set_variable_if('lt', 'input_error_email', 'Įveskite taisyklingą e-paštą');
	$core->Set_variable_if('en', 'input_error_email', 'Please enter a valid e-mail');
	$core->Set_variable_if('ru', 'input_error_email', 'Пожалуйста, введите действительный адрес электронной почты');
	
	$core->Set_variable_if('lt', 'input_error_password', 'Slaptažodžio ilgis turi būti tarp 8 ir 30');
	$core->Set_variable_if('en', 'input_error_password', 'Password length must be between 8 and 30');
	$core->Set_variable_if('ru', 'input_error_password', 'Длина пароля должна быть от 8 до 30');
	
	$core->Set_variable_if('lt', 'input_error_retyped_password', 'Slaptažodžiai turi sutapti');
	$core->Set_variable_if('en', 'input_error_retyped_password', 'Passwords must match');
	$core->Set_variable_if('ru', 'input_error_retyped_password', 'Пароли должны совпадать');
	
	return true;
}