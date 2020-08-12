<?php
session_start();

// Impede o acesso direto via url a esse script
if(!$_POST)
{
  unset($_SERVER['nomeusuario']);
  unset($_SESSION['matriculausuario']);
  header('Location:index.php');
}
 
$nomeusuario = $_POST['nomeusuario'];
$matriculausuario = $_POST['matriculausuario'];

include "conexao.php";

//$nivelUsuario = $_POST['nivelUsuario'];
$status = "Inativo";

if(isset($nomeusuario) && isset($matriculausuario) &&
   !empty($nomeusuario) && !empty($matriculausuario)){

      $sql = "INSERT INTO usuarios (nome_usuario, matricula_usuario, status)
        VALUES ('$nomeusuario', '$matriculausuario', '$status')";
      $inserir = mysqli_query($conn, $sql);
}

?>

<link rel="stylesheet" href="css/bootstrap.css">
<div class="container" style="width: 700px; margin-top: 40px">
  <center>
    <h4>Usuário adicionado com sucesso, esperando aprovação.</h4>
  </center>
  <div style="padding-top: 20px"></div>
  <center>
    <a href="cadastro_usuario.php" role="button" class="btn btn-success">Voltar</a>
  </center>
</div>