<?php

spl_autoload_register(function($classname){//função anonima para chamar uma classe
  
  
  $filename = "Class". DIRECTORY_SEPARATOR . $classname.".php";
  // a classe Sql esta dentro da pasta Class
  
  if (file_exists($filename)){

     require_once($filename);


  }


});







?>