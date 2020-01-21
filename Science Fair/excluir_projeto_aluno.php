<?php
	include "conexao.php";

	$nome = $_POST['nome_projeto_app'];
	$senha = $_POST['senha_projeto_app'];

	$sql_verifica_nome_e_senha = "Select * from tbprojeto Where nome = :NOME and codigo = :SENHA";
	$stmt = $PDO->prepare($sql_verifica_nome_e_senha);
	$stmt->bindParam(':NOME', $nome);
	$stmt->bindParam(':SENHA', $senha);
	$stmt->execute();
	
	if($stmt->rowCount() > 0) {	
			$sql_delete = "DELETE FROM `tbprojeto` WHERE `nome` = :NOME and codigo = :SENHA";
			$stmt1 = $PDO->prepare($sql_delete);
			$stmt1->bindParam(":NOME", $nome);
			$stmt1->bindParam(':SENHA', $senha);
		
		if($stmt1->execute()){
			$retornoApp = array("Projeto" => "Sucesso");
		} else {
			$retornoApp = array("Projeto" => "Erro");
		} 
	} else {
		$retornoApp = array("Projeto" => "Inexistente");
	}
	echo json_encode($retornoApp);
?>