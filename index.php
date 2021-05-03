<?php 
require_once './views/includes/header.php';
require_once './autoload.php';
require_once './controllers/HomeController.php';

$home = new HomeController();
// $home->index($_GET['page']);
$pages=['add','home','delete','update','logout'];

if(isset($_SESSION['logged']) && $_SESSION['logged'] === true){ //if logged show data
    if(isset($_GET['page'])){
        if(in_array($_GET['page'],$pages)){
            $page = $_GET['page'];
            $home->index($page);
        }else{
            include('views/includes/404.php');
        }
    }else{
        $home->index('home');
    }
    
    
    // <!-- to show the footer -->
require_once './views/includes/footer.php';


}else if(isset($_GET['page']) && $_GET['page'] === 'register'){ //if register show register.php page
	$home->index('register');
}else{
	$home->index('login');
}
