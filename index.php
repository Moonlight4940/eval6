<?php
session_start();

define("URL", "http://192.168.56.10/eval6/index.php");

$page = "";

if(isset($_GET["page"]) && !empty($_GET["page"])){
   
    $page = $_GET["page"];

}else{
    
    $page = "/";
}

$routes = [
    "/" => ["home","FrontController"],
    "new_form" => [ "new_form","FrontController"],
    "delete" => [ "delete","FrontController"],
    "update" => ["update", "FrontController"]
];


require_once "Model/BDD.php";
//var_dump(BDD::getInstance());
require_once "Controller/AbstractController.php";
require_once "Controller/FrontController.php";
require_once "Controller/ErreurController.php";


if(array_key_exists($page, $routes)){
    $class = $routes[$page][1];
    $method = $routes[$page][0];
    $p = new $class();
    $id = isset($_GET["id"]) ? $_GET["id"] : null;
    call_user_func([$p, $method] , $id);
    
   $p->{$method}();//it's executing the method
}
else{
    $p = new ErreurController();
    $p->erreur(404, "la page demanée n'existe pas");//catch all error handler - Not Found error
}

