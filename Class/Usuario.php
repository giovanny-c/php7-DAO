<?php

require_once "Sql.php";


//CRIANDO UMA CLASSE PARA A TABELA USUSARIO NO BANCO DE DADOS
Class Usuario {

  private $idusuario;
  private $deslogin;
  private $dessenha;
  private $dtcadastro;
  

  //getters =========================

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

  //setters =========================

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

  
  //loadbyId ==========================



  public function loadById($id){//vai retornar uma linha da tabela

   $sql = new Sql();


   $results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID ",array(
       ":ID"=>$id
   ));// valor id vai receber o valor do parametro $id que vem do loadById() e vai armazenar em um array

   // o $result vai retornar como um array de arrays, mas como é so um registro ele terá de ser tratado

   if (count($results) > 0) {//se existir resultado:
    
     $row = $results[0];//$row será igual a $results na posição do array 0


    // vai pegar os dados que voltaram como associativos, (ver metodo select() do arquivo Sql.php, linha 76) e colocar nos setters   

     //$row [0=> ["idusuario" = $valor], ["deslogin" = $valor] ]
     //o que tem nesse $row ^^^^^^ ex



     $this->setIdusuario($row['idusuario']);
     $this->setDeslogin($row['deslogin']);
     $this->setDessenha($row['dessenha']);

//formatando a data do cadastro
     $dateT = new DateTime($row['dtcadastro']);
     
     $d =  $dateT->format('d/m/Y H:i:s');


     $this->setDtcadastro($d);
   } 
 
  }




	   public function __toString(){//

	     $a = array(array(
	       "idusuario"=>$this->getIdusuario(),
	       "deslogin"=>$this->getDeslogin(),
	       "dessenha"=>$this->getDessenha(),
	       "dtcadastro"=>$this->getDtcadastro())); 

	      //print_r($a);
     
          return json_encode($a);//não tava transformando em json por causa do dateTimes 

	     

	   

	   }



}





?>