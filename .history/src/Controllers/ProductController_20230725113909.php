<?php

namespace  CrudPOO\Controllers;

use CrudPOO\Model\ProductRepository;

Class ProductController extends AbstractController
{
    public function DisplayProducts()
    {
      
      $productRepository = new ProductRepository;
      $products = $productRepository->getProducts();
      $this->render($products);
  
    }


    function addProduct()
{
    
    if (
        empty($_POST['reference']) ||
        empty($_POST['description']) ||
        empty($_POST['priceTaxIncl']) ||
        empty($_POST['priceTaxExcl']) ||
        empty($_POST['quantity'])
    ) {
        $error = 'Please fill in all the required fields.';
    } else {
      
        $reference = $_POST['reference'];
        $description = $_POST['description'];
        $priceTaxIncl = $_POST['priceTaxIncl'];
        $priceTaxExcl = $_POST['priceTaxExcl'];
        $quantity = $_POST['quantity'];
        $idLang = $_POST['cat'];
        
        $produit = new Prod();
        $postRepository = new PostRepository;
        
        $result = createProduct($reference, $description, $priceTaxIncl, $priceTaxExcl, $idLang, $quantity);

        if ($result) {
         
            header('Location: index.php?action=display');
            exit();
        } else {
          
            $error = 'Failed to create product.';
        }
    }
    require_once(dirname(__FILE__, 2) . '/templates/formAjout.phtml');
}


}
