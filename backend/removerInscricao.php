<?php 
  $conexao = new PDO('pgsql:host=127.0.0.1;port=5432;dbname=cuida','postgres', '1234');

  if ($conexao) {
		$email = $_REQUEST['email'];
		$evento = $_REQUEST['identificador'];

    $select_usuario = "SELECT identificador FROM usuarios WHERE email='".$_REQUEST['email']."'";

    $comandoSelectUsuario = $conexao->query($select_usuario);
  
    $id_usuario = $comandoSelectUsuario->fetch();  

    $delete1 = "DELETE FROM inscricoes WHERE evento_id = $evento AND usuario_id = $id_usuario[0]";

    $comandoDelete1 = $conexao->query($delete1);
    
    $comandoDelete1->execute();

    header("Location: http://127.0.0.1/Cuida/frontend/meuseventos.php?email=$email"); 
    exit();
	}

?>