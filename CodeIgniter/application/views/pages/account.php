<h1>Account</h1>
	<?php 
	if(!empty($errorMessage))
	{
	?>
		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
				<?php echo $errorMessage; ?>
		</div>
	<?php
	}
	?>
  <div class="panel panel-default">
      <div class="panel-body">
        <form action="<?php echo base_url(); ?>Account/update" method="POST" class="user_account_update">
			<?php if (isset($user_account_errors)){ echo $user_account_errors;} ?>
			<div id="user_account_form">
				<div class="form-group">
					<label for="user_account_form_email" class="required">E-mail:</label>
					<input class="form-control" type="email" id="user_account_form_email" name="user_account_form[email]" value="<?php echo $this->session->userdata('email'); ?>" />
				</div>
				<div class="form-group">
					<label for="user_account_form_firstName" class="required">Voornaam</label>
					<input class="form-control" type="text" id="user_account_form_firstName" name="user_account_form[firstName]" value="<?php echo $this->session->userdata('firstName'); ?>" />
				</div>
				<div class="form-group">
					<label for="user_account_form_lastName" class="required">Achternaam</label>
					<input class="form-control" type="text" id="user_account_form_lastName" name="user_account_form[lastName]" value="<?php echo $this->session->userdata('lastName'); ?>" />
				</div>
			</div>
			<button name="user_account_update" type="submit" class="btn btn-success">Update</button>
		</form>
        <form action="<?php echo base_url(); ?>Account/update" method="POST" class="user_password_update">
			<?php if (isset($user_password_errors)){ echo $user_password_errors;} ?>
			<div id="user_password_form">
				<h1> Wachtwoord veranderen </h1>
				<div class="form-group">
					<label for="user_account_form_password" >Huidig Wachtwoord</label>
					<input class="form-control" type="password" id="user_password_form_old_password" name="user_password_form[password][old]" value="" />
				</div>
				<div class="form-group">
					<label for="user_account_form_password" >Nieuw Wachtwoord</label>
					<input class="form-control" type="password" id="user_password_form_password" name="user_password_form[password][first]" value="" />
				</div>
				<div class="form-group">
					<label for="user_account_form_password_confirm" >Nieuw Wachtwoord Controle</label>
					<input class="form-control" type="password" id="user_password_form_password_confirm" name="user_password_form[password][second]" value="" />
				</div>
			</div>
			<button type="submit" name="user_password_update_form" class="btn btn-success">Update</button>
		</form>
  </div>
</div>