<?php 
	
		$data = new ClassController();
		$cllasses = $data->getAllClass();
		// print_r($cllasses);
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
					
					<table class="table table-hover">
					  <thead>
					    <tr>
					      <th scope="col">Class Name</th>
					      <th scope="col">Group Number</th>
					      <th scope="col">Statut</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					    <?php foreach($cllasses as $classes):?>
					    	<tr>
						      <th scope="row"><?php echo $classes['classname']; ?></th>
						      <td><?php echo $classes['groupnumber'];?></td>
						      <td>
						      	<?php echo $classes['statut']
						      			?   //ternary operation
						      			'<span class="badge badge-success">1</span>'
						      			:
						      			'<span class="badge badge-danger">0</span>';
						      ;?></td>
						      <td class="d-flex flex-row">
                              <!-- update and delete button -->
						      	<form method="post" class="mr-1" action="update">
						      		<input type="hidden" name="id" value="<?php echo $classes['id'];?>"> <!-- send id  -->
						      		<button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
						      	</form>
						      	<form method="post" class="mr-1" action="delete">
						      		<input type="hidden" name="id" value="<?php echo $classes['id'];?>">
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