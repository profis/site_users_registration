<?php
/**
 * @var PC_plugin_site_users_registration_register_widget $this
 * @var string $tpl_group
 * @var bool $edit
 */
global $site_users;

$login_from_email = false;
if (isset($this->cfg[$this->plugin_name]) and isset($this->cfg[$this->plugin_name]['login_from_email']) and !empty($this->cfg[$this->plugin_name]['login_from_email'])) {
	$login_from_email = true;
}

$data = array();

if (!$site_users->Logged_in and !$this->_config['edit'] or $site_users->Logged_in and $this->_config['edit']) {
	if (v($_POST['user_register'])) {
		$user_id = 0;
		if ($this->_config['edit']) {
			$user_id = $site_users->GetID();
		}
		$site_user_model = new PC_site_user_model($user_id);
		include $this->core->Get_tpl_path($tpl_group, 'tpl.rules');
		
		$data = array(
			'name'  => v($_POST['name'], v($_POST['email'])),
			'email'  => v($_POST['email']),
			'password'  => v($_POST['password']),
			'retyped_password'  => v($_POST['retyped_password']),
			'terms_and_conditions'  => v($_POST['terms_and_conditions'], ''),
			'captcha'  => v($_POST["captcha"], ""),
			'meta' => array(),
			'login_after_create'  => false,
		);

		if ($this->_config['edit']) {
			//unset($data['password']);
			//unset($data['retyped_password']);
		}
		else {
			$data['login']  = v($_POST["login"], v($_POST['email']));
		}
		
		//print_pre($_POST);
		//print_pre($data);
		$allowed_meta = array();
		if (isset($this->cfg[$this->plugin_name]) and isset($this->cfg[$this->plugin_name]['allowed_meta']) and !empty($this->cfg[$this->plugin_name]['allowed_meta'])) {
			$allowed_meta = explode(',', $this->cfg[$this->plugin_name]['allowed_meta']);
		}

		foreach ($_POST as $key => $value) {
			if (strpos($key, 'meta_') === 0) {
				$meta_key = substr($key, 5);
				if (!in_array($meta_key, $allowed_meta)) {
					continue;
				}
					
				$data['meta'][$meta_key] = $value;
				$data[$key] = $value;
			}
		}
		
		$site_user_model->filter($data);
		
		if (!$this->_config['edit']) {
			$site_users->Logout();
			$result = $site_users->Create($data, $site_user_model);
			
			//print_pre($data);

			if (v($result['success'])) {
				/*$_POST['user_email'] = $_POST['email'];
				$_POST['user_password'] = $_POST['password'];
				$site_users->Init();
				$this->core->Do_action('http_redirect', array('url'=>$this->site->Get_home_link()));*/
				include $this->core->Get_tpl_path($tpl_group, 'tpl.success');
				return;
			}
			$this->site->Register_data('registration_result', $result);
		}
		else {
			if ($login_from_email and isset($data['email'])) {
				$data['login'] = $data['email'];
			}
			if ($site_user_model->validate($data, $result)) {
				$new_meta_data = $data['meta'];
				$new_data = PC_utils::filterArray(array('login', 'name', 'email', 'password'), $data);

				$site_user_model->update($new_data, $user_id);
				$site_users->Set_meta_data($new_meta_data);
				include $this->core->Get_tpl_path($tpl_group, 'tpl.success.update');
				return;
			}
			else {
				$result = array(
					'errors' => $result
				);
			}
		}
	}
	elseif ($this->_config['edit']) {
		$data = $site_users->Get_data();
		if (isset($data['password'])) {
			unset($data['password']);
		}
		$user_meta_data = $site_users->Get_meta_data();
		foreach ($user_meta_data as $meta_key => $meta_value) {
			$data['meta_' . $meta_key] = $meta_value;
		}
	}
}

include $this->core->Get_tpl_path($tpl_group, 'tpl.form');


