<?php

require_once(dirname(__DIR__) . '/Autoloader.php');

use CrudPOO\Controllers\HomeController;


if (isset($_GET['action'])) {

    $action = $_GET['action'];

    switch ($action) {

        case 'Home';
            $controller = new HomeController();
            $controller->Home();
            break;
       
         case'AfficheCrud';
         $controller = new Prod();
         $controller->Home();
         break; 
    }

} else {
    $home = new HomeController();
    $home->Home();
}
;
