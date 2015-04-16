<h1>Login</h1>
<div>
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

	<form action="<?php echo base_url(); ?>Login/process" method="post" role="form">
		<div class="form-group">
			<label for="username">Email:</label>
			<input class="form-control" type="text" id="email" name="_email" value="<?php echo set_value('_email'); ?>" required="required" />
		</div>

		<div class="form-group">
			<label for="password">Wachtwoord:</label>
			<input class="form-control" type="password" id="password" name="_password" required="required" />
		</div>

		<div class="checkbox">
			<label>
				<input type="checkbox" id="remember_me" name="_remember_me" value="on" />
                Onthoud mijn gegevens
			</label>
		</div>
		<button type="submit" class="btn btn-success" id="_submit" name="_submit">Inloggen</button>
	</form>
</div>