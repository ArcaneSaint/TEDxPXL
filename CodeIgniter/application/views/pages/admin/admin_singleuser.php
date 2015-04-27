<div class="col-lg-6">
	<div class="panel panel-default">
		<div class="panel-body">
			<h1 class="page-header">Editing <?php echo $user->email; ?></h1>

			<form action="<?php echo base_url(); ?>Admin/update/"<?php echo $user->id; ?> method="POST" class="user_account_update">
				<input type="hidden" value="<?php echo $user->id ?>" name="user_account_update[id]" id="user_account_update_id" />
				<div class="form-group">
					<label for="user_account_update_email" class="required">email</label>
					<input class="form-control" type="text" id="user_account_update_email" name="user_account_update[email]" value="<?php echo $user->email ?>" />
				</div>
				<div class="form-group">
					<label for="user_account_update_firstName" class="required">Voornaam</label>
					<input class="form-control" type="text" id="user_account_update_firstName" name="user_account_update[firstName]" value="<?php echo $user->firstname ?>" />
				</div>
				<div class="form-group">
					<label for="user_account_update_lastName" class="required">Achternaam</label>
					<input class="form-control" type="text" id="user_account_update_lastName" name="user_account_update[lastName]" value="<?php echo $user->lastname ?>" />
				</div>
				<div class="form-group">
					<label for="user_account_update_role" class="required">Role</label>
					<select id="user_account_update_role" name="user_account_update[role]">
						<?php foreach($roles as $role): ?>
							<option value="<?php echo $role['id'];?>"<?php if($role['role']==$user->role){echo ' selected="selected"';}?>><?php echo $role['role'];?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<button type="submit" name="user_account_update[save]" class="btn btn-success">Save</button>
				<button type="submit" name="user_account_update[passwordReset]" class="btn btn-success">Reset password</button>
				<button type="submit" name="user_account_update[delete]" class="btn btn-warning">Delete user</button>
			</form>
		</div>
	</div>
</div>