<?php 
  $conexao = new PDO('pgsql:host=127.0.0.1;port=5432;dbname=cuida','postgres', '1234');

  if ($conexao) {
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$nome  = $_POST['nome'];
		$tipo  = $_POST['tipo'];
		
		$insert = "INSERT INTO usuarios(nome, email, senha, tipo) VALUES ('$nome', '$email', '$senha', '$tipo')";
		
		$conexao->exec($insert);

    header("Location: http://127.0.0.1/Cuida/frontend/index.html"); 
    exit();
	}

?>