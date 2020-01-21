<?php
	include "conexao.php";
	$sql_verifica = "SELECT nome,part,descricao,local FROM `tbprojeto`";
	$dados = $PDO->query($sql_verifica);
	$resultado = array();
	
	while($projeto = $dados->fetch(PDO::FETCH_OBJ)){
		$resultado[] = array("nome"=>$projeto->nome, "part"=>$projeto->part, "descricao"=>$projeto->descricao, "local"=>$projeto->local);
	}
	echo json_encode($resultado);
	
?>