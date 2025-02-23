<?php 
  $conexao = new PDO('pgsql:host=127.0.0.1;port=5432;dbname=cuida','postgres', '1234');

    if ($conexao) {
      $email = $_POST['email'];
      $senha = $_POST['senha'];
      
      
      $select = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
      
      $comandoSelect = $conexao->query($select);

      $var_linha = $comandoSelect->fetch();

      if($var_linha['tipo'] == 'usuario' && $var_linha['email'] == $email && $var_linha['senha'] == $senha){
        header("Location: http://127.0.0.1/Cuida/frontend/index.php?email=$var_linha[2]"); 
        exit();
      }
      elseif($var_linha['tipo'] == 'admin' && $var_linha['email'] == $email && $var_linha['senha'] == $senha){
        header("Location: http://127.0.0.1/Cuida/frontend/adm.php?email=$var_linha[2]"); 
        exit();
      }
      else{
        header("Location: http://127.0.0.1/Cuida/frontend/index.php"); 
        exit();
      }
    }

?>