<?php

namespace CrudPOO\Controllers;

abstract class AbstractController
{
    public function render($products)
    {
        require_once(dirname(__FILE__,3) . '/View/CrudPage.php');
        
    }

}