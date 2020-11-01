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
    public function Validacion($usuario, $clave){
        try{
            $commd = $this->DB->prepare("SELECT * FROM usuarios WHERE usuario = ? AND pass = ?;");
            $commd->execute(array($usuario, $clave));
            return $commd->fetch(PDO::FETCH_OBJ);
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
                $_SESSION['usuario'] = $data->usuario;
                $_SESSION['roles_id'] = $data->roles_id;
                $_SESSION['state'] = 'success';
                if($data->roles_id == 1){
                    # Entramos al admin template
                    header("Location: ?view=Home");
                }else{
                    # para otros tipos de usuario
                }
            }else{
                # Retornamos al login si no se loguea correctamente o no tieen usuario
                header("Location: ?view=Autentificacion");
            }
        }catch(Throwable $e){
            die($e->getMessage());
        }
    }
}
?>