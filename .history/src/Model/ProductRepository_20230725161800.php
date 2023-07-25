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
    $bdd = new Database();
    $req = "SELECT products.idLang, products.idProduct, products.reference, products.description, products.priceTaxIncl, products.priceTaxExcl, products.quantity, languages.LanguageName 
            FROM products
            LEFT JOIN languages ON products.idLang = languages.idLang
            WHERE products.idProduct = ?";
    $stmt = $bdd->getPDO()->prepare($req);
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'CrudPOO\Entity\Product');
    $stmt->execute([$idProduct]);
    $product = $stmt->fetch();
    return $product;
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
//     {
//         $bdd = new Database();
//         $sql = "DELETE FROM Post WHERE id= $id";
//         $delet = $bdd->getPDO()->prepare($sql);
//         $delet->execute();
//     }

  
public function updateProduct($idProduct, $reference, $description, $priceTaxIncl, $priceTaxExcl, $idLang, $quantity)
{
    $bdd = new Database();
    $req = "UPDATE products 
            SET reference = ?, 
                description = ?, 
                priceTaxIncl = ?, 
                priceTaxExcl = ?, 
                idLang = ?, 
                quantity = ? 
            WHERE idProduct = ?";
    $stmt = $this->bdd->getPDO()->prepare($req);
    $result = $stmt->execute([$reference, $description, $priceTaxIncl, $priceTaxExcl, $idLang, $quantity, $idProduct]);

    // Return true if the update was successful, otherwise, return false
    return $result;
}
}
