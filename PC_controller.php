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
			$this->Render();
		}
	}
	
}
?>