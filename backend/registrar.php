<?php 
  $conexao = new PDO('pgsql:host=127.0.0.1;port=5432;dbname=cuida','postgres', '1234');

  if ($conexao) {
		$email = $_REQUEST['email'];
		$senha = $_REQUEST['senha'];
		$nome  = $_REQUEST['nome'];
		$tipo  = $_REQUEST['tipo'];
		
		$insert = "INSERT INTO usuarios(nome, email, senha, tipo) VALUES ('$nome', '$email', '$senha', '$tipo')";
		
		$conexao->exec($insert);

		header("Location: http://127.0.0.1/Cuida/frontend/index.php"); 
		exit();
	}

?>