<h1>Admin Panel</h1>
<div class="col-lg-6">
	<div class="panel panel-default">
		<div class="panel-body">
			<?php if ($display=="all"){ ?>
			<h1 class="page-header">User management</h1>
				<?php if (count($users) > 0 ): ?>
					<table class="table table-striped ">
						<thead>
							<tr>
								<th><?php echo implode('</th><th>', array_map('ucwords',array_keys(current($users)))); ?> </th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($users as $user): array_map('htmlentities', $user); ?>
								<tr>
									<td><?php echo implode('</td><td>', $user); ?> </td><td><a href="<?php echo base_url(); ?>Admin/edit/<?php echo $user['id']; ?>" class="btn btn-success">edit</a></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				<?php endif; ?>
			<?php } else if ($display == "single") {?>
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
				</form>
			
			<?php } ?>
		</div>
	</div>
</div>


<?php //Welcome administrator <?php echo $this->session->userdata('lastName');  
?>