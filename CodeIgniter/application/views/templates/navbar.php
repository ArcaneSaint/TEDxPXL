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
		<li <?php if ($thisPage=="Info") echo " id=\"currentPage\""; ?>><a href="<?php echo base_url();?>Info">Informatie</a></li>
		<li <?php if ($thisPage=="Events") echo " id=\"currentPage\""; ?>><a href="<?php echo base_url();?>Events">Events</a></li>
		<li <?php if ($thisPage=="News") echo " id=\"currentPage\""; ?>><a href="<?php echo base_url();?>News">Nieuws</a></li>
		<li <?php if ($thisPage=="Videos") echo " id=\"currentPage\""; ?>><a href="<?php echo base_url();?>Videos">Video's</a></li>
		<li <?php if ($thisPage=="Contact") echo " id=\"currentPage\""; ?>><a href="<?php echo base_url();?>Contact">Contact</a></li>
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
			if($this->session->userdata('role')==1){ ?>
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