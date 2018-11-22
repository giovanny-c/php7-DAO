<?php

spl_autoload_register(function($classname){
  
  
  $filename = "Class". DIRECTORY_SEPARATOR . $classname.".php";

  
  if (file_exists($filename)){

     require_once($filename);


  }


});







?>