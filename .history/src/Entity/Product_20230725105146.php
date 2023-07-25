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

    /**
     * Get the value of reference
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set the value of reference
     */
    public function setReference($reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     */
    public function setDescription($description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of priceTaxIncl
     */
    public function getPriceTaxIncl()
    {
        return $this->priceTaxIncl;
    }

    /**
     * Set the value of priceTaxIncl
     */
    public function setPriceTaxIncl($priceTaxIncl): self
    {
        $this->priceTaxIncl = $priceTaxIncl;

        return $this;
    }
}