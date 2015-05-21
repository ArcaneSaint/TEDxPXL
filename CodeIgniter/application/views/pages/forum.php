<h1>Forum</h1>
  <?php 
	if(isset($boards)){
		include('forum/forum_main.php');
	}
	else if (isset($threads)){
		include('forum/forum_board.php');
	}
	else if (isset($posts)){
		include('forum/forum_thread.php');
	}
	?>
</div>