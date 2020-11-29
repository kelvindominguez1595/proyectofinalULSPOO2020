<?php
class Productos{
    # atributos 
    private $DB; // para la conexion de la base de datos
    public $id_producto;
    public $id_categoria;
    public $id_marca_producto;
    public $NombreProducto;
    public $imagen;
    public $cantidad;
    public $precioVenta;
    public $precioCompra;
    public $detalles;


    public function __CONSTRUCT(){
        try{
            $this->DB = Database::Conexion();
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }

    public function RegistrarProducto($data){
        try{
            // Comando SQL
            $sql = "INSERT INTO productos(id_categoria, id_marca_producto, NombreProducto, imagen, cantidad, precioVenta, precioCompra, detalles) VALUES(?,?,?,?,?,?,?,?)";
            // COMENZAMOS LA CONEXION CON PDO    
            $pre = $this->DB->prepare($sql);
            $resul = $pre->execute(array($data->id_categoria, $data->id_marca_producto, $data->NombreProducto, $data->imagen, $data->cantidad, $data->precioVenta, $data->precioCompra, $data->detalles));
            if($resul > 0){ 
                // para obtener el ultimo id del registro con PDO
                return $this->DB->lastInsertId();
            }else{ 
                return "";
            }
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }
    
    // Metodo para listar los roles
    public function ListarProductos(){
        try{        
            $commd = $this->DB->prepare("SELECT pro.id_producto, pro.NombreProducto, pro.imagen, pro.cantidad, pro.precioVenta, pro.precioCompra, pro.fechaCompra, cat.categoria, mar.nombre_marca FROM productos as pro INNER JOIN categorias as cat ON pro.id_categoria = cat.id_categoria INNER JOIN marcas as mar ON  pro.id_marca_producto = mar.id");
            $commd->execute();
            return $commd->fetchAll(PDO::FETCH_OBJ);
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }

    // Metodo para obtener un registro en especifico
    public function obtenerRegistro($id){
        try{        
            $commd = $this->DB->prepare("SELECT * FROM productos WHERE id_producto = ?");
            $commd->execute(array($id));
            return $commd->fetch(PDO::FETCH_OBJ);
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }

    // Actualizar
    public function actualizarPro($data){
        try{
            // Comando SQL
            $sql = "UPDATE productos SET id_categoria = ?, id_marca_producto = ?, NombreProducto = ?, imagen = ?, cantidad = ?, precioVenta = ?, precioCompra = ? WHERE id_producto = ?";

            // COMENZAMOS LA CONEXION CON PDO
            $pre = $this->DB->prepare($sql);
            $resul = $pre->execute(array($data->id_categoria, $data->id_marca_producto, $data->NombreProducto, $data->imagen, $data->cantidad, $data->precioVenta, $data->precioCompra, $data->id_producto));
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
    public function BorrarProducto($data){
        try{
            // Comando SQL
            $sql = "DELETE FROM productos  WHERE id_producto = ?";
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

        // Ultimos productos registrados
        public function latestProducts(){
            try{        
                $commd = $this->DB->prepare("SELECT pro.id_producto, pro.NombreProducto, pro.imagen, pro.cantidad, pro.precioVenta, pro.precioCompra, pro.fechaCompra, cat.categoria, mar.nombre_marca FROM productos as pro INNER JOIN categorias as cat ON pro.id_categoria = cat.id_categoria INNER JOIN marcas as mar ON  pro.id_marca_producto = mar.id WHERE pro.cantidad > 0 ORDER BY pro.fechaCompra ASC LIMIT 3");
                $commd->execute();
                return $commd->fetchAll(PDO::FETCH_OBJ);
            }catch(Throwable $t){
                die($t->getMessage());
            }
        }
    

}
?>