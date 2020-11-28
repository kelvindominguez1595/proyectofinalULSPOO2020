<?php
require_once 'Model/Productos.php';
class HomeController{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new Productos();
    }

    public function Index(){
        require_once 'views/header.php';
        require_once 'views/home.php';
        require_once 'views/footer.php';
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