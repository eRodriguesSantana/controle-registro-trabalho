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

$id = $_GET['id'];
?>

<link rel="stylesheet" href="css/bootstrap.css">  
<div class="container" style="width: 700px; margin-top: 40px">
  <center>
    <h4>Confirma exclus�io do registro?</h4>
  </center>
  <center>
    <form action="" method="post">
      <a href="deletar_ponto.php?id=<?php echo $id; ?>" role="button" class="btn btn-danger">Sim</a>
      <a href='listar_pontos.php' role='button' class='btn btn-success'>N�o</a>
    </form>
  </center>
</div>