<?php

namespace  CrudPOO\Controllers;

use CrudPOO\Entity\Product;
use CrudPOO\Model\ProductRepository;

Class ProductController extends AbstractController
{
    public function DisplayProducts()
    {
      
      $productRepository = new ProductRepository;
      $products = $productRepository->getProducts();
      $this->render($products);
  
    }

}
