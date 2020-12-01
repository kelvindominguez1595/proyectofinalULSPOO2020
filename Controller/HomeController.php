<?php
require_once 'Model/Productos.php';
require_once 'Model/Categorias.php';
require_once 'Model/Ventas.php';
class HomeController{
    private $model;
    private $modelCategorias;
    private $modelVentas;

    public function __CONSTRUCT(){
        $this->model = new Productos();
        $this->modelCategorias = new Categorias();
        $this->modelVentas = new Ventas();
    }

    public function Index(){        
        require_once 'views/backend/header.php';
        require_once 'views/backend/home.php';
        require_once 'views/backend/footer.php';
    }

    public function Home(){
        require_once 'views/frontend/header.php';
        require_once 'views/frontend/Home/index.php';
        require_once 'views/frontend/footer.php';
    }

    public function Shopping(){
        require_once 'views/frontend/header.php';
        require_once 'views/frontend/Shopping/index.php';
        require_once 'views/frontend/footer.php';
    }

    public function SingleProduct(){
        require_once 'views/frontend/header.php';
        require_once 'views/frontend/SingleProduct/index.php';
        require_once 'views/frontend/footer.php';
    }
    
    public function Contacto(){
        require_once 'views/frontend/header.php';
        require_once 'views/frontend/Contacto/index.php';
        require_once 'views/frontend/footer.php';
    }
}
?>