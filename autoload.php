<?php 
// instead of using require every time we use autoload
session_start();

require_once './bootstrap.php';

spl_autoload_register('autoload');

function autoload($class_name){
	$array_paths = array(		//declaration of an array of folders where classes is
		'database/',
		'app/classes/',
		'models/',
		'controllers/'
	);
    // app \classes \Session
	$parts = explode('\\',$class_name); //separate with /
	$name = array_pop($parts);          //get the last of array exp: Session

	foreach($array_paths as $path){
		$file = sprintf($path.'%s.php',$name); 					 //%s or %d
		if(is_file($file)){				//check if its a fille
			include_once $file;
		}
	}

}