<?php
// importamos nuestro modelo
require_once 'Model/Productos.php';
require_once 'Model/Marcas.php';
require_once 'Model/Categorias.php';
require_once 'Model/ImagenDetails.php';
class ProductosController{
    // para accender al modelo y sus atributos
    private $model;
    private $modelMarcas; 
    private $modelCategorias;
    private $modelImagenDetails;

    // Constructos
    public function __CONSTRUCT(){
        $this->model = new Productos();
        $this->modelMarcas = new Marcas();
        $this->modelCategorias = new Categorias();
        $this->modelImagenDetails = new ImagenDetails();
    }

   /** Inicio de llamado de la vistas */
   public function Index(){
    require_once 'views/backend/header.php';
    require_once 'views/backend/productos/index.php';
    require_once 'views/backend/footer.php';
}

    public function NuevoProducto(){
        require_once 'views/backend/header.php';
        require_once 'views/backend/productos/crear.php';
        require_once 'views/backend/footer.php';
    }

    public function EditarProduct(){
        // Capturamos el id enviado por get
        $id = $_REQUEST['id'];
        // crear el metodo para listar un dato especifico
        $data = $this->model->obtenerRegistro($id);
        require_once 'views/backend/header.php';
        require_once 'views/backend/productos/editar.php';
        require_once 'views/backend/footer.php';
    }

    public function BorrarProduct(){
        // Capturamos el id enviado por get
        $id = $_REQUEST['id'];
        require_once 'views/backend/header.php';
        require_once 'views/backend/productos/borrar.php';
        require_once 'views/backend/footer.php';
    }
    /** Fin de llamado de la vistas */

    /** Metodos CRUD */   
    public function CrearProducto(){
        // capturo los valores enviados por post o get
        if(!empty($_FILES['imagen']['name'][0])){
            $this->model->id_categoria        = $_REQUEST['id_categoria'];
            $this->model->id_marca_producto   = $_REQUEST['id_marca_producto'];
            $this->model->NombreProducto      = $_REQUEST['NombreProducto'];    
            $this->model->cantidad            = $_REQUEST['cantidad'];
            $this->model->precioVenta         = $_REQUEST['precioCompra'];
            $this->model->precioCompra        = $_REQUEST['precioVenta'];
            $this->model->detalles            = $_REQUEST['detalles'];

            // Para guardar la imagen en la tabla productos 
            $tmpImagenPro = $_FILES['imagen']['tmp_name'][0];
            $nameImagenPro = $_FILES['imagen']['name'][0];
            $extratmp = explode(".", $nameImagenPro);
            $ext1 = $extratmp[count($extratmp)-1];
            $newImgPro = date('s').rand(1,99).".".$ext1;
            $ruta = "assets/img/".$newImgPro;
            copy($tmpImagenPro, $ruta); // copiamos los archivos al destino
            $this->model->imagen   = $newImgPro;// llenamos el cmapo imagen
            // Guardamos en la tabla productos
            $resInser = $this->model->RegistrarProducto($this->model);
                // // utilizamos el metodo de guardar de SQL
                if(!empty($resInser)){

                   $this->modelImagenDetails->producto_id = $resInser;
                    $countFiles = count($_FILES['imagen']['name']);
                    // recorremos todos las imagenes con for
                    for ($i=0; $i < $countFiles; $i++) { 
                        $tmpImagen = $_FILES['imagen']['tmp_name'][$i];
                        $nameImgan = $_FILES['imagen']['name'][$i];
                        // renombramos el archivo
                        $res = explode(".", $nameImgan);
                        $extension = $res[count($res)-1];
                        $newNameImagen = date('s').rand(1,99).".".$extension;
                        // la ruta donde se alojara los archivos
                        $destino = "assets/img/".$newNameImagen;
                        // copiamos todos los archivos a la ruta
                        copy($tmpImagen, $destino); // copiamos los archivos al destino 
                        // Al finalizar vamos a guardar el nombre de carda archivo en base de datos
                        $this->modelImagenDetails->imagen = $newNameImagen;
                        $this->modelImagenDetails->registrarImagenes($this->modelImagenDetails);
                    }
                    $texto = "Registro exitosamente";
                    $tipo = "success";
                    $ruta = "Productos";
                    $this->model->SesionesMessage($texto, $tipo, $ruta);
                }else{
                    $texto = "Ocurrio un error";
                    $tipo = "error";
                    $ruta = "Productos";
                    $this->model->SesionesMessage($texto, $tipo, $ruta);
                }            
        }else{
            $texto = "Todos los campos son obligatorios";
            $tipo = "danger";
            $ruta = "Productos&action=NuevoProducto";
            $this->model->SesionesMessage($texto, $tipo, $ruta);
        }

    }

    public function ActualizarPro(){
        // capturo los valores enviados por post o get
        $this->model->id_producto         = $_REQUEST['id_producto'];
        $this->model->id_categoria        = $_REQUEST['id_categoria'];
        $this->model->id_marca_producto   = $_REQUEST['id_marca_producto'];
        $this->model->NombreProducto      = $_REQUEST['NombreProducto'];

        $this->model->cantidad            = $_REQUEST['cantidad'];
        $this->model->precioVenta         = $_REQUEST['precioCompra'];
        $this->model->precioCompra        = $_REQUEST['precioVenta'];

        if(!empty($_FILES['imagen']['name'])){
            // borro la imagen anterior
            unlink("assets/img/".$_REQUEST['imgdefault']);
            // hay datos en el file
            $nameImgan = $_FILES['imagen']['name'];
            $tmpImagen = $_FILES['imagen']['tmp_name'];
            // ruta de donde guardaremos la imagen
            $res = explode(".", $nameImgan);
            $extension = $res[count($res)-1];
            $newNameImagen = date('s').rand(1,99).".".$extension;
            $destino = "assets/img/".$newNameImagen;
            copy($tmpImagen, $destino); // copiamos los archivos al destino
            $this->model->imagen = $newNameImagen;// llenamos el cmapo imagen
            
        }else{
            $this->model->imagen = $_REQUEST['imgdefault'];
        }
            // utilizamos el metodo de guardar de SQL
            if($this->model->actualizarPro($this->model)){
                $texto = "Actualizó exitosamente";
                $tipo = "success";
                $ruta = "Productos";
                $this->model->SesionesMessage($texto, $tipo, $ruta);
            }else{
                $texto = "Ocurrio un error";
                $tipo = "error";
                $ruta = "Productos";
                $this->model->SesionesMessage($texto, $tipo, $ruta);
            }
        
    }

    public function BorrarPro(){
        // capturo los valores enviados por post o get
        $this->model->id = $_REQUEST['id'];
        // utilizamos el metodo de guardar de SQL
        if($this->model->BorrarProducto($this->model)){            
            $texto = "Registro borrado exitosamente";
            $tipo = "success";
            $ruta = "Productos";
            $this->model->SesionesMessage($texto, $tipo, $ruta);
        }else{
            $texto = "Ocurrio un error ";
            $tipo = "error";
            $ruta = "Productos";
            $this->model->SesionesMessage($texto, $tipo, $ruta);
        }
    }

    /**
     *  Vista del cliente final
     */

    public function Details(){
        // Capturamos el id enviado por get
        $id = $_REQUEST['id'];
        // crear el metodo para listar un dato especifico
      //  $data = $this->model->obtenerRegistro($id);
        require_once 'views/frontend/header.php';
        require_once 'views/frontend/Shopping/details.php';
        require_once 'views/frontend/footer.php';
    }
}
?>