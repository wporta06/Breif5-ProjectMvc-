<?php 
	$Users = new UsersController();
	$userss = $Users->getAllUsers();

	$Classess = new ClassController();
	$classes = $Classess->getAllClass();


	// $Checkreserve = new ClassController();
	// $checkk = $Checkreserve->check();

	// $Times = new ClassController();
	// $timess = $Times->getAllTimes();
	
    if(isset($_POST['submit'])){
		$newClasse = new ClassController();
		$newClasse->reservClasse();
	}
?>
<script> 
	//to change the Groupnumber after selecting class name
	function sendGroupNumber()
 	{  
		var x = document.getElementById("ClassNameid").value;
		document.getElementById("id2").text = x;
		document.getElementById("id2").value = x;
	}
</script>

<div class="container">
	<div class="row my-4">
		<div class="col-md-8 mx-auto">
			<?php include('./views/includes/alerts.php');?> <!-- to show alert -->
			<div class="card">
				<div class="card-header">Class Reservation</div>
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>home" class="btn btn-sm btn-secondary mr-2 mb-2">
						<i class="fas fa-home"></i>
					</a>
                    
					<form method="post" name="formulaire" >
                    
						<div class="form-group" >
							<label for="nom">Class Name*</label>
							<select id="ClassNameid" class="form-control" name='classname' onchange="sendGroupNumber()" >
                                <option >Select Class</option>
								<?php
								foreach ($classes as $classe)
								    echo "<option   value='" . $classe['groupnumber'] . "'>" . $classe['classname'] . "</option>";
								?>
							</select>
						</div>
						
						<div class="form-group">
							<label for="prenom">Group Number*</label>
							<select  class="form-control" name="groupnumber">
								 <option id="id2" >Pease Select Class</option> 
							</select>
						</div>
						
						<div class="form-group">
                            <label for="prenom">Date*</label>
							<input type="date" name="date" class="form-control">
						</div>
						<div class="form-group">
                            <label for="prenom">Time*</label>
							<select name="time" class="form-control" >
								<option  >08:00-10:00</option>
								<option  >10:00-12:00</option>
								<option  >12:00-14:00</option>
								<option  >14:00-16:00</option>
								<option  >16:00-18:00</option>
								
							</select>
						</div>
					<!-- thiis send -->
						<input type="hidden" name="username" value="<?php echo $_SESSION['username'];?>"> <!-- to sent the user who reserved -->

						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary" name="submit">Reserve</button>
						</div>
                   
					</form>
                   
				</div>
			</div>
		</div>
	</div>
</div>