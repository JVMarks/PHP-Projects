<?php
	include "conexao.php";

	$email = $_POST['email_aluno_app'];
	$senha = $_POST['senha_aluno_app'];

	$sql_verifica = "Select * from tbloginaluno Where email = :EMAIL";
	$stmt = $PDO->prepare($sql_verifica);
	$stmt->bindParam(':EMAIL', $email);
	$stmt->execute();
	
	if($stmt->rowCount() > 0) {
		$retornoApp = array("CADASTRO" => "EMAIL_ERRO");
	} else {
		$sql_insert = "INSERT INTO tbloginaluno (email, senha) VALUES (:EMAIL, :SENHA);";
		$stmt = $PDO->prepare($sql_insert);
		
		$stmt->bindParam(":EMAIL", $email);
		$stmt->bindParam(":SENHA", $senha);
		
		if($stmt->execute()){
			$retornoApp = array("CADASTRO" => "Sucesso");
		} else{
			$retornoApp = array("CADASTRO" => "Erro");
		}
	}

	echo json_encode($retornoApp);
?>