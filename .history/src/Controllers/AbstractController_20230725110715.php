<?php

namespace CrudPOO\Controllers;

abstract class AbstractController
{
    public function render($products)
    {
        require_once(dirname(__FILE__) . '/View/CrudPage.php');
        
    }

}