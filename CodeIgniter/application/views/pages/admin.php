<h1>Admin Panel</h1>

	<?php if ($display=="all"){ 
		include('admin/admin_all.php');
	} else if ($display == "single") {
		include('admin/admin_singleuser.php');
	} else if ($display == "event") {
		include('admin/admin_singleevent.php');
	} else if ($display == "add") {
		include('admin/admin_addevent.php');
	} ?>


<?php //Welcome administrator <?php echo $this->session->userdata('lastName');  
?>