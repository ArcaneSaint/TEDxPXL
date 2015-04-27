<div class="col-lg-6">
	<div class="panel panel-default">
		<div class="panel-body">
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

		</div>
	</div>
</div>

<div class="col-lg-6">
	<div class="panel panel-default">
		<div class="panel-body">
			<h1 class="page-header">Event management</h1>
			<?php if (count($events) > 0 ): ?>
				<table class="table table-striped ">
					<thead>
						<tr>
							<th><?php echo implode('</th><th>', array_map('ucwords',array_keys(current($events)))); ?> </th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($events as $event): array_map('htmlentities', $event); ?>
							<tr>
								<td><?php echo implode('</td><td>', $event); ?> </td><td><a href="<?php echo base_url(); ?>Admin/eedit/<?php echo $event['id']; ?>" class="btn btn-success">edit</a></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			<?php endif; ?>
			<a href="<?php echo base_url(); ?>Admin/add/" class="btn btn-success">Add Event</a>
		</div>
	</div>
</div>