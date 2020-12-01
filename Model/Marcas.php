<?php
class Marcas{
    # atributos 
    private $DB; // para la conexion de la base de datos
    public $id ;
    public $nombre_marca;



    public function __CONSTRUCT(){
        try{
            $this->DB = Database::Conexion();
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }

    public function RegistrarMarca($data){
        try{
            // Comando SQL
            $sql = "INSERT INTO marcas(nombre_marca) VALUES(?)";
            // COMENZAMOS LA CONEXION CON PDO
            $pre = $this->DB->prepare($sql);
            $resul = $pre->execute(array($data->nombre_marca));
            if($resul > 0){ 
                return true;
            }else{ 
                return false;
            }
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }
    // Metodo para listar los Marcas
    public function ListarMarcas(){
        try{        
            $commd = $this->DB->prepare("SELECT * FROM marcas");
            $commd->execute();
            return $commd->fetchAll(PDO::FETCH_OBJ);
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }

    // public function listarPorMarcas($Consulta){
    //     try{      
    //         $commd = $this->DB->prepare("SELECT pro.id_producto, pro.NombreProducto, pro.imagen,pro.cantidad, pro.precioVenta,pro.precioCompra, pro.fechaCompra, pro.detalles,cat.categoria, mar.nombre_marca FROM productos as pro INNER JOIN categorias as cat ON pro.id_categoria = cat.id_categoria INNER JOIN marcas as mar ON  pro.id_marca_producto = mar.id WHERE ?");
    //         $commd->execute(array($Consulta));
    //        return $commd->fetchAll(PDO::FETCH_OBJ);
    //     }catch(Throwable $t){
    //         die($t->getMessage());
    //     }
    // }

    // Metodo para obtener un registro en especifico
    public function obtenerRegistro($id){
        try{        
            $commd = $this->DB->prepare("SELECT * FROM marcas WHERE id = ?");
            $commd->execute(array($id));
            return $commd->fetch(PDO::FETCH_OBJ);
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }

    // Actualizar
    public function actualizarMarc($data){
        try{
            // Comando SQL
            $sql = "UPDATE marcas SET nombre_marca = ? WHERE id = ? " ;

            // COMENZAMOS LA CONEXION CON PDO
            $pre = $this->DB->prepare($sql);
            $resul = $pre->execute(array($data->nombre_marca, $data->id));
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
    public function BorrarMarc($data){
        try{
            // Comando SQL
            $sql = "DELETE FROM marcas  WHERE id = ?";
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
    public function SesionesMessage($texto, $tipo){
        $_SESSION['texto'] = $texto;
        $_SESSION['tipo'] = $tipo;
        header("Location: ?view=Marcas");
    }

}
?>