<?php

require_once(dirname(__DIR__) . '/Autoloader.php');

use Foot\Controllers\HomeController;


if (isset($_GET['action'])) {

    $action = $_GET['action'];

    switch ($action) {

        case 'Home';
            $controller = new HomeController();
            $controller->Home();
            break;
       
        case 'DisplayCom';
            $controller = new CommentController();
            $controller->getComment();
            break;
        case 'DeleteComment';
            $controller = new CommentController();
            $controller->RemoveComments();
            break;
    }

} else {
    $home = new HomeController();
    $home->Home();
}
;
