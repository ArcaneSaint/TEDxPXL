<?php 
//$this->session->userdata('username');
if (!$this->session->userdata('validated')) 
{
	?><form class="navbar-form navbar-right" role="form" action=" <?php echo base_url(); ?>login/process" method="post" >
		<div class="form-group">
			<input type="text" name="_email" placeholder="Email" class="form-control" />
		</div>
		<div class="form-group">
			<input type="password" name="_password" placeholder="Password" class="form-control" />
		</div>
		<button type="submit" class="btn btn-success">Sign in</button>
	</form>
	<?php
	}
	else{
	?>
		<div class="navbar-right">
            <p class="navbar-text">
				Ingelogd als <?php echo $this->session->userdata("email"); ?>.
			</p>
            <ul class="nav navbar-nav">
                <li>
					<a href="<?php echo base_url();?>logout/process">Uitloggen</a>
				</li>
            </ul>
        </div>
	<?php
		}
?>