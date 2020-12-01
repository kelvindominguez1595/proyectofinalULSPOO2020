<?php
class Ventas{
    # atributos 
    private $DB; // para la conexion de la base de datos
    public $id_venta;
    public $id_usuario;
    public $fechaCompra;
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
    }
?>