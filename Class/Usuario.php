<?php

//require_once "Sql.php";


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

  // LIST =======================================

  //loadbyId ==========================



  public function loadById($id){//VAI TRAZER UM UZUARIO ESPECIFICO

   $sql = new Sql();


   $results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID ",array(
       ":ID"=>$id
   ));// valor id vai receber o valor do parametro $id que vem do loadById() e vai armazenar em um array

   // o $result vai retornar como um array de arrays, mas como é so um registro ele terá de ser tratado

   if (count($results) > 0) {//se existir resultado:
    
    // $row = $results[0];//$row será igual a $results na posição do array 0

    //VER METODO data()
    // vai pegar os dados que voltaram como associativos, (ver metodo select() do arquivo Sql.php, linha 76) e colocar nos setters   

     //$row [0=> ["idusuario" = $valor], ["deslogin" = $valor] ]
     //o que tem nesse $row ^^^^^^ ex

     $this->setData($results[0]);

    
   } 
 
  }


     public static function getList(){//VAI TRAZER UMA LISTA DE TODOS OS USUARIOS por ser estatico nao precisara ser instanciado e por nao referenciar nenhum outro metodo da classe usuario(nao tem nenhum $this, nao esta amarado a nenhum outro metodo)

       $sql = new Sql();

       return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");

  }


    public static function search($login){//VAI TRAZER UMA LISTA DE TODOS OS USUARIOS QUE POSSUIREM DETERMINADOS CARACTERES NO deslogin, (BUSCA)

      $sql = new Sql();

      return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(':SEARCH'=>"%".$login."%"));


  }

    public function login($login, $senha){//Traz um usuario usando o login e a senha

      $sql = new Sql();

      $results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
        ":LOGIN"=>$login, 
        ":PASSWORD"=>$senha
      ));

      if(count($results) > 0){

        

        $this->setData($results[0]);

        

      } else {

       throw new Exception("Login e/ou senha invalidos");
       

      }



    }


    
    
    public function setData($data){

        $this->setIdusuario($data['idusuario']);
        $this->setDeslogin($data['deslogin']);
        $this->setDessenha($data['dessenha']);

        $dateT = new DateTime($data['dtcadastro']);        
        $d =  $dateT->format('d/m/Y H:i:s');
        $this->setDtcadastro($d);  


    }

    // INSERT ========================================

    


    public function insert(){//ADICIONA UM NOVO USUARIO E EXIBE ELE 
  
      $sql = new Sql();

      
                              
      $results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)",array(
        ':LOGIN'=>$this->getDeslogin(),
        ':PASSWORD'=>$this->getDessenha()
    ));


      


      if(count($results) > 0){
      
        $this->setData($results[0]);

      }


    }


    //UPDATE ========================
    
    public function update($login, $password){// altera o login e a senha de um usuario

    $this->setDeslogin($login);
    $this->setDessenha($password);

    $sql = new Sql();

    $sql->query("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = :ID", array(
      ':LOGIN'=>$this->getDeslogin(),
      ':PASSWORD'=>$this->getDessenha(),
      ':ID'=>$this->getIdusuario()
    ));
 
  }

  //DELETE =====================

  public function delete(){

     $sql = new Sql();

     $sql->query("DELETE FROM tb_usuarios WHERE idusuario = :ID", array(
     ':ID'=>$this->getIdusuario()
     ));

     $this->setIdusuario(0);
     $this->setDeslogin("");
     $this->setDessenha("");
     $this->setDtcadastro(new DateTime());


  }








     public function __construct($login = "", $password = ""){

      $this->setDeslogin($login);
      $this->setDessenha($password);

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