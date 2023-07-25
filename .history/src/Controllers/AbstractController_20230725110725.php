<?php

namespace CrudPOO\Controllers;

abstract class AbstractController
{
    public function render($products)
    {
        require_once(dirname(__FILE__1) . '/View/CrudPage.php');
        
    }

}