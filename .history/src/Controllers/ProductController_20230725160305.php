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


// ProductController.php

public function EditProduct()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idProduct'])) {
        // Form submission, update the product

        $idProduct = $_POST['idProduct'];
        $reference = $_POST['reference'];
        // Add other form fields for updating the product
        // ...

        // Update the product in the database using the ProductRepository
        $productRepository = new ProductRepository;
        $result = $productRepository->updateProduct($idProduct, $reference, /* Add other form fields */);

        if ($result) {
            // Product updated successfully, redirect to the product list page
            header('Location: index.php?action=AfficheCrud');
            exit();
        } else {
            // Failed to update product, handle the error (optional)
            $error = 'Failed to update product.';
        }
    }

    // Form display or initial page load

    if (isset($_GET['id'])) {
        $idProduct = $_GET['id'];
        $productRepository = new ProductRepository;
        $product = $productRepository->getProductById($idProduct);

        if (!$product) {
            // Product not found, handle the situation (e.g., redirect to a 404 page)
            // For example: header('Location: index.php?action=NotFound');
            // Make sure to exit the script after redirection.
        }

        // Fetch all languages for the select dropdown
        $languageRepository = new LanguageRepository;
        $languages = $languageRepository->getAllLanguages();

        // Load the view to display the product edit form
        require_once(dirname(__FILE__, 2) . '/View/EditProduct.php');
    } else {
        // If the product ID is not provided in the URL, handle the situation accordingly
        // For example: redirect to a product list page
        // For example: header('Location: index.php?action=AfficheCrud');
        // Make sure to exit the script after redirection.
    }
}

