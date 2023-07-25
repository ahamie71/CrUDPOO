<?php

namespace CrudPOO\Entity;


Class Language{

 private $idLang;

 private $LanguageName;


 /**
  * Get the value of idLang
  */
 public function getIdLang()
 {
  return $this->idLang;
 }

 /**
  * Set the value of idLang
  */
 public function setIdLang($idLang): self
 {
  $this->idLang = $idLang;

  return $this;
 }
}