<?php 
  $conexao = new PDO('pgsql:host=127.0.0.1;port=5432;dbname=cuida','postgres', '1234');

  if ($conexao) {
		$email = $_REQUEST['email'];
		$evento = $_REQUEST['identificador'];

    $delete1 = "DELETE FROM inscricoes WHERE evento_id = $evento";

    $comandoDelete1 = $conexao->query($delete1);
    
    $comandoDelete1->execute();

    $delete2 = "DELETE FROM eventos WHERE identificador = $evento";

    $comandoDelete2= $conexao->query($delete2);
    
    $comandoDelete2->execute();

    header("Location: http://127.0.0.1/Cuida/frontend/adm.php?email=$email"); 
    exit();
	}

?>