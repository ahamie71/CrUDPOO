<?php

namespace  CrudPOO\Controllers;

use CrudPOO\Entity\Language;
use CrudPOO\Entity\Product;
use CrudPOO\Model\ProductRepository;
use CrudPOO\Model\LanguageRepository;


Class ProductController extends AbstractController
{


 

    public function getProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($_GET['id'])) {
                $idProduct = $_GET['id'];
                $productRepository = new ProductRepository();
                $product = $productRepository->getProductById($idProduct);
                var_dump($product)
        
                if ($product) {
                    // Renvoyer la réponse au format JSON
                    header('Content-Type: application/json');
                    echo json_encode($product);
                } else {
                    // Renvoyer une réponse d'erreur si le produit n'est pas trouvé
                    http_response_code(404);
                    echo json_encode(['error' => 'Product not found']);
                }
            } else {
                // Renvoyer une réponse d'erreur si l'id du produit n'est pas spécifié
                http_response_code(400);
                echo json_encode(['error' => 'Product id not specified']);
            }
        }
    }



   
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
    if (isset($_GET['id'])) {
        $idProduct = $_GET['id'];
        $productRepository = new ProductRepository;
        $product = $productRepository->getProductById($idProduct);

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Récupérez les données du formulaire d'édition
            $reference = $_POST['reference'];
            $description = $_POST['description'];
            $priceTaxIncl = $_POST['priceTaxIncl'];
            $priceTaxExcl = $_POST['priceTaxExcl'];
            $quantity = $_POST['quantity'];
            $idLang = $_POST['cat'];

            // Mettez à jour le produit en base de données
            $result = $productRepository->updateProduct($idProduct, $reference, $description, $priceTaxIncl, $priceTaxExcl, $idLang, $quantity);

            if ($result) {
                header('Location: index.php?action=AfficheCrud');
                exit();
            } else {
                $error = 'Failed to update product.';
            }
        }

        require_once(dirname(__FILE__, 2) . '/View/EditProduct.php');
    }
}
public function DeleteProduct()
{
    if (isset($_GET['id'])) {
        $idProduct = $_GET['id'];
        $productRepository = new ProductRepository;

        // Supprimez le produit en base de données
        $result = $productRepository->deleteProduct($idProduct);

        if ($result) {
            header('Location: index.php?action=AfficheCrud');
            exit();
        } else {
            $error = 'Failed to delete product.';
        }
    }
}

public function getProductById($id)
    {
        // Récupérer le produit en fonction de l'ID et renvoyer le résultat en JSON
        $productRepository = new ProductRepository();
        $product = $productRepository->getProductById($id);

        header('Content-Type: application/json');

        if ($product) {
            echo json_encode($product);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Produit non trouvé']);
        }
    }

    // ...
}





