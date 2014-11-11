<?php

echo $this->site->Get_widget_text('PC_plugin_site_users_registration_register_widget', array(
	'edit' => $this->site->loaded_page['reference_id'] == 'edit_profile'
));

?>