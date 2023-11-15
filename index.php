<?php

session_start();

require_once 'autoload.php';
require_once 'config/database.php';
require_once 'condig/parameters.php';
require_once 'helpers/utils.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';

function show_error(){ // en caso de que se producza un error nos cargar el controlador
    //de error para que nos muestre el error
    $error = new errorController();
    $error->index();
}

if(isset($_GET['controller'])){
    $nombre_controlador = $_GET['controller'].'Controller';
    // almacenamos el nombre del controlador existente
}else{
    show_error();
    exit();
}

if(class_exists($nombre_controlador)){
    $controlador = new $nombre_controlador();
    if(isset($_GET['action'])&& method_exists($controlador, $_GET['action'])){
        $action = $_GET['action'];
        $controlador->$action();
    }elseif(!isset($_GET['controller'])&& !isset($_GET['action'])){
        $action_default = action_default;
        $controlador->action_default();
    }else{
        show_error();
    }
}else{
    show_error();
}

require_once 'views/layout/footer.php'; //maquetacion pagina


?>