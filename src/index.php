<?php
require_once("model/config-banco-dados.php");
require_once("view/partials/header.php");

$controller = 'medicos';

if(!isset($_GET['c'])){
    require_once("./controller/$controller.controller.php");
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->index();    
}else{
    $controller = strtolower($_GET['c']);
    $action = isset($_GET['action']) ? $_GET['action'] : 'Index';
    
    require_once("./controller/$controller.controller.php");
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    
    call_user_func( array( $controller, $action ) );
}