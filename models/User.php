<?php

class User{
//check login    
    static public function login($data){
        $username = $data["username"];
        try {
            $query = "SELECT * FROM users WHERE username = :username";
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":username"=>$username));
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            return $user;
        } catch (PDOException $ex) {
            echo "error : ".$ex;
        }
    }

	
//creat users
    static public function createUser($data){
        $query = 'INSERT INTO users (matiere,username,email,password)
                     VALUES (:matiere,:username,:email,:password)';
        $stmt = DB::connect()->prepare($query);
        $stmt->bindParam(':matiere',$data['matiere']);
        $stmt->bindParam(':username',$data['username']);
        $stmt->bindParam(':email',$data['email']);
        $stmt->bindParam(':password',$data['password']);
        if($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        // $stmt->close();
        $stmt = null;
    }
}