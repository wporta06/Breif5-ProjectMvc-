<?php 
	if(isset($_POST['id'])){
		$exitEmploye = new EmployesController();
		$employe = $exitEmploye->getOneEmploye();
	}
	else{ //to avoid error after refreshing the page (id not sendit)
		Redirect::to('home');
	}
    if(isset($_POST['submit'])){
		$exitEmploye = new EmployesController();
		$exitEmploye->updateEmploye();
        
	}

?>
<div class="container">
	<div class="row my-4">
		<div class="col-md-8 mx-auto">
			<div class="card">
				<div class="card-header">Update un employé</div>
				<div class="card-body bg-light">
                <!-- send to home -->
					<a href="<?php echo BASE_URL;?>" class="btn btn-sm btn-secondary mr-2 mb-2"> 
						<i class="fas fa-home"></i>
					</a>
                    <!-- form no action (refresh in the same page) -->
					<form method="post">
						
						<div class="form-group">
							<label for="nom">Nom*</label>
							<input type="text" name="nom" class="form-control" placeholder="Nom"
                            value="<?php echo $employe->nom; ?>">
                            <input type="hidden" name="id" value="<?php echo $employe->id;?>"> <!--need it to send id too -->
						</div>
						<div class="form-group">
							<label for="prenom">Prénom*</label>
							<input type="text" name="prenom" class="form-control" placeholder="Prénom"
                            value="<?php echo $employe->prenom; ?>">
						</div>
						<div class="form-group">
							<label for="mat">Matricule*</label>
							<input type="text" name="mat" class="form-control" placeholder="Matricule"
                            value="<?php echo $employe->matricule; ?>">
						</div>
						<div class="form-group">
							<label for="depart">Département*</label>
							<input type="text" name="depart" class="form-control" placeholder="Département"
                            value="<?php echo $employe->depart; ?>">
						</div>
						<div class="form-group">
							<label for="poste">Poste*</label>
							<input type="text" name="poste" class="form-control" placeholder="Poste"
                            value="<?php echo $employe->poste; ?>">
						</div>
						<div class="form-group">
							<label for="date_emb">Date Embauche*</label>
							<input type="date" name="date_emb" class="form-control">
                           
						</div>
						<div class="form-group">
							<select class="form-control" name="statut">
								<option value="1" 
                                <?php echo $employe->statut ? 'selected' : ''; ?>>Active</option>
								<option value="0"
								<?php echo !$employe->statut ? 'selected' : ''; ?>>Résilié</option>
							</select>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary" name="submit">Valider</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>