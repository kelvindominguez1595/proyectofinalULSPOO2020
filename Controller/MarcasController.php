<?php
// importamos nuestro modelo
require_once 'Model/Marcas.php';
class MarcasController{
    // para accender al modelo y sus atributos
    private $model;

    // Constructor
    public function __CONSTRUCT(){
        $this->model = new Marcas();
    }

   /** Inicio de llamado de la vistas */
    public function Index(){
        require_once 'views/header.php';
        require_once 'views/marcas/index.php';
        require_once 'views/footer.php';
    }

    public function NuevoMarca(){
        require_once 'views/header.php';
        require_once 'views/marcas/crear.php';
        require_once 'views/footer.php';
    }

    public function EditarMarc(){
        // Capturamos el id enviado por get
        $id = $_REQUEST['id'];
        // crear el metodo para listar un dato especifico
        $data = $this->model->obtenerRegistro($id);
        require_once 'views/header.php';
        require_once 'views/marcas/editar.php';
        require_once 'views/footer.php';
    }
    public function BorrarMarca(){
        // Capturamos el id enviado por get
        $id = $_REQUEST['id'];
        require_once 'views/header.php';
        require_once 'views/marcas/borrar.php';
        require_once 'views/footer.php';
    }
    /** Fin de llamado de la vistas */

    /** Metodos CRUD */   
    public function CrearMarca(){
        // capturo los valores enviados por post o get
        $this->model->id        = $_REQUEST['id'];
        $this->model->nombre_marca   = $_REQUEST['nombre_marca'];
        // utilizamos el metodo de guardar de SQL
        if($this->model->RegistrarMarca($this->model)){
            $texto = "Registro exitosamente";
            $tipo = "success";
            $this->model->SesionesMessage($texto, $tipo);
        }else{
            $texto = "Ocurrio un error";
            $tipo = "error";
            $this->model->SesionesMessage($texto, $tipo);
        }
    }

    public function ActualizarMarc(){
        // capturo los valores enviados por post o get
        $this->model->id        = $_REQUEST['id'];
        $this->model->nombre_marca   = $_REQUEST['nombre_marca'];
        // utilizamos el metodo de guardar de SQL
        if($this->model->actualizarMarca($this->model)){
            $texto = "Actualizó exitosamente";
            $tipo = "success";
            $this->model->SesionesMessage($texto, $tipo);
        }else{
            $texto = "Ocurrio un error";
            $tipo = "error";
            $this->model->SesionesMessage($texto, $tipo);
        }
    }

    public function BorrarMarc(){
        // capturo los valores enviados por post o get
        $this->model->id = $_REQUEST['id'];
        // utilizamos el metodo de guardar de SQL
        if($this->model->BorrarMarca($this->model)){            
            $texto = "Marca borrada exitosamente";
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