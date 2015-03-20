<?php
/**
 * @var PC_controller_site_users_registration $this
 */

/* <div class="sitemap"><h1 style="display:block;"><?php echo $this->core->Get_plugin_variable('registration_activation', $this->name); ?></h1></div> */

$activation_result = $this->site->Get_data('activation_result');
if (!$activation_result) {
	echo $this->core->Get_plugin_variable('activation_unsuccessful', $this->name);//'Счет подтверждение не удалось. Пожалуйста, свяжитесь с администратором сайта. Приносим извинения за доставленные неудобства.';
}
else {
	echo $this->core->Get_plugin_variable('activation_successful', $this->name); //'Поздравляем!<br />Счет подтвердил успешно. Вход будет произведен автоматически.';
}
?>