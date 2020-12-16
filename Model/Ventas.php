<?php
class Ventas{
    # atributos 
    private $DB; // para la conexion de la base de datos
    public $id_venta;
    public $id_usuario;
    public $orderID;
    public $payerID;
    public $paymentID;
    public $paymentToken;
    // detalle venta
    public $idventa;
    public $idproducto;
    public $cantidad;
    public $descuento;

    public function __CONSTRUCT(){
        try{
            $this->DB = Database::Conexion();
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }
    // Metodo para listar los roles
    public function ListaVentas(){
        try{        
            $commd = $this->DB->prepare("SELECT dvp.id, u2.nombres, u2.apellidos, dvp.idproducto, dvp.idventa, SUM(dvp.cantidad) as totalCan, SUM(p.precioCompra) as totalPreCo, sum(p.precioVenta) as totalPrecioVenta,p.NombreProducto, p.precioCompra, p.precioVenta , p.fechaCompra, v.fechaCompra as fc FROM ventas v INNER JOIN detalle_venta_producto dvp ON v.id_venta = dvp .idventa INNER JOIN productos p ON dvp.idproducto = p.id_producto INNER join usuarios u2 on u2.id = v.id_usuario  GROUP BY dvp.idventa ");
            $commd->execute();
            return $commd->fetchAll(PDO::FETCH_OBJ);
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }

    // Metodo para obtener un registro en especifico
    public function obtenerRegistro($id){
        try{        
            $commd = $this->DB->prepare("SELECT dvp.id, dvp.idventa , dvp.idproducto, dvp.cantidad as cantiVenta, dvp.descuento, p.NombreProducto, p.precioCompra, p.precioVenta FROM detalle_venta_producto dvp INNER JOIN productos p ON dvp.idproducto = p.id_producto WHERE dvp.idventa = ?");
            $commd->execute(array($id));
            return $commd->fetchAll(PDO::FETCH_OBJ);
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

    // para ver los ultimos productos vendidos 
    public function MasVendidos(){
        try{
            $commd = $this->DB->prepare("SELECT dvt.idproducto, pro.id_producto, pro.NombreProducto, pro.imagen, pro.cantidad, pro.precioVenta, pro.precioCompra, pro.fechaCompra, pro.detalles, cat.categoria, mar.nombre_marca, SUM(dvt.cantidad) as totaventas FROM productos as pro INNER JOIN categorias as cat ON pro.id_categoria = cat.id_categoria INNER JOIN marcas as mar ON  pro.id_marca_producto = mar.id INNER JOIN  detalle_venta_producto as dvt on pro.id_producto = dvt.idproducto group by idproducto order by SUM(dvt.cantidad) DESC");
            $commd->execute();
            return $commd->fetchAll(PDO::FETCH_OBJ);
        }catch(Throwable $t){
            die($t->getMessage());
        }
     }

     // Para registrar la venta del producto que lleva

     public function datosVenta($data){
        try{
            // Comando SQL
            $sql = "INSERT INTO ventas(id_usuario, orderID, payerID, paymentID, paymentToken ) VALUES(?,?,?,?,?)";
            // COMENZAMOS LA CONEXION CON PDO    
            $pre = $this->DB->prepare($sql);
            $resul = $pre->execute(array($data->id_usuario, $data->orderID, $data->payerID, $data->paymentID, $data->paymentToken));
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

     public function detalleVenta($data){
        try{
            // Comando SQL
            $sql = "INSERT INTO detalle_venta_producto(idventa, idproducto, cantidad, descuento) VALUES(?,?,?,?)";
            // COMENZAMOS LA CONEXION CON PDO
            $pre = $this->DB->prepare($sql);
            $resul = $pre->execute(array($data->idventa, $data->idproducto, $data->cantidad, $data->descuento));
            return $resul;
            if($resul > 0){ 
                return true;
            }else{ 
                return false;
            }
        }catch(Throwable $t){
            die($t->getMessage());
        }
     }

     public function DesCantidadProducto($data){
        $commd = $this->DB->prepare("SELECT * FROM productos WHERE id_producto = ?");
        $commd->execute(array($data->idproducto));
        $pro = $commd->fetch(PDO::FETCH_OBJ);
        // metodo para hacer descuento de producto
        $can = $pro->cantidad - $data->cantidad;
        // // metodo para actualizar los datos
        // // Comando SQL
        $sql = "UPDATE productos SET cantidad = ? WHERE id_producto = ?";
        // COMENZAMOS LA CONEXION CON PDO
        $pre = $this->DB->prepare($sql);
        $resul = $pre->execute(array($can, $data->idproducto));
        if($resul > 0){ 
            return true;
        }else{ 
            return false;
        }
     }

     public function ventaPaypal($data){
        $sql = "UPDATE ventas SET orderID = ?, payerID = ?, paymentID = ?, paymentToken = ? WHERE id_venta = ?";
        // COMENZAMOS LA CONEXION CON PDO
        $pre = $this->DB->prepare($sql);
        $resul = $pre->execute(array($data->orderID, $data->payerID, $data->paymentID, $data->paymentToken, $data->id_venta));
        if($resul > 0){ 
            return true;
        }else{ 
            return false;
        }
     }

     /** para reporte */

         // Metodo para obtener un registro en especifico
    public function reportedeVenta(){
        try{        
            $commd = $this->DB->prepare("SELECT dvp.id, dvp.idventa , dvp.idproducto, dvp.cantidad as cantiVenta, dvp.descuento, p.NombreProducto, p.precioCompra, p.precioVenta FROM detalle_venta_producto dvp INNER JOIN productos p ON dvp.idproducto = p.id_producto");
            $commd->execute();
            return $commd->fetchAll(PDO::FETCH_OBJ);
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }
}
?>