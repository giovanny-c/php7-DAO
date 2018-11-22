<?php

require_once "Sql.php";

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

  
  //loadbyId

  public function loadById($id){

   $sql = new Sql();




   $results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID ",array(
       ":ID"=>$id
   ));

   if (count($results) > 0) {
    
     $row = $results[0];


   


     $this->setIdusuario($row['idusuario']);
     $this->setDeslogin($row['deslogin']);
     $this->setDessenha($row['dessenha']);
     $dateT = new DateTime($row['dtcadastro']);
     
     $d =  $dateT->format('d/m/Y H:i:s');


     $this->setDtcadastro($d);

     

    

   } 
 
    

  }


	   public function __toString(){

	     $d = array(array(
	       "idusuario"=>$this->getIdusuario(),
	       "deslogin"=>$this->getDeslogin(),
	       "dessenha"=>$this->getDessenha(),
	       "dtcadastro"=>$this->getDtcadastro())); 

	      //print_r($d);
     
          return json_encode($d);//não tava transformando em json por causa do dateTimes 

	     

	   

	   }



}





?>