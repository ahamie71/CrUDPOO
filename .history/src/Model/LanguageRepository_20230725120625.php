<?php 

namespace CrudPOO\Model;


use PDO;
use CrudPOO\Entity\Database;

Class LanguageRepository
 {

    function getAllLanguages()
{
    $bdd = new Database();
    $query = $bdd->getPDO()->prepare("SELECT * FROM languages");
    $query->execute();
    $languages = $query->fetchAll();
    return $languages;
}
   


}