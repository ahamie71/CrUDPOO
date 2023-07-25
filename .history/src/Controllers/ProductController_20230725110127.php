<?php

namespace  CrudPOO\Controllers;

use CrudPOO\Entity\Product;
use CrudPOO\Model\ProductRepository;

Class ProductController extends AbstractController
{
    public function DisplayPosts()
    {
      
      $postRepository = new ProductRepository;
      $products = $Repository->displayPosts();
      $this->render($posts);
  
    }

}
