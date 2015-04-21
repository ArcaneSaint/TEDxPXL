<h1>Registreren</h1>
<div class="panel panel-default">
	<div class="panel-body">
		<form action="<?php echo base_url(); ?>Register/process" method="POST" class="user_registration_register">
			<?php echo validation_errors(); ?>
			<?php echo $errorMessage; ?>
			<div id="user_registration_form">
				<div class="form-group">
					<label for="user_registration_form_email" class="required">E-mail:</label>
					<input class="form-control" type="email" id="user_registration_form_email" name="user_registration_form[email]" required="required" value="<?php echo set_value('user_registration_form[email]'); ?>" />
				</div>
				<div class="form-group">
					<label for="user_registration_form_plainPassword_first" class="required">Wachtwoord:</label>
					<input class="form-control" type="password" id="user_registration_form_plainPassword_first" name="user_registration_form[plainPassword][first]" required="required" value="<?php echo set_value('user_registration_form[plainPassword][first]'); ?>" />
				</div>
				<div class="form-group">
					<label for="user_registration_form_plainPassword_second" class="required">Wachtwoord controle:</label>
					<input class="form-control" type="password" id="user_registration_form_plainPassword_second" name="user_registration_form[plainPassword][second]" required="required" value="<?php echo set_value('user_registration_form[plainPassword][second]'); ?>" />
				</div>
				<div class="form-group">
					<label for="user_registration_form_firstName" class="required">Voornaam</label>
					<input class="form-control" type="text" id="user_registration_form_firstName" name="user_registration_form[firstName]" required="required" value="<?php echo set_value('user_registration_form[firstName]'); ?>" />
				</div>
				<div class="form-group">
					<label for="user_registration_form_lastName" class="required">Achternaam</label>
					<input class="form-control" type="text" id="user_registration_form_lastName" name="user_registration_form[lastName]" required="required" value="<?php echo set_value('user_registration_form[lastName]'); ?>" />
				</div>
			</div>
			<button type="submit" class="btn btn-success">Registreer</button>
		</form>
	</div>
</div>