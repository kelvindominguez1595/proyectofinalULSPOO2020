<?php
// importamos nuestro modelo
require_once 'Model/Usuarios.php';
require_once 'Model/Roles.php';
class UsuariosController{
    // para accender al modelo y sus atributos
    private $model;
    private $modelRoles;
    private $vista = "Usuarios";

    // Constructos
    public function __CONSTRUCT(){
        $this->model = new Usuarios();
        $this->modelRoles = new Roles();
    }

   /** Inicio de llamado de la vistas */
    public function Index(){
        require_once 'views/header.php';
        require_once 'views/usuarios/index.php';
        require_once 'views/footer.php';
    }

    public function AccountView(){
        require_once 'views/header.php';
        require_once 'views/usuarios/cuenta.php';
        require_once 'views/footer.php';
    }

    public function NuevoUsuario(){
        require_once 'views/header.php';
        require_once 'views/usuarios/crear.php';
        require_once 'views/footer.php';
    }

    public function EditarUsuario(){
        // Capturamos el id enviado por get
        $id = $_REQUEST['id'];
        // crear el metodo para listar un dato especifico
        $data = $this->model->obtenerRegistro($id);
        require_once 'views/header.php';
        require_once 'views/usuarios/editar.php';
        require_once 'views/footer.php';
    }
    public function BorrarUsuario(){
        // Capturamos el id enviado por get
        $id = $_REQUEST['id'];
        require_once 'views/header.php';
        require_once 'views/usuarios/borrar.php';
        require_once 'views/footer.php';
    }
    /** Fin de llamado de la vistas */

    /** Metodos CRUD */   

    public function CrearUsuario(){
        // capturo los valores enviados por post o get        
        if(count($_FILES) > 0){
            $this->model->nombres      = $_REQUEST['nombres'];
            $this->model->apellidos    = $_REQUEST['apellidos'];
            $this->model->direccion    = $_REQUEST['direccion'];
            $this->model->email        = $_REQUEST['email'];
            $this->model->telefono     = $_REQUEST['telefono'];
            $this->model->pass         = $_REQUEST['pass'];
            $this->model->sexo         = $_REQUEST['sexo'];
            $this->model->roles_id     = $_REQUEST['roles_id'];
            // extraemo el primer nombre del para el usuario
            $nombre = explode(" ", $_REQUEST['nombres']);
            $this->model->usuario      = strtolower($nombre[0]);

            $nameImgan = $_FILES['imagen']['name'];
            $typeImagen = $_FILES['imagen']['type'];
            $tmpImagen = $_FILES['imagen']['tmp_name'];
            if($typeImagen == 'image/jpeg' || $typeImagen == 'image/jpg' || $typeImagen == 'image/png' || $typeImagen == 'image/gif'){
                // ruta de donde guardaremos la imagen
                $res = explode(".", $nameImgan);
                $extension = $res[count($res)-1];
                $newNameImagen = date('s').rand(1,99).".".$extension;
                $destino = "assets/img/Image_Perfil/".$newNameImagen;
                copy($tmpImagen, $destino); // copiamos los archivos al destino
                $this->model->imagen              = $newNameImagen;// llenamos el cmapo imagen
                // utilizamos el metodo de guardar de SQL 
                if($this->model->RegistrarUsuario($this->model)){
                    $texto = "Registro exitosamente ";
                    $tipo = "success";
                    $this->model->SesionesMessage($texto, $tipo, $this->vista);
                }else{
                    $texto = "Ocurrio un error ";
                    $tipo = "error";
                    $this->model->SesionesMessage($texto, $tipo, $this->vista);
                }
            }
        }
    }

    public function ActualizarPro(){
        // capturo los valores enviados por post o get
            $this->model->id           = $_REQUEST['id'];
            $this->model->nombres      = $_REQUEST['nombres'];
            $this->model->apellidos    = $_REQUEST['apellidos'];
            $this->model->direccion    = $_REQUEST['direccion'];
            $this->model->email        = $_REQUEST['email'];
            $this->model->usuario      = $_REQUEST['usuario'];
            $this->model->telefono     = $_REQUEST['telefono'];
            $this->model->pass         = $_REQUEST['pass'];
            $this->model->roles_id     = $_REQUEST['roles_id'];
        // utilizamos el metodo de guardar de SQL
        if($this->model->ActualizarUsuario($this->model)){
            $texto = "Actualizó exitosamente";
            $tipo = "success";
            $this->model->SesionesMessage($texto, $tipo, $this->vista);
        }else{
            $texto = "Ocurrio un error";
            $tipo = "error";
            $this->model->SesionesMessage($texto, $tipo, $this->vista);
        }
    }

    public function BorrarUse(){
        // capturo los valores enviados por post o get
        $this->model->id = $_REQUEST['id'];
        // utilizamos el metodo de guardar de SQL
        if($this->model->BorrarUsuario($this->model)){            
            $texto = "Registro borrado exitosamente";
            $tipo = "success";
            $this->model->SesionesMessage($texto, $tipo, $this->vista);
        }else{
            $texto = "Ocurrio un error ";
            $tipo = "error";
            $this->model->SesionesMessage($texto, $tipo, $this->vista);
        }
    }
    public function ChangeImagen(){
        if(count($_FILES) > 0){
            $this->model->id = $_SESSION['id'];
            $nameImgan = $_FILES['imagen']['name'];
            $typeImagen = $_FILES['imagen']['type'];
            $tmpImagen = $_FILES['imagen']['tmp_name'];
            if($typeImagen == 'image/jpeg' || $typeImagen == 'image/jpg' || $typeImagen == 'image/png' || $typeImagen == 'image/gif'){
                // ruta de donde guardaremos la imagen
                $res = explode(".", $nameImgan);
                $extension = $res[count($res)-1];
                $newNameImagen = date('s').rand(1,99).".".$extension;
                $destino = "assets/img/Image_Perfil/".$newNameImagen;
                copy($tmpImagen, $destino); // copiamos los archivos al destino
                $this->model->imagen = $newNameImagen;// llenamos el cmapo imagen
                // utilizamos el metodo de guardar de SQL
                if($this->model->ChangeImagenPerfil($this->model)){
                    $texto = "La imagen ha sido actualizada";
                    $tipo = "success";
                    $this->model->SesionesMessage($texto, $tipo, "Usuarios&action=AccountView");
                }else{
                    $texto = "Ocurrio un error, no se puede cambiar la imagen";
                    $tipo = "error";
                    $this->model->SesionesMessage($texto, $tipo, "Usuarios&action=AccountView");
                }
            }

        }else{
            $texto = "No ha enviado ninguna imagen de perfil";
            $tipo = "error";
            $this->model->SesionesMessage($texto, $tipo, "Usuarios&action=AccountView");
        }

    }
    // actualizar los datos del perfil
    public function ActualizarPerfil(){
        $this->model->id           = $_SESSION['id'];
        $this->model->nombres      = $_REQUEST['nombres'];
        $this->model->apellidos    = $_REQUEST['apellidos'];
        $this->model->direccion    = $_REQUEST['direccion'];
        $this->model->email        = $_REQUEST['email'];
        $this->model->telefono     = $_REQUEST['telefono'];
        $this->model->sexo         = $_REQUEST['sexo'];
        $nombre = explode(" ", $_REQUEST['nombres']);
        $this->model->usuario      = strtolower($nombre[0]);
        // metodo para actualizar datos del perfil
        if($this->model->actualizarPerfilUser($this->model)){
            $texto = "Actualizó exitosamente";
            $tipo = "success";
            $this->model->SesionesMessage($texto, $tipo, "Usuarios&action=AccountView");
        }else{
            $texto = "Ocurrio un error";
            $tipo = "error";
            $this->model->SesionesMessage($texto, $tipo, "Usuarios&action=AccountView");
        }

    }
    public function ActualizarPass(){
        $this->model->id           = $_SESSION['id'];
        $this->model->pass         = $_REQUEST['pass'];
        if($this->model->ChangePassword($this->model)){
            $texto = "La contraseña ha sido cambiada exitosamente, vuelva a iniciar sesión.";
            $tipo = "success";
            $this->model->SesionesMessage($texto, $tipo, "Autentificacion&action=Index");
        }else{
            $texto = "Ocurrio un error";
            $tipo = "error";
            $this->model->SesionesMessage($texto, $tipo, "Usuarios&action=AccountView");
        }
    }
}
?>