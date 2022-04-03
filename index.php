<?php

require_once("config.php");

#$sql = new Sql();

#$usuarios=$sql->select("SELECT * FROM tb_usuarios");

#echo json_encode($usuarios);

$root =new User();

$root->loadById(3);

echo $root;


?>