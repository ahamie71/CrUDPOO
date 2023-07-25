<?php


require_once(dirname(__DIR__) . '/Autoloader.php');

use CrudPOO\Controllers\HomeController;
use CrudPOO\Controllers\ProductController;


if (isset($_GET['action'])) {

    $action = $_GET['action'];

    switch ($action) {

        case 'Home';
            $controller = new HomeController();
            $controller->Home();
            break;
       
         case'AfficheCrud';
         $controller = new ProductController();
         $controller->DisplayProducts();
         break; 
         case'createProduct';
         $controller = new ProductController();
         $controller->addProduct();
         break; 
         case'EditProduct';
         $controller = new ProductController();
         $controller->EditProduct();
         break; 
         case'DeleteProduct';
         $controller = new ProductController();
         $controller->EditProduct();
         break; 
        
         
    }


} else {
    $home = new HomeController();
    $home->Home();
}
;
