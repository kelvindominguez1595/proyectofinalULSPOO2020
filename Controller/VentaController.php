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
                        $_SESSION['texto'] = "Producto Agregado";
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
                                            $_SESSION['texto'] = "Producto Agregado";
                                        }else{
                                            // caso contrario que no agregue mas
                                            $_SESSION['quitar'] = "No hay";
                                            $_SESSION['texto'] = "Ya no hay existencia del producto seleccionado"; 
                                        }
                                    }
                            }// mostramos el mensaje

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
                            $_SESSION['texto'] = "Producto Agregado";
                        }
                    }
                   header("Location: ?view=".$vista);
                break;
                case 'Remove':
                    $idPro = $_REQUEST['producto_id'];
                    $vista = $_REQUEST['vista'];
                    foreach ($_SESSION['carrito'] as $item => $producto) {
                        if($producto['ID'] == $idPro){
                            unset($_SESSION['carrito'][$item]);
                            echo("<script>alert('Producto borrado')</script>");
                        }
                    }
                    $_SESSION['texto'] = "Producto borrado";
                   header("Location: ?view=".$vista);
                break;
            }
        }
    }
} 
?>