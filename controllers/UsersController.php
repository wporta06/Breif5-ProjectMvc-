<?php

class UsersController{
    public function auth(){
        if(isset($_POST["submit"])){
            $data["username"] = $_POST["username"];
            $result = User::login($data);  //send to model
            if($result->username === $_POST["username"] && password_verify($_POST["password"],$result->password)){
                $_SESSION["logged"] = true;
                $_SESSION["username"] = $result->username;
                $_SESSION["matiere"] = $result->matiere;
                $_SESSION["admin"] = $result->admin;
                Redirect::to("home");
            }else{
                Session::set("error","Username ou mot de passe est incorrect");
                Redirect::to("login");
            }
        }
    }

	///here
    public function register(){
        $options = [
            "cost" => 12
        ];
        $password = password_hash($_POST["password"],PASSWORD_BCRYPT,$options);
        $data = array(
            "matiere" => $_POST["matiere"],
            "username" => $_POST["username"],
            "email" => $_POST["email"],
            "password" => $password,
        );
        $result = User::createUser($data); //send to model
        if($result === "ok"){
            Session::set("success","Compte crée");
            Redirect::to("login");
        }else{
            echo $result;
        }
    }
    public static function logout(){
        session_destroy();
    }


    public function getAllUsers(){
		$AllUser = TheClass::getUsers();

		return $AllUser;
	}
}