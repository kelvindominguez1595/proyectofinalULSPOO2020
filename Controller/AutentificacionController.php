<?php
// importamos nuestro modelo
require_once 'Model/Autentificacion.php';

class AutentificacionController{

    private $model;

    public function __CONSTRUCT(){
        // Para inializar el modelo
        $this->model = new Autentificacion();
    }

    public function Index(){
        session_destroy(); // si existe una sesión activa lo cerramos
        require_once 'views/login/index.php';
    }
    // Vamos enviar los parametros a nuestro modelo

    public function autentificar(){
        $auten = new Autentificacion(); // instanciamos la clase modelo
        // capturamos los datos enviados desde el formularios
        $usuario = $_REQUEST['usuario'];
        $password = $_REQUEST['password'];

        // Enviamos los datos a consulta
        $auten = $this->model->Validacion($usuario, $password);
        // Creamos la sesión de nuestro usuario logueado
        $this->model->Sesion($auten);
    }
}
?>