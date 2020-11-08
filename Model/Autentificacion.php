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

            $userCommd = $this->DB->prepare("SELECT * FROM usuarios WHERE usuario = ?;");
            $userCommd->execute(array($usuario));
            // obtenemos si el usuario existe
            $data = $userCommd->fetch(PDO::FETCH_OBJ);
            $passEncrypt = password_verify($clave, $data->pass);
            if($passEncrypt){
                return $data;
            }else{
                return null;
            }
          //  return $commd->fetch(PDO::FETCH_OBJ);
        }catch(Throwable $e){
            die($e->getMessage());
        }
    }
    // para crear la sesión del usuario
    public function Sesion($data){
        try{
            if($data != null){
                $_SESSION['id'] = $data->id;
                $_SESSION['nombres'] = $data->nombres;
                $_SESSION['apellidos'] = $data->apellidos;
                $_SESSION['usuario'] = $data->usuario;
                $_SESSION['imagen'] = $data->imagen;
                $_SESSION['roles_id'] = $data->roles_id;
               // password_has();
                if($data->roles_id == 1 || $data->roles_id == 2 || $data->roles_id == 3){
                    $_SESSION['state'] = 'backpack';
                    # Entramos al admin template
                    header("Location: ?view=Home");
                }else{
                    # para otros tipos de cliente
                    $_SESSION['state'] = 'cliente';
                }
            }else{
                # Retornamos al login si no se loguea correctamente o no tieen usuario
                header("Location: ?view=Autentificacion");
            }
        }catch(Throwable $e){
            die($e->getMessage());
        }
    }
    public function verificarAuten(){
        if(!isset($_SESSION['state'])){
            header("Location: ?view=Autentificacion");
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

}
?>