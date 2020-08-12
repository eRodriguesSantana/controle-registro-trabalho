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

$id = $_GET['id'];

$delete = "DELETE FROM `usuarios` WHERE id_usuario = $id";
$deletar = mysqli_query($conn, $delete);
?>

<link rel="stylesheet" href="css/bootstrap.css">
<div class="container" style="width: 700px; margin-top: 40px">
  <center>
    <h4>Exclus�o de usu�rio realizada com sucesso.</h4>
  </center>
  <center>
    <form action="" method="post">
      <a href="aprovar_usuario.php" role="button" class="btn btn-success">Voltar</a>
    </form>
  </center>
</div>