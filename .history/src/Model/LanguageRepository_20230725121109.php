<?php 

namespace CrudPOO\Model;


use PDO;
use CrudPOO\Entity\Database;

Class LanguageRepository
 {

    function getAllLanguages()
{
    $bdd = new Database();
    $req = "SELECT * FROM languages";
    $stmt = $bdd->getPDO()->prepare($req);
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'CrudPOO\Entity\language');
    $stmt->execute();
    $languages = $stmt->fetch();
    return $languages;
}
   


}