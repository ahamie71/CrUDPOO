<?php

namespace  CrudPOO\Entity;


use CrudPOO\Entity\Language;

Class Product

{
    private $idProduct;
    private $reference;
    private $description;
    private $priceTaxIncl;
    private $priceTaxExcl;
    private $quantity ;
    private int $idLang;

    priavte Language
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

    /**
     * Get the value of priceTaxExcl
     */
    public function getPriceTaxExcl()
    {
        return $this->priceTaxExcl;
    }

    /**
     * Set the value of priceTaxExcl
     */
    public function setPriceTaxExcl($priceTaxExcl): self
    {
        $this->priceTaxExcl = $priceTaxExcl;

        return $this;
    }

    /**
     * Get the value of quantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     */
    public function setQuantity($quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get the value of idLang
     */
    public function getIdLang(): int
    {
        return $this->idLang;
    }

    /**
     * Set the value of idLang
     */
    public function setIdLang(int $idLang): self
    {
        $this->idLang = $idLang;

        return $this;
    }


    public function getLanguageName(): string
    {
        return $this->languageName;
    }
    /**
     * Set the value of userName
     */
    public function setLanguageName(string $LanguageName): self
    {
        $this->languageName = $LanguageName;

        return $this;
    }
}