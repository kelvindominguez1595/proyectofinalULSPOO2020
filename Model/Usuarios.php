<?php
class Usuarios{
    # atributos 
    private $DB; // para la conexion de la base de datos
    public $id;
    public $nombres;
    public $apellidos;
    public $direccion;
    public $email;
    public $usuario;
    public $pass;
    public $telefono;
    public $roles_id;

    public function __CONSTRUCT(){
        try{
            $this->DB = Database::Conexion();
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }

    public function RegistrarUsuario($data){
        try{
            // Comando SQL
            $sql = "INSERT INTO usuarios(nombres, apellidos, direccion, email, usuario, pass, telefono, roles_id) VALUES(?,?,?,?,?,?,?,?)";
            // Encriptamos la contraseña con md5
            $passEncrypt = md5($data->pass);
            // COMENZAMOS LA CONEXION CON PDO
            $pre = $this->DB->prepare($sql);
            $resul = $pre->execute(array($data->nombres, $data->apellidos, $data->direccion, $data->email, $data->usuario, $passEncrypt, $data->telefono, $data->roles_id));
            if($resul > 0){ 
                return true;
            }else{ 
                return false;
            }
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }
    // Metodo para listar los roles
    public function ListarUsuarios(){
        try{        
            $commd = $this->DB->prepare("SELECT us.id, us.nombres, us.apellidos, us.direccion, us.email, us.usuario, us.pass, us.telefono, rol.nombres as roles, rol.descripcion  FROM usuarios as us INNER JOIN roles_usuario as rol ON us.roles_id = rol.id");
            $commd->execute();
            return $commd->fetchAll(PDO::FETCH_OBJ);
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }

    // Metodo para obtener un registro en especifico
    public function obtenerRegistro($id){
        try{        
            $commd = $this->DB->prepare("SELECT * FROM roles_usuario WHERE id = ?");
            $commd->execute(array($id));
            return $commd->fetch(PDO::FETCH_OBJ);
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }

    // Actualizar
    public function actualizarRol($data){
        try{
            // Comando SQL
            $sql = "UPDATE roles_usuario SET nombre = ?, descripcion = ? WHERE id = ?";

            // COMENZAMOS LA CONEXION CON PDO
            $pre = $this->DB->prepare($sql);
            $resul = $pre->execute(array($data->nombre, $data->descripcion, $data->id));
            if($resul > 0){ 
                return true;
            }else{ 
                return false;
            }
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }
    // Borrar
    public function deleteRol($data){
        try{
            // Comando SQL
            $sql = "DELETE FROM roles_usuario  WHERE id = ?";
            // COMENZAMOS LA CONEXION CON PDO
            $pre = $this->DB->prepare($sql);
            $resul = $pre->execute(array($data->id));
            if($resul > 0){ 
                return true;
            }else{ 
                return false;
            }
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }
    // Para los mensajes
    public function SesionesMessage($texto, $tipo){
        $_SESSION['texto'] = $texto;
        $_SESSION['tipo'] = $tipo;
        header("Location: ?view=Roles");
    }

}
?>