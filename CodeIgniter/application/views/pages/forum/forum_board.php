<div class="panel panel-default">
	<div class="panel-body">
		<h1 class="page-header"><?php echo $board->name ?></h1>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Title</th>
					<th>Creator</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($threads as $thread): array_map('htmlentities', $thread); ?>
				<tr class='clickable-row' data-href='../../Forum/thread/<?php echo $thread['id']; ?>'>
					<td><?php echo $thread['title']; ?> </td>
					<td><?php echo $thread['email']; ?> </td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
		<?php
			if ($this->session->userdata('validated')!==null){
		?>
			<form id="replyForm" action="<?php echo base_url(); ?>Forum/board/<?php echo $board->id; ?>" method="POST">
				<input type="hidden" value=true name="newThread" id="newThread" />
				<input type="text" id="newThreadTitleArea" name="newThreadTitleArea" placeholder="Title"></input><br/>
				<textarea id="newThreadTextArea" name="newThreadTextArea"></textarea>
				<button class="btn btn-success" type="submit" id="replyButton">
					New Thread
				</button>
			</form>
		<?php }; ?>
	</div>
</div>