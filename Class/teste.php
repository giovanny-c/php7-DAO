<?php
Class Usuario {

  private $idusuario;
  private $deslogin;
  private $dessenha;
  private $dtcadastro;

  //getters

  public function getIdusuario(){

   return $this->idusuario;

  }

  public function getDeslogin(){

   return $this->deslogin;

  }

  public function getDessenha(){

   return $this->dessenha;

  }

  public function getDtcadastro(){

   return $this->dtcadastro;

  }

  //setters

  public function setIdusuario($value){

   $this->idusuario = $value;

  }

  public function setDeslogin($value){

   $this->deslogin = $value;

  }

  public function setDessenha($value){

   
   $this->dessenha = $value;

  }

  public function setDtcadastro($value){

   $this->dtcadastro = $value;

  }
}

$r = new Usuario();

 $r->setDessenha(121);
 echo $r->getDessenha();

echo "<br>";
var_dump($r);





  ?>