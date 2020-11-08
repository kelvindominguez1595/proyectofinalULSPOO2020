<?php
// importamos nuestro modelo
require_once 'Model/Categorias.php';
class CategoriasController{
    // para accender al modelo y sus atributos
    private $model;

    // Constructos
    public function __CONSTRUCT(){
        $this->model = new Categorias();
    }

   /** Inicio de llamado de la vistas */
    public function Index(){
        require_once 'views/header.php';
        require_once 'views/categorias/index.php';
        require_once 'views/footer.php';
    }

    public function NuevaCategoria(){
        require_once 'views/header.php';
        require_once 'views/categorias/crear.php';
        require_once 'views/footer.php';
    }

    public function EditarCategorias(){
        // Capturamos el id enviado por get
        $id = $_REQUEST['id'];
        // crear el metodo para listar un dato especifico
        $data = $this->model->obtenerRegistro($id);
        require_once 'views/header.php';
        require_once 'views/categorias/editar.php';
        require_once 'views/footer.php';
    }
    public function BorrarCatego(){
        // Capturamos el id enviado por get
        $id = $_REQUEST['id'];
        require_once 'views/header.php';
        require_once 'views/categorias/borrar.php';
        require_once 'views/footer.php';
    }
    /** Fin de llamado de la vistas */

    /** Metodos CRUD */   
    public function CrearCategorias(){
        // capturo los valores enviados por post o get
            $this->model->categoria   = $_REQUEST['categoria'];

                // utilizamos el metodo de guardar de SQL
                if($this->model->RegistrarCategorias($this->model)){
                    $texto = "Registro exitosamente";
                    $tipo = "success";
                    $this->model->SesionesMessage($texto, $tipo);
                }else{
                    $texto = "Ocurrio un error";
                    $tipo = "error";
                    $this->model->SesionesMessage($texto, $tipo);
                }
        }
    function ActualizarCategoria(){
        // capturo los valores enviados por post o get

        $this->model->id_categoria         = $_REQUEST['id_categoria'];
        $this->model->categoria        = $_REQUEST['categoria'];
        // utilizamos el metodo de guardar de SQL
        if($this->model->actualizarCategor($this->model)){
            $texto = "Actualizó exitosamente";
            $tipo = "success";
            $this->model->SesionesMessage($texto, $tipo);
        }else{
            $texto = "Ocurrio un error";
            $tipo = "error";
            $this->model->SesionesMessage($texto, $tipo);
        }
    }


    function BorrarCategoria(){
        // capturo los valores enviados por post o get
        $this->model->id = $_REQUEST['id'];
        // utilizamos el metodo de guardar de SQL
        if($this->model->BorrarCategoria($this->model)){            
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