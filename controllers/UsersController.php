<?php 

class UsersController {

	public function auth(){
		if(isset($_POST['submit'])){
			$data['username'] = $_POST['username'];
			$result = User::login($data);
			if($result->username === $_POST['username'] && password_verify($_POST['password'],$result->password)){	//function verified the hash with password input ($result->password)

				$_SESSION['logged'] = true;		//for showing or Redirect to home.php
				$_SESSION['username'] = $result->username; //for showing username and logout
				Redirect::to('home');

			}else{
				Session::set('error','Pseudo ou mot de passe est incorrect');
				Redirect::to('login');
			}
		}
	}

	public function register(){
		if(isset($_POST['submit'])){
			$options = [                                                //crypte the password
				'cost' => 12
			];
			$password = password_hash($_POST['password'],PASSWORD_BCRYPT,$options);  //crypte the password
			$data = array(
				'fullname' => $_POST['fullname'],
				'username' => $_POST['username'],
				'password' => $password,
			);
			$result = User::createUser($data);   //send $data to viewer to show it in (register.php)
			if($result === 'ok'){
				Session::set('success','Compte crée'); // to show alert
				Redirect::to('login');
			}else{
				echo $result;
			}
		}
	}

	//to destroy session after logout
	static public function logout(){
		session_destroy();
	}


}