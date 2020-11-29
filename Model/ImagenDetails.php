
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
}
?>