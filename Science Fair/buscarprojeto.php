  <?php
	$connection = new mysqli("localhost", "root", "123", "login");
	$sql_busca = $connection -> query("SELECT nome,part,descricao,local FROM `tbprojeto`;");
	
	
	
	if($sql_busca) {
		while ($exibe = $sql_busca->fetch_assoc()){
			foreach($exibe as $key => $value){
				$retornoApp = array("Projetos"=>$value);
				header('Content-type: application/json');
				echo json_encode($retornoApp);
			}
	}
	}
?>