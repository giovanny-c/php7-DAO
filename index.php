<?php

require("cfg.php");

$sql = new Sql();//usando a classe sql do arquivo sql.php


$usuarios = $sql->select("SELECT * FROM tb_usuarios");



echo json_encode($usuarios);







?>