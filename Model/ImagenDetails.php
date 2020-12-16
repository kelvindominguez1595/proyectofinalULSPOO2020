<?php
class ImagenDetails{
    # atributos 
    private $DB; // para la conexion de la base de datos
    public $id;
    public $producto_id;
    public $imagen;
    public function __CONSTRUCT(){
        try{
            $this->DB = Database::Conexion();
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }
    public function registrarImagenes($data){
        try{
            // Comando SQL
            $sql = "INSERT INTO imagen_details(producto_id, imagen) VALUES(?,?)";
            // COMENZAMOS LA CONEXION CON PDO
            $pre = $this->DB->prepare($sql);
            $resul = $pre->execute(array($data->producto_id, $data->imagen));
            if($resul > 0){ 
                return true;
            }else{ 
                return false;
            }
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }
    public function actualizarImagenes($data){
        try{
            // Comando SQL
            $sql = "UPDATE imagen_details SET imagen = ? WHERE id = ?";
            // COMENZAMOS LA CONEXION CON PDO
            $pre = $this->DB->prepare($sql);
            $resul = $pre->execute(array($data->imagen, $data->id));
            if($resul > 0){ 
                return true;
            }else{ 
                return false;
            }
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }
    // Metodo para obtener un registro en especifico
    public function listarRegistro($id){
        try{        
            $commd = $this->DB->prepare("SELECT * FROM imagen_details WHERE producto_id = ?");
            $commd->execute(array($id));
            return $commd->fetchAll(PDO::FETCH_OBJ);
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }
}
?>