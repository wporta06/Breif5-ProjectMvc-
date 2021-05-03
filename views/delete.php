<?php 
	if(isset($_POST['id'])){
		$delEmploye = new EmployesController();
		$delEmploye->deleteEmploye();
	}
?>