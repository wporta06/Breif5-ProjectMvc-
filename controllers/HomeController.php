<?php 

//page chenger
class HomeController{

	public function index($page){
		include('views/'.$page.'.php');
	}

}

?>