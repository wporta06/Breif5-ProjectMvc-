<?php 

//page changer
class HomeController{
	public function index($page){
		include('views/'.$page.'.php');
		// $test= new ClassController;???
		// $test->getAll();
	}


}

?>