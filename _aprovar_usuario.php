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
$nivel = $_GET['nivel'];
$posicao = "";

if($nivel == 1){
  $updte = "UPDATE `usuarios`
            SET status = 'Ativo',
                nivel_usuario = 1
            WHERE id_usuario = $id";
  $posicao = "GERENTE";
}

if($nivel == 2){
  $updte = "UPDATE `usuarios`
            SET status = 'Ativo',
                nivel_usuario = 2
            WHERE id_usuario = $id";
  $posicao = "SUPERVISOR";
}

if($nivel == 3){
  $updte = "UPDATE `usuarios`
            SET status = 'Ativo',
                nivel_usuario = 3
            WHERE id_usuario = $id";
  $posicao = "FUNCION�RIO";
}

$atualiza��o = mysqli_query($conn, $updte);
?>

<title>Inclus�o de Usu�rio</title>
<link rel="stylesheet" href="css/bootstrap.css">
<div class="container" style="width: 700px; margin-top: 40px">
  <center>
    <h4>Aprova��o de <?php echo $posicao; ?> realizada com sucesso.</h4>
  </center>
  <center>
    <form action="" method="post">
      <a href="aprovar_usuario.php" role="button" class="btn btn-success">Voltar</a>
    </form>
  </center>
</div>