<?php

class Employe {

        //model with controloler of home.php (show table)
    static public function getAll(){ //static to avoid creating avery time object from this class 
        $stmt = DB::connect()->prepare('SELECT * FROM employes');
        $stmt->execute();
        return $stmt->fetchAll();
        // $stmt->close(); //close cnx
        $stmt = null;   //close cnx
    }
	 
// -------------------
        //model with controloler of add.php
    static public function add($data){
		$stmt = DB::connect()->prepare('INSERT INTO employes (nom,prenom,matricule,depart,poste,date_emb,statut)
			VALUES (:nom,:prenom,:matricule,:depart,:poste,:date_emb,:statut)');
		$stmt->bindParam(':nom',$data['nom']);
		$stmt->bindParam(':prenom',$data['prenom']);
		$stmt->bindParam(':matricule',$data['matricule']);
		$stmt->bindParam(':depart',$data['depart']);
		$stmt->bindParam(':poste',$data['poste']);
		$stmt->bindParam(':date_emb',$data['date_emb']);
		$stmt->bindParam(':statut',$data['statut']);

		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}
		// $stmt->close();
		$stmt = null;
	}

// -------------------
		///model with controloler of update.php
	static public function getEmploye($data){
		$id = $data['id'];
		try{
			$query = 'SELECT * FROM employes WHERE id=:id';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":id" => $id));
			$employe = $stmt->fetch(PDO::FETCH_OBJ); //trans from array to object
			return $employe;
		}catch(PDOException $ex){					//for error
			echo 'erreur' . $ex->getMessage();
		}
	}

		///model with controloler of update.php (exexcut update)
	static public function update($data){
		$stmt = DB::connect()->prepare('UPDATE employes SET nom= :nom,prenom=:prenom,matricule=:matricule,depart=:depart,poste=:poste,date_emb=:date_emb,statut=:statut WHERE id=:id');
		$stmt->bindParam(':id',$data['id']);
		$stmt->bindParam(':nom',$data['nom']);
		$stmt->bindParam(':prenom',$data['prenom']);
		$stmt->bindParam(':matricule',$data['matricule']);
		$stmt->bindParam(':depart',$data['depart']);
		$stmt->bindParam(':poste',$data['poste']);
		$stmt->bindParam(':date_emb',$data['date_emb']);
		$stmt->bindParam(':statut',$data['statut']);
		// die(print_r($data));
		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}
		//stmt->close();
		$stmt = null;
	}
// -------------------

	    //model with controloler of delete.php
	static public function delete($data){
		$id = $data['id'];
		try{
			$query = 'DELETE FROM employes WHERE id=:id';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":id" => $id));
			if($stmt->execute()){
				return 'ok';
			}
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}

// -------------------
	    //model with controloler of home.php	(shearch box)
	static public function searchEmploye($data){
		$search = $data['search'];
		// die(print_r($data));
		try{
			$query = 'SELECT * FROM employes WHERE nom LIKE ? OR prenom LIKE ?'; //?: parrametre like ?
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array('%'.$search.'%','%'.$search.'%'));
			$employes = $stmt->fetchAll();
			return $employes;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}


	
}


?>