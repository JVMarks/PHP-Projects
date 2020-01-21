<?php
	include "conexao.php";

	$nome = $_POST['nome_projeto_app'];
	$part = $_POST['part_projeto_app'];
	$descricao = $_POST['descricao_projeto_app'];
	$codigo = $_POST['codigo_projeto_app'];
	$local = $_POST['local_projeto_app'];

	$sql_verifica = "Select * from tbprojeto Where local = :LOCAL";
	$stmt = $PDO->prepare($sql_verifica);
	$stmt->bindParam(':LOCAL', $local);
	$stmt->execute();
	
	if($stmt->rowCount() > 0) {
		$retornoApp = array("CADASTRO" => "LOCAL_ERRO");
	} else {
		$sql_insert = "INSERT INTO tbprojeto (nome, part, descricao, codigo, local) VALUES (:NOME, :PART, :DESCRICAO, :CODIGO, :LOCAL);";
		$stmt = $PDO->prepare($sql_insert);
		
		$stmt->bindParam(":NOME", $nome);
		$stmt->bindParam(":PART", $part);
		$stmt->bindParam(":DESCRICAO", $descricao);
		$stmt->bindParam(":CODIGO", $codigo);
		$stmt->bindParam(":LOCAL", $local);
		
		if($stmt->execute()){
			$retornoApp = array("CADASTRO" => "Sucesso");
		} else{
			$retornoApp = array("CADASTRO" => "Erro");
		}
	}

	echo json_encode($retornoApp);
?>