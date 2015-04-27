<div class="col-lg-6">
	<div class="panel panel-default">
		<div class="panel-body">
			<h1 class="page-header">Adding event</h1>

			<form  enctype="multipart/form-data" action="<?php echo base_url(); ?>Admin/add/" method="POST" class="event_update">
				<div class="form-group">
					<label for="event_update[name]" class="required">Naam</label>
					<input class="form-control" type="text" id="event_update[name]" name="event_update[name]" value="" />
				</div>
				<div class="form-group">
					<label for="event_update[description]" class="required">Beschrijving</label>
					<textarea class="form-control" id="event_update[description]" name="event_update[description]" rows=5 maxlength=5000></textarea>
				</div>
				<div class="form-group">
					<label for="event_update[location]" class="required">Locatie</label>
					<input class="form-control" type="text" id="event_update[location]" name="event_update[location]" value="" />
				</div>
				<div class="form-group">
					<label for="event_update[date]" class="required">Datum</label>
					<input class="form-control" type="date" id="event_update[date]" name="event_update[date]" value="">
					</input>
				</div>
				<div class="form-group">
					<label for ="userfile" class="required">Image</label>
					<input class="form-control" type="file" id="userfile" name="userfile"></input>
				</div>
				<button type="submit" name="event_update[save]" class="btn btn-success">Save</button>
				<a href="<?php echo base_url(); ?>Admin" class="btn btn-warning">Cancel</a>
			</form>
		</div>
	</div>
</div>