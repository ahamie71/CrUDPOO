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
        try {
            $bdd = new Database();
            $req = "SELECT products.idLang, products.idProduct, products.reference, products.description, products.priceTaxIncl, products.priceTaxExcl, products.quantity, languages.LanguageName 
                    FROM products
                    LEFT JOIN languages ON products.idLang = languages.idLang
                    WHERE products.idProduct = ?";
            $stmt = $bdd->getPDO()->prepare($req);
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'CrudPOO\Model\CrudPOO\Entity\Product');
            $stmt->execute([$idProduct]);
    
            $product = $stmt->fetch();
    
            return $product;
        } catch (PDOException $e) {
            // Handle any PDO exceptions here
            // For example, you can log the error or show a user-friendly message
            echo "Error: " . $e->getMessage();
            return null; // Return null or handle the error in an appropriate way
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
