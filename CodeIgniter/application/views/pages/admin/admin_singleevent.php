<div class="col-lg-6">
	<div class="panel panel-default">
		<div class="panel-body">
			<h1 class="page-header">Editing <?php echo $event->name; ?></h1>

			<form  enctype="multipart/form-data" action="<?php echo base_url(); ?>Admin/update/"<?php echo $event->id; ?> method="POST" class="user_account_update">
				<input type="hidden" value="<?php echo $event->id ?>" name="event_update[id]" id="event_update[id]" />
				<div class="form-group">
					<label for="event_update[name]" class="required">Naam</label>
					<input class="form-control" type="text" id="event_update[name]" name="event_update[name]" value="<?php echo $event->name; ?>" />
				</div>
				<div class="form-group">
					<label for="event_update[description]" class="required">Beschrijving</label>
					<textarea class="form-control" id="event_update[description]" name="event_update[description]" rows=5 maxlength=5000><?php  echo $event->description;?></textarea>
				</div>
				<div class="form-group">
					<label for="event_update[location]" class="required">Locatie</label>
					<input class="form-control" type="text" id="event_update[location]" name="event_update[location]" value="<?php echo $event->location; ?>" />
				</div>
				<div class="form-group">
					<label for="event_update[date]" class="required">Datum</label>
					<input class="form-control" type="date" id="event_update[date]" name="event_update[date]" value="<?php echo $event->date; ?>">
					</input>
				</div>
				<div class="form-group">
					<label for ="userfile" class="required">Image<img width="100" id="image_label_image" src="<?php echo base_url()."/uploads/".$event->image; ?>" /></label>
					<input class="form-control" type="file" id="userfile" name="userfile"></input>
				</div>
				<button type="submit" name="event_update[save]" class="btn btn-success">Save</button>
				<button type="submit" name="event_update[delete]" class="btn btn-warning">Delete event</button>
			</form>
		</div>
	</div>
</div>