<?php


spl_autoload_register(function ($className) {

    $className = str_replace("CrudPOO\\", '', $className);
    $className = str_replace("\\", '/', $className);
    require_once(__DIR__ ,1 . "/src/$className.php");

});