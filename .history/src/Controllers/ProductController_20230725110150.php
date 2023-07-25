<?php

namespace  CrudPOO\Controllers;

use CrudPOO\Entity\Product;
use CrudPOO\Model\ProductRepository;

Class ProductController extends AbstractController
{
    public function DisplayPosts()
    {
      
      $productRepository = new ProductRepository;
      $products = $ProductRepository->displayPosts();
      $this->render($posts);
  
    }

}
