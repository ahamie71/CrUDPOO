<?php 

namespace CrudPOO\Model;


use PDO;
use CrudPOO\Entity\Database;

Class LanguageRepository
 {

    function getAllLanguages()
{
    $bdd = new Database();
    $query = $->prepare("SELECT * FROM languages");
    $query->execute();
    $languages = $query->fetchAll(PDO::FETCH_ASSOC);
    return $languages;
}
   


}