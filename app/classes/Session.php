<?php 

// send cookie to alert
 class Session{
 	static public function set($type,$message){    // get para from empoyesController
 		setcookie($type,$message,time() + 5,"/"); // remove alert after 5s
 	}
 } 	
 
 ?>