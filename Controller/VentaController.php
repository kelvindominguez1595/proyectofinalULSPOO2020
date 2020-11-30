<?php
require_once 'Model/Ventas.php';
class VentaController{

    private $model;

    public function __construct()
    {
        $this->model = new Ventas();
    }

    // metodo para agregar y quitar productos del carrito de compras
    public function shopping_cart(){
        if(isset($_REQUEST['btnAction'])){
            $opcion = $_REQUEST['btnAction'];
            switch($opcion){
                case 'Add':
                    $ID = $_REQUEST['producto_id'];
                    $nombre = $_REQUEST['item_name'];
                    $cantidad = $_REQUEST['cantidad'];
                    $img_product = $_REQUEST['img_product'];
                    $stock = $_REQUEST['stock'];
                    $precio = $_REQUEST['amount'];
                    $vista = $_REQUEST['vista'];
                    
                    if(!isset($_SESSION['carrito'])){
                        $producto = array(
                            'ID' => $ID,
                            'producto' => $nombre,
                            'img_product' => $img_product,
                            'cantidad' => $cantidad,
                            'stock' => $stock,
                            'precio' => $precio 
                        );
                        $_SESSION['carrito'][0] = $producto;
                        $tipo = "success";
                        $texto = "Producto Agregado";                            
                        $this->model->SesionesMessage($texto, $tipo, $vista);
                    }else{
                        // para verificar que si hay un indice que sea igual
                        $productosIdent = array_column($_SESSION['carrito'], "ID");
                        // validamos los indices si esta entonces agregar nada mas la cantidad
                        if(in_array($ID, $productosIdent)){       
                            // Si ya hay un producto solo se actualizara la cantidad de este
                            foreach ($_SESSION['carrito'] as $key => $val) {
                                    if($val['ID'] == $ID){// validamos si existe
                                        if( $val['cantidad'] < $val['stock']){// que no sobrepsa la cantidad
                                            $_SESSION['carrito'][$key]['cantidad']  += 1; // sumamos la cantida de 1 en 1 con el acumulador  

                                            $tipo = "success";
                                            $texto = "Producto Agregado";                            
                                            $this->model->SesionesMessage($texto, $tipo, $vista);
                                        }else{
                                            // caso contrario que no agregue mas
                                            $_SESSION['quitar'] = "No hay";
                                            $tipo = "error";
                                            $texto = "Ya no hay existencia del producto seleccionado";                            
                                            $this->model->SesionesMessage($texto, $tipo, $vista);
                                        }
                                    }
                            }
                            // mostramos el mensaje
                        }else{
                            $producto = array(
                                'ID' => $ID,
                                'producto' => $nombre,
                                'img_product' => $img_product,
                                'cantidad' => $cantidad,
                                'stock' => $stock,
                                'precio' => $precio
                            );
                            array_push($_SESSION['carrito'], $producto);
                            $tipo = "success";
                            $texto = "Producto Agregado";                            
                            $this->model->SesionesMessage($texto, $tipo, $vista);
                        }
                    }
                break;
                case 'Remove':
                    $idPro = $_REQUEST['producto_id'];
                    $vista = $_REQUEST['vista'];
                    foreach ($_SESSION['carrito'] as $item => $producto) {
                        if($producto['ID'] == $idPro){
                            unset($_SESSION['carrito'][$item]);
                        }
                    }
                    $tipo = "success";
                    $texto = "Producto borrado";                            
                    $this->model->SesionesMessage($texto, $tipo, $vista);
                break;
                case 'plus':
                    $idPro = $_REQUEST['producto_id'];
                    $vista = "Home&action=Shopping";
                    foreach ($_SESSION['carrito'] as $key => $val) {
                        if($val['ID'] == $idPro){// validamos si existe
                            if( $val['cantidad'] < $val['stock']){// que no sobrepsa la cantidad
                                $_SESSION['carrito'][$key]['cantidad']  += 1; // sumamos la cantida de 1 en 1 con el acumulador  

                                $tipo = "success";
                                $texto = "Producto Agregado";                            
                                $this->model->SesionesMessage($texto, $tipo, $vista);
                            }else{
                                // caso contrario que no agregue mas
                                $_SESSION['quitar'] = "No hay";
                                $tipo = "error";
                                $texto = "Ya no hay existencia del producto seleccionado 😓";                            
                                $this->model->SesionesMessage($texto, $tipo, $vista);
                            }
                        }
                    }
                break;
                case 'Restar':
                    $idPro = $_REQUEST['producto_id'];
                    $vista = "Home&action=Shopping";
                    foreach ($_SESSION['carrito'] as $key => $val) {
                        if($val['ID'] == $idPro){// validamos si existe
                            if($val['cantidad'] == 0){// que no sobrepsa la cantidad
                                // caso contrario que no agregue mas
                                unset($_SESSION['carrito'][$key]);
                                $_SESSION['quitar'] = "No haydasda";
                                $tipo = "success";
                                $texto = "Todos los productos han sido borrados";                            
                                $this->model->SesionesMessage($texto, $tipo, $vista);
                            }else{
                                $_SESSION['carrito'][$key]['cantidad'] -= 1; // sumamos la cantida de 1 en 1 con el acumulador  
                                $tipo = "success";
                                $texto = "Se descontado 1 producto";    
                                if( $_SESSION['carrito'][$key]['cantidad'] == 0){
                                    unset($_SESSION['carrito'][$key]);
                                    $texto = "Todos los productos han sido borrados";      
                                }                        
                                $this->model->SesionesMessage($texto, $tipo, $vista);
                            }
                        }
                    }
                break;
            }
        }
    }
} 
?>