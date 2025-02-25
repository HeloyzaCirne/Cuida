<?php 
  $conexao = new PDO('pgsql:host=127.0.0.1;port=5432;dbname=postgres','postgres', '1234');

  if ($conexao) {
		$email = $_REQUEST['email'];
		$evento = $_REQUEST['identificador'];

    $select = "SELECT identificador FROM usuarios WHERE email='$email'";

    $comandoSelect = $conexao->query($select);

    $id_usuario = $comandoSelect->fetch();
		
		$insert = "INSERT INTO inscricoes(usuario_id, evento_id) VALUES ('$id_usuario[0]', '$evento')";
		
		$conexao->exec($insert);

    header("Location: http://127.0.0.1/Cuida/frontend/meuseventos.php?email=$email"); 
    exit();
	}

?>