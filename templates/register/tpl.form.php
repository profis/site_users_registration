<?php
/**
 * @var PC_plugin_site_users_registration_register_widget $this
 * @var string $tpl_group
 * @var bool $edit
 * @var PC_site_user_model $site_user_model
 * @var string $error_message
 * @var array $result
 * @var array $data
 */

function pc_sur_error($variable, &$result, $field) {
	if (!isset($result['errors'])) {
		return;
	}
	if (!isset($result['errors'][$field])) {
		return;
	}
	
	$error_message = 'input_error_' . $result['errors'][$field]['error'];
	
	if (isset($result['errors'][$field]['message'])) {
		$error_message = $result['errors'][$field]['message'];
	}
	$var_message = $variable->Get_variable($error_message);
	if (!empty($var_message)) {
		$error_message = $var_message;
	}
?>

<ul tag="div" class="alert form-error alert-danger">
	<li><?php echo $error_message ?></li>
</ul>

<?php
}

?>

<div>
	<form class="form-horizontal" method="POST">
		<div class="form-group">
			<label for="input_login" class="col-sm-2 control-label"><?php echo $this->Get_variable('label_login'); ?></label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" id="input_login" name="login" value="<?php echo pc_e(v($data['login'])) ?>">
			</div>
			<?php pc_sur_error($this->core, $result, 'login') ?>
		</div>
		
		<?php
		//if (!$this->_config['edit']) {
		?>
		
		<div class="form-group">
			<label for="input_password" class="col-sm-2 control-label"><?php echo $this->Get_variable('label_password'); ?></label>
			<div class="col-sm-10">
			  <input type="password" class="form-control" id="input_password" name="password" value="<?php echo pc_e(v($data['password'])) ?>">
			</div>
			<?php pc_sur_error($this->core, $result, 'password') ?>
		</div>
		
		
		<div class="form-group">
			<label for="input_retyped_password" class="col-sm-2 control-label"><?php echo $this->Get_variable('label_retyped_password'); ?></label>
			<div class="col-sm-10">
			  <input type="password" class="form-control" id="input_retyped_password" name="retyped_password" value="<?php echo pc_e(v($data['retyped_password'])) ?>">
			</div>
			<?php pc_sur_error($this->core, $result, 'retyped_password') ?>
		</div>
		
		<?php
		//}
		?>
		
		<div class="form-group">
			<label for="input_name" class="col-sm-2 control-label"><?php echo $this->Get_variable('label_name'); ?></label>
			<div class="col-sm-10">
			  <input type="name" class="form-control" id="input_name" name="name" value="<?php echo pc_e(v($data['name'])) ?>">
			</div>
			<?php pc_sur_error($this->core, $result, 'name') ?>
		</div>
		
		
		<div class="form-group">
			<label for="input_email" class="col-sm-2 control-label"><?php echo $this->Get_variable('label_email'); ?></label>
			<div class="col-sm-10">
			  <input type="email" class="form-control" id="input_email" name="email" value="<?php echo pc_e(v($data['email'])) ?>">
			</div>
			<?php pc_sur_error($this->core, $result, 'email') ?>
		</div>
		
		<?php
		if (!$this->_config['edit']) {
		?>
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<div class="checkbox">
					<label>
						<input <?php echo ((isset($data['terms_and_conditions']) and !empty($data['terms_and_conditions']))?'CHECKED':'') ?> name="terms_and_conditions" type="checkbox" value="1"> <?php echo str_replace('{link}', '<a target="_blank" href="' . $this->page->Get_page_link_by_reference('terms') . '">' . $this->Get_variable('label_accept_terms_link') . '</a>', $this->Get_variable('label_accept_terms')); ?>
					</label>
				</div>
				<?php pc_sur_error($this->core, $result, 'terms_and_conditions') ?>
			</div>
		</div>
		
		<?php
		}
		?>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" class="btn btn-primary" name="user_register" value="<?php echo $this->_config['edit']?$this->Get_variable('btn_update'):$this->Get_variable('btn_register'); ?>" />
			</div>
		</div>
	</form>
</div>