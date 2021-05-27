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

	// public function getAllTimes(){
	// 	$AllTimes = TheClass::getAllTime();

	// 	return $AllTimes;
	// }
	


	// public function reservClasse(){
	// 	// if(isset($_POST['submit'])){
	// 		$data = array(
	// 			'classname' => $_POST['classname'],
	// 			'groupnumber' => $_POST['groupnumber'],
	// 			'date' => $_POST['date'],
	// 			'time' => $_POST['time'],
	// 			'username' => $_POST['username'],
	// 		);
	// 		$result = TheClass::addReserv($data);
	// 		if($result === 'ok'){
	// 			Session::set('success','Employé Ajouté');
	// 			Redirect::to('home');
	// 		}else{
	// 			echo $result;
	// 		}
	// 	// }
	// }

	
	public function reservClasse(){
		
		$AllClass = TheClass::checkReserve($_POST['classname'],$_POST['groupnumber'],
		$_POST['date'],
		$_POST['time'],
		$_POST['username']);
		if ($AllClass == true){
			echo '<div class="alert alert-danger">already booked</div>';
			// echo'dskfsdf';
		}else if($AllClass == false){
			$data = array(
				'classname' => $_POST['classname'],
				'groupnumber' => $_POST['groupnumber'],
				'date' => $_POST['date'],
				'time' => $_POST['time'],
				'username' => $_POST['username'],
			);
			$result = TheClass::addReserv($data);
			if($result === 'ok'){
				echo '<div class="alert alert-success justify-content-end">success</div>';
				
				Redirect::to('home');
			}else{
				echo $result;
			}
			
		}
		// return $AllClass;
	}

}



?>