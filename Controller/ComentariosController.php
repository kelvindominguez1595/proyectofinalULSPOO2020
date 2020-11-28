<?php
// importamos nuestro modelo
require_once 'Model/Comentarios.php';
class ComentariosController{
    // para accender al modelo y sus atributos
    private $model;

    // Constructos
    public function __CONSTRUCT(){
        $this->model = new Comentarios();
    }

   /** Inicio de llamado de la vistas */
    public function Index(){
        require_once 'views/header.php';
        require_once 'views/comentarios/index.php';
        require_once 'views/footer.php';
    }
    public function NuevoComentarios(){
        require_once 'views/header.php';
        require_once 'views/comentarios/crear.php';
        require_once 'views/footer.php';
    }

    public function EditarComentarios(){
        // Capturamos el id enviado por get
        $id = $_REQUEST['id'];
        // crear el metodo para listar un dato especifico
        $data = $this->model->obtenerRegistro($id);
        require_once 'views/header.php';
        require_once 'views/comentarios/editar.php';
        require_once 'views/footer.php';
    }
    public function BorrarComentarios(){
        // Capturamos el id enviado por get
        $id = $_REQUEST['id'];
        require_once 'views/header.php';
        require_once 'views/comentarios/borrar.php';
        require_once 'views/footer.php';
    }
    /** Fin de llamado de la vistas */

    /** Metodos CRUD */
    
    
    public function CrearComentarios(){
        // capturo los valores enviados por post o get
        $this->model->producto_id  = $_REQUEST['producto_id'];
        $this->model->rating       = $_REQUEST['rating'];
        $this->model->comentario   = $_REQUEST['comentario'];
   

        // utilizamos el metodo de guardar de SQL
        if($this->model->RegistrarComentarios($this->model)){
            $texto = "Registro exitosamente";
            $tipo = "success";
            $this->model->SesionesMessage($texto, $tipo);
        }else{
            $texto = "Ocurrio un error";
            $tipo = "error";
            $this->model->SesionesMessage($texto, $tipo);
        }
    }

    public function ActualizarComentarios(){
        // capturo los valores enviados por post o get
        $this->model->id = $_REQUEST['id'];
        $this->model->producto_id  = $_REQUEST['producto_id'];
        $this->model->rating       = $_REQUEST['rating'];
        $this->model->comentario   = $_REQUEST['comentario'];
        // utilizamos el metodo de guardar de SQL
        if($this->model->actualizarComentarios($this->model)){
            $texto = "Actualizó exitosamente";
            $tipo = "success";
            $this->model->SesionesMessage($texto, $tipo);
        }else{
            $texto = "Ocurrio un error";
            $tipo = "error";
            $this->model->SesionesMessage($texto, $tipo);
        }
    }

    public function BorrarComentario(){
        // capturo los valores enviados por post o get
        $this->model->id = $_REQUEST['id'];
        // utilizamos el metodo de guardar de SQL
        if($this->model->BorrarComentario($this->model)){            
            $texto = "Registro borrado exitosamente";
            $tipo = "success";
            $this->model->SesionesMessage($texto, $tipo);
        }else{
            $texto = "Ocurrio un error ";
            $tipo = "error";
            $this->model->SesionesMessage($texto, $tipo);
        }
    }


}
?>