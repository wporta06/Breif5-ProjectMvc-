<?php 

class ClassController{
// done
	public function getAllClass(){
		$AllClass = TheClass::getAll();
		return $AllClass;
	}

	public function getOneClasse(){
		if(isset($_POST['id'])){
			$data = array(
				'id' => $_POST['id']
			);
			$classe = TheClass::getClasse($data);
			return $classe;
		}
	}
	
// done
	public function addClasse(){
		if(isset($_POST['submit'])){
			$data = array(
				'classname' => $_POST['classname'],
				'groupnumber' => $_POST['groupnumber'],
				'statut' => $_POST['statut'],
			);
			$result = TheClass::add($data);
			if($result === 'ok'){
				Session::set('success','Employé Ajouté');
				Redirect::to('dashboard');
			}else{
				echo $result;
			}
		}
	}

	public function updateClasse(){
		if(isset($_POST['submit'])){
			$data = array(
				'id' => $_POST['id'],
				'classname' => $_POST['classname'],
				'groupnumber' => $_POST['groupnumber'],
				'statut' => $_POST['statut'],
			);
			$result = TheClass::update($data);
			if($result === 'ok'){
				Session::set('success','Employé Modifié');
				Redirect::to('dashboard');
			}else{
				echo $result;
			}
		}
	}
	public function deleteClasse(){
		if(isset($_POST['id'])){
			$data['id'] = $_POST['id'];
			$result = TheClass::delete($data);
			if($result === 'ok'){
				Session::set('success','Employé Supprimé');
				Redirect::to('dashboard');
			}else{
				echo $result;
			}
		}
	}

}



?>