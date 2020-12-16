<?php
class Autentificacion
{
    private $DB;
    // atributos de autentificación
    private $idUsuario;
    private $nombres;    
    private $direccion;    
    private $usuario;    
    private $password;    
    private $rol;
    public function __CONSTRUCT(){
        try{
            $this->DB = Database::Conexion();
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }
    public function Index(){
        session_destroy(); // si existe una sesión activa lo cerramos
        require_once 'views/login/index.php';
    }
    public function Validacion($usuario, $clave){
        try{
            // consultamos el usuario si existe
            $userCommd = $this->DB->prepare("SELECT * FROM usuarios WHERE usuario = ? OR email = ?");
            $userCommd->execute(array($usuario, $usuario));
            // obtenemos si el usuario existe
            $data = $userCommd->fetch(PDO::FETCH_OBJ);
            if(empty($data)){
                return "no existe"; // el usuario no existe
            }else{
                $passEncrypt = password_verify($clave, $data->pass);
                if($passEncrypt){
                    return $data;
                }else{
                    return "error usuario"; // error en la contraseña o usuario
                }
            
            }
        }catch(Throwable $e){
            die($e->getMessage());
        }
    }
    // para crear la sesión del usuario
    public function Sesion($data, $ruta){
        try{
            if($data == "no existe"){
                // Retornamos al login si no se loguea correctamente o no tieen usuario
                if (!headers_sent()) {
                //     header('Location: ?view=');
                    $texto = "El usuario utilizado no esta registrado";
                    $tipo = "info";
                    //$ruta = "";
                    $this->SesionesMessage($texto, $tipo, $ruta);
                    exit;
                }
            }elseif($data == "error usuario"){
                // Retornamos al login si no se loguea correctamente o no tieen usuario
                if (!headers_sent()) {
                    $texto = "se ha equivocado en el usuario o contraseña";
                    $tipo = "danger";
                    //$ruta = "";
                    $this->SesionesMessage($texto, $tipo, $ruta);
                    exit;
                }
            }else{
                if($data->roles_id == 1 || $data->roles_id == 2 || $data->roles_id == 3){
                    $_SESSION['id'] = $data->id;
                    $_SESSION['nombres'] = $data->nombres;
                    $_SESSION['apellidos'] = $data->apellidos;
                    $_SESSION['usuario'] = $data->usuario;
                    $_SESSION['imagen'] = $data->imagen;
                    $_SESSION['roles_id'] = $data->roles_id;
                    $_SESSION['state'] = 'backpack';
                    # Entramos al admin template
                    header("Location: ?view=Home");
                }else{
                    $_SESSION['idCliente'] = $data->id;
                    $_SESSION['nombresCliente'] = $data->nombres;
                    $_SESSION['apellidosCliente'] = $data->apellidos;
                    $_SESSION['usuarioCliente'] = $data->usuario;
                    $_SESSION['imagenCliente'] = $data->imagen;
                    $_SESSION['roles_idCliente'] = $data->roles_id;
                    $_SESSION['clienteEstado'] = 'cliente';
                    header("Location: ./");
                    # para otros tipos de cliente
                }
            }
        }catch(Throwable $e){
            die($e->getMessage());
        }
    }
    public function verificarAuten(){
        if (!headers_sent()) {
            if ($_SESSION['roles_id'] == 4) {
                header("Location: ./");
            }           
        }
    }
    public function datosUsuariosLogueado($id){
        try{        
            $commd = $this->DB->prepare("SELECT * FROM usuarios WHERE id = ?");
            $commd->execute(array($id));
            return $commd->fetch(PDO::FETCH_OBJ);
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }
    
        // Para los mensajes
    public function SesionesMessage($texto, $tipo, $ruta){
        $_SESSION['texto'] = $texto;
        $_SESSION['tipo'] = $tipo;
        header("Location: ?view=".$ruta);
    }
}
?>