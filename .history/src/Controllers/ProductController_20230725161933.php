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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $idProduct = $_POST['idProduct'];
            $reference = $_POST['reference'];
            $description = $_POST['description'];
            $priceTaxIncl = $_POST['priceTaxIncl'];
            $priceTaxExcl = $_POST['priceTaxExcl'];
            $quantity = $_POST['quantity'];
            $idLang = $_POST['cat'];
        
            $productRepository = new ProductRepository();
            $result = $productRepository->updateProduct($idProduct, $reference, $description, $priceTaxIncl, $priceTaxExcl, $idLang, $quantity);
            
            if ($result) {
                header('Location: index.php?action=display');
                exit();
            } else {
                $error = 'Failed to update product.';
            }
        }

        // Récupérer les informations du produit pour afficher le formulaire de modification
        $idProduct = $_GET['id']; 
        $productRepository = new ProductRepository();
        $product = $productRepository->getProductById($idProduct);

        // Charger le formulaire de modification avec les informations du produit
        require_once(dirname(__FILE__, 2) . '/View/EditProduct.php');
    }

    // ...
}


