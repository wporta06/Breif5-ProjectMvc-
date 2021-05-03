<?php

// cnx with DB
class DB{
    static public function connect(){ //static to avoid creating avery time object from  class DB  ::
        $db =new PDO("mysql:host=localhost;dbname=employes","root","");
        $db->exec("set names utf8");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        return $db;
    }
}




?>