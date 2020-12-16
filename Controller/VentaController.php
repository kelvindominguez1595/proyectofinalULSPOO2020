<?php
require_once 'Model/Ventas.php';
require_once 'Model/Productos.php';
require_once 'assets/dompdf/autoload.inc.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;
class VentaController{

    private $model;
    private $modelPro;
    public function __construct()
    {
        $this->model = new Ventas();
        $this->modelPro = new Productos();
    }

    public function Index(){
        require_once 'views/backend/header.php';
        require_once 'views/backend/ventas/index.php';
        require_once 'views/backend/footer.php';
    }
    // PARA VER ELD ETALLE DEL PRODUCT
    public function VerDetalle(){
        // Capturamos el id enviado por get
        $id = $_REQUEST['id'];
        // crear el metodo para listar un dato especifico
        $data = $this->model->obtenerRegistro($id);
        require_once 'views/backend/header.php';
        require_once 'views/backend/ventas/detalle.php';
        require_once 'views/backend/footer.php';
    }
    /** para imprimir reporte de ventas y productos */
    public function ReporteVentaPDF(){
        // para guardar el html donde mostramos los datos
        ob_start(); // no sirve para iniciar un buffer
        require_once 'views/backend/ventas/ReporteVenta.php';
        $html = ob_get_clean(); // creo la variable html la cual le borrafe el buffer anterior creado
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->set_option('isHtml5ParserEnabled', true);
        $dompdf->set_option('isRemoteEnabled', true);
        $dompdf->loadHtml($html);
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('letter', 'portrait');
        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF to Browser
       return $dompdf->stream("dompdf_out.pdf", array("Attachment" => false,));
    }
    public function ReporteDeProductosPDF(){
        // para guardar el html donde mostramos los datos
        ob_start(); // no sirve para iniciar un buffer
        require_once 'views/backend/ventas/ReporteStock.php';
        $html = ob_get_clean(); // creo la variable html la cual le borrafe el buffer anterior creado
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->set_option('isHtml5ParserEnabled', true);
        $dompdf->set_option('isRemoteEnabled', true);
        $dompdf->loadHtml($html);
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('letter', 'portrait');
        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF to Browser
        return $dompdf->stream("dompdf_out.pdf", array("Attachment" => false,));
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