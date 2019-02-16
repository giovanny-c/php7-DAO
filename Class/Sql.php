<?php



// Cria uma classe que estende de PDO todos os seus metodos
class Sql extends PDO { 
     
     private $conn;//

     public function __construct(){//metodo construtor para conectar no banco logo ao ser chamado

         $this->conn = new PDO("mysql:host=localhost;dbname=dbphp7","root","");

    }

//==============================================================================
    private function setParams($statment, $parameters = array()){

            foreach ($parameters as $key => $value) {
         	
            $this->setParam($statment, $key, $value);
           // vai passar o $statment que possui o valor do $stmt do metodo query() e $key que possui o valor do $param do metodo query() e o $value que possui o valor do parametro(da coluna do banco de dados) em si, para o metodo setParam()
    }
       //ESTE METODO setParams() + o setParam associam MAIS DE UM parametro com MAIS DE UM valor

    
    }
//==============================================================================

    private function setParam($statment, $key, $value){

        $statment->bindParam($key, $value);
        //usa o $statement que tem o valor do $stmt do metodo query() para ligar parametro da query com o valor 


          //ESTE METODO setParam() associa UM parametro com UM valor    
    }

//==============================================================================

     public function query($rawQuery, $params = array()){
                           //query bruta e parametros que por padrao serao array

         //o $stmt será a preparação da query
         $stmt = $this->conn->prepare($rawQuery);
                                    //query bruta recebida no metodo  query

    /* ASSOCIA OS PARAMETROS "$params" AOS VALORES
         
         foreach($params as $key => $value){
        
             $stmt->bindParam($key, $value);
                        //parametro, valor
         }
    
    */ //essas linhas de codigo acima serão substituidas pelos metodos setParams() e setParam()

         $this->setParams($stmt, $params);
         // essa linha vai passar o $stmt e o $params para o metodo setParams() que precisa dos parametros $statement e $parameters --- PARA FAZER O BINDPARAM 
     
         $stmt->execute();
     
         return $stmt; // vai retornar o stmt 

        //ESTE METODO query() apenas faz a execução da query solicitada

    }
//==============================================================================


    public function select($rawQuery, $params = array()):array{//ESTE METODO vai retornar um array

        $stmt = $this->query($rawQuery, $params);
        //manda a query e os parametros para o metodo query() que vai retornar o stmt de novo
         
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    

            //ESTE METODO select() vai fazer o select no banco de dados
    }       //e trazer os resultados

//==============================================================================
  

}

    

?>