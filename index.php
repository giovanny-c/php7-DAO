<?php

require_once("cfg.php");

/*==================
//codigos usados na aula 1 de PDO DAO

$sql = new Sql(); //instanciando a classe Sql


$usuarios = $sql->select("SELECT * FROM tb_usuarios where idusuario = 4");

//print_r($usuarios);


//echo "<br>";

echo json_encode($usuarios);

//echo "<br>";
//echo "<br>";
*/

/*==================

//traz um usuario

$root = new Usuario();

 $root->loadById(2);

echo $root;

*/

/*==============

//traz uma lista de usuarios

$lista = Usuario::getList();

echo json_encode($lista);

*/


/*==============

//traz uma lista de usuarios buscando pelo login

$search = Usuario::search("c");

echo json_encode($search);

*/

/*==============

//Traz um usuario usando o login e a senha

$usuario = new Usuario();

$usuario->login("root", "54321");

echo $usuario;
// nao precisa fazer o json_encode pois ao instanciar a classe Usuario ela ja possui o metodo magico __toString() que faz o encode ao ser instanciada, diferente dos dois metodos anteriores que são chamados sem instanciar a classe

*/

/*==============

//Faz um insert de um usuario e mostra ele

$aluno = new Usuario("Jamelão Jr","J4m3l40 Jr");

$aluno->insert();

echo $aluno;

*/

/*==============

//Altera um usuario

$usuario = new Usuario();

$usuario->loadById(5);

$usuario->update("professor", "!()#@$*%");

echo $usuario;
*/

/*==============

//deleta um usuario


$usuario = new Usuario();

$usuario->loadById(48);

$usuario->delete();

echo $usuario;

*/

?>