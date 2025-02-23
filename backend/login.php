<?php 
  $conexao = new PDO('pgsql:host=127.0.0.1;port=5432;dbname=cuida','postgres', '1234');

    if ($conexao) {
      $email = $_POST['email'];
      $senha = $_POST['senha'];
      
      $select = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
      
      $comandoSelect = $conexao->query($select);

      $var_linha = $comandoSelect->fetch();

      if($var_linha[4] == 'usuario'){
        header("Location: http://127.0.0.1/Cuida/frontend/index.php?email=$var_linha[1]"); 
        exit();
      }
      else{
        header("Location: http://127.0.0.1/Cuida/frontend/index.php"); 
        exit();
      }
    }

?>