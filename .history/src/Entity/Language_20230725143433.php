<?php

namespace CrudPOO\Entity;


Class Language{

 private $idLang;

 private $languageName;


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

 /**
  * Get the value of LanguageName
  */
 public function getLanguageName()
 {
  return $this->LanguageName;
 }

 /**
  * Set the value of LanguageName
  */
 public function setLanguageName($LanguageName): self
 {
  $this->LanguageName = $LanguageName;

  return $this;
 }
}