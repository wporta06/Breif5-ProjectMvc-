<?php 
	if(isset($_POST['id'])){
		$OneClasse = new ClassController();
		$classe = $OneClasse->getOneClasse();
	}else{
		Redirect::to('home');
	}
	if(isset($_POST['submit'])){
		$updClasse = new ClassController();
		$updClasse->updateClasse();
	}
?>

<div class="container">
	<div class="row my-4">
		<div class="col-md-8 mx-auto">
			<div class="card">
				<div class="card-header">Update Class</div>
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>dashboard" class="btn btn-sm btn-secondary mr-2 mb-2">
						<i class="fas fa-home"></i>
					</a>
                    
					<form method="post">
                    
						<div class="form-group">
                        
							<label for="nom">Class Name*</label>
							<input type="text" name="classname" class="form-control" value="<?php echo $classe->classname; ?>">
                            <input type="hidden" name="id" value="<?php echo $classe->id;?>">
						</div>
						<div class="form-group">
							<label for="prenom">Group Number*</label>
							<input type="text" name="groupnumber" class="form-control" value="<?php echo $classe->groupnumber; ?>">
						</div>
						
						<div class="form-group">
                            <label for="prenom">Statut*</label>
							<select class="form-control" name="statut">
								<option value="1" <?php echo $classe->statut ? 'selected' : ''; ?>>1</option>
								<option value="0"
								<?php echo !$classe->statut ? 'selected' : ''; ?>
								>0</option>
							</select>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary" name="submit">Update</button>
						</div>
                   
					</form>
                   
				</div>
			</div>
		</div>
	</div>
</div>