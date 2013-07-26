<?php
final class PC_controller_site_users_registration extends PC_controller {
	
	public function Process($data) {
		$this->site->Register_data('name', $data['name']);
		
		if (v($this->route[2]) == 'activate') {
			if (empty($this->route[3])) {
				$this->core->Show_error('404');
			}
			else {
				global $site_users;
				$r = $site_users->Activate($this->route[3]);
				if ($r) {
					$site_users->Post_login = $r['email'];
					$site_users->Post_password = $r['password'];
					$site_users->Login();
				}
				$this->site->Register_data('activation_result', $r);
				$this->Render('activate');
			}
		}
		else {
			global $site_users;
			if (!$site_users->Logged_in) {
				//do register
				if (v($_POST['user_register'])) {
					$site_users->Logout();
					$r = $site_users->Create(v($_POST['email']), v($_POST['password']), v($_POST['retyped_password']), v($_POST['name']), v($_POST['terms_and_conditions']), v($_POST["captcha"], ""), v($_POST["login"]));
					if (v($r['success'])) {
						/*$_POST['user_email'] = $_POST['email'];
						$_POST['user_password'] = $_POST['password'];
						$site_users->Init();
						$this->core->Do_action('http_redirect', array('url'=>$this->site->Get_home_link()));*/
					}
					$this->site->Register_data('registration_result', $r);
				}
			}
			$this->Render();
		}
	}
	
}
?>