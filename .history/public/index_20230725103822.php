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
        case 'Register';
            $controller = new RegistrationController();
            $controller->Register();
            break;
        case 'DisplayOnePost';
    
            $controller = new PostController();
            $controller->DisplayOnePost();
           
            break;
        case 'AddPost';
            $controller = new PostController();
            $controller->CreatePost();
            break;
        case 'Delete';
            $controller = new PostController();
            $controller->DeletePost();
            break;
        case 'Edit';
            $controller = new PostController();
            $controller->UpdatePost();
            break;
        case 'Comment';
            $controller = new CommentController();
            $controller->addComment();
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
