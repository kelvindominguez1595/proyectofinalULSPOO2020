<?php
// importamos nuestro modelo
require_once 'Model/Autentificacion.php';
require_once 'Model/Usuarios.php';
class ClientesController{

    private $model;
    private $modelAu;

    public function __CONSTRUCT(){
        // Para inializar el modelo
        $this->model = new Usuarios();
        $this->modelAu = new Autentificacion();
    }

    public function registerCliente(){
        require_once 'views/frontend/Login/register.php';
    }

    public function CerrarSesion(){
        session_destroy(); // si existe una sesión activa lo cerramos
        header("Location: ./");
    }

    public function CrearUsuario(){
        // capturo los valores enviados por post o get        
    
            $this->model->nombres      = $_REQUEST['nombres'];
            $this->model->apellidos    = $_REQUEST['apellidos'];
            $this->model->email        = $_REQUEST['email'];
            $this->model->pass         = $_REQUEST['pass'];
            $this->model->direccion    = "";
            $this->model->telefono     = "";
            $this->model->sexo         = "";
            $this->model->roles_id     = 4;
            // extraemo el primer nombre del para el usuario
            $nombre = explode(" ", $_REQUEST['nombres']);
            $apellido = explode(" ", $_REQUEST['apellidos']);
            $this->model->usuario  = strtolower($nombre[0].$apellido[0].date('s'));  

            $this->model->imagen  = "";// llenamos el cmapo imagen
            // utilizamos el metodo de guardar de SQL 
            if($this->model->RegistrarUsuario($this->model)){
                $texto = "Se ha logueado correctamente";
                $tipo = "success";
                $auten = $this->modelAu->Validacion($this->model->email, $this->model->pass);
                // Creamos la sesión de nuestro usuario logueado
                $this->modelAu->Sesion($auten);
               // $this->model->SesionesMessage($texto, $tipo, $this->vista);
            }else{
                $texto = "Ocurrio un error al iniciar sesión";
                $tipo = "error";
                $this->model->SesionesMessage($texto, $tipo, $this->vista);
            }
    }

    // Vamos enviar los parametros a nuestro modelo

    public function autentificar(){
        $auten = new Autentificacion(); // instanciamos la clase modelo
        // capturamos los datos enviados desde el formularios
        $usuario = $_REQUEST['usuario'];
        $password = $_REQUEST['password'];

        // Enviamos los datos a consulta
        $auten = $this->modelAu->Validacion($usuario, $password);
        // Creamos la sesión de nuestro usuario logueado
        $this->modelAu->Sesion($auten);
    }

    public function validAuthen(){
        $this->modelAu->verificarAuten();
    }

    // public function dataUser(){
    //     $id = $_SESSION['id'];
    //     return $this->modelAu->datosUsuariosLogueado($id);
    // }
}
?>