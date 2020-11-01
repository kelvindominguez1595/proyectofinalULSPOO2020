<?php
// importamos nuestro modelo
require_once 'Model/Productos.php';
class ProductosController{
    // para accender al modelo y sus atributos
    private $model;

    // Constructos
    public function __CONSTRUCT(){
        $this->model = new Productos();
    }

   /** Inicio de llamado de la vistas */
    public function Index(){
        require_once 'views/header.php';
        require_once 'views/productos/index.php';
        require_once 'views/footer.php';
    }

    public function NuevoProducto(){
        require_once 'views/header.php';
        require_once 'views/productos/crear.php';
        require_once 'views/footer.php';
    }

    public function EditarProduct(){
        // Capturamos el id enviado por get
        $id = $_REQUEST['id'];
        // crear el metodo para listar un dato especifico
        $data = $this->model->obtenerRegistro($id);
        require_once 'views/header.php';
        require_once 'views/productos/editar.php';
        require_once 'views/footer.php';
    }
    public function BorrarProduct(){
        // Capturamos el id enviado por get
        $id = $_REQUEST['id'];
        require_once 'views/header.php';
        require_once 'views/productos/borrar.php';
        require_once 'views/footer.php';
    }
    /** Fin de llamado de la vistas */

    /** Metodos CRUD */   
    public function CrearProducto(){
        // capturo los valores enviados por post o get
        $this->model->id_categoria        = $_REQUEST['id_categoria'];
        $this->model->id_marca_producto   = $_REQUEST['id_marca_producto'];
        $this->model->NombreProducto      = $_REQUEST['NombreProducto'];
        $this->model->imagen              = $_REQUEST['imagen'];
        $this->model->cantidad            = $_REQUEST['cantidad'];
        $this->model->precioVenta         = $_REQUEST['precioCompra'];
        $this->model->precioCompra        = $_REQUEST['precioVenta'];
        // utilizamos el metodo de guardar de SQL
        if($this->model->RegistrarProducto($this->model)){
            $texto = "Registro exitosamente";
            $tipo = "success";
            $this->model->SesionesMessage($texto, $tipo);
        }else{
            $texto = "Ocurrio un error";
            $tipo = "error";
            $this->model->SesionesMessage($texto, $tipo);
        }
    }

    public function ActualizarPro(){
        // capturo los valores enviados por post o get
        $this->model->id_producto         = $_REQUEST['id_producto'];
        $this->model->id_categoria        = $_REQUEST['id_categoria'];
        $this->model->id_marca_producto   = $_REQUEST['id_marca_producto'];
        $this->model->NombreProducto      = $_REQUEST['NombreProducto'];
        $this->model->imagen              = $_REQUEST['imagen'];
        $this->model->cantidad            = $_REQUEST['cantidad'];
        $this->model->precioVenta         = $_REQUEST['precioCompra'];
        $this->model->precioCompra        = $_REQUEST['precioVenta'];
        // utilizamos el metodo de guardar de SQL
        if($this->model->actualizarPro($this->model)){
            $texto = "Actualizó exitosamente";
            $tipo = "success";
            $this->model->SesionesMessage($texto, $tipo);
        }else{
            $texto = "Ocurrio un error";
            $tipo = "error";
            $this->model->SesionesMessage($texto, $tipo);
        }
    }

    public function BorrarPro(){
        // capturo los valores enviados por post o get
        $this->model->id = $_REQUEST['id'];
        // utilizamos el metodo de guardar de SQL
        if($this->model->BorrarProducto($this->model)){            
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