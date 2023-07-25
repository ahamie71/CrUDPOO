<?php
namespace CrudPOO\Model;


use PDO;
use CrudPOO\Entity\Database;

class ProductRepository
{
    public function getProducts()
    {
        $bdd = new Database();
        $req =" SELECT products.idLang, products.idProduct , products.reference, products.description,products.priceTaxIncl,products.priceTaxExcl,products.quantity,languages.LanguageName FROM products
        LEFT JOIN languages ON products.idLang = languages.idLang";
        $stmt = $bdd->getPDO()->prepare($req);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'CrudPOO\Entity\Product');
        $stmt->execute();
        $products = $stmt->fetchAll();
        return $products;
    }



//     public function getPostById($id)
//     {
//         $bdd = new Database();
//          $req =" SELECT products.idLang, products.idProduct , products.reference, products.description,products.priceTaxIncl,products.priceTaxExcl,products.quantity,languages.LanguageName FROM products
    LEFT JOIN languages ON products.idLang = languages.idLang;
    WHERE products.idProduct =  $idProduct";
//         $stmt = $bdd->getPDO()->prepare($req);
//         $stmt->setFetchMode(PDO::FETCH_CLASS, 'Foot\Entity\Post');
//         $stmt->execute();
//         $post = $stmt->fetch();
//         return $post;
//     }

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
}

//     public function RemovePost($id)
//     {
//         $bdd = new Database();
//         $sql = "DELETE FROM Post WHERE id= $id";
//         $delet = $bdd->getPDO()->prepare($sql);
//         $delet->execute();
//     }

//     public function editPost($content, $id, $title)
//     {
//         $bdd = new Database();
//         $update = $bdd->getPDO()->prepare("UPDATE  Post SET content=:content , title=:title WHERE id = $id");
//         $update->execute(
//             array(
//                 ':content' => $content,
//                 ':title' => $title
//             )
//         );
//     }
// }
