<?php 
	if(isset($_POST['find'])){ //for the shearch box
		$data = new EmployesController();
		$employes = $data->findEmployes();
	}else{
		$data = new EmployesController();
		$employes = $data->getAllEmployes();
		print_r($employes);
	}
?>




<div class="container">
	<div class="row my-4">
		<div class="col-md-10 mx-auto">
		 <?php include('./views/includes/alerts.php');?> <!-- to show alert -->
			<div class="card">
                <div class="card-body bg-light">
                        <!-- the add button -->
                        <a href="<?php echo BASE_URL;?>add" class="btn btn-sm btn-primary mr-2 mb-2">
                            <i class="fas fa-plus">ADD</i>
                        </a>
						<!-- the username and logout after click on it -->
						<a href="<?php echo BASE_URL;?>logout" title="Déconnexion" class="btn btn-link mr-2 mb-2">
						<i class="fas fa-user mr-2"> <?php echo $_SESSION['username'];?></i>
						</a>
						<!-- the shearch box -->
						<form method="post" class="float-right mb-2 d-flex flex-row">
							<input type="text" class="form-control" name="search" placeholder="Recherche">
							<button class="btn btn-info btn-sm" name="find" type="submit"><i class="fas fa-search"></i></button>
						</form>
					<table class="table table-hover">
					  <thead>
					    <tr>
					      <th scope="col">Nom & Prénom</th>
					      <th scope="col">Matricule</th>
					      <th scope="col">Département</th>
					      <th scope="col">Poste</th>
					      <th scope="col">Date Embauche</th>
					      <th scope="col">Statut</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					    <?php foreach($employes as $employe):?>
					    	<tr>
						      <th scope="row"><?php echo $employe['nom'].' '.$employe['prenom']; ?></th>
						      <td><?php echo $employe['matricule'];?></td>
						      <td><?php echo $employe['depart'];?></td>
						      <td><?php echo $employe['poste'];?></td>
						      <td><?php echo $employe['date_emb'];?></td>
						      <td>
						      	<?php echo $employe['statut']
						      			?   //ternary operation
						      			'<span class="badge badge-success">Active</span>'
						      			:
						      			'<span class="badge badge-danger">Resilié</span>';
						      ;?></td>
						      <td class="d-flex flex-row">
                              <!-- update and delete button -->
						      	<form method="post" class="mr-1" action="update">
						      		<input type="hidden" name="id" value="<?php echo $employe['id'];?>">
						      		<button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
						      	</form>
						      	<form method="post" class="mr-1" action="delete">
						      		<input type="hidden" name="id" value="<?php echo $employe['id'];?>">
						      		<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
						      	</form>
						      </td>
					
						    </tr>
					   	<?php endforeach;?>
					  </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>