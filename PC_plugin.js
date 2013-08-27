
PC.hooks.Register('plugin/variables/custom_edit', function(params) {
	params.site_users_registration = {
		email_tpl_activation: {
			expl: '{link}'
		}
	};
});
