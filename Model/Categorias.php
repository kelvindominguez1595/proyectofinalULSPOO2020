<?php
class Categorias{
    # atributos 
    private $DB; // para la conexion de la base de datos
    public $id_categoria;
    public $categoria;
    
    public function __CONSTRUCT(){
        try{
            $this->DB = Database::Conexion();
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }

    public function RegistrarCategorias($data){
        try{
            // Comando SQL
            $sql = "INSERT INTO categorias (categoria) VALUES(?)";
            // COMENZAMOS LA CONEXION CON PDO
            $pre = $this->DB->prepare($sql);
            $resul = $pre->execute(array($data->categoria));
            if($resul > 0){ 
                return true;
            }else{ 
                return false;
            }
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }
    // Metodo para listar los roles
    public function ListarCategorias(){
        try{        
            $commd = $this->DB->prepare("SELECT * FROM categorias");
            $commd->execute();
            return $commd->fetchAll(PDO::FETCH_OBJ);
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }

    // Metodo para obtener un registro en especifico
    public function obtenerRegistro($id){
        try{        
            $commd = $this->DB->prepare("SELECT * FROM categorias WHERE id_categoria = ?");
            $commd->execute(array($id));
            return $commd->fetch(PDO::FETCH_OBJ);
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }

    // Actualizar
    public function actualizarCategor($data){
        try{
            // Comando SQL
            $sql = "UPDATE categorias SET categoria = ? WHERE id_categoria = ?";
            // COMENZAMOS LA CONEXION CON PDO
            $pre = $this->DB->prepare($sql);
            $resul = $pre->execute(array($data->categoria, $data->id_categoria));
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
    public function DeleteCategoria($data){
        try{
            // Comando SQL
            $sql = "DELETE FROM categorias WHERE id_categoria = ?";
            // COMENZAMOS LA CONEXION CON PDO
            $pre = $this->DB->prepare($sql);
            $resul = $pre->execute(array($data->id_categoria));
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
        header("Location: ?view=Categorias");
    }

    /** Para mostrar en el menu las categorias */
    public function menuPanel1(){
        try{        
            $commd = $this->DB->prepare("SELECT * FROM categorias  ORDER BY categoria asc LIMIT 10");
            $commd->execute();
            return $commd->fetchAll(PDO::FETCH_OBJ);
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }
    public function menuPanel2(){
        try{        
            $commd = $this->DB->prepare("SELECT * FROM categorias ORDER BY categoria desc LIMIT 5");
            $commd->execute();
            return $commd->fetchAll(PDO::FETCH_OBJ);
        }catch(Throwable $t){
            die($t->getMessage());
        }
    }


}
?>