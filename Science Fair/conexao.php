<?php
	$dsn = "mysql:host=localhost;dbname=login;charset=utf8";
	$usuario = "root";
	$senha = "123";

	try{
		$PDO = new PDO($dsn, $usuario, $senha);


	} catch (PDOException $erro){
		echo "conexao_erro";
		exit;
	}

?>