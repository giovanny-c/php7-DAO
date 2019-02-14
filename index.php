<?php

require_once("cfg.php");

/*
//codigos usados na aula 1 de PDO DAO

$sql = new Sql(); //instanciando a classe Sql


$usuarios = $sql->select("SELECT * FROM tb_usuarios where idusuario = 4");

//print_r($usuarios);


//echo "<br>";

echo json_encode($usuarios);

//echo "<br>";
//echo "<br>";
*/


$root = new Usuario();

 $root->loadById(2);

echo $root;



?>