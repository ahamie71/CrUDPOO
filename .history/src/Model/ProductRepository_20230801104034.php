<?php
namespace CrudPOO\Model;


use PDO;
use CrudPOO\Entity\Database;

class ProductRepository
{
    public function getProducts()
    {
        $bdd = new Database();
        $req = " SELECT products.idLang, products.idProduct , products.reference, products.description,products.priceTaxIncl,products.priceTaxExcl,products.quantity,languages.LanguageName FROM products
        LEFT JOIN languages ON products.idLang = languages.idLang";
        $stmt = $bdd->getPDO()->prepare($req);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'CrudPOO\Entity\Product');
        $stmt->execute();
        $products = $stmt->fetchAll();
        return $products;
    }

    public function getProductById($idProduct)
    {
        // Activer les rapports d'erreurs
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
    
        try {
            $bdd = new Database();
            $req = "SELECT products.idLang, products.idProduct, products.reference, products.description, products.priceTaxIncl, products.priceTaxExcl, products.quantity, languages.LanguageName 
                    FROM products
                    LEFT JOIN languages ON products.idLang = languages.idLang
                    WHERE products.idProduct = ?";
            $stmt = $bdd->getPDO()->prepare($req);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product'); // Assurez-vous que 'Product' est le nom de la classe Product
            $stmt->execute([$idProduct]);
    
            $product = $stmt->fetch();
    
            return $product;
        } catch (PDOException $e) {
            // Gérer les erreurs PDO
            echo "Erreur PDO : " . $e->getMessage();
        } catch (Exception $e) {
            // Gérer les autres erreurs
            echo "Erreur : " . $e->getMessage();
        }
    }
    
    


    function createProduct($reference, $description, $priceTaxIncl, $priceTaxExcl, $idLang, $quantity)
    {

        $bdd = $bdd = new Database();


        $query = $bdd->getPDO()->prepare("INSERT INTO products (reference, description, priceTaxIncl, priceTaxExcl, idLang, quantity) VALUES (?, ?, ?, ?, ?, ?)");


        $query->execute([
            $reference,
            $description,
            $priceTaxIncl,
            $priceTaxExcl,
            $idLang,
            $quantity
        ]);


        if ($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }


    //     public function RemovePost($id)
    // {
    //     $bdd = new Database();
    //     $sql = "DELETE FROM Post WHERE id= $id";
    //     $delet = $bdd->getPDO()->prepare($sql);
    //     $delet->execute();
    // }

  
public function updateProduct($idProduct, $reference, $description, $priceTaxIncl, $priceTaxExcl, $idLang, $quantity)
{
    $bdd = new Database();
    $query = $bdd->getPDO()->prepare("UPDATE products 
                          SET reference = ?, 
                              description = ?, 
                              priceTaxIncl = ?, 
                              priceTaxExcl = ?, 
                              idLang = ?, 
                              quantity = ? 
                          WHERE idProduct = ?");
    $result = $query->execute([
        $reference,
        $description,
        $priceTaxIncl,
        $priceTaxExcl,
        $idLang,
        $quantity,
        $idProduct // Ajoutez l'ID du produit pour la clause WHERE de la mise à jour
    ]);

    // Retourne true si la mise à jour a réussi, sinon retourne false
    return $result;
}
public function deleteProduct($idProduct)
{
    $bdd = new Database();
    $query = $bdd->getPDO()->prepare("DELETE FROM products WHERE idProduct = ?");
    $result = $query->execute([$idProduct]);
    return $result;
}

}
