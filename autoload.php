<?php 

session_start();

require_once './bootstrap.php';

spl_autoload_register('autoload');

function autoload($class_name){
	$array_paths = array(
		'database/',
		'app/classes/',
		'models/',
		'controllers/'
	);
    // app \classes \Session
	$parts = explode('\\',$class_name); //separate with /
	$name = array_pop($parts);          //delet the last of aray ex: Session

	foreach($array_paths as $path){
		$file = sprintf($path.'%s.php',$name);
		if(is_file($file)){				//check if its a fille
			include_once $file;
		}
	}

}