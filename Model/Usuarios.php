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
    public $sexo;
    public $imagen;
    public $roles_id;

    public function __CONSTRUCT(){
        try{
            $this->DB = Database::Conexion();
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }

    public function RegistrarUsuario($data){
        // try{
            // Comando SQL
            $sql = "INSERT INTO usuarios(nombres, apellidos, direccion, email, usuario, pass, sexo, telefono, imagen, roles_id) VALUES(?,?,?,?,?,?,?,?,?,?)";
            // Encriptamos la contraseña con md5
            $passEncrypt = password_hash($data->pass, PASSWORD_BCRYPT);
            // COMENZAMOS LA CONEXION CON PDO
            $pre = $this->DB->prepare($sql);
            $resul = $pre->execute(array($data->nombres, $data->apellidos, $data->direccion, $data->email, $data->usuario, $passEncrypt, $data->sexo, $data->telefono, $data->imagen, $data->roles_id));
            return $resul;
            // if($resul > 0){ 
            //     return true;
            // }else{ 
            //     return false;
            // }
        // }catch(Throwable $t){
        //     die($t->getMessage());
        // }
    }
    // Metodo para listar los roles
    public function ListarUsuarios(){
        try{        
            $commd = $this->DB->prepare("SELECT us.id, us.nombres, us.apellidos, us.direccion, us.email, us.usuario, us.pass, us.telefono, us.imagen, rol.nombre as roles, rol.descripcion  FROM usuarios as us INNER JOIN roles_usuario as rol ON us.roles_id = rol.id");
            $commd->execute();
            return $commd->fetchAll(PDO::FETCH_OBJ);
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }

    // Metodo para obtener un registro en especifico
    public function obtenerRegistro($id){
        try{        
            $commd = $this->DB->prepare("SELECT * FROM usuarios WHERE id = ?");
            $commd->execute(array($id));
            return $commd->fetch(PDO::FETCH_OBJ);
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }

    // Actualizar
    public function ActualizarUsuario($data){
        try{
            // Comando SQL
            $sql = "UPDATE usuarios SET nombres = ?, apellidos = ?, direccion = ?, email = ?, usuario = ?, pass = ?, telefono = ?, imagen = ?, roles_id = ? WHERE id = ?";
            // Encriptamos la contraseña con md5
            $passEncrypt = md5($data->pass);
            // COMENZAMOS LA CONEXION CON PDO
            $pre = $this->DB->prepare($sql);
            $resul = $pre->execute(array($data->nombres, $data->apellidos, $data->direccion, $data->email, $data->usuario, $passEncrypt, $data->telefono, $data->imagen,$data->roles_id));
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
    public function BorrarUsuario($data){
        try{
            // Comando SQL
            $sql = "DELETE FROM usuarios  WHERE id = ?";
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
    public function SesionesMessage($texto, $tipo, $ruta){
        $_SESSION['texto'] = $texto;
        $_SESSION['tipo'] = $tipo;
        header("Location: ?view=".$ruta);
    }

    // para cambiar la imagen de perfil
    public function ChangeImagenPerfil($data){
        try{
            // obtenemos el nombre de la imagen para borrarla
            $commd = $this->DB->prepare("SELECT * FROM usuarios WHERE id = ?");
            $commd->execute(array($data->id));
            $img = $commd->fetch(PDO::FETCH_OBJ);
            // para borrar la imagen con PHP
            unlink("assets/img/Image_Perfil/".$img->imagen);
            // Comando SQL
            $sql = "UPDATE usuarios SET  imagen = ? WHERE id = ?";
            // COMENZAMOS LA CONEXION CON PDO
            $pre = $this->DB->prepare($sql);
            $resul = $pre->execute(array($data->imagen, $data->id));
            if($resul > 0){ 
                return true;
            }else{ 
                return false;
            }
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }

    public function actualizarPerfilUser($data){
        try{
            // Comando SQL
            $sql = "UPDATE usuarios SET nombres = ?, apellidos = ?, direccion = ?, email = ?, usuario = ?, sexo = ?, telefono = ? WHERE id = ?";
            // Encriptamos la contraseña con md5
          // //  $passEncrypt = password_hash($data->pass, PASSWORD_BCRYPT);
            // COMENZAMOS LA CONEXION CON PDO
            $pre = $this->DB->prepare($sql);
            $resul = $pre->execute(array($data->nombres, $data->apellidos, $data->direccion, $data->email, $data->usuario, $data->sexo, $data->telefono, $data->id));
            if($resul > 0){ 
                return true;
            }else{ 
                return false;
            }
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }

    public function ChangePassword($data){
        try{
            // Comando SQL
            $sql = "UPDATE usuarios SET pass = ? WHERE id = ?";
            // Encriptamos la contraseña con md5
            $passEncrypt = password_hash($data->pass, PASSWORD_BCRYPT);
            // COMENZAMOS LA CONEXION CON PDO
            $pre = $this->DB->prepare($sql);
            $resul = $pre->execute(array($passEncrypt, $data->id));
            if($resul > 0){ 
                return true;
            }else{ 
                return false;
            }
        }catch(Throwable $t){
            die($t->getMessage());
        }   
    }

}
?>