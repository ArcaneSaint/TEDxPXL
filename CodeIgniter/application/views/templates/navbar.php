<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo base_url();?>index.php/Home">TEDxPXL</a>
				</div>
				<div class="navbar-collapse collapse">
	<ul class="nav navbar-nav">
		<li <?php if ($thisPage=="Home") echo " id=\"currentPage\""; ?> ><a href=" <?php echo base_url();?>Home">Home</a></li>
		<li <?php if ($thisPage=="Events") echo " id=\"currentPage\""; ?>><a href="<?php echo base_url();?>Events">Events</a></li>
		<li <?php if ($thisPage=="Forum") echo " id=\"currentPage\""; ?>><a href="<?php echo base_url();?>News">Forum</a></li>
		<?php if (!$this->session->userdata('validated')) 
		{
		?>
			<li <?php if ($thisPage=="Register") echo " id=\"currentPage\""; ?>><a href="<?php echo base_url();?>Register">Registreer</a></li>
				<?php
		}
		else
		{
		?>
			<li <?php if ($thisPage=="Account") echo " id=\"currentPage\""; ?>><a href="<?php echo base_url();?>Account">Account</a></li>
		<?php
			if($this->session->userdata('role')==='admin'){ ?>
			<li <?php if ($thisPage=="Admin") echo " id=\"currentPage\""; ?>><a href="<?php echo base_url();?>Admin">Admin</a></li>
			<?php
			}
		}
		?>
	</ul>
					
	<?php include 'header_login.php' ?>		
	
</div>
			</div>
		</nav>