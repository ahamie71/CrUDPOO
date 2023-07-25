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
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Foot\Entity\Product');
        $stmt->execute();
        $products = $stmt->fetchAll();
        return $products;
    }
    
    public function getPostById($id)
    {
        $bdd = new Database();
        $req = "SELECT Post.user_id, Post.id , Post.image, Post.created_at,Post.title,Post.content,User.username FROM Post
        LEFT JOIN User ON Post.user_id = user.id
         WHERE Post.id =  $id";
        $stmt = $bdd->getPDO()->prepare($req);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Foot\Entity\Post');
        $stmt->execute();
        $post = $stmt->fetch();
        return $post;
    }

    public function addPost($user_id, $title, $content, $image, $createdAt)
    {
        $bdd = new Database();
        $query = $bdd->getPDO()->prepare("INSERT INTO Post(user_id,title,content,image,created_at)VALUES(?,?,?,?,?)");
        $query->execute([
            $_SESSION['user']->getId(),
            $title,
            $content,
            $image,
            $createdAt
        ]);
    }

    public function RemovePost($id)
    {
        $bdd = new Database();
        $sql = "DELETE FROM Post WHERE id= $id";
        $delet = $bdd->getPDO()->prepare($sql);
        $delet->execute();
    }

    public function editPost($content, $id, $title)
    {
        $bdd = new Database();
        $update = $bdd->getPDO()->prepare("UPDATE  Post SET content=:content , title=:title WHERE id = $id");
        $update->execute(
            array(
                ':content' => $content,
                ':title' => $title
            )
        );
    }
}
