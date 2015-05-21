<div class="panel panel-default">
	<div class="panel-body">
		<h1 class="page-header">Boards</h1>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Name</th>
					<th>Description</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($boards as $board): array_map('htmlentities', $board); ?>
				<tr class='clickable-row' data-href='Forum/board/<?php echo $board['id']; ?>'>
					<td><?php echo $board['name']; ?> </td>
					<td><?php echo $board['description']; ?> </td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>