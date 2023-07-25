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
  return $this->languageName;
 }

 /**
  * Set the value of LanguageName
  */
 public function setLanguageName($LanguageName): self
 {
  $this->languageName = $LanguageName;

  return $this;
 }
}