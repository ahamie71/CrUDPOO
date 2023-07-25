<?php

namespace  CrudPOO\Entity;

Class Product

{
    private $idProduct;
    private $reference;
    private $description;
    private $priceTaxIncl;
    private $priceTaxExcl;
    private $quantity ;

    /**
     * Get the value of idProduct
     */
    public function getIdProduct()
    {
        return $this->idProduct;
    }

    /**
     * Set the value of idProduct
     */
    public function setIdProduct($idProduct): self
    {
        $this->idProduct = $idProduct;

        return $this;
    }
}