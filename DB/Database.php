<?php
class Database
{
    private static $dbName = 'tienda_online';
    private static $dbHost = 'localhost';
    private static $dbUser = 'root';
    private static $password = ''; // si tiene contraseña escribirlar

    private static $cont = null;

    public function __construct(){
        die("La funcion no ha sido inicializada");
    }

    public function Conexion(){
        if(null == self::$cont){
            // manejador de exepciones
            try{
                self::$cont = new PDO("mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUser, self::$password);
            }catch(PDOException $e){
               die($e->getMessage()); 
            }
        }
        return self::$cont;
    }

    public function desconectarBD(){
        self::$cont = null;
    }

}
?>