<?php

class EmpLoyesController{
        // controloler with home.php
    public function getAllEmployes(){
        $employes = Employe::getAll(); //called by static in Empoye.php
        return $employes;
    }
        // controloler with add.php
    public function addEmploye(){
		if(isset($_POST['submit'])){
			$data = array(
				'nom' => $_POST['nom'],
				'prenom' => $_POST['prenom'],
				'matricule' => $_POST['mat'],
				'depart' => $_POST['depart'],
				'poste' => $_POST['poste'],
				'date_emb' => $_POST['date_emb'],
				'statut' => $_POST['statut'],
			);
			$result = Employe::add($data); //send $data to viewer to show it in (add.php)
			if($result === 'ok'){
				// header('location:'.BASE_URL); //action:send it to home.php
				Redirect::to('home');
				Session::set('success','Employé Ajouté');
			}else{
				echo $result;
			}
		}
	}
		// controloler with delete.php
	public function deleteEmploye(){
		if(isset($_POST['id'])){
			$data['id'] = $_POST['id'];
			$result = Employe::delete($data);
			if($result === 'ok'){
				// header('location:'.BASE_URL); //action:send it to home.php after deleting
				Redirect::to('home');
				Session::set('success','Employé Supprimé');
			}else{
				echo $result;
			}
		}
	}
// -------------------
		/// controloler with update.php	
	public function getOneEmploye(){
		if(isset($_POST['id'])){
			$data = array(
				'id' => $_POST['id']
			);
			$employe = Employe::getEmploye($data);
			return $employe;
		}
	}
		/// controloler with update.php	(exexcut update)
	public function updateEmploye(){
		if(isset($_POST['submit'])){
			$data = array(
				'id' => $_POST['id'],
				'nom' => $_POST['nom'],
				'prenom' => $_POST['prenom'],
				'matricule' => $_POST['mat'],
				'depart' => $_POST['depart'],
				'poste' => $_POST['poste'],
				'date_emb' => $_POST['date_emb'],
				'statut' => $_POST['statut'],
			);
			$result = Employe::update($data);
			if($result === 'ok'){
				// header('location:'.BASE_URL);
				Redirect::to('home');
				Session::set('success','Employé Modifié');
			}else{
				echo $result;
			}
		}
	}
// -------------------	
		// controloler with home.php	(shearch box)
	public function findEmployes(){
		if(isset($_POST['search'])){
			$data = array('search' => $_POST['search']);
		}
		$employes = Employe::searchEmploye($data);
		return $employes;
	} 
}





?>