<?php
	include "conexao.php";

	$nome = $_POST['nome_projeto_app'];

	$sql_verifica = "Select * from tbprojeto Where nome = :NOME";
	$stmt = $PDO->prepare($sql_verifica);
	$stmt->bindParam(':NOME', $nome);
	$stmt->execute();
	
	if($stmt->rowCount() > 0) {
		$sql_delete = "DELETE FROM `tbprojeto` WHERE `nome` = :NOME";
		$stmt1 = $PDO->prepare($sql_delete);
		
		$stmt1->bindParam(":NOME", $nome);
		
		if($stmt1->execute()){
			$retornoApp = array("Projeto" => "Sucesso");
		} else{
			$retornoApp = array("Projeto" => "Erro");
		} 
	} else {
		$retornoApp = array("Projeto" => "Inexistente");
	}

	echo json_encode($retornoApp);
?>