<?php
namespace  CrudPOO\Entity;

use CrudPOO\Entity\Product;




class API {
    private $conn;
    private $product;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
        $this->product = new Product($this->conn);
    }

   
}
