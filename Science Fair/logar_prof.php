<?php
	include "conexao.php";

	$email = $_POST['email_prof_app'];
	$senha = $_POST['senha_prof_app'];
	
	$sql_login = "Select * from tbloginprof Where email = :EMAIL AND senha= :SENHA";
	$stmt = $PDO->prepare($sql_login);
	$stmt->bindParam(':EMAIL', $email);
	$stmt->bindParam(':SENHA', $senha);
	$stmt->execute();
	
	if($stmt->rowCount() > 0) {
		$retornoApp = array("LOGIN"=> "Sucesso");				
	} else {
		$retornoApp = array("LOGIN"=> "ERRO");	
	}
	
	echo json_encode($retornoApp);
?>