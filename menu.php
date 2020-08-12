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

$sql = "SELECT nivel_usuario FROM usuarios WHERE matricula_usuario = $matricula and status='Ativo'";
$buscar = mysqli_query($conn, $sql);
$arr = mysqli_fetch_array($buscar);
$nivel = $arr['nivel_usuario'];
?>

<!DOCTYPE html>
<html lang="pt-BR"> 
  <head>
    <meta charset="utf-8">
    <title>Op��es</title>
    <link rel="stylesheet" href="css/bootstrap.css">   
  </head>

  <body>
    <div class="container" style="margin-top: 100px">
      <div class="row">       
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Adicionar Registro de Ponto</h5>
              <p class="card-text">Op��o para gravar marca��es di�rias dentro do expediente de trabalho.</p>
              <!--<a href="adicionar_ponto.php?mat=<?php echo $matricula; ?>" class="btn btn-primary">Adicionar Registro</a>-->
              <a href="adicionar_ponto.php" class="btn btn-primary">Adicionar Registro</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Listar Registros de Pontos</h5>
              <p class="card-text">Op��o para visualizar, editar e excluir registros cadastrados por este usu�rio.</p>
              <a href="listar_pontos.php" class="btn btn-primary">Listar Registros</a>
            </div>
          </div>
        </div>
         <?php
          if(($nivel == 1) || $nivel == 2){
        ?>
        <div class="col-sm-6" style="margin-top: 20px">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Aprovar Usu�rios</h5>
              <p class="card-text">Aprovar usu�rios cadastrados.</p>
              <a href="aprovar_usuario.php" class="btn btn-primary">Aprovar Usu�rios</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6" style="margin-top: 20px">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Editar/Excluir Ponto</h5>
              <p class="card-text">Alterara��o ou exclus�o de pontos de funcion�rios.</p>
              <a href="listar_pontos_funcionarios.php" class="btn btn-primary">Pontos de Funcion�rios</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6" style="margin-top: 20px">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Adicionar Usu�rio</h5>
              <p class="card-text">Op��o para adicionar usu�rio com permiss�o j� inclu�da e com cadastro sem necessidade de aprova��o.</p>
              <a href="cadastro_usuario.php" class="btn btn-primary">Adicionar Usu�rio</a>
            </div>
          </div>
        </div>
          <?php } ?>        
      </div>      
    </div>

    <script type="text/javascript" src="js/bootstrap.js"></script>
  </body>
</html>