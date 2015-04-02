<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TEDxPXL</title>
    <!-- Bootstrap 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>resources/css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="http://www.backtothelan.be/favicon.png">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<style type="text/css"></style></head>
<body>

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
                <li><a href="<?php echo base_url();?>index.php/Home">Home</a></li>
                <li><a href="<?php echo base_url();?>index.php/Info">Informatie</a></li>
                <li><a href="<?php echo base_url();?>index.php/Events">Events</a></li>
                <li><a href="<?php echo base_url();?>index.php/News">Nieuws</a></li>
                <li><a href="<?php echo base_url();?>index.php/Videos">Video's</a></li>
                <li><a href="<?php echo base_url();?>index.php/Contact">Contact</a></li>
                                    <li><a href="http://www.backtothelan.be/register/">Registreer</a></li>
                            </ul>
                             <form class="navbar-form navbar-right" role="form" action="http://www.backtothelan.be/login_check" method="post">
                    <input type="hidden" name="_csrf_token" value="LIWdnxYfntUhQoBVulpBOXQAR_1GDFU-hN8J9ahoNFY">
                    <div class="form-group">
                      <input type="text" name="_username" placeholder="Username" class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="password" name="_password" placeholder="Password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Sign in</button>
                  </form>
                    </div>
    </div>
</nav>