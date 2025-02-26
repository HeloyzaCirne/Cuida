<?php 
  $conexao = new PDO('pgsql:host=127.0.0.1;port=5432;dbname=cuida','postgres', '1234');

  if ($conexao) {
		$titulo = $_REQUEST['titulo'];
		$descricao = $_REQUEST['descricao'];
		$cidade = $_REQUEST['cidade'];
		$categoria = $_REQUEST['categoria'];
		$data = $_REQUEST['data'];
		$hora = $_REQUEST['hora'];
    $data_hora = $data." ".$hora;
    $email = $_REQUEST['email'];

    $select_usuario = "SELECT identificador FROM usuarios WHERE email='".$_REQUEST['email']."'";

    $comandoSelectUsuario = $conexao->query($select_usuario);

    $id_usuario = $comandoSelectUsuario->fetch();

    $insert = "INSERT INTO eventos(titulo, descricao, cidade, categoria, data_hora, adm) VALUES ('$titulo', '$descricao', '$cidade', $categoria, '$data_hora', $id_usuario[0])";
    
    $conexao->exec($insert);

    header("Location: http://127.0.0.1/Cuida/frontend/adm.php?email=$email"); 
    exit();
	}

?>