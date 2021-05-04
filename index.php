<?php
require_once './autoload.php';
require_once("./views/includes/header.php");

$home = new HomeController();

$pages = [
        'home','dashboard','update','delete','add','register','login','logout'
    ];

if(isset($_GET['page'])){
    if(in_array($_GET['page'],$pages)){
        $page = $_GET['page'];
        if($page === "dashboard" || $page === "delete"
            || $page === "add"  || $page === "update" ){
                if(isset($_SESSION['admin']) && $_SESSION['admin'] == true){
                    $admin = new AdminController();
                    $admin->index($page);
                }else{
                    include('views/includes/404.php');
                    // $home->index("login"); or this
                }
        }else{
            $home->index($page);
        }
    }else{
        include('views/includes/404.php');
    }
}else{
    $home->index("home");
}

require_once("./views/includes/footer.php");