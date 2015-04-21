<h1>Error <?php if(isset($errorType)){echo $errorType;} ?></h1>
<div class="col-lg-6">
	<div class="panel panel-default">
		<div class="panel-body">
			<h1 class="page-header"><?php if(isset($errorMessage)){echo $errorMessage;} else {echo 'An error has occurred';}?></h1>
		</div>
	</div>
</div>