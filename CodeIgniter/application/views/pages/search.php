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
<h1>Search Results</h1>
<div class="col-lg-6">
	<div class="panel panel-default">
		<div class="panel-body">
			<h1 class="page-header">Events</h1>
			<table class="table table-striped ">
				<thead>
					<tr>
						<th>Name</th>
						<th>Description</th>
						<th>Location</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($events as $event): array_map('htmlentities', $event); ?>
					<tr>
						<td><?php echo $event['name']; ?> </td>
						<td><?php echo $event['description']; ?> </td>
						<td><?php echo $event['location']; ?> </td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="col-lg-6">
  <div class="panel panel-default">
    <div class="panel-body">
      <h1 class="page-header">Forum Posts</h1>
      <table class="table table-striped ">
			<thead>
				<tr>
					<th>Title</th>
					<th>Body</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($posts as $post): array_map('htmlentities', $post); ?>
				<tr class='clickable-row' data-href='Forum/thread/<?php echo $post['threadID']; ?>'>
					<td><?php echo $post['title']; ?> </td>
					<td><?php echo bbc2html($post['body']); ?> </td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
    </div>
  </div>
</div>