<?php
session_start();

// Se o usu�rio n�o estiver logado e tentar acessar a p�gina diretamente pela url
// o mesmo ser� redirecionado para a tela de login
if(!isset($_SESSION['matricula']) || empty($_SESSION['matricula']))
{
  unset($_SESSION['matricula']);
  header('Location: index.php');
}

$matricula = $_SESSION['matricula'];

include "conexao.php";

$nomeusuario = $_POST['nomeusuario'];
$matriculausuario = $_POST['matriculausuario'];
$nivelUsuario = $_POST['nivelUsuario'];
$status = "Ativo";

$sql = "INSERT INTO usuarios (nome_usuario, matricula_usuario, nivel_usuario, status)
        VALUES ('$nomeusuario', '$matriculausuario', $nivelUsuario, '$status')";
$inserir = mysqli_query($conn, $sql);

?>

<title>Inclus�o de Usu�rio</title>
<link rel="stylesheet" href="css/bootstrap.css">
<div class="container" style="width: 700px; margin-top: 40px">
  <center>
    <h4>Usu�rio adicionado e ativo com sucesso.</h4>
  </center>
  <div style="padding-top: 20px"></div>
  <center>
    <a href="cadastro_usuario.php" role="button" class="btn btn-success">Voltar</a>
  </center>
</div>