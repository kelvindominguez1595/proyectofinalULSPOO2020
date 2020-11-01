<?php
// Sesiones para login
session_start();
// Importamos la conexion de base de Datos
require_once 'DB/Database.php';
// Definimos que vista ver primero
$controller = 'Autentificacion';
// validamos que vista ver primero
if(isset($_REQUEST['view'])){
    // Si existe un valor en la variable view retorna True
    # Si trae un valor lo pasamos a nuestro controlado
    $controller = $_REQUEST['view'];
    // validamos la acción si viene vacia
    if(isset($_REQUEST['action'])){
        $accion = $_REQUEST['action'];
    }else{
        $accion = 'Index';
    }
    require_once 'Controller/'.$controller.'Controller.php';
    $controller = $controller.'Controller';
    $controller = new $controller;
    /**
     *  Vamos a llamar el controlador y el metodo que 
     * deseamos activar */
    call_user_func(array($controller, $accion));
}else{
    // Si no existe la variable retornara un False
    require_once 'Controller/'.$controller.'Controller.php'; // Obtenemos el controlador correcto
    // Instanciamos el controlador
    $controller = new AutentificacionController();
    // Retornamos la vista(index metodo) del controlador
    $controller->Index();
}
?>