<div>
	<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            Gebruikersnaam of wachtwoord ongeldig
	</div>

	<form action="/login_check" method="post" role="form">
		<div class="form-group">
			<label for="username">Gebruikersnaam:</label>
			<input class="form-control" type="text" id="username" name="_username" value="ttttt" required="required" />
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