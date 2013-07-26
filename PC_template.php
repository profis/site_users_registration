<h1 class="fpav"><?php echo $this->site->Get_data('name'); ?></h1>
<?php
global $site_users;
if ($site_users->Logged_in) echo '';// Вы уже зарегистрированы.
$show_form = true;
$reg_res = $this->site->Get_data('registration_result');
if ($reg_res) {
	if (v($reg_res['success'])) {
		$show_form = false;
		echo '<div class="sitemap"><h1 style="display:block;">'.lang('registration_activation').'</h1></div><div>' . lang("registration_successfull") . '</div>';
	}
	else {
		//echo '<div class="red pt20">Registration was not completed, invalid fields were marked red.</div>';
		//print_pre($reg_res);
	}
}
function gov_reg_output_error($err, $errs, $if_true='true', $if_false='') {
	if (isset($errs['errors'])) $errs = $errs['errors'];
	$errs = v($errs, array());
	if ($errs) {
		if (!is_array($err)) $err = array($err);
		if (count($err)) foreach ($err as $e) {
			if (in_array($e, $errs)) {
				echo $if_true;
				return true;
			}
		}
	}
	echo $if_false;
	return false;
}
if ($show_form) {

$captcha_img_url = $this->core->Get_url("themes", "img.captcha.php?s=1");
?>
<form id="registration" class="registration" method="post" class="mt25">
	<div>
		<label class="fl mr15"><?php elang("email_login"); ?> <span class="red">*</span></label>
		<input type="text" class="input01 fl" name="email" value="<?php echo v($_POST['email']); ?>" style="<?php gov_reg_output_error(array('email', 'account_exists'), v($reg_res), 'background:#FEE;'); ?>" />
		<div class="clear"><!-- --></div>
	</div>
	<?php gov_reg_output_error('email', v($reg_res), // Неправильный адрес эл. почты
		'<div style="margin-left:170px">
			<small class="error" id="hint_lastname">' . lang("email_invalid") . '</small>
			<div class="clear"><!-- --></div>
		</div>'); ?>
	<?php gov_reg_output_error('account_exists', v($reg_res),
		'<div style="margin-left:170px">
			<small class="error" id="hint_lastname">' . lang("email_already_registered") . '</small>
			<div class="clear"><!-- --></div>
		</div>'); ?>
	<div class="mt15">
		<label class="fl mr15"><?php elang("password"); ?> <span class="red">*</span></label>
		<input type="password" class="input01 fl" name="password" style="<?php gov_reg_output_error('password', v($reg_res), 'background:#FEE;'); ?>" />
		<div class="clear"><!-- --></div>
	</div>
	<?php gov_reg_output_error('password', v($reg_res),
		'<div style="margin-left:170px">
			<small class="error" id="hint_lastname">' . lang("invalid_password") . '</small>
			<div class="clear"><!-- --></div>
		</div>'); ?>
	<div class="mt15">
		<label class="fl mr15"><?php elang("retyped_password"); ?> <span class="red">*</span></label>
		<input type="password" class="input01 fl" name="retyped_password" style="<?php gov_reg_output_error('retyped_password', v($reg_res), 'background:#FEE;'); ?>" />
		<div class="clear"><!-- --></div>
	</div>
	<?php gov_reg_output_error('retyped_password', v($reg_res),
		'<div style="margin-left:170px">
			<small class="error" id="hint_lastname">' . lang("passwords_dont_match") . '</small>
			<div class="clear"><!-- --></div>
		</div>'); ?>
	<div class="mt15">
		<label class="fl mr15"><?php elang("name_surname"); ?> <span class="red">*</span></label>
		<input type="text" class="input01 fl" name="name" value="<?php echo v($_POST['name']); ?>" style="<?php gov_reg_output_error('name', v($reg_res), 'background:#FEE;'); ?>" />
		<div class="clear"><!-- --></div>
	</div>
	<?php gov_reg_output_error('name', v($reg_res),
		'<div style="margin-left:170px">
			<small class="error" id="hint_lastname">' . lang("invalid_symbols") . '</small>
			<div class="clear"><!-- --></div>
		</div>'); ?>
	<div class="mt15">
		<label class="fl mr15"><?php elang("login_name"); ?> <span class="red">*</span></label>
		<input type="text" class="input01 fl" name="login" value="<?php echo v($_POST['login']); ?>" style="<?php gov_reg_output_error('login_exists', v($reg_res), 'background:#FEE;'); ?>" />
		<div class="clear"><!-- --></div>
	</div>
	<?php gov_reg_output_error('login_exists', v($reg_res),
		'<div style="margin-left:170px">
			<small class="error" id="hint_lastname">' . lang("login_exists") . '</small>
			<div class="clear"><!-- --></div>
		</div>'); ?>
	<?php gov_reg_output_error('login', v($reg_res),
		'<div style="margin-left:170px">
			<small class="error" id="hint_lastname">' . lang("nickname_invalid") . '</small>
			<div class="clear"><!-- --></div>
		</div>'); ?>
		
	<div class="mt15 rules_checkbox">
		<label class="fl mr15">&nbsp;</label>
		<div class="captcha_holder fl">
			<img id="captcha_image" src="<?php echo $captcha_img_url . "&t=" . mt_rand(); ?>" alt=""/>
			<a href="#" id="refresh_captcha" onclick="$('#captcha_image').attr({'src': '<?php echo $captcha_img_url; ?>&t=' + Math.random()}); return false;"><?php elang("refresh_captcha"); ?></a>
		</div><!-- /captcha_holder -->
		<div class="clear"><!-- --></div>
	</div>
	<div class="mt15">
		<label class="fl mr15"><?php elang("enter_security_code"); ?> <span class="red">*</span></label>
		<input type="text" name="captcha" id="captcha" class="input01 fl captcha_input"/>
		<div class="clear"><!-- --></div>
	</div>

	<?php gov_reg_output_error('captcha', v($reg_res),
		'<div style="margin-left:170px">
			<small class="error" id="hint_captcha">' . lang("captcha_invalid") . '</small>
			<div class="clear"><!-- --></div>
		</div>'); ?>
	<?php
		$terms_id = $this->page->Get_by_controller("gov39_terms_and_conditions");
		$terms_data = $this->page->Get_page($terms_id[0]);
	?>
	
	<div class="mt15" style="border: 1px solid #BBB; margin-left:170px; overflow: auto; height: 100px;">
		<div style="padding:5px; font-size: 10px;"><?php echo $terms_data["text"]; ?></div>
	</div>
	
	<div class="mt15 rules_checkbox">
		<label class="fl mr15"><input type="checkbox" class="checkbox01 fr" name="terms_and_conditions" /></label>
		<span class="fl mr15 a1"><?php elang("i_agree_with", lang("terms_and_conditions")); ?> <span class="red">*</span></span>
		<div class="clear"><!-- --></div>
	</div>
	<?php gov_reg_output_error('terms_and_conditions', v($reg_res),
		'<div style="margin-left:170px">
			<small class="error" id="hint_lastname">' . lang("must_agree_to_terms_and_conditions") . '</small>
			<div class="clear"><!-- --></div>
		</div>'); ?>
		
	<div class="mt15 rules_checkbox">
		<label class="fl mr15">&nbsp;</label>
		<small class="red red_message fl"><?php elang("marked_fields_required"); ?></small>
		<div class="form_button red_btn2 fr">
			<div class="lbg"></div><div class="rbg"></div>
			<input type="submit" name="user_register" value="<?php eqlang("register"); ?>">
		</div>
		<div class="clear"><!-- --></div>
	</div> 
</form><!-- /registration -->
<?php
}
?>