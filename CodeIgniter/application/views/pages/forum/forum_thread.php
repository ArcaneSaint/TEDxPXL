<?php function bbc2html($content) {
  $search = array (
    '/(\[b\])(.*?)(\[\/b\])/',
    '/(\[i\])(.*?)(\[\/i\])/',
    '/(\[u\])(.*?)(\[\/u\])/',
    '/(\[ul\])(.*?)(\[\/ul\])/',
    '/(\[li\])(.*?)(\[\/li\])/',
    '/(\[url=)(.*?)(\])(.*?)(\[\/url\])/',
    '/(\[url\])(.*?)(\[\/url\])/'
  );

  $replace = array (
    '<strong>$2</strong>',
    '<em>$2</em>',
    '<u>$2</u>',
    '<ul>$2</ul>',
    '<li>$2</li>',
    '<a href="$2" target="_blank">$4</a>',
    '<a href="$2" target="_blank">$2</a>'
  );

  return preg_replace($search, $replace, $content);
}
?>

<div class="panel panel-default">
	<div class="panel-body">
		<h1 class="page-header"><?php echo $thread->title ?></h1>
		<table class="table table-striped">
			<thead>
				<tr>
				</tr>
				<tr>
				</tr>
				<tr>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($posts as $post): array_map('htmlentities', $post); ?>
				<tr>
					<td><?php echo $post['firstname'].' '.$post['lastname']; ?> </td>
					<td><?php echo nl2br(bbc2html($post['body'])); ?> </td>
					<td><?php echo $post['date']; ?> </td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
		<?php 
			if ($this->session->userdata('validated')!==null){
		?>
			<form id="replyForm" action="<?php echo base_url(); ?>Forum/thread/<?php echo $thread->id; ?>" method="POST">
				<input type="hidden" value=true name="postReply" id="postReply" />
				<textarea id="replyTextArea" name="replyTextArea"></textarea>
				<button class="btn btn-success" type="submit" id="replyButton">
					Reply
				</button>
			</form>
		<?php }; ?>
	</div>
</div>