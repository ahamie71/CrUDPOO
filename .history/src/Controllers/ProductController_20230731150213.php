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
ProductRepository.php :

php
Copy code
// ProductRepository.php

// ... Importation des classes et espaces de noms ...

class ProductRepository
{
    // ...

    public function getProductById($id)
    {
        // Vous devez implémenter cette méthode pour récupérer un produit depuis la base de données en fonction de son idProduct.
        // Renvoyez le produit sous forme de tableau associatif ou d'objet.
        // Si le produit n'est pas trouvé, renvoyez NULL.
    }

    // ...
}
Assurez-vous que les méthodes du contrôleur et du modèle (ProductRepository) sont correctement implémentées pour interagir avec la base de données et renvoyer les données du produit au format JSON. N'oubliez pas de configurer correctement les routes dans index.php pour que les requêtes soient dirigées vers les bonnes méthodes du contrôleur.

Testez ensuite votre page API REST en utilisant des outils tels que Postman ou CURL pour effectuer des appels GET avec différents idProduct et vérifiez les réponses JSON renvoyées par l'API.




User
header('Content-Type: application/json');
ChatGPT
header('Content-Type: application/json'); est une instruction PHP utilisée pour définir le type de contenu de la réponse HTTP que le serveur envoie au client. Dans le contexte de notre exemple d'API REST, cette instruction est utilisée pour indiquer que la réponse renvoyée sera au format JSON.

Lorsqu'un client (tel que Postman ou un navigateur web) envoie une requête GET à notre API en spécifiant le type de contenu qu'il attend dans la réponse, notre API doit répondre en conséquence. En ajoutant header('Content-Type: application/json'); dans le code du contrôleur avant de renvoyer la réponse JSON, nous indiquons au client que la réponse sera au format JSON.

En spécifiant le type de contenu, le client saura comment interpréter la réponse qu'il reçoit. Dans ce cas, en utilisant application/json, le client comprendra qu'il doit traiter la réponse comme un objet JSON et pourra facilement l'analyser et extraire les données qu'il contient.

Assurez-vous d'utiliser header('Content-Type: application/json'); avant de renvoyer la réponse JSON dans toutes les méthodes du contrôleur où vous renvoyez des données au format JSON. Cela garantira que votre API respecte les conventions et que le client peut correctement traiter les réponses.








}


