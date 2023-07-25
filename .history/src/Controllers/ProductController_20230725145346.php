<?php

namespace  CrudPOO\Controllers;

use CrudPOO\Entity\Language;
use CrudPOO\Entity\Product;
use CrudPOO\Model\ProductRepository;
use CrudPOO\Model\LanguageRepository;


Class ProductController extends AbstractController
{


   
    public function DisplayProducts()
    { 

       
      $productRepository = new ProductRepository;
      $products = $productRepository->getProducts();
      $this->render($products);
      
    }

   public  function addProduct()
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
      

        $produit = new Product();
        $productRepository = new ProductRepository;
        
        $produit = $productRepository->createProduct($reference, $description, $priceTaxIncl, $priceTaxExcl, $idLang, $quantity);

        if ($produit) {
            header('location:index.php?action=AfficheCrud');
            exit();
        } else {
          
            $error = 'Failed to create product.';
        }
    }
    
    require_once(dirname(__FILE__, 2) . '/View/AddProduct.php');
}


function modifProduct()

{
    
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $idProduct = $_POST['idProduct'];
    $reference = $_POST['reference'];
    $description = $_POST['description'];
    $priceTaxIncl = $_POST['priceTaxIncl'];
    $priceTaxExcl = $_POST['priceTaxExcl'];
    $idLang = $_POST['idLang'];
    $quantity = $_POST['quantity'];

    $produit = new Product();
    $productRepository = new ProductRepository;
    $result = updateProduct($idProduct, $reference, $description, $priceTaxIncl, $priceTaxExcl, $idLang, $quantity);
    if ($result) {
        header('Location: index.php?action=display');
        exit();
    } else {
        $error = 'Failed to update product.';
    }
}
$idProduct = $_GET['id']; 
$product = getProductById($idProduct);
require_once(dirname(__FILE__, 2) . '/templates/formModification.phtml');
}
 

}
