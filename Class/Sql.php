<?php
//nome do arquivo ta em minusculo


class Sql extends PDO {
     
     private $conn;

     public function __construct(){//metodo construtor fazendo a conexao

         $this->conn = new PDO("mysql:host=localhost;dbname=dbphp7","root","");//parametros de conexão

    }

    private function setParams($statment, $parameters = array()){//recebe os parametros

            foreach ($parameters as $key => $value) {
         	
            $this->setParam($key, $value);
         
    }

    
    }
    
    private function setParam($statment, $key, $value){

        $statment->bindParam($key, $value);


    }

    
     public function query($rawQuery, $params = array()){//para fazer querrys
     
         $stmt = $this->conn->prepare($rawQuery);
     
         $this->setParams($stmt, $params);
     
         $stmt->execute();
     
         return $stmt;

    }

    public function select($rawQuery, $params = array()):array{

        $stmt = $this->query($rawQuery, $params);
         
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }


}



?>