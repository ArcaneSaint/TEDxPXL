<h1>Events</h1>
<?php foreach ($events as $event): array_map('htmlentities', $event); ?>
	<div class="panel panel-default">
		<div class="panel-body">
			<h1 class="page-header"><?php echo $event['name']; ?> <small><?php echo $event['date']; ?></small></h1>
		
			<div class="row">
				<div class="col-lg-2">
					<img width="100" id="image_label_image" src="<?php echo base_url()."/uploads/".$event['image']; ?>" /> 
				</div>
				<div class="col-lg-5">
					<p><?php echo $event['description']; ?></p>
				</div>
				<div class="col-lg-2">
				<noscript>
				<img src="https://maps.googleapis.com/maps/api/staticmap?center=<?php echo $event['location']; ?>&zoom=14&size=400x400" />
				</noscript>
					<iframe width="400" height="300" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $event['location'] ?>&key=AIzaSyCrZJZ_HY4QUTZR8q9UEVdsIKWBPgqVelg"></iframe>
				</div>
			</div>
		</div>
  </div>
<?php endforeach; ?>