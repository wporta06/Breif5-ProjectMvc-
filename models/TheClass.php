<?php 

class TheClass {
// done
	static public function getAll(){
		$stmt = DB::connect()->prepare('SELECT * FROM classes');
		$stmt->execute();
		return $stmt->fetchAll();
		// $stmt->close();
		$stmt = null;
	}

	static public function getClasse($data){
		$id = $data['id'];
		try{
			$query = 'SELECT * FROM classes WHERE id=:id';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":id" => $id));
			$classe = $stmt->fetch(PDO::FETCH_OBJ);
			return $classe;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}
// done
	static public function add($data){
		$stmt = DB::connect()->prepare('INSERT INTO classes (classname,groupnumber,statut)
			VALUES (:classname,:groupnumber,:statut)');
		$stmt->bindParam(':classname',$data['classname']);
		$stmt->bindParam(':groupnumber',$data['groupnumber']);
		$stmt->bindParam(':statut',$data['statut']);

		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}
		// $stmt->close();
		$stmt = null;
	}

	static public function update($data){
		$stmt = DB::connect()->prepare('UPDATE classes SET classname= :classname,groupnumber=:groupnumber,statut=:statut WHERE id=:id');
		$stmt->bindParam(':id',$data['id']);
		$stmt->bindParam(':classname',$data['classname']);
		$stmt->bindParam(':groupnumber',$data['groupnumber']);
		$stmt->bindParam(':statut',$data['statut']);
		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}
		// $stmt->close();
		$stmt = null;
	}
// done
	static public function delete($data){
		$id = $data['id'];
		try{
			$query = 'DELETE FROM classes WHERE id=:id';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":id" => $id));
			if($stmt->execute()){
				return 'ok';
			}
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}

	static public function searchEmploye($data){
		$search = $data['search'];
		try{
			$query = 'SELECT * FROM employes WHERE nom LIKE ? OR prenom LIKE ?';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array('%'.$search.'%','%'.$search.'%'));
			$employes = $stmt->fetchAll();
			return $employes;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}
}