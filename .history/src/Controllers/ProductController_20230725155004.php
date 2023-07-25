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


public function EditProduct()
{
    // Check if the form is submitted (POST request)
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idProduct'])) {
        $idProduct = $_POST['idProduct'];
        $reference = $_POST['reference'];
        $description = $_POST['description'];
        $priceTaxIncl = $_POST['priceTaxIncl'];
        $priceTaxExcl = $_POST['priceTaxExcl'];
        $quantity = $_POST['quantity'];
        $idLang = $_POST['idLang'];

        $productRepository = new ProductRepository;
        $result = $productRepository->updateProduct($idProduct, $reference, $description, $priceTaxIncl, $priceTaxExcl, $idLang, $quantity);

        if ($result) {
            // Product updated successfully, redirect to the product list page
            header('Location: index.php?action=AfficheCrud');
            exit();
        } else {
            // Failed to update product, handle the error (optional)
            $error = 'Failed to update product.';
        }
    }

    // Check if the product ID is provided in the URL (GET request)
    
        $idProduct = $_GET['id'];
        $productRepository = new ProductRepository;
        $product = $productRepository->getProductById($idProduct);
        


        // Check if the product exists in the datab
        // Fetch all languages for the select dropdown
        $languageRepository = new LanguageRepository;
        $languages = $languageRepository->getAllLanguages();

        require_once(dirname(__FILE__, 2) . '/View/EditProduct.php');
    
    }


}
