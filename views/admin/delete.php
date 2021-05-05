<?php 
	if(isset($_POST['id'])){
		$delClasse = new ClassController();
		$delClasse->deleteClasse();
	}
?>