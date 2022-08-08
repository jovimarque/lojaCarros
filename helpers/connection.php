<?php
try{
	$conexao = new PDO("mysql:host=localhost;dbname=lojacarros","root","", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	throw new PDOException($e->getMessage(), (int)$e->getCode());
}
?>