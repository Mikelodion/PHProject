<!DOCTYPE html>
<html>
	<head>
		<title>PhProject</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		<!-- Librerias -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<!--Font awesome-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!--css-->
		<link rel="stylesheet" type="text/css" href="/login/css/style.css">
	</head>

    <body>
    	<!--Navbar-->
    	<nav class="navbar navbar-expand-md bg-light navbar-light">
		  <a class="navbar-brand" href="/login/index.php">Home</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="collapsibleNavbar">
		    <ul class="navbar-nav">
		      <li class="nav-item">
						<?php
							if(isset($_SESSION["usuario"])){
							
						?>
							<a class="nav-link" href="/login/pages/login.php">Herramientas</a>
						<?php		
							}else{
						?>
							<a class="nav-link" href="#">Placeholder</a>
						<?php
							}
						?>
		        
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Placeholder</a>
		      </li>  
		    </ul>
		    <ul class="navbar-nav right ml-auto">
		      <li class="nav-item" id="loginform">
		        <?php
							if(isset($_SESSION["usuario"])){
						?>
								<form action="/login/pages/login.php">
								<a href="/login/pages/panelusuario.php" class="btn btn-primary"><i class="fa fa-user"></i></a>
								<input type="submit" value="LogOut" name="logout" class="btn btn-info">
								</form>
								
						<?php
							}
							else{
						?>
								<ul class="navbar-nav right ml-auto">
		      				<li class="nav-item" id="loginform">
										<form method="get" action="/login/pages/login.php">
											<input type="submit" value="Register" name="register" class="btn btn-info">
										</form>
									</li>
									<li class="nav-item">
										<form method="get" action="/login/pages/login.php">
											<input type="submit" value="LogIn" name="login" class="btn btn-info">
										</form> 
									</li>
								</ul>
						<?php
							}
						?>
		      </li> 
		    </ul>
		  </div>  
		</nav>
<!--Contents-->