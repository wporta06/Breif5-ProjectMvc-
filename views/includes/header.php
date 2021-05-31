<!DOCTYPE html>
<html>
<head>
	<title>GESTION CLASSE</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
</head>
<body>

	<nav class="navbar navbar-expand-md navbar-dark bg-dark"> <!-- -md to give us responsive view  -->
		<a href="<?php echo BASE_URL;?>login" class="navbar-brand">HOME</a>
		<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarCollapse">
			<div class="navbar-nav">
				<a href="<?php echo BASE_URL;?>home" class="nav-item nav-link ">Reservation</a>
				<a href="<?php echo BASE_URL;?>dashboard" class="nav-item nav-link ">Dashboard</a>
				<?php  if(!isset($_SESSION['logged'])):?> <!-- display login after you a successful logout -->
					<a href="<?php echo BASE_URL;?>login" class="nav-item nav-link active">Login</a>
				<?php endif ?>
				<?php  if(isset($_SESSION['logged'])):?> <!-- display logout after you a successful login -->
					<a href="<?php echo BASE_URL;?>logout" title="Déconnexion" class="btn btn-link mr-2 mb-2">
						<i class="fas fa-user mr-2"> <?php echo $_SESSION['username'];?></i>
					</a>
				<?php endif ?>		
			</div>
			<!-- shearsh section	 -->
			<!-- <form class="form-inline ml-auto">
				<input type="text" class="form-control mr-sm-2" placeholder="Search">
				<button type="submit" class="btn btn-outline-light">Search</button>
			</form> -->
		</div>
	</nav>